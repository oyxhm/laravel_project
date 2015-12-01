@extends('main')

@section('content')
	<h1>One article</h1>
	</hr>
	@foreach($articles as $article)
	<article>
		
		<h1> {{ $article->title }} </h1>
		<div class="body">{{ $article->body }} </div>
	</article>
	@endforeach

@stop