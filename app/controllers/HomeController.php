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
        $posts      = Post::orderBy('created_at', 'asc')->paginate(5);
        $categories = Category::all();

	      if(isset(Auth::user()->id)) {
					$payments = DB::table('posts')->join('users', 'posts.payer_id', '=', 'users.id')->select('username', DB::raw('sum(cost) AS total'))->where('consumer_id', '=', Auth::user()->id)->where('payer_id', '<>', Auth::user()->id)->groupBy('username')->get();
				} else {
					$payments = '';
				}

        $data = compact('posts', 'categories', 'payments');

		return View::make('home.index', $data);
	}

}
