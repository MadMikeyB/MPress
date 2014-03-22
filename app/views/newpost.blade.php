@extends('adminlayout')
@section('title', 'New Post')
@section('content')
<script src="../packages/js/ckeditor/ckeditor.js"></script>

<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">New Post</h3>
	</div>
	 {{ Form::open(array('files'=> true, 'role' => 'form')) }}
	<div class="box-body">
		 <!--  author -->
		 {{ Form::hidden('author_id', $user->id) }}
		 
		 <div class="form-group">
		 	<!-- title field -->
		 	<p>{{ Form::label('title', 'Title') }}</p>
		 	{{ $errors->first('title', '<p class="error">:message</p>') }}
		 	<p>{{ Form::text('title', Input::old('title'), array('class' => 'form-control')) }}</p>
		 </div>
		 
		 <div class="form-group">
			 <!-- category field -->
			 <p>{{ Form::label('category', 'Category') }}</p>
			 {{ $errors->first('category', '<p class="error">:message</p>') }}
			 <p>{{ Form::text('category', Input::old('title'), array('class' => 'form-control')) }}</p>
			 <p><em>or.. choose from the below previous categories!</em></p>
			 <p>{{ Form::select('existing_category', $categories); }}
		 </div>
		 
		 <div class="form-group">
		 	<!-- body field -->
		 	<p>{{ Form::label('body', 'Body') }}</p>
		 	{{ $errors->first('body', '<p class="error">:message</p>') }}
		 	<p>{{ Form::textarea('body', Input::old('body'), array('class' => 'ckeditor')) }}</p>
		 </div>
		 
		 <div class="form-group">
			 <!-- image -->
			 <p>{{ Form::label('image', 'Article Image (Optional)') }}</p>
			 <p>{{ Form::file('image') }}</p>
		 </div>
		 
		 <div class="form-group">
			 <!-- slider -->
			 <p>{{ Form::label('slider', 'Feature on Slider?' ); }}</p>
			 <p>{{ Form::checkbox('slider'); }}</p>
		 </div>
		 
		 <div class="form-group">
			 <!-- featured -->
			 <p>{{ Form::label('featured', 'Feature in Sidebar?' ); }}</p>
			 <p>{{ Form::checkbox('featured'); }}</p>
		 </div>
	</div>
	
	 <!-- submit button -->
	<div class="box-footer">
		<p>{{ Form::submit('Create', array('class' => 'btn btn-primary')) }}</p>
	</div>
	{{ Form::close() }}
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