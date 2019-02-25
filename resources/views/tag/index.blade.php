@extends('layouts.app')

@section('content')
		<div class="container">
			<ul class="list-inline">

		@foreach($tags as $tag)
				<li class="list-inline-item">#{{ $tag->name }} <a href="/tag/{{ $tag->id }}" title="">({{ $tag->project->count() }})</a></li>

		@endforeach
			</ul>
		</div>
@endsection