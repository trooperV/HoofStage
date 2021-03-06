@extends('main')

@section('title', 'HoofStage | View Post')
@section('content')

<div class="row">
	<div class="col-md-8">
	<img src="{{ asset('images/' . $post->image) }}" height="400" width="770">
		<h1> {{ $post->title }} </h1>
		<p class="lead">{!! $post->body !!}</p>

		<hr>

		<div class="tags">
			@foreach($post->tags as $tag)
				<span class="label label-default">{{ $tag->name }}</span>
			@endforeach
		</div>
	</div>

	<div class="col-md-4">
		<div class="well">

			<dl class="dl-horizontal">
				<label>Url:</label>
				<a href="{{ url('blog/'.$post->slug)}}">{{ route('blog.single', $post->slug) }}</a>
			</dl>
			<dl class="dl-horizontal">
				<label>Category:</label>
				<p>{{ $post->category->name }}</p>
			</dl>
			<dl class="dl-horizontal">
				<label>Created At:</label>
				<p>{{date('M j, Y h:ia', 10800 + strtotime($post->created_at)) }}</p>
			</dl>

			<dl class="dl-horizontal">
				<label>Last Updated:</label>
				<p>{{ date('M j, Y h:ia', 10800 + strtotime($post->updated_at))  }}</p>
			</dl>

			<hr>

			<div class="row">
				<div class="col-sm-6">
					{!!Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block'))!!}
				</div>
				<div class="col-sm-6">
					{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}

					{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

					{!! Form::close() !!}
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					{!!Html::linkRoute('posts.index', '<<See All Posts', [], array('class' => 'btn btn-default btn-block
					btn-h1-spacing'))!!}
				</div>
			</div>

		</div>
	</div>
</div>

@endsection