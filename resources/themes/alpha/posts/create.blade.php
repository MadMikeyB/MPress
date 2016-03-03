@extends('layouts.app')

@section('content')
<div class="box">
	<h3>Create Post</h3>
	<form action="/posts" method="post" role="form">
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
			<div class="12u">
				<input class="special fit" type="submit" value="Create">
			</div>
		</div>
	</form>
</div>
@stop