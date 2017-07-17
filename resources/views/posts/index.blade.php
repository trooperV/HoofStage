@extends('main')
@section('title', 'HoofStage | Show All Posts')

@section('content')

<div class="row">
	<div class="col-md-10">
		<h1>All posts</h1>
		Page {!! $posts->currentPage(); !!} of {!! $posts->lastPage(); !!}
	</div>

	<div class="col-md-2">
		<a href="{{ route('posts.create') }}" class="btn btn-lg btn-primary btn-block btn-h1-spacing">Create New Post</a>
	</div>
</div>

<hr>

<div class="row">
	<div class="col-md-12">
		<table class="table">
			<thead>
				<th>#</th>
				<th>Title</th>
				<th>Body</th>
				<th>Created At</th>
				<th></th>
			</thead>
			
			<tbody>


				@foreach($posts as $post)
					@if($post->user_id == Auth::user()->id)
				<tr>
					<th>{{ $post->id }}</th>
					<td>{{ $post->title }}</td>
					<td>{{ substr ( strip_tags($post->body) , 0 , 50)}} {{ strlen(strip_tags($post->body)) > 50 ? "..." : "" }}</td>
					<td>{{ date('M j, Y h:ia', 10800 + strtotime($post->created_at))  }}</td>
					<td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-sm">View</a> <a href="{{ route('posts.edit', $post->id)  }}" class="btn btn-default btn-sm">Edit</a></td>
				</tr>
					@endif
				@endforeach
			</tbody>
		</table>
		<div class="text-center">
			{!! $posts->links(); !!}
		</div>
	</div>
</div>


@endsection