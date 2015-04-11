<?php

class AuthController extends \BaseController {

	public function index()
	{
		if (Auth::check())
		{
    		return Redirect::route('home.index')->with('success', 'Login success');
		}

		return View::make('login.index');
	}

    public function process()
	{
		$validator = Validator::make(Input::all(), [
      'username' => 'required',
			'password' => 'required|between:3,32',
        ]);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		if (Auth::attempt(['username' => Input::get('username'), 'password' => Input::get('password')], Input::get('remember-me')))
		{

        	return Redirect::route('home.index')->with('success', 'Login success');
    	}

		return Redirect::back()->withInput()->with('error', 'Please check information');
	}

	public function logout()
	{
		Auth::logout();

		return Redirect::route('home.index')->with('success', 'Logout success');
	}

	public function registration()
	{
		return View::make('login.registration');

	}

	public function userCreate()
	{
			  $inputs = Input::all();

        // $validation = Validator::make($inputs, Post::$rules);
         $validator = Validator::make(Input::all(), User::$rules);

				if ($validator->passes()) {
				    $user = new User;
				    $user->username = Input::get('username');
				    $user->email    = Input::get('email');
				    $user->password = Hash::make(Input::get('password'));
				    $user->save();

						return Redirect::route('home.index')->with('success', 'Thanks for registering');
				} else {
				    // validation has failed, display error messages
					 return Redirect::to('registration')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
				}
	}

}