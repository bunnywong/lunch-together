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
<body class="login registration">
    <div class="container">
        {{ Form::open(['route' => 'auth.userCreate', 'method' => 'POST', 'class' => 'form-signin', 'role' => 'form']) }}
            <h2 class="form-signin-heading text-center">Registration</h2>
            {{ Form::label('username', 'username',  ['class' => 'sr-only']) }}
            {{ Form::text('username', 'bunbun', ['class' => 'form-control', 'placeholder' => 'Input your username', 'required', 'autofocus',] ) }}

            {{ Form::label('email', 'email',  ['class' => 'sr-only']) }}
            {{ Form::email('email', 'me@bunnywong.com', ['class' => 'form-control', 'placeholder' => 'Input your email', 'required']) }}

            {{ Form::label('password', 'password', ['class' => 'sr-only']) }}
            {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Input your password', 'required']) }}
            {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm password', 'required']) }}

            @include('partials.notifications')

            {{ Form::submit('Go', ['class' => 'btn btn-lg btn-primary btn-block']) }}
        {{ Form::close() }}
    </div><!-- /container -->
</body>
</html>