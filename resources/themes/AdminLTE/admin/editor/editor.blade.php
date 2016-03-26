@extends('layouts.app')

@section('content')
<div class="box box-solid">
<div class="row">
	<div class="col-md-12">
		<div class="box box-solid">
			<div class="box-header with-border">
				<i class="fa fa-paint-brush pull-right"></i>
				<h3 class="box-title">Template Editor &mdash; {{ ucfirst($theme) }}</h3>
			</div>

			<div class="box-body">
				<div class="row">
					<div class="col-md-3">
						<div class="list-group">
						@foreach ( $files as $file )
							<a href="{{ $file }}" data-file="{{ $file }}" class="list-group-item">{{ str_replace('themes/' . $theme , '', $file) }}</a>
						@endforeach
						</div>
					</div>
					<div class="col-md-9">
						<div class="form-group">
								<label for="content" class="control-label">Template Content</label>
								<textarea class="form-control editor" name="content" style="height:100vh"></textarea>
							</div>
					</div>
				</div>
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

	jQuery('a[data-file]').click( function(element) {
		event.preventDefault();
		$(this).toggleClass('active');
		var content = $('.editor').load('edit/themes/{{$theme}}' + element.target.innerHTML);
		$('.editor').html(content);
	});
</script>
@stop