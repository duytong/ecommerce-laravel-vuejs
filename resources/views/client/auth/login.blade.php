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
    <div class="auth-page">
        <div class="auth-page__card">
            <div class="logo">
                <img src="{{ asset('client/images/logo.jpg') }}" alt="">
            </div>
            <form action="" class="form">
                <div class="form__group">
                    <label class="form__label">Email</label>
                    <input type="text" class="form__control" name="email">
                </div>
                <div class="form__group">
                    <label class="form__label">Password</label>
                    <input type="password" class="form__control" name="password">
                </div>
                <button type="submit" class="btn btn--primary">Log in</button>
            </form>
        </div>
    </div>
</body>
</html>
