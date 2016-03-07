
<div class="row uniform">
	<div class="12u">
			@if ( session()->has('flash_message') )
			<div class="alert">
				<p>{{ session()->get('flash_message') }}</p>
			</div>
			@endif
	</div>
</div>