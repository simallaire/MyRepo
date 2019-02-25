@extends('layouts.app')

@section('content')

	@foreach($posts as $post)
		<div class="card">
			<div class="card-body">	
		{{ $post->id }}.
		{{ $post->title }} <br/>
		&nbsp;by {{ $post->user->name }}
		</div>
		</div>
		
	@endforeach

@endsection