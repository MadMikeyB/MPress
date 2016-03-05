@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<form action="/posts/{{$post->slug}}" method="POST" role="form">
			{{ csrf_field() }}
			{{ method_field('PATCH') }}

			<div class="panel panel-default">
				<div class="panel-heading mpress-form-input">
					<h3 class="panel-title"><input type="text" class="form-control" id="title" name="title" value="{{$post->title}}" placeholder="I want to talk about..." required></h3>
				</div>
				<div class="panel-body">

					<div class="form-group">
						<textarea name="content" id="content" class="form-control" rows="12" required="required" placeholder="">{{ $post->content }}</textarea>
					</div>

					<button type="submit" class="btn btn-primary btn-block">Submit</button>
				</div>
			</div>
		</form>
	</div>
</div>
@stop