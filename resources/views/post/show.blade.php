@extends('layouts.app')

@section('content')

   <script src="/js/jquery-te-1.4.0.min.js"></script>
    <link href="/css/jquery-te-1.4.0.css" rel="stylesheet">



<div class="container">

<div class="row">

	<div class="col-sm-8 blog-main">
		<div class="blog-post">
			<h2 style="text-align: center;" class="blog-post-title">{{ $post->title }}</h2>
				<p>
			<code>
				@php
				$project = $post;
				@endphp
				@include('modules.tags',compact('project'))
			</code>
			</p>
			@if(isset($post->files[0]))
				<img src="/storage/files/{{$post->files[0]->url}}" style="max-width: 800px; max-height:600px;">
			@endif
			<span class="blog-post" >
	

			</span>
			<hr>
			
			<p class="blog-post-meta">
				{{ $post->created_at->diffForHumans() }} 
				by <a href="user/{{ $post->user->id }}">
					{{ $post->user->name }}</a></p>

			</div>
		</div>
	</div>
</div>
<div style="display: none;">
	<textarea>{{ $post->body }}</textarea>
</div>
<script>
	$("textarea").jqte();

	var bodycontent = $("textarea").val();
	$("span.blog-post").html(bodycontent);

</script>
@endsection