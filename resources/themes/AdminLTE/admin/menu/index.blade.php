@extends('layouts.app')

@section('title')
          <h1>{{ Setting::get('site_title', 'MPress 2.0')}}
            <small>Menu Manager</small>
          </h1>
@stop

@section('content')
<div class="row">
	<div class="col-md-offset-1 col-md-10 col-sm-12">
		<div class="box box-solid">
			<div class="box-header with-border">
				<i class="fa fa-th"></i>
				<h3 class="box-title">Menu Manager</h3>
			</div>

			<div class="box-body">
				<form action="/admin/menus" method="POST" role="form">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="title" class="control-label">Title</label>
						<input type="text" class="form-control input-lg" id="title" name="title" placeholder="Menu Title">
					</div>

					<div class="form-group">
						<label for="url" class="control-label">URL</label>
						<input type="url" class="form-control input-lg" id="url" name="url" placeholder="Menu URL">
					</div>

					<div class="form-group">
						<label for="position" class="control-label">Position</label>
						<input type="number" class="form-control input-lg" id="position" name="position" placeholder="Menu Position">
					</div>

					<div class="form-group">
						<label>Who can see this?</label>
						<select name="group" class="form-control input-lg">
							<option value="1">Admin Only</option>
							<option value="2">Admin &amp; Editor</option>
							<option value="3" selected>Everyone</option>
						</select>
					</div>
					<button type="submit" class="btn btn-primary btn-block">Add Menu Item</button>
				</form>	
			</div>
		</div>
	</div>
</div>
@stop