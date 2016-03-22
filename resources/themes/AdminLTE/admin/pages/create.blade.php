@extends('layouts.app')

@section('content')
<div class="box box-solid">
<div class="row">
	<div class="col-md-12">
		<div class="box box-solid">
			<div class="box-header with-border">
				<i class="fa fa-file pull-right"></i>
				<h3 class="box-title">Create Page</h3>
			</div>

			<div class="box-body">
				<form action="/pages" method="POST" role="form">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="title" class="control-label">Title</label>
						<input type="text" class="form-control input-lg" id="title" name="title" placeholder="Page Title">
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
							<h3>Page Templates</h3>
								<p><strong>You can use <a href="https://laravel.com/docs/master/blade">Blade</a><sup><a href="http://cheats.jesse-obrien.ca/#blade">(?)</a></sup>, <a href="http://www.w3schools.com/html/">HTML</a> and <a href="https://daringfireball.net/projects/markdown/">Markdown</a><sup><a href="http://assemble.io/docs/Cheatsheet-Markdown.html">(?)</a></sup> in Pages</strong></p>
								<p><code>@header</code> will show the site header - including Navigation</p>
								<p><code>@footer</code> will show the site footer</p>
								<p><code>@sidebar</code> will show any sidebar set up within this theme</p>
								<small>For more granular control, you may wish to edit the template files directly</small>
						</div>
					</div>
					<button type="submit" class="btn btn-primary btn-block">Add Menu Item</button>
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