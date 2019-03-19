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
			{{-- @if(isset($post->files))
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
			@endif --}}
			<br/>
			<span class="blog-post" >


			</span>
			<hr>

			<p class="blog-post-meta">
				{{ $post->created_at->diffForHumans() }}
				by <a href="user/{{ $post->user->id }}">
					{{ $post->user->name }}</a></p>

			</div>
            <div class="container">
            @foreach($post->files as $file)
                <div class="content">
                    <i class="fa fa-download"></i><a href="/storage/files/{{$file->url}}">{{$file->originalName}}</a>
                </div>
            @endforeach
            </div>
		</div>

	</div>
</div>
<div class="comment" id="{{$post->id}}">
    <input type="text" name="comment" placeholder="Laisser un commentaire.." class="form-control" id="{{$post->id}}">
    <button type="submit" id="{{$post->id}}" class="form-control submitComment">Envoyer</button>
</div>
<br>

<div class="comments">
@foreach($post->comments as $comment)
    <div class="card">
        <h5>{{ $comment->body }}</h5>
        <p>by {{$comment->user->name}} ({{$comment->created_at->diffForHumans()}})</p>
    </div>
@endforeach

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

    $(".submitComment").click(function(){
        var post_id = $(this).attr("id");
        var text = $("input[name='comment']").val()
        $.ajax({
            type: 'GET',
            url: '/storePostComment',
            data : {
                postid : post_id,
                body: text
            },
            success: function(data){
                $("input[name='comment']").val("");
                $("div.comments").append("<div class='card'><h5>"+data.body+"</h5><p>by "+data.username+" (Now)</p></div>")
            }

        });
    });
</script>
@endsection
