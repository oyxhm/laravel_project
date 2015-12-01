@extends('main');

@section('content')
	<h1>Articles</h1>
	<h3><a href="./article/create">Write a new article</a></h3></hr>
	<a href="./articles/"></a>
	@foreach($articles as $article)
	<article>
		<a href="./article/{{$article->id}}/edit">first way:{{$article->title}}</a>
		<a href="{{action('ArticleController@show',[$article->id])}}">second way:{{$article->title}}</a>
		<a href="{{url('./article',$article->id)}}">third way:{{$article->title}}</a>
		<h2>{{ $article->title }} </h2>
		<div class="body">{{ $article->body }} </div>
	</article>
	@endforeach
@stop