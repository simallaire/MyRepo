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
                                    <li class="list-group-item"><a href="/project/create">Create a new Project</a></li>
                                    <li class="list-group-item"><a href="/post/create">Create a new post</a></li>
                                    <li class="list-group-item"><a href="/project">
                                    See all Projects
                                    </a></li>
                                    <li class="list-group-item"><a href="/post">
                                        See all posts
                                        </a></li>
                                     <li class="list-group-item"><a href="/language">
                                    See all Languages
                                    </a></li>
                                     <li class="list-group-item"><a href="/tag">
                                    See all tags
                                    </a></li>
                                </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
