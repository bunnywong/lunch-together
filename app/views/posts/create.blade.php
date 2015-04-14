@extends('layouts.master')

@section('title')
New Payment @parent
@stop

@section('content')
<!-- Blog Post Content Column -->
<div class="col-lg-8">

    <h1>New Payment</h1>
    <hr>

    @include('partials.notifications')

    {{ Form::open(['route' => 'posts.store', 'method' => 'POST', 'class' => 'horizontal-form', 'role' => 'form']) }}

     <!-- Restaurant -->
    <div class="form-group{{ $errors->first('category_id', ' has-error') }}">
        {{ Form::label('category_id', 'Restaurant: ') }}
        <a href="{{ route('categories.create') }}" class="">Create New</a>
        {{ Form::select('category_id', $categories->lists('name', 'id'), null, ['class' => 'form-control']) }}
    </div>

    <!-- Event Date -->
    <div class="form-group{{ $errors->first('event_date', ' has-error') }}">
        {{ Form::label('event_date', 'Event Date: ') }}
        {{ Form::text('event_date', null, ['class' => 'form-control', 'placeholder' => 'Please input event_date', 'required', 'id' => 'datetimepicker']) }}
    </div>

    <!-- Payer -->
    <div class="form-group{{ $errors->first('consumer_id', ' has-error') }}">
            {{ Form::label('payer_id', 'Payer: ') }}
            {{ Form::select('payer_id', $users->lists('username', 'id'), null, ['class' => 'form-control']) }}
    </div>

    <!-- Consumer -->
    <div class="form-group{{ $errors->first('consumer_id', ' has-error') }}">
        {{ Form::label('consumer_id', 'Consumer: ') }}
         {{ Form::select('consumer_id', $users->lists('username', 'id'), null, ['class' => 'form-control']) }}
    </div>

    <!-- Cost -->
    <div class="form-group{{ $errors->first('cost', ' has-error') }}">
        {{ Form::label('cost', 'Cost: ') }}
        {{ Form::text('cost', null, ['class' => 'form-control', 'placeholder' => 'Please input cost', 'required', 'type' => 'number']) }}
    </div>

    <!-- Remark -->
    <div class="form-group{{ $errors->first('content', ' has-error') }}">
        {{ Form::label('content', 'Remark: ') }}
        {{ Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'Please input remark', 'required']) }}
    </div>

    <!-- Button -->
    <div class="form-group text-right">
        <a href="{{ route('posts.index') }}" class="btn btn-link"> &#171; Back</a>
        {{ Form::submit('Go', ['class' => 'btn btn-success']) }}
    </div>

    {{ Form::close() }}

</div>

@include('partials.sidebar')

@stop
