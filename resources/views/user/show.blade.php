@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content">
        <h3 style="text-align: center;">User Profile</h3>
        </div>
        <div class="row">

        <div class="col-sm-2 panel" >
            <h5>{{ $user->name }}</h5>
            <hr>
            <p>Joined {{ $user->created_at->diffForHumans()}}</p>
        </div>
        <div class="col-sm-10 panel">
            <div class="panel-heading">Posts:</div>
            <ul class="list-group panel-body">
            @foreach($user->posts as $post)
                <post title="{{$post->title}}"
                    body="{{$post->body}}"
                    updated_at="{{$post->updated_at->diffForHumans()}}"
                    postid="/post/{{$post->id}}">
                </post>
            @endforeach
            </ul>
        </div>
        </div>
    </div>

@endsection
