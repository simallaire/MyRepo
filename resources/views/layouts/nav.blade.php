<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->

                      <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}</a>
                        </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                                 <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a href="/user/{{Auth::user()->id}}" class="dropdown-item">Profile</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                    <li class="nav-item form-inline">
                        <input type="search" name="search" class="form-control" placeholder="Search..." id="searchInput">
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <script>
    $(document).ready(function(){
        $("#searchInput").keyup(function(){
            var search = $(this).val();
            if(search.length >= 3){
                $.ajax({
                    type: 'GET',
                    url: '/search/'+search,
                    success : function(data){
                        $("#searchResult").html("");
                        console.log(data);
                        if(data.tags){
                            if(data.tags.length>0){
                                $("#searchResult").append("<h4>Tags: </h4>")
                            }
                            for(var i =0 ; i < data.tags.length; i++){
                                $("#searchResult").append("<p><a href='/tag/"+data.tags[i].id+"'>#"+data.tags[i].name+"</a></p>");

                                $("#searchResult").append("<example-component></example-component>");

                            }
                            if(data.posts.length>0){
                                $("#searchResult").append("<h4>Posts: </h4>")
                            }
                            for(var i = 0 ; i< data.posts.length; i++){
                                $("#searchResult").append("<a class='btn form-control is-link' href='/post/"+data.posts[i].id+"'>"+data.posts[i].title+"</a><br/>")

                            }
                        }
                    },
                });
            }else{
                $("#searchResult").html("");
            }
        });
    });

    </script>

