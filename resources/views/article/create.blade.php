@extends('main')

@section('content')
<h1>Write a new article</h1>

<hr/>

{!! Form::open(['url' => '/article']) !!}
	@include('article._form',['submitButtonText'=>'Add Article'])
{!! Form::close() !!}
@include('errors.list')
@stop