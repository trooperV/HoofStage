@extends('main')

@section('title', 'HoofStage | Forgot Password')

@section('content')

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">Forgot My Password</div>
            <div class="panel-body">
                {!! Form::open(['url' => 'password/email', 'method' => 'POST']) !!}
                @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif

                {{ Form::label('email', 'Email Address:') }}
                {{ Form::email('email', null, ['class' => 'form-control']) }}

                {{ Form::submit('Reset Password', ['class' => 'btn btn-primary btn-h1-spacing']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection
