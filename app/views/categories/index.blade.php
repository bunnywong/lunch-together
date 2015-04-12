@extends('layouts.master')

@section('title')
Restaurant Manage @parent
@stop

@section('content')
<!-- Blog Entries Column -->
<div class="col-md-8">

    <h1 class="page-header"> Restaurant Manage </h1>

    @include('partials.notifications')

    <div class="text-right">
        <a href="{{ route('categories.create') }}" class="btn btn-success btn-sm">New</a>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Restaurant</th>
                    <th width="150">Manage</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{{ $category->id }}}</td>
                    <td>{{{ $category->name }}}</td>
                    <td>

                        {{ Form::open(['url' => '/categories/'.$category->id, 'method' => 'DELETE', 'style' => 'display: inline;', 'role' => 'form']) }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}

                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-sm">Edit</a>

                        {{ Form::close() }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <hr>

    <!-- Pager -->
    <div class="text-center">
        {{ $categories->links() }}
    </div>

</div>

@include('partials.sidebar')

@stop