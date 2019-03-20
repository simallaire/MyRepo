@extends('layouts.app')

@section('content')

    <script src="/js/jquery-te-1.4.0.min.js"></script>
    <link href="/css/jquery-te-1.4.0.css" rel="stylesheet">



    <div class="container">
    @if(Auth::user()->ownsPost($post))
        <div class="dropdown" style="float:right">
            <a id="postDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="postDropdown">
                <a class="dropdown-item btn" href="/post/{{$post->id}}/edit">
                    Edit
                </a>

                <a class="dropdown-item btn" onclick="deletePost()" href="#">
                    Delete
                </a>
            </div>
        </div>
    @endif
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
                     Created {{ $post->created_at->diffForHumans() }}
                    by <a href="/user/{{ $post->user->id }}">
                        {{ $post->user->name }}</a></p>

                    <p>
                    @if(strtotime($post->updated_at)>strtotime($post->created_at))
                        Updated {{$post->updated_at->diffForHumans()}}
                    @endif
                    </p>
                </div>
                <br>
                <div class="container">
                @foreach($post->files as $file)
                    <div class="content">
                        <i class="fa fa-download"></i><a href="/storage/files/{{$file->url}}">{{$file->originalName}}</a>
                    </div>
                @endforeach
                </div>
                <br>
            </div>

        </div>
    </div>
    <div class="comment container" id="{{$post->id}}">
        <input type="text" name="comment" placeholder="Laisser un commentaire.." class="form-control" id="{{$post->id}}">
        <button type="submit" id="{{$post->id}}" class="form-control submitComment">Envoyer</button>
    </div>

    <br>

    <div class="comments">
    @foreach($post->comments as $comment)
        <div class="panel panel-default" id="{{$comment->id}}">
            <div class="panel-heading"> {{$comment->user->name}} ({{$comment->created_at->diffForHumans()}})
                @if(Auth::user()->ownsComment($comment))
                    <button class="btn" onclick="deleteComment({{$comment->id}})" style="float:right;">x</button>
                @endif
            </div>
            <div class="panel-body">{{ $comment->body }}</div>
        </div>
    @endforeach

    </div>
    <div style="display: none;">
        <textarea>{{ $post->body }}</textarea>
    </div>

    <script>
        function deleteComment(id){
            $.ajax({
                type: 'GET',
                url: '/comment/'+id+'/delete',
                success: function(data){
                    $(".panel-default#"+id).hide();
                }
            });
            {{-- alert(id); --}}
        }
        function deletePost(){
            var r = false;
            r = confirm('Are you sure?');
            if(r == true){
                $.ajax({
                    type: 'GET',
                    url: "/post/{{$post->id}}/delete",
                    success: function(data){
                        alert(data.msg);
                        window.location.href = "/home";
                    }

                });
            }
        }

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
                    $("div.comments").append("<div class='panel panel-default'><div class='panel-heading'> "+data.username+" (Now)</div><div class='panel-body'>"+data.body+"</div></div>")
                }

            });
        });
    </script>

@endsection
