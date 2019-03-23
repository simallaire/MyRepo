@extends('layouts.app')


@section('content')

    <h4>Shared Files</h4>
    <div class="list-group">
        @foreach($files as $file)
        <a href="/storage/files/{{$file->url}}" class="list-group-item list-group-item-action">{{$file->originalName}}</a>
        @endforeach
    </div>

@endsection
