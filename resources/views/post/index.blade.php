@extends('layouts.app')

@section('content')
<div class="contrainer">
	<div class="content">
	@foreach($posts as $post)

        <post title="{{$post->title}}"
            body="{{ strip_tags(str_limit($post->body, 100)) }}"
            count_comments="{{count($post->comments)}}"
            username="{{$post->user->name}}"
            updated_at="{{$post->updated_at->diffForHumans()}}"
             postid="/post/{{$post->id}}" userid="/user/{{$post->user->id}}">
        </post>
	@endforeach
		</div>
		<div class="content">
			{{ $posts->links() }}
		</div>
	</div>
@endsection
