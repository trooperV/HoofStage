@extends('main')

@section('title', 'HoofStage | Login')

@section('content')

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		{!! Form::open() !!}
		{{ Form::label('name', 'Username:') }}
		{{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'username']) }}
		<br>
		{{ Form::label('email', 'Email:') }}
		{{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'email@email.com']) }}
		<br>
		{{ Form::label('password', 'Password:') }}
		{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'password']) }}
		<br>
		{{ Form::label('password_confirmation', 'Confirm password:') }}
		{{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'password']) }}

		{{ Form::submit('Register', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}

		{!! Form::close() !!}
	</div>
</div>

@endsection