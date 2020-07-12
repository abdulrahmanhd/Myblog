@extends('layouts.app')
@section('title')
login|
@endsection
@section('content')
  <h1> <a href="/login">Login</a></h1>
<?php if($request ?? ""){ } ?>
  <div class="post">
    <form method="POST" action="/login" >
      {{ csrf_field() }}        
            <div class="form-group">
              <label>Email</label>
                <input class="form-control" name="femail" type="email" 
                placeholder="femail . ."/>
            </div>

            <div class="form-group">
                        <label>Password</label>
              <input class="form-control" name="fpassword" type="password" 
              placeholder="password . . . ."/>
            </div>
            <div class="form-group">
              <button class="btn btn-danger" type="submit">login</button>
            </div>
    </form>
    @foreach($errors->all() as $error)
     {{ $error }} <br>
    @endforeach  
  <div>
@endsection

@section('footer')

@endsection