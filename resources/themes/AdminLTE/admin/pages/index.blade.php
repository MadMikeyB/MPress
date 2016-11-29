@extends('layouts.app')

@section('title')
	@can('create-page', Auth::user())
		<div class="pull-right">
			<a type="button" class="btn btn-primary" href="/admin/pages/create"><i class="fa fa-plus-circle"></i> Create Page</a>
		</div>
	@endcan
	<h1>{{ Setting::get('site_title', 'MPress 2.0')}}
		<small>Page Manager</small>
	</h1>
@stop


@section('content')
<div class="row">
<div class="col-md-12">
	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title">All Pages</h3>
			<i class="fa fa-pencil-square-o pull-right"></i>
		</div><!-- /.box-header -->
		<div class="box-body no-padding">
			<table class="table table-striped">
				<tbody>
					<tr>
						<th>Title</th>
						<th>Author</th>
						<th>Excerpt</th>
						<th></th>
						<th></th>
						<th></th>
					</tr>
					@unless ( $pages->isEmpty() )
					@foreach ($pages as $page)
						<tr>
							<td>{{ $page->title }}</td>
							<td>{{ $page->user->name }}</td>
							<td>{!! Markdown::convertToHtml(str_limit(strip_tags($page->content), 140)) !!}</td>
							<td><a href="/{{ $page->slug }}" class="btn btn-success"><i class="fa fa-eye"></i></td>
							<td><a href="/pages/{{ $page->slug }}/edit" class="btn btn-info"><i class="fa fa-pencil"></i></td>
							<td><a href="/pages/{{ $page->slug }}/delete" class="btn btn-danger"><i class="fa fa-trash"></i></td>
						</tr>
					@endforeach
					@endunless
				</tbody>
			</table>
		</div><!-- /.box-body -->
		<div class="box-footer clearfix">
			<div class="pagination pagination-sm no-margin pull-right">
				{!! $pages->links() !!}
			</div>
		</div>
	</div><!-- /.box -->
</div>
</div>

@stop