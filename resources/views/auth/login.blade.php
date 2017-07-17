@extends('main')

@section('title', 'HoofStage | Login')

@section('content')

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		{!! Form::open() !!}
		{{ Form::label('email', 'Email:') }}
		{{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'email@email.com']) }}
		<br>
		{{ Form::label('password', 'Password:') }}
		{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'password']) }}
		<br>
		{{ Form::checkbox('remember') }}{{ Form::label('remember', 'Remember Me') }}
		<a href="{{ url('password/reset') }}" class="pull-right">Forgot Password</a>

		{{ Form::submit('Login', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}

		{!! Form::close() !!}
	</div>
</div>

@endsection