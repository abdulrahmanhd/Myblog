@extends('layouts.app')
@section('title')

@endsection
@section('content')
<h1> <a href="/posts">home</a></h1>

<div class="post" >post
  @foreach($posts as $post)
  <h1> <a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h1>
  <span> {{ $post->title }} | {{ $post->created_at }}</span>
  @if( $post->url )
  <img src="../upload/{{ $post->url }}" /><hr>
  @endif
  <p>{{ $post->body }}</p>
  <a class="btn btn-primary" href="/posts/{{ $post->id }}" >المزيد
  <span class="glyphicon glyphicon-chevron-right"></span></a>
    <br>
    <br>
    <br><span>hestory | Auther | time</span><hr>
    <br>
  @endforeach


  <br>

  <hr>
  <div class="row">
    <form method="POST" action="posts/store" enctype="multipart/form-data">
      {{ csrf_field() }}        
        <div class="form-group">
          <input class="form-control" name="ftitle" type="text" placeholder="text text . . . ."/>
        </div>
        <div class="form-group">
          <input class="form-control" id="furlimg" name="furlimg" type="file"/>
        </div>
        <div class="form-group">
          <textarea class="form-control" name="fbody" type="text" placeholder="text text . . . ."></textarea>
        </div>
              <br>
        <div class="form-group">
          <button class="btn btn-danger" type="submit">Add</button>
        </div>
    </form>
    @foreach($errors->all() as $error)
     {{ $error }} <br>
    @endforeach  
<div>

  
</div>
  </div>
  <hr>


  <br>
  <hr>
  <br>

</div>


  <br>
  <br>

<br>
@endsection

@section('footer')

@endsection