@extends('layout')
@section('title', 'Edit ' . $post->title )
@section('content')
<h1>Edit Post &gt; {{ $post->title }}</h1>

<script src="../packages/js/ckeditor/ckeditor.js"></script>
<div class="fullwidth">
 {{ Form::open(array('files'=> true)) }}
 <!--  author -->
 {{ Form::hidden('author_id', $user->id) }}
 <!-- title field -->
 <p>{{ Form::label('title', 'Title') }}</p>
 {{ $errors->first('title', '<p class="error">:message</p>') }}
 <p>{{ Form::text('title', $post->title, array('class' => 'form-control')) }}</p>
 <!--  slug -->
 <p>{{ Form::label('title_seo', 'Slug') }}</p>
 {{ $errors->first('title_seo', '<p class="error">:message</p>') }}
 <p>{{ Form::text('title_seo', $post->title_seo, array('class' => 'form-control')) }}</p>
 <!-- body field -->
 <p>{{ Form::label('body', 'Body') }}</p>
 {{ $errors->first('body', '<p class="error">:message</p>') }}
 <p>{{ Form::textarea('body',$post->body, array('class' => 'ckeditor form-control')) }}</p>
 <!--  checkbox -->
 <div class="input-group">
 	<span class="input-group-addon">
 		{{ Form::checkbox('comments', $post->comments, true) }}
 	</span>
 	 {{ $errors->first('comments', '<p class="error">:message</p>') }}
 	<input type="text" disabled value="Allow Comments?" class="form-control">
</div>
<div class="input-group">
	 <!-- image -->
	 <p>{{ Form::label('image', 'Article Image (Optional)') }}</p>
	 <p>{{ Form::file('image') }}</p>
</div>
<br />
 <!-- submit button -->
 <p>{{ Form::submit('Create', array('class'=>'btn btn-primary pull-right')) }}</p>
 {{ Form::close() }}
</div>
<br /><br />
@stop