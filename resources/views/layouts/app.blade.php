
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MyRep') }}</title>

    <!-- Scripts -->
    @include('layouts.import')


    <body>
        <div>
            @include('layouts.nav')
            <div id="searchResult" class="container"></div>
            <div id="app" class="container">
                    {{-- <tags-list nom="taggg" id="1"></tags-list> --}}

            <main class="py-10 container">
                <div class="card-body">
                            @yield('content')
                    </div>

            </main>
            </div>

        </div>

    </body>

</html>
