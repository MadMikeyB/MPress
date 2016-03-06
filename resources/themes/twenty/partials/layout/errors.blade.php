<div class="row uniform">
	<div class="12u">
			@if (count($errors) > 0)
			    <div class="alert">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
	</div>
</div>