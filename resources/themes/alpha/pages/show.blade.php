@extends('layouts.app')

@section('content')
<div class="box">
	<div class="12u">
		<header>
			<h2>{{ $page->title }}</h2>
			<p><span>@</span>{{ $page->user->name }} on @datetime($page->created_at)</small></p>
		</header>
		{!! $page->content !!}
		
		<ul class="pull-right actions small">
			@can( 'edit-page', $page)
				<li><a href="/{{ $page->slug }}/edit" class="button fit small">Edit</a></li>
			@endcan

			@can('delete-page', $page)
				<form action="/{{ $page->slug }}/delete" method="POST">
					{{ csrf_field() }}
					{{ method_field('DELETE') }}
					<li><input type="submit" class="button special fit small" value="Delete"></li>
				</form>
			@endcan
			</ul>
	</div>
</div>
@stop