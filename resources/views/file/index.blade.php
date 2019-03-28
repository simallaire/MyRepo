@extends('layouts.app')


@section('content')

    <h4>Shared Files</h4>
    <div class="list-group">
        @foreach($files as $file)
            <div class="list-group-item list-group-item-action">
            <a href="/storage/files/{{$file->url}}" class="btn btn-default"><i class="far fa-file">&nbsp;&nbsp;</i>{{$file->originalName}}</a>
            @if(isset($file->post))
                <p><i>by {{$file->post->user->name}}</i> 
                from <a href="/post/{{$file->post->id}}">{{strip_tags($file->post->title)}}</a></p>
            @endif
            </div>
        @endforeach
    </div>

@endsection
