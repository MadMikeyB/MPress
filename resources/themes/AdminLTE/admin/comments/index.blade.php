@extends('layouts.app')

@section('title')
	<h1>{{ Setting::get('site_title', 'MPress 2.0')}}
		<small>Comment Manager</small>
	</h1>
@stop


@section('content')
<div class="row">
<div class="col-md-12">
	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title">All Comments</h3>
			<i class="fa fa-comments pull-right"></i>
		</div><!-- /.box-header -->
		<div class="box-body no-padding">
			<table class="table table-striped">
				<tbody>
					<tr>
						<th>Post</th>
						<th>Author</th>
						<th>Excerpt</th>
						<th>Status</th>
						<th></th>
						<th></th>
						<th></th>
					</tr>
					@unless ( $comments->isEmpty() )
					@foreach ($comments as $comment)
						<tr>
							<td>{{ $comment->post->title }}</td>
							@if ( $comment->user )
							<td>{{ $comment->user->name }}</td>
							@else
							<td>Guest</td>
							@endif
							<td>{!! Markdown::convertToHtml(str_limit($comment->body, 140)) !!}</td>
							@if ( $comment->trashed() )
							<td><span class="label label-danger">Deleted</span></td>
							@else
							<td><span class="label label-primary">Published</span></td>
							@endif
							<td><a href="/read/{{ $comment->post->slug }}#comment-{{ $comment->id }}" class="btn btn-success"><i class="fa fa-eye"></i></td>
							<td><a href="/comments/{{ $comment->id }}/edit" class="btn btn-info"><i class="fa fa-pencil"></i></td>
							<td><a href="/comments/{{ $comment->id }}/delete" class="btn btn-danger"><i class="fa fa-trash"></i></td>
						</tr>
					@endforeach
					@endunless
				</tbody>
			</table>
		</div><!-- /.box-body -->
		<div class="box-footer clearfix">
			<div class="pagination pagination-sm no-margin pull-right">
				{!! $comments->links() !!}
			</div>
		</div>
	</div><!-- /.box -->
</div>
</div>

@stop