@extends('layouts.app')

@section('content')
<div class="box">
	<h3>Create Post</h3>
	<form action="/posts" method="post" role="form" enctype="multipart/form-data">
		{{ csrf_field() }}

		<div class="row uniform 50%">
			<div class="12u">
				<input id="title" name="title" placeholder="I want to talk about..."
				required="" type="text">
			</div>
		</div>

		<div class="row uniform 50%">
			<div class="12u">
				<textarea id="content" name="content" required="" rows="12"></textarea>
			</div>
		</div>

		<div class="row uniform">	
			<div class="9u">
				<input class="special fit" name="publish" type="submit" value="Create">
			</div>
			<div class="3u">
				<input class="alt fit" name="draft" type="submit" value="Save Draft">
			</div>	
		</div>
	</form>
</div>
@stop
