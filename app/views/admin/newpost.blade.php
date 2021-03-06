@extends('admin.layout')
@section('title', 'New Post')
@section('content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="http://{{ $_SERVER['HTTP_HOST'] }}/packages/js/jquery.tag-editor.min.js" type="text/javascript"></script>
<script src="../packages/js/ckeditor/ckeditor.js"></script>

<script>
$('.tags').tagEditor({
    initialTags: ['Hello', 'World'],
    placeholder: 'Enter tags ...'
});
</script>
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
		 	<!-- tagging field -->
		 	<p>{{ Form::label('tags', 'Tags') }}</p>
		 	{{ $errors->first('tags', '<p class="error">:message</p>') }}
		 	<p>{{ Form::text('tags', Input::old('tags'), array('class' => 'form-control tags', 'id' => 'tags')) }}</p>
		 </div>
		 
		 <div class="form-group">
			 <!-- category field -->
			 <p>{{ Form::label('category', 'Category') }}</p>
			 {{ $errors->first('category', '<p class="error">:message</p>') }}
			 <p>{{ Form::text('category', Input::old('title'), array('class' => 'form-control')) }}</p>
			 <p><em>or.. choose from the below previous categories!</em></p>
			 <p>{{ Form::select('existing_category', $categories, null, array('class' => 'form-control') ); }}
		 </div>
		 
		 <div class="form-group">
		 	<!-- body field -->
		 	<p>{{ Form::label('body', 'Body') }}</p>
		 	{{ $errors->first('body', '<p class="error">:message</p>') }}
		 	<p>{{ Form::textarea('body', Input::old('body'), array('class' => 'ckeditor')) }}</p>
		 </div>
		 
		 <div class="form-group">
			 <!-- image -->
			 <p>{{ Form::label('image', 'Article Image') }}</p>
			 <p>{{ Form::file('image') }}</p>
			 <p class="help-block">This is entirely optional, but will display alongside the article if set.</p>
		 </div>
		 
		 <div class="input-group">
		 	<span class="input-group-addon">
		 		<input name="slider"  id="slider" type="checkbox">
		 	</span>
		 	<input type="text" disabled="" value="Feature on Slider?" class="form-control" style="cursor:default;">
		 </div>
		 <br />
		
		 <div class="input-group">
		 	<span class="input-group-addon">
		 		<input name="featured"  id="featured" type="checkbox">
		 	</span>
		 	<input type="text" disabled="" value="Feature in Sidebar?" class="form-control" style="cursor:default;">
		 </div>
		 <br />

	</div>
	
	 <!-- submit button -->
	<div class="box-footer">
		<p>{{ Form::submit('Create', array('class' => 'btn btn-primary pull-right')) }}</p>
		 <div class="clearfix clear"></div>
	</div>
	{{ Form::close() }}
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
		<li class="active"><a href="/admin/posts"><i class="fa fa-pencil"></i> New Post</a></li>
		<li><a href="/admin/pages/all"><i class="fa fa-file"></i> All Pages</a></li>
		<li><a href="/admin/pages"><i class="fa fa-pencil-square-o"></i> New Page</a></li>
		<li><a href="/admin/convert/wp"><i class="fa fa-quote-left"></i> Convert From WordPress</a></li>
		<li><a href="/admin/session/lock"><i class="fa fa-key"></i> <span>Lock Session</span></a></li>
		<li><a href="../logout"><i class="fa fa-power-off"></i> Log Out</a></li>
	</ul>
@stop