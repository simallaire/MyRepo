@extends('layouts.app')

@section('content')
    @if(isset($info))
        <div class="alert alert-success" role="alert">
                {!! $info !!}
                    <button type="button" class="close" data-dismiss="alert">x</button>

        </div>

    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <ul class="list-group">

                            <li class="list-group-item"><a href="/post/create">
                                <i class="far fa-edit"></i>
                                Write a post</a>&nbsp;</li>

                            <li class="list-group-item"><a href="/post">
                                <i class="fa fa-newspaper">&nbsp;</i>
                                View Posts
                                </a></li>

                            <li class="list-group-item"><a href="/file">
                                <i class="fas fa-file">&nbsp;</i>Shared Files
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
