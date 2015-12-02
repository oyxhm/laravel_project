@extends('main')

@section('content')
	<h1>One article</h1>
	</hr>
	<article>
		<h2>{{ $article->title }} </h2>
		<h1> {{ $article->id }} </h1>
		<div class="body">{{ $article->body }} </div>
	</article>

@stop