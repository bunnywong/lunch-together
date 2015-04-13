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
						$balances = DB::table('posts')
						->join('users', 'posts.consumer_id', '=', 'users.id')
						->select('username', DB::raw('sum(cost) AS total'))
						->groupBy('username')->get();

					// Payment History
					$users =  DB::table('users')
						->select('username')
						->groupBy('id')->get();


						// todo
						$history_s = DB::table('posts')
						->join('users', 'posts.consumer_id', '=', 'users.id')
						->join('categories', 'posts.category_id', '=', 'categories.id')
						->select(DB::raw('name AS restaurant'), 'username', 'cost')
						// ->groupBy('name')
						->get();


				} else {
					$payments = '';
					$credits = '';
					$balances = '';
					$history_s = '';
				}

						// echo '<pre>';
						// dd($history_s);
						// echo '</pre>';

        $data = compact('posts', 'categories', 'payments', 'credits', 'balances', 'history_s');

		return View::make('home.index', $data);
	}

}
