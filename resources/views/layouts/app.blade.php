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
    <link href="{{ asset('css/client/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" @click="documentClick">
        @include('layouts.includes.header')

        <main>
            @yield('content')
        </main>

        @include('layouts.includes.modal')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/client/app.js') }}"></script>
</body>
</html>
