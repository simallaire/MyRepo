@extends('layouts.app')

@section('content')
    @if(isset($info))
        <div class="alert alert-success" role="alert">
                {{ $info }}
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

                        You are logged in!

                                <ul class="list-group">

                                    <li class="list-group-item"><a href="/post/create">Write a post</a></li>

                                    <li class="list-group-item"><a href="/post">
                                        View Posts
                                        </a></li>

                                     <li class="list-group-item"><a href="/tag">
                                    Tags
                                    </a></li>
                                </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
