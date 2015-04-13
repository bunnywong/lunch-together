@extends('layouts.master')

@section('title')
Lunch Together  @parent
@stop

@section('content')
<!-- Blog Entries Column -->
<div class="col-md-8">

    @if (Auth::check())
        <h1 class="page-header">Payment Feeder</h1>
    @else
        <h1 class="page-header">Welcome guest</h1>
    @endif

    @include('partials.notifications')

    @if (Auth::check())
        <div class="text-right">
            <a class="btn btn-success" href="{{ route('posts.create') }}">New Payment</a>
        </div>


        @foreach($posts as $post)
        <h2>
            <a href="{{ route('posts.show', $post->id) }}">{{{ $post->category->name }}}</a>
        </h2>
        <p class="text-right">
            <span class="glyphicon glyphicon-time"></span>
            {{{ $post->created_at->toDateTimeString() }}}
        </p>
        <p>${{{ $post->cost }}} - {{{ $post->content }}}</p>

        <div class="text-right">
        @if (Auth::check())
            @if(Auth::user()->is_admin || $post->payer_id == Auth::user()->id)
                <a class="btn btn-primary" href="{{ route('posts.edit', $post->id) }}">Edit</a>
            @endif

            <a class="btn btn-info" href="{{ route('posts.show', $post->id) }}">Detail</a>

            @if(Auth::user()->is_admin || $post->payer_id == Auth::user()->id)
                {{ Form::open(['url' => 'posts/'.$post->id, 'method' => 'DELETE', 'style' => 'display: inline;', 'role' => 'form']) }}
                {{ Form::submit('Delet', ['class' => 'btn btn-danger btn-sm pull-left']) }}
                {{ Form::close() }}
            @endif
        @endif
        </div>

        <hr>
        @endforeach

        <!-- Pager -->
    <div class="text-center">
        {{ $posts->links() }}
    </div>
    @endif



</div>

@include('partials.sidebar')

@stop