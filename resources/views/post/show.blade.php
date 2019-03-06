@extends('layouts.app')

@section('content')

   <script src="/js/jquery-te-1.4.0.min.js"></script>
    <link href="/css/jquery-te-1.4.0.css" rel="stylesheet">



<div class="container">

<div class="row">

	<div class="col-xl-10 blog-main">
		<div class="blog-post">
			<h2 style="text-align: center;" class="title is-3">{{ $post->title }}</h2>
				<p>
			<code>
				@php
				$project = $post;
				@endphp
				@include('modules.tags',compact('project'))
			</code>
			</p>
			@if(isset($post->files[0]))
			<div class="modal">
				<div class="modal-background"></div>
				<div class="modal-content">
				  <p class="image is-16by9">
					<img src="/storage/files/{{$post->files[0]->url}}" alt="">
				  </p>
				</div>
				<button class="modal-close is-large" aria-label="close"></button>
			  </div>
				<img src="/storage/files/{{$post->files[0]->url}}" style="max-width: 90%; max-height:600px;">
			@endif
			<br/>
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
	$("img").click(function(){
		$(".modal").addClass("is-active");
	});
	$(".modal-close").click(function(){
		$(".modal").removeClass("is-active");
	});
</script>
@endsection