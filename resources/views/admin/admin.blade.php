@extends('layouts.app')
@section('title')
Admin Panel
@endsection
@section('content')
<h1> <a href="/posts">Admin Panel !!</a></h1>
<div class="post" >
	<table class="table table-hover">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>User</th>
			<th>Editor</th>
			<th>Manager</th>
			<th>Admin</th>
		</tr>
		@foreach($users as $user)
		<form method="post" action="/add-role">
			{{ csrf_field() }} 
			<input type="hidden" name="email" value="{{ $user->email }}">
			<tr>
				<td>{{$user->id}}</td>
				<td>{{$user->name}}</td>
				<td>{{$user->email}}</td>
				<td><input type="checkbox" name="role_user" onchange="this.form.submit()" {{ $user->hasRole('user') ? 'checked' : '' }} /></td>
				<td><input type="checkbox" name="role_editor" onchange="this.form.submit()" {{ $user->hasRole('editor') ? 'checked' : '' }} /></td>
				<td><input type="checkbox" name="role_manager" onchange="this.form.submit()" {{ $user->hasRole('manager') ? 'checked' : '' }} /></td>
				<td><input type="checkbox" name="role_admin" onchange="this.form.submit()" {{ $user->hasRole('admin') ? 'checked' : '' }} /></td>
			</tr>
		</form>
		@endforeach
	</table>
	<h3>Settings</h3>

	<form method="post" action="/settings">
		{{ csrf_field() }} 
		Stop Comments :<input type="checkbox" name="stop_comments" onchange="this.form.submit()"
		{{ $stop_comments == 1 ? 'checked' : '' }} />
			<hr>
		<h3>Register</h3>

		{{ csrf_field() }} 
		Stop Register :<input type="checkbox" name="stop_register" onchange="this.form.submit()"
		{{ $stop_register == 1 ? 'checked' : '' }} />
	</form>
</div>

@endsection
<!-- @section('footer')

@endsection -->