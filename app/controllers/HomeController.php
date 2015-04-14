<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
				// TODO: Show to my company only
/*				$my_company = User::
					select( DB::raw('right(users.email, length(users.email)-INSTR(users.email, \'@\')) AS my_company'))
					->where('id', '=', Auth::user()->id)
					->first();
				$my_company =  $my_company->my_company;
*/

        $posts      = Post::select('*')
        ->join('users', 'posts.payer_id', '=', 'users.id')
        // ->where(DB::raw('right(users.email, length(users.email)-INSTR(users.email, \'@\'))'), '=', $my_company)
        ->orderBy('posts.created_at', 'asc')->paginate(5);

        $categories = Category::all();

	      if(isset(Auth::user()->id)) {
		      	$my_user_id = Auth::user()->id;

		      	// This Consume(user) have to pay payer
						$payments = DB::table('posts')
							->join('users', 'posts.payer_id', '=', 'users.id')
							->select('username', DB::raw('sum(cost) AS total'))
							->where('consumer_id', '=', $my_user_id)
							->where('payer_id', '<>', $my_user_id)
							->groupBy('username')->get();

						// Other consumer to pay this payer(user)
							$credits = DB::table('posts')
							->join('users', 'posts.consumer_id', '=', 'users.id')
							->select('username', DB::raw('sum(cost) AS total'))
							->where('consumer_id', '<>', $my_user_id)
							->where('payer_id', '=', $my_user_id)
							->groupBy('username')->get();

						// Payment Balance
								// Transaction Users
								$users =  DB::table('users')
									->join('posts', 'users.id', '=', 'posts.consumer_id')
									->select('users.id', 'users.username')
									->orderBy('username')
									->get();

								$balances = array();

								foreach($users as $key=>$val) {
										$uid = $val->id;
										$result =  DB::table('posts')
												->join('users', 'posts.consumer_id', '=', 'users.id')

												->select(
													'username',
														DB::raw('
																	IFNULL((SELECT sum(cost) FROM posts WHERE payer_id = '.$uid.' AND consumer_id = '.$uid.'), 0) AS credit,
															IFNULL((SELECT sum(cost) FROM posts WHERE payer_id <> '.$uid.' AND consumer_id = '.$uid.'), 0) AS debet
														')
													)
												->where('users.id', '=', $uid)
												->get();

												$balances[] = $result;
									}
										// vd($balances);




							// $balances = DB::table('posts')
							// ->join('users', 'posts.consumer_id', '=', 'users.id')
							// ->select('username', DB::raw('sum(cost) AS total'))
							// ->groupBy('username')->get();

							// Payment History
							function users($cid) {
									// Transaction Users
									$users =  DB::table('users')
										->join('posts', 'users.id', '=', 'posts.consumer_id')
										->select('users.id', 'users.username')
										->orderBy('username')
										->get();

										$length = count($users);
										$tail = 0;
										$str = '';

										foreach($users as $key=>$val) {
												$tail++;
												$uid =  $val->id;
												$username =  $val->username;
												$str .= ' (SELECT SUM(cost) FROM posts';
												$str .= ' WHERE posts.category_id='.$cid;
												$str .= ' AND posts.consumer_id= '.$val->id.')';
												$str .= ' AS '.$val->username;
												$str .= $tail == $length ? '' : ',';
										}
										return $str;
								}

								$history_s = array();
								$cat =  DB::table('categories')
									->select('id')->get();
									$i = 0;
								foreach($cat as $key=>$val) {
									$cid = $val->id;

									$history = DB::table('posts')
											->join('users', 'posts.consumer_id', '=', 'users.id')
											->join('categories', 'posts.category_id', '=', 'categories.id')
											->select(
													DB::raw(' categories.name AS restaurant '),
													DB::raw(users($cid))
												)
											->where('category_id', '=', $cid)
											->groupBy('restaurant')
											->get();
									$history_s[$i][] = $history;
								}
				} else {
					$payments = '';
					$credits = '';
					$balances = '';
					$history_s = '';
					$categories_count = '';
					$users_count = '';
				}

        $data = compact('posts', 'categories', 'payments', 'credits', 'balances', 'history_s');

		return View::make('home.index', $data);
	}

}
