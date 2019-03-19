@extends('layouts.app')

@section('content')
<div class="contrainer">
	<div class="content">
	@foreach($posts as $post)
		<div class="card">
			<div class="card-body">

		<h4><a href="post/{{$post->id}}">{{ $post->title }}</a> </h4><br/>
		<p>{{ strip_tags(str_limit($post->body, 100)) }}...</p>
        @if(isset($post->user))
		    &nbsp;by <a href="/user/{{$post->user->id}}">{{ $post->user->name }}</a>
        @endif
		</div>
		</div>

	@endforeach
		</div>
		<div class="content">
			{{ $posts->links() }}
		</div>
	</div>
@endsection
