@extends('layouts.master')

@section('title')
Payment Update @parent
@stop

@section('content')
<!-- Blog Post Content Column -->
<div class="col-lg-8">

    <!-- Blog Post -->
    <h1>Transaction Update</h1>

    @include('partials.notifications')

    {{ Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PATCH', 'class' => 'horizontal-form', 'role' => 'form']) }}

    <!-- Category -->
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

    <!-- Post Content -->
    <div class="form-group{{ $errors->first('content', ' has-error') }}">
        {{ Form::label('content', 'Remark: ') }}
        {{ Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'Please input remark', 'required']) }}
    </div>


    <!-- Button -->
    <div class="form-group text-right">
        <a href="{{ route('posts.index') }}" class="btn btn-link"> &#171; Back</a>
        {{ Form::submit('Update', ['class' => 'btn btn-success']) }}
    </div>

    {{ Form::close() }}

</div>



@include('partials.sidebar')

@stop
