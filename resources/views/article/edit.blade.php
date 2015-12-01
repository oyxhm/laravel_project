@extends('main')

@section('content')
	<h1>Edit {!! $article->title !!} </h1>
	<hr/>
	<!-- {!! Form::open(['method' => 'PATCH', 'action' =>['ArticleController@update',$article->id]]) !!} -->
	{!! Form::model($article,['method' => 'PATCH', 'action' =>['ArticleController@update',$article->id]]) !!}
	@include('article._form',['submitButtonText'=>'Update Article'])

	{!! Form::close() !!}

@include('errors.list')
@stop