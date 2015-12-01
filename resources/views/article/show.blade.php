@extends('main')

@section('content')
	<h1>One article</h1>
	</hr>
	<article>
		<h2>{{ $q->title }} </h2>
		<h1> {{ $q->id }} </h1>
		<div class="body">{{ $q->body }} </div>
	</article>

@stop