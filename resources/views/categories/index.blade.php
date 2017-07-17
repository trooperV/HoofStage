@extends('main')

@section('title', 'HoofStage | Categories')

@section('content')

<div class="row">
	<div class="col-md-8">
	<h1>Categories</h1>
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
				</tr>
			</thead>
			<tbody>
				@foreach($categories as $category)
				<tr>
					<th>{{ $category->id }}</th>
					<th>{{ $category->name }}</th>
				</tr>
				@endforeach
				
			</tbody>
		</table>
	</div> <!-- end of col 1 -->

	<div class="col-md-3">
		<div class="well">
			{!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
			<h2>Create Category</h2>
			{{ Form::label('name', 'Name:') }}
			{{ Form::text('name', null, ['class' => 'form-control']) }}
			<br>
			{{ Form::submit('Create New Category', ['class' => 'btn btn-primary btn-block']) }}
			{!! Form::close() !!}</div>
		</div>
	</div>

	@endsection