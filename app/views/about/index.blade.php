@extends('layouts.master')

@section('title')
How to use @parent
@stop

@section('content')
<!-- Blog Entries Column -->
<div class="col-md-8">

    <h1 class="page-header"> How to use</h1>

    <ul>
    	<li>Register</li>
    	<li>Input transaction</li>
    </ul>

</div>

@include('partials.sidebar')

@stop