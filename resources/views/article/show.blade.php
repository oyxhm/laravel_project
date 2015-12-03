@extends('main')

@section('content')
	<h1>One article</h1>
	</hr>
	<article>
		<h2>{{ $article->title }} </h2>
		<h1> {{ $article->id }} </h1>
		<div class="body">{{ $article->body }} </div>
	</article>
	
	@unless($article->tags->isEmpty())
	<h5>Tags:</h5>
	<ul>
		@foreach($article->tags as $tag)
			<li> {{ $tag->name }} </li>
		@endforeach
	</ul>
	@endunless

@stop