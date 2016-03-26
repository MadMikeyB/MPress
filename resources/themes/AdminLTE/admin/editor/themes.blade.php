@extends('layouts.app')

@section('content')

<style>
	.btn-theme {
		color:white;font-size:2em;border:1px solid white;position:absolute;top:50%;right:25%;left:25%;width:50%;text-align:center;
		transition:all 0.3s ease;
	}
	.theme:hover .btn-theme {
		background:white;
		color:black;
		transition:all 0.3s ease;
	}
	.theme:hover {
		transition:all 0.3s ease;
		opacity: 0.75;
	}
</style>

<div class="box box-solid">
<div class="row">
	<div class="col-md-12">
		<div class="box box-solid">
			<div class="box-header with-border">
				<i class="fa fa-paint-brush pull-right"></i>
				<h3 class="box-title">Theme Editor</h3>
			</div>

			<div class="box-body">
				<span class="text-muted">Select a Theme to Edit</span>
				<div class="row">
				@foreach ( $themes as $k => $v )

					<div class="col-md-4"@if ( $k == 3)style="clear:both;"@endif>
						<a href="editor/{{ str_replace('themes/', '', strtolower($v)) }}">
							<div class="theme" style="background:linear-gradient(rgba(0, 0, 0, 0.35), rgba(0, 0, 0, 0.35)), url(/images/{{ $v }}.png);background-size:cover;background-position:center top;min-height:300px;width:100%;margin:1em;">
								<span class="btn-theme">{{ ucwords(str_replace(['themes/', '-'], ' ', $v)) }}</span>
							</div>
						</a>
					</div>
				@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@stop