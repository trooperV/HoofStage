@extends('main')

@section('title', "HoofStage | $post->title")

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		<img src="{{ asset('images/' . $post->image) }}" height="400" width="800">
			<h1>{{ $post->title }} <small>Written by: 
				@foreach ($users as $user)
					@if ($post->user_id == $user->id)
						{{$user->name}}
					@endif
				@endforeach </small></h1>
			<p>{!! $post->body !!}</p>
			<p>Posted in: {{ $post->category->name }}</p>
		</div>
	</div>
@endsection