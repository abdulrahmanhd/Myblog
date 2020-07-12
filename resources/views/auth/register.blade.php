@extends('layouts.app')
@section('title')
register|
@endsection
@section('content')
<h1> <a href="/posts">register</a></h1>

  <br>
  <div class="col-md-10">
  @if($stop_register == 1 )

  this is stop all posts
  @else
    <div class="post">
        <form method="POST" action="/register/store" enctype="multipart/form-data">
          {{ csrf_field() }}        
            <div class="form-group">
            <label>Name</label>
              <input class="form-control" name="fname" type="text" placeholder="fname . . . ."/>
            </div>
            <div class="form-group">
            <label>Email</label>
              <input class="form-control" name="femail" type="email" placeholder="femail . . . ."/>
            </div>

            <div class="form-group">
                        <label>Password</label>
              <input class="form-control" name="fpassword" type="password" placeholder="password . . . ."/>
            </div>
            <div class="form-group">
              <button class="btn btn-danger" type="submit">register</button>
            </div>
        </form>
          @foreach($errors->all() as $error)
           {{ $error }} <br>
          @endforeach  
    <div>
@endif

  </div>
@endsection

@section('footer')

@endsection