<?php

class CategoriesController extends \BaseController {

    public function __construct()
    {
        $this->beforeFilter('csrf', ['on' => 'post']);
    }
    
	/**
	 * Display a listing of the resource.
	 * GET /categories
	 *
	 * @return Response
	 */
	public function index()
	{
        $categories = Category::paginate();
        
        $data = compact('categories');
        
		return View::make('categories.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /categories/create
	 *
	 * @return Response
	 */
	public function create()
	{
        $categories = Category::paginate(5);
        
        $data = compact('categories');
        
		return View::make('categories.create', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /categories
	 *
	 * @return Response
	 */
	public function store()
	{
        $inputs = Input::all();

        $validation = Validator::make($inputs, Category::$rules);

        if ($validation->fails())
        {
            return Redirect::back()->withErrors($validation)->withInput();
        }

		Category::create($inputs);

        return Redirect::route('categories.index')->with('success', 'Restaurant Added');
	}

	/**
	 * Display the specified resource.
	 * GET /categories/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $posts = Post::where('category_id', $id)->orderBy('created_at', 'desc')->paginate(5);
        $categories = Category::all();

        if(isset(Auth::user()->id)) {
					$payments = DB::table('posts')->join('users', 'posts.payer_id', '=', 'users.id')->select('username', DB::raw('sum(cost) AS total'))->where('consumer_id', '=', Auth::user()->id)->where('payer_id', '<>', Auth::user()->id)->groupBy('username')->get();
				} else {
					$payments = '';
				}

        $data = compact('posts', 'categories', 'payments');

		return View::make('categories.show', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /categories/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $editing_category = Category::findOrFail($id);
        $categories = Category::all();
        
        $data = compact('editing_category', 'categories');
        
		return View::make('categories.edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /categories/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $category = Category::findOrFail($id);

        $inputs = Input::all();

        $validation = Validator::make($inputs, Category::$rules);

        if ($validation->fails())
        {
            return Redirect::back()->withErrors($validation)->withInput();
        }

        $category->update($inputs);

        return Redirect::route('categories.index')->with('success', 'Restaurant Updated');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /categories/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $category = Category::where('id', '!=', $id)->orderBy('id', 'desc')->first();
        $posts = Post::where('category_id', $id)->get();

        foreach($posts as $post)
        {
            $post->category_id = $category->id;
            $post->save();
        }

		Category::destroy($id);

        return Redirect::route('categories.index')->with('success', 'Restaurant Deleted');
	}

}