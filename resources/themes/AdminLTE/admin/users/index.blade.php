@extends('layouts.app')

@section('title')
	<h1>{{ Setting::get('site_title', 'MPress 2.0')}}
		<small>User Manager</small>
	</h1>
@stop


@section('content')
<div class="row">
<div class="col-md-12">
	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title">All Users</h3>
			<i class="fa fa-users pull-right"></i>
		</div><!-- /.box-header -->
		<div class="box-body no-padding">
			<table class="table table-striped">
				<tbody>
					<tr>
						<th>Username</th>
						<th>Nickname</th>
						<th>Email</th>
						<th>User Group</th>
						<th></th>
						<th></th>
						<th></th>
					</tr>
					@unless ( $users->isEmpty() )
					@foreach ($users as $user)
						<tr>
							<td>{{ $user->name }}</td>
							<td>{{ $user->nickname }}</td>
							<td>{{ $user->email }}</td>
							@if ( $user->group == 1 )
							<td><span class="label label-danger">Admin</span></td>
							@elseif ( $user->group == 2)
							<td><span class="label label-info">Editor</span></td>
							@else
							<td><span class="label label-primary">Member</span></td>
							@endif
							<td><a href="/&#64;{{ $user->slug }}" class="btn btn-success"><i class="fa fa-eye"></i></td>
							<td><a href="/&#64;{{ $user->slug }}/edit" class="btn btn-info"><i class="fa fa-pencil"></i></td>
							<td><a href="/&#64;{{ $user->slug }}/delete" class="btn btn-danger"><i class="fa fa-trash"></i></td>
						</tr>
					@endforeach
					@endunless
				</tbody>
			</table>
		</div><!-- /.box-body -->
		<div class="box-footer clearfix">
			<div class="pagination pagination-sm no-margin pull-right">
				{!! $users->links() !!}
			</div>
		</div>
	</div><!-- /.box -->
</div>
</div>

@stop