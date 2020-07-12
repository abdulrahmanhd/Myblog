@extends('layouts.app')
@section('title')

@endsection
@section('content')
<h1> <a href="/posts">home</a></h1>
<div class="post" >post
      <h1>{{ $post->title }}</h1>
    <span> {{ $post->created_at->toDayDateTimeString() }}|
   </span>
    <hr>
      <hr>
        @if( $post->url )
        <p><img src="../upload/{{ $post->url }}" /></p><hr>
        @endif
       <hr>
        <p>{{ $post->body }}</p>
       <hr>
      <div>comments</div> <br>
      @foreach($post->comments as $comment)
      <span> {{ $comment->created_at }}</span>
        <div>
         {{ $comment->body }}
         </div> <hr><br>
      @endforeach 
        <br><hr>

        @if($stop_comments == 1)
          <h3>the comments are stop in website</h3>
        @else
      <div class="col-md-10">
          <form method="POST" action="{{ $post->id }}/store" enctype="multipart/form-data">
              {{ csrf_field() }}        
              <div class="form-group">
                 <textarea class="form-control" name="fbody" type="text" placeholder="text text . . . ."></textarea>
              </div>
                <br>
              <div class="form-group">
                <button class="btn btn-danger" type="submit">Add</button>
              </div>
          </form>
                    @foreach($errors->all() as $error)
                     {{ $error }} <br>/category/{{ $post->category->id }}
                    @endforeach  
      <div>
      @endif
</div>

@endsection
@section('footer')

@endsection