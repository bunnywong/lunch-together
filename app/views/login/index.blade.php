<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Lunch Together</title>
    {{ HTML::style('css/frontend.css') }}
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        {{ HTML::script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}
        {{ HTML::script('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js') }}
    <![endif]-->
</head>
<body class="login form">
    <div class="container">
        {{ Form::open(['route' => 'auth.process', 'method' => 'POST', 'class' => 'form-signin', 'role' => 'form']) }}
            <h2 class="form-signin-heading text-center">Login</h2>
            {{ Form::label('email', 'email', ['class' => 'sr-only']) }}
            {{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Input your email', 'required', 'autofocus']) }}

            {{ Form::label('password', 'password', ['class' => 'sr-only']) }}
            {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Input your password', 'required']) }}

            <div class="checkbox">
              <label>
                  {{ Form::checkbox('remember-me', 1, false) }} Remember Me
              </label>
            </div>

            @include('partials.notifications')

            {{ Form::submit('Login', ['class' => 'btn btn-lg btn-primary btn-block']) }}
        {{ Form::close() }}
    </div><!-- /container -->
</body>
</html>