@extends('adminlayout')
@section('title', 'Edit &mdash; ' . $post->title )
@section('content')
<script src="../packages/js/ckeditor/ckeditor.js"></script>
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">Edit Post &mdash; {{ $post->title }}</h3>
	</div>
<div class="box-body">
 
<div class="alert alert-info alert-dismissable">
	<i class="fa fa-info"></i>
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<b>Warning!</b> If you change the slug of this post, the URL of the post will change, causing potential search engine ranking loss.
</div>
 {{ Form::open(array('files'=> true)) }}
 <!--  author -->
 {{ Form::hidden('author_id', $user->id) }}
 <!-- title field -->
 <div class="form-group">
 <p>{{ Form::label('title', 'Title') }}</p>
 {{ $errors->first('title', '<p class="error">:message</p>') }}
 <p>{{ Form::text('title', $post->title, array('class' => 'form-control')) }}</p>
 </div>
 <!--  slug -->
 <div class="form-group">
 <p>{{ Form::label('title_seo', 'Slug') }}</p>
 {{ $errors->first('title_seo', '<p class="error">:message</p>') }}
 <p>{{ Form::text('title_seo', $post->title_seo, array('class' => 'form-control')) }}</p>
 </div>
 <!-- body field -->
 <div class="form-group">
 <p>{{ Form::label('body', 'Body') }}</p>
 {{ $errors->first('body', '<p class="error">:message</p>') }}
 <p>{{ Form::textarea('body',$post->body, array('class' => 'ckeditor form-control')) }}</p>
 </div>
 <!--  checkbox -->
 <div class="input-group">
 	<span class="input-group-addon">
 		{{ Form::checkbox('comments', $post->comments, true) }}
 	</span>
 	 {{ $errors->first('comments', '<p class="error">:message</p>') }}
 	<input type="text" disabled value="Allow Comments?" class="form-control">
</div>
 <div class="form-group">
	 <!-- image -->
	 <p>{{ Form::label('image', 'Article Image (Optional)') }}</p>
	 <p>{{ Form::file('image') }}</p>
</div>
</div>
<div class="box-footer">
 <!-- submit button -->
 <p>{{ Form::submit('Edit Post', array('class'=>'btn btn-primary pull-right')) }}</p>
 {{ Form::close() }}
 <br />
 </div>
@stop

@section('sidebar')
	<ul class="sidebar-menu">
		<li><a href="/"><i class="fa fa-home"></i> Home</a></li>
		<li><a href="/admin"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
		<li><a href="/admin/register"><i class="fa fa-users"></i> New User</a></li>
		<li><a href="/admin/menu"><i class="fa fa-th"></i> New Menu Item</a></li>
		<li><a href="/admin/posts/all"><i class="fa fa-comments"></i> All Posts</a></li>
		<li class="active"><a href="/admin/posts"><i class="fa fa-pencil"></i> New Post</a></li>
		<li><a href="/admin/pages/all"><i class="fa fa-file"></i> All Pages</a></li>
		<li><a href="/admin/pages"><i class="fa fa-pencil-square-o"></i> New Page</a></li>
		<li><a href="/admin/convert/wp"><i class="fa fa-quote-left"></i> Convert From WordPress</a></li>
		<li><a href="/admin/session/lock"><i class="fa fa-key"></i> <span>Lock Session</span></a></li>
		<li><a href="../logout"><i class="fa fa-power-off"></i> Log Out</a></li>
	</ul>
@stop