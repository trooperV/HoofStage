@extends('main')

@section('title', 'HoofStage | Blogs')

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		<h1>Blogs</h1>
		</div>
	</div>

	@foreach($posts as $post)

<hr style="color: black;">
	<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h2>{{ $post->title }} <small>Written by: 
					@foreach ($users as $user)
						@if ($post->user_id == $user->id)
							{{$user->name}}
						@endif
					@endforeach </small></h2>
				<h5>Published: {{ date('M j, Y', strtotime($post->created_at)) }}</h5>
				<p>{{ substr(strip_tags($post->body), 0, 250) }}{{ strlen(strip_tags($post->body)) > 250 ? '...' : '' }}</p>
				<a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read More</a>
			</div>
	</div>

	@endforeach

	<div class="row">
		<div class="col-md-12">
			<div class="text-center">
				{!! $posts->links() !!}
			</div>
		</div>
	</div>

@endsection