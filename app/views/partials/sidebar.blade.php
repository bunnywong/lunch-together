<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">

    <!-- Blog Search Well -->
    {{--<div class="well">
        <h4>Blog Search</h4>
        <div class="input-group">
            <input type="text" class="form-control">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button">
                    <span class="glyphicon glyphicon-search"></span>
            </button>
            </span>
        </div>
        <!-- /.input-group -->
    </div>--}}

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Restaurant</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    @foreach($categories as $category)
                    <li><a href="{{ route('categories.show', $category->id) }}">{{{ $category->name }}}</a></li>
                    @endforeach
                </ul>

                @if (Auth::check())
                <div>
                    <p>
                        <a class="btn btn-primary" href="{{ route('categories.index') }}">Restaurant Manage</a>
                    </p>
                </div>
                @endif
            </div>
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <div class="well">
        <h4>Account</h4>
        @if (Auth::check())

        <p>
            <div>Welcome  {{{ isset(Auth::user()->username) ? Auth::user()->username : Auth::user()->email }}}</div>
            <span class="label label-success">Member</span>
            <a href="{{ route('auth.logout') }}">Logout</a>
        </p>
        @else
        <p><a href="{{ route('auth.login') }}">Login</a></p>
        <p><a href="{{ route('auth.registration') }}">Registration</a></p>
        @endif
    </div>

</div>

