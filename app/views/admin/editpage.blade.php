@extends('admin.layout')
@section('title', 'Edit Page')
@section('content')
<script src="../packages/js/ckeditor/ckeditor.js"></script>
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">Edit Page &mdash; {{ $page->title }}</h3>
	</div>
 {{ Form::open(array('role' => 'form')) }}
 <div class="box-body">
 
<div class="alert alert-info alert-dismissable">
	<i class="fa fa-info"></i>
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<b>Warning!</b> If you change the slug of this page, the URL of the page will change, causing potential search engine ranking loss.
</div>
                                    
 <!--  author -->
 {{ Form::hidden('author_id', $user->id) }}
 <!-- title field -->
 <div class="form-group">
 <p>{{ Form::label('title', 'Page Title') }}</p>
 {{ $errors->first('title', '<p class="error">:message</p>') }}
 <p>{{ Form::text('title', $page->title, array('class' => 'form-control')) }}</p>
 </div>
 <div class="form-group">
 <p>{{ Form::label('slug', 'Page Slug') }}</p>
 {{ $errors->first('slug', '<p class="error">:message</p>') }}
 <p>{{ Form::text('slug', $page->slug, array('class' => 'form-control')) }}</p>
 </div>
 <div class="form-group">
 <!-- body field -->
 <p>{{ Form::label('body', 'Page Body') }}</p>
 {{ $errors->first('body', '<p class="error">:message</p>') }}
 <p>{{ Form::textarea('body', $page->body, array('class' => 'ckeditor')) }}</p>
 </div>
 </div>
 <div class="box-footer">
 <!-- submit button -->
 <p>{{ Form::submit('Edit Page', array('class' => 'btn btn-primary pull-right')) }}</p>
 <br />
  {{ Form::close() }}
 
 </div>
</div>

@stop

@section('sidebar')
	<ul class="sidebar-menu">
		<li><a href="/"><i class="fa fa-home"></i> Home</a></li>
		<li><a href="/admin"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
		<li><a href="../admin/settings"><i class="fa fa-cogs"></i> Settings</a></li>
		<li><a href="/admin/register"><i class="fa fa-users"></i> New User</a></li>
		<li><a href="/admin/menu"><i class="fa fa-th"></i> New Menu Item</a></li>
		<li><a href="/admin/posts/all"><i class="fa fa-comments"></i> All Posts</a></li>
		<li><a href="/admin/posts"><i class="fa fa-pencil"></i> New Post</a></li>
		<li><a href="/admin/pages/all"><i class="fa fa-file"></i> All Pages</a></li>
		<li class="active"><a href="/admin/pages"><i class="fa fa-pencil-square-o"></i> Edit Page</a></li>
		<li><a href="/admin/convert/wp"><i class="fa fa-quote-left"></i> Convert From WordPress</a></li>
		<li><a href="/admin/session/lock"><i class="fa fa-key"></i> <span>Lock Session</span></a></li>
		<li><a href="../logout"><i class="fa fa-power-off"></i> Log Out</a></li>
	</ul>
@stop