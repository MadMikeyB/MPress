
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			@if ( session()->has('flash_message') )
			<div class="alert alert-info">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<p>{{ session()->get('flash_message') }}</p>
			</div>
			@endif
		</div>
	</div>
</div>