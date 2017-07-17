@extends('main')

@section('title', 'HoofStage | Welcome')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="col-md-12 red1">
        <h1 style="color: white; text-align: center; margin-top: 200px;">Hoof Stage 1.0</h1>
        <p style="color: white; text-align: center;">Everything about War</p>
     </div>
  </div>
</div>

<div class="row">
  <div class="col-md-8">


    @foreach($posts as $post)
      <div class="post">
      <h3>{{ $post->title }} <small>Written by: 
        @foreach ($users as $user)
          @if ($post->user_id == $user->id)
            {{$user->name}}
          @endif
        @endforeach </small></h3>
      <p>{{ substr(strip_tags($post->body), 0, 300) }}{{ strlen(strip_tags($post->body)) > 300 ? '...': "" }}</p>
      <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read More</a>
    </div>

    <hr>

    @endforeach
  </div>

  <div class="col-md-3 col-md-offset-1" style="float:right">
    <h2> Advertisements </h2>
  </div>
</div>
@endsection