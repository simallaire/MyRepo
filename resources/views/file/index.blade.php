@extends('layouts.app')


@section('content')

    <h4>Shared Files</h4>
    <div class="list-group">
        @foreach($files as $file)
            <div class="list-group-item list-group-item-action">
            <a href="/storage/files/{{$file->url}}" class="btn btn-default"><i class="far fa-file">&nbsp;&nbsp;</i>{{$file->originalName}}</a>
            @if(Auth::user()->isAdmin())
                    <button type="button" class="close" id="{{$file->id}}" data-dismiss="alert">x</button>
                @endif
            @if(isset($file->post))
                <p style="margin-left:12px; ">
                @if(isset($file->post->user))
                    <i>by {{$file->post->user->name}}</i>
                @endif
                from <a href="/post/{{$file->post->id}}">{{strip_tags($file->post->title)}}</a></p>

            @endif
            </div>

        @endforeach
    </div>
<script>
$(".close").click(function(){
    var id = $(this).attr("id");
    $.ajax({
        type: 'GET',
        url: '/file/'+id+'/delete',
        success: function(){
            $(this).parent().hide();
        }

    })
});

</script>
@endsection

