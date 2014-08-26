@extends('adminlayout')
@section('title', 'All Pages')
@section('content')

{{ $pages->links() }}
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">All Pages</h3>
	</div>
	<div class="box-body">
		<table class="table">
			<tr>
				<td>Title</td>
				<td>Slug</td>
				<td>Body</td>
				<td></td>
				<td></td>
			</tr>
			@foreach ( $pages as $p )
			<tr>
				<td>{{ $p->title }}</td>
				<td>{{ $p->slug }}</td>
				<td>{{ Str::limit($p->body, 140) }} (<a href="/{{ $p->slug }}">Read more</a>)</td>
				<td><a href="admin/edit/page/{{ $p->slug }}" class="btn btn-default">Edit</a></td>
				<td><a href="admin/delete/page/{{ $p->slug }}" class="btn btn-danger">Delete</a></td>
			</tr>
			@endforeach
		</table>
	</div>
</div>
@stop

@section('sidebar')
	<ul class="sidebar-menu">
		<li><a href="/"><i class="fa fa-home"></i> Home</a></li>
		<li><a href="../admin"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
		<li><a href="../admin/register"><i class="fa fa-users"></i> New User</a></li>
		<li><a href="../admin/menu"><i class="fa fa-th"></i> New Menu Item</a></li>
		<li><a href="../admin/posts/all"><i class="fa fa-comments"></i> All Posts</a></li>
		<li><a href="../admin/posts"><i class="fa fa-pencil"></i> New Post</a></li>
		<li class="active"><a href="../admin/pages/all"><i class="fa fa-file"></i> All Pages</a></li>
		<li><a href="../admin/pages"><i class="fa fa-pencil-square-o"></i> New Page</a></li>
		<li><a href="../admin/convert/wp"><i class="fa fa-quote-left"></i> Convert From WordPress</a></li>
		<li><a href="../admin/session/lock"><i class="fa fa-key"></i> <span>Lock Session</span></a></li>
		<li><a href="../logout"><i class="fa fa-power-off"></i> Log Out</a></li>
	</ul>
@stop