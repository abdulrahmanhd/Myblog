@extends('layouts.app')
@section('title')
statistics
@endsection
@section('content')
<h1> <a href="/posts">statistics !!</a></h1>
<div class="post" >
	<table class="table table-hover">
		<tr>
			<td>All Users</td>
			<td>{{ $statistics['users']}}</td>
		</tr>
		<tr>
			<td>Posts</tdh>
			<td>{{ $statistics['posts'] }}</td>
		</tr>
		<tr>
			<td>Comments</td>
			<td>{{ $statistics['comments'] }}</td>
		</tr>
		<tr>
			<td>Categories</tdh>
			<td>{{ $statistics['categories']}}</td>
		</tr>
		<tr>
			<td>Most active users</td>
			<td>{{ $statistics['active_user']}} , posts({{ $statistics['active_user_posts'] }}) , commen({{ $statistics['active_user_comments'] }})</td>
		</tr>
		<tr>
			<td>Most active posts</tdh>
			<td>{{ $statistics['active_user_posts']}}</td>
		</tr>
		<tr>
			<td>Most active comments</tdh>
			<td>{{ $statistics['active_user_comments']}}</td>
		</tr>
</table>

</div>

@endsection
<!-- @section('footer')

@endsection -->




			<form method="post" action="/add-role">
				{{ csrf_field() }} 

				<tr>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</form>
