@extends('layouts.master')

@section('title')
New Restaurant @parent
@stop

@section('content')
<!-- Blog Post Content Column -->
<div class="col-lg-8">

    <!-- Blog Post -->
    <h1>Restaurant Manage</h1>

    @include('partials.notifications')

    {{ Form::open(['route' => 'categories.store', 'method' => 'POST', 'class' => 'horizontal-form', 'role' => 'form']) }}

    <!-- Name -->
    <div class="form-group{{ $errors->first('name', ' has-error') }}">
        {{ Form::label('name', 'Restaurant Name') }}
        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Pelase input restaurant name', 'required']) }}
    </div>

    <!-- Buttons -->
    <div class="form-group text-right">
        <a href="" class="btn btn-link" onclick="history.go(-1);"> &#171; Back</a>
        {{ Form::submit('New', ['class' => 'btn btn-success']) }}
    </div>

    {{ Form::close() }}

</div>

@include('partials.sidebar')

@stop
