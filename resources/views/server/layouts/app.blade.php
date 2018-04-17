<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <figure class="background">
        <img src="{{ asset('server/images/background.png') }}" alt="">
    </figure>
    <div id="app">
        <vue-progress-bar></vue-progress-bar>
        <div class="wrapper">
            @include('server.includes.aside')

            <div class="content">
                @include('server.includes.header')

                <main>
                    <router-view></router-view>
                </main>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
