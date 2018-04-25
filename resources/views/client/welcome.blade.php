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
    <div id="app">
        <header class="header">
            <div class="container">
                <a href="" class="logo">Laravel</a>
                <div class="header__tools">
                    <form action="">
                        <div class="form-search">
                            <i class="fal fa-search"></i>
                            <input type="text" class="form-control" placeholder="Search for shoes">
                        </div>
                    </form>
                    <a href="" class="btn btn--default btn--login">Log In</a>
                    <a href="" class="btn btn--primary">Sign Up</a>
                    <div class="divider-vertical"></div>
                    <a href="" class="cart">
                        <i class="fal fa-suitcase"></i>
                        <span class="cart__count">1</span>
                    </a>
                </div>
            </div>
        </header>
        <ul class="category">
            <li class="category__item">
                <a href="" class="category__link">Nike</a>
            </li>
            <li class="category__item">
                <a href="" class="category__link">Jordan</a>
            </li>
            <li class="category__item">
                <a href="" class="category__link">Adidas</a>
            </li>
            <li class="category__item">
                <a href="" class="category__link">Footwear</a>
            </li>
            <li class="category__item">
                <a href="" class="category__link">Supreme</a>
            </li>
            <li class="category__item">
                <a href="" class="category__link">Palace</a>
            </li>
            <li class="category__item">
                <a href="" class="category__link">Apparel</a>
            </li>
            <li class="category__item">
                <a href="" class="category__link">Collectibles</a>
            </li>
            <li class="category__item">
                <a href="" class="category__link">Trophy case</a>
            </li>
            <li class="category__item">
                <a href="" class="category__link">Journal</a>
            </li>
        </ul>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/client.js') }}"></script>
</body>
</html>
