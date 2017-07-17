@extends('main')
@section('title', 'HoofStage | Create New Post')
@section('content')

@section('stylesheets')

{!! Html::style('css/parsley.css') !!}
{!! Html::style('css/select2.min.css') !!}
 <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=32zxqd64wh8pg5y6qqme0939m0ps2i9dvnl45p59pihacrco"></script>
  <script>
  tinymce.init({ 
  	 
  	selector:'textarea',
  	plugins: "media link code image imagetools",
  	media_live_embeds: true
   });
   </script>
@endsection

<div class="row">
	<div class="col-md-8">
		<h1>Create New Post</h1>
		<hr>
		{!! Form::open(array('route' => 'posts.store', 'data-parsley-validate' => '', 'files' => true)) !!}
		{{ Form::label('title', 'Title:') }}
		{{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255' ,'placeholder' => 'Type a title here...', )) }}
		<br>
		{!! Form::hidden('user_id', Auth::user()->id) !!}
		{{ Form::Label('slug', 'Slug:') }}
		{{ Form::text('slug', null, array('class' => 'form-control', 'required' => '',
		'minlength' => '5', 'maxlength' => '255', 'placeholder' => 'Type a unique slug...')) }}
		<br>
		{{ Form::label('category_id', 'Category:') }}
		<select name="category_id" class="form-control">
			@foreach($categories as $category)
			<option value="{{ $category->id }}">{{ $category->name }}</option>
			@endforeach
		</select>
		<br>
		{{ Form::label('tags', 'Tags:') }}
		<select name="tags[]" class="form-control select2-multi"  multiple="multiple">
			@foreach($tags as $tag)
			<option value="{{ $tag->id }}">{{ $tag->name }}</option>
			@endforeach
		</select>
		<br>
		<br>
		{{ Form::label('featured_image', 'Image:') }}
		{{ Form::file('featured_image') }}
		<br>
		{{ Form::label('body', 'Post Text:') }}
		{{ Form::textarea('body', null, array('class' => 'form-control', 'placeholder' => 'Write your post here...')) }}

		{{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
		{!! Form::close() !!}
	</div>
	
		<div class="col-md-3">
			<div class="well">
				{!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}
				<h2>Create Tag</h2>
				{{ Form::label('name', 'Name:') }}
				{{ Form::text('name', null, ['class' => 'form-control']) }}
				<br>
				{{ Form::hidden('url', 'http://localhost/hoofStage/public/posts/create') }}
				{{ Form::submit('Create New Tag', ['class' => 'btn btn-primary btn-block']) }}
				{!! Form::close() !!}
			</div>
		
			<br>
	
				<div class="well">
				{!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
				<h2>Create Category</h2>
				{{ Form::label('name', 'Name:') }}
				{{ Form::text('name', null, ['class' => 'form-control']) }}
				<br>
				{{ Form::hidden('url', 'http://localhost/hoofStage/public/posts/create') }}
				{{ Form::submit('Create New Category', ['class' => 'btn btn-primary btn-block']) }}
				{!! Form::close() !!}
			</div>
		</div>
	
	
</div>



@endsection

@section('scripts')
{!! Html::script('js/parsley.min.js') !!}
{!! Html::script('js/select2.min.js') !!}

<script type="text/javascript">
$(".select2-multi").select2();
</script>
@endsection