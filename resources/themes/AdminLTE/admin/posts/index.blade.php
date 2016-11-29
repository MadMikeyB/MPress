@extends('layouts.app')

@section('title')
	@can('create-post', Auth::user())
		<div class="pull-right">
			<a type="button" class="btn btn-primary" href="/admin/posts/create"><i class="fa fa-plus-circle"></i> Create Post</a>
		</div>
	@endcan
	<h1>{{ Setting::get('site_title', 'MPress 2.0')}}
		<small>Post Manager</small>
	</h1>
@stop


@section('content')
<div class="row">
<div class="col-md-12">
	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title">All Posts</h3>
			<i class="fa fa-pencil-square-o pull-right"></i>
		</div><!-- /.box-header -->
		<div class="box-body no-padding">
			<table class="table table-striped">
				<tbody>
					<tr>
						<th>Title</th>
						<th>Author</th>
						<th>Excerpt</th>
						<th>Post Status</th>
						<th></th>
						<th></th>
						<th></th>
					</tr>
					@unless ( $posts->isEmpty() )
					@foreach ($posts as $post)
						<tr>
							<td>{{ $post->title }}</td>
							<td>{{ $post->user->name }}</td>
							<td>{!! Markdown::convertToHtml(str_limit($post->content, 140)) !!}</td>
							@if ( $post->trashed() )
							<td><span class="label label-danger">Deleted</span></td>
							@elseif ( $post->status == 'publish')
							<td><span class="label label-success">{{ ucfirst($post->status) }}</span></td>
							@else
							<td><span class="label label-primary">{{ ucfirst($post->status) }}</span></td>
							@endif
							<td><a href="/read/{{ $post->slug }}" class="btn btn-success"><i class="fa fa-eye"></i></td>
							<td><a href="/posts/{{ $post->slug }}/edit" class="btn btn-info"><i class="fa fa-pencil"></i></td>
							<td><a href="/posts/{{ $post->slug }}/delete" class="btn btn-danger"><i class="fa fa-trash"></i></td>
						</tr>
					@endforeach
					@endunless
				</tbody>
			</table>
		</div><!-- /.box-body -->
		<div class="box-footer clearfix">
			<div class="pagination pagination-sm no-margin pull-right">
				{!! $posts->links() !!}
			</div>
		</div>
	</div><!-- /.box -->
</div>
</div>

@stop