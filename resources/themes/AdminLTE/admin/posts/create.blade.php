@extends('layouts.app')

@section('content')
<div class="box box-solid">
<div class="row">
	<div class="col-md-12">
		<div class="box box-solid">
			<div class="box-header with-border">
				<i class="fa fa-file pull-right"></i>
				<h3 class="box-title">Create Post</h3>
			</div>

			<div class="box-body">
				<form action="/admin/posts" method="POST" role="form">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="title" class="control-label">Title</label>
						<input type="text" class="form-control input-lg" id="title" name="title" placeholder="I want to talk about...">
					</div>
					<div class="row">
						<div class="col-md-10">
							<div class="form-group">
								<a href="#" id="toggle-editor" class="pull-right btn btn-sm btn-default">Toggle Editor</a>
								<label for="content" class="control-label">Page Content</label>
								<textarea class="form-control mp-editor" name="content" style="height:50vh"></textarea>
							</div>
						</div>
						
						<div class="col-md-2">
							<h3>Post Formatting</h3>
								<p><strong>You can use <a href="http://www.w3schools.com/html/">HTML</a> and <a href="https://daringfireball.net/projects/markdown/">Markdown</a><sup><a href="http://assemble.io/docs/Cheatsheet-Markdown.html">(?)</a></sup> in Posts</strong></p>
						</div>
					</div>
					<div class="col-xs-10">
						<input type="submit" name="publish" class="btn btn-primary btn-block" value="Create Post">
					</div>
					<div class="col-xs-2">
						<input type="submit" name="draft" class="btn btn-secondary btn-block" value="Save Draft">
					</div>				
				</form>	
			</div>
		</div>
	</div>
</div>

@stop

@section('scripts')

<script>
	jQuery('#toggle-editor').click( function() {
		$('.wysihtml5-toolbar').toggle();
		$('#toggle-editor').css("margin-bottom", "10px");
	});
</script>
@stop