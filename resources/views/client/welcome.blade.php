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
            <div class="grid">
                <div class="container">
                    <a href="" class="logo">Laravel</a>
                    <div class="form-search">
                        <form action="">
                            <input type="text" class="form-control" placeholder="Search for shoes">
                            <button type="submit" class="btn">
                                <i class="fal fa-search"></i>
                            </button>
                        </form>
                    </div>
                    <div class="header__tools">
                        <a href="" class="btn btn--default btn--login">Log In</a>
                        <a href="" class="btn btn--primary">Sign Up</a>
                        <div class="divider-vertical"></div>
                        <a href="" class="cart">
                            <i class="fal fa-suitcase"></i>
                            <span class="cart__count">1</span>
                        </a>
                    </div>
                </div>
            </div>
        </header>
        {{-- <ul class="category">
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
        </ul> --}}
        <div class="grid">
            <div class="container">
                <main>
                    <section class="product">
                        <ul class="product__list">
                            <li class="product__item">
                                <a href="" class="product__link">
                                    <span class="product__promotion">-5%</span>
                                    <img src="{{ asset('client/images/product-1.png') }}" alt="" class="product__image">
                                    <div class="product__info">
                                        <span class="product__category">Adidas</span>
                                        <span class="product__name">Ultraboost UNDFTD</span>
                                    </div>
                                    <div class="product__review-wrap">
                                        <span class="product__rating">
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </span>
                                        <span class="product__review">(5 reviews)</span>
                                    </div>
                                    <div class="product__price">
                                        <span class="product__promotion-price">$309.00</span>
                                        <span class="product__initial-price">$325.00</span>
                                    </div>
                                </a>
                            </li>
                            <li class="product__item">
                                <a href="" class="product__link">
                                    <span class="product__promotion">-5%</span>
                                    <img src="{{ asset('client/images/product-2.png') }}" alt="" class="product__image">
                                    <div class="product__info">
                                        <span class="product__category">Adidas</span>
                                        <span class="product__name">UltraBoost UNDFTD</span>
                                    </div>
                                    <div class="product__review-wrap">
                                        <span class="product__rating">
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </span>
                                        <span class="product__review">(5 reviews)</span>
                                    </div>
                                    <div class="product__price">
                                        <span class="product__promotion-price">$309.00</span>
                                        <span class="product__initial-price">$325.00</span>
                                    </div>
                                </a>
                            </li>
                            <li class="product__item">
                                <a href="" class="product__link">
                                    <span class="product__promotion">-5%</span>
                                    <img src="{{ asset('client/images/product-3.png') }}" alt="" class="product__image">
                                    <div class="product__info">
                                        <span class="product__category">Jordan</span>
                                        <span class="product__name">Air Joran 1 Hi H2H NRG / CHI</span>
                                    </div>
                                    <div class="product__review-wrap">
                                        <span class="product__rating">
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </span>
                                        <span class="product__review">(5 reviews)</span>
                                    </div>
                                    <div class="product__price">
                                        <span class="product__promotion-price">$309.00</span>
                                        <span class="product__initial-price">$325.00</span>
                                    </div>
                                </a>
                            </li>
                            <li class="product__item">
                                <a href="" class="product__link">
                                    <span class="product__promotion">-5%</span>
                                    <img src="{{ asset('client/images/product-4.png') }}" alt="" class="product__image">
                                    <div class="product__info">
                                        <span class="product__category">Nike</span>
                                        <span class="product__name">Kobe 1 PROTRO</span>
                                    </div>
                                    <div class="product__review-wrap">
                                        <span class="product__rating">
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </span>
                                        <span class="product__review">(5 reviews)</span>
                                    </div>
                                    <div class="product__price">
                                        <span class="product__promotion-price">$309.00</span>
                                        <span class="product__initial-price">$325.00</span>
                                    </div>
                                </a>
                            </li>
                            <li class="product__item">
                                <a href="" class="product__link">
                                    <span class="product__promotion">-5%</span>
                                    <img src="{{ asset('client/images/product-5.png') }}" alt="" class="product__image">
                                    <div class="product__info">
                                        <span class="product__category">Footwear</span>
                                        <span class="product__name">CL Nylon 4HUNNID</span>
                                    </div>
                                    <div class="product__review-wrap">
                                        <span class="product__rating">
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </span>
                                        <span class="product__review">(5 reviews)</span>
                                    </div>
                                    <div class="product__price">
                                        <span class="product__promotion-price">$309.00</span>
                                        <span class="product__initial-price">$325.00</span>
                                    </div>
                                </a>
                            </li>
                            <li class="product__item">
                                <a href="" class="product__link">
                                    <span class="product__promotion">-5%</span>
                                    <img src="{{ asset('client/images/product-6.png') }}" alt="" class="product__image">
                                    <div class="product__info">
                                        <span class="product__category">Nike</span>
                                        <span class="product__name">The 10 : Nike Air Vapormax FK</span>
                                    </div>
                                    <div class="product__review-wrap">
                                        <span class="product__rating">
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </span>
                                        <span class="product__review">(5 reviews)</span>
                                    </div>
                                    <div class="product__price">
                                        <span class="product__promotion-price">$309.00</span>
                                        <span class="product__initial-price">$325.00</span>
                                    </div>
                                </a>
                            </li>
                            <li class="product__item">
                                <a href="" class="product__link">
                                    <span class="product__promotion">-5%</span>
                                    <img src="{{ asset('client/images/product-7.png') }}" alt="" class="product__image">
                                    <div class="product__info">
                                        <span class="product__category">Adidas</span>
                                        <span class="product__name">Yeezy Desert Rat 500</span>
                                    </div>
                                    <div class="product__review-wrap">
                                        <span class="product__rating">
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </span>
                                        <span class="product__review">(5 reviews)</span>
                                    </div>
                                    <div class="product__price">
                                        <span class="product__promotion-price">$309.00</span>
                                        <span class="product__initial-price">$325.00</span>
                                    </div>
                                </a>
                            </li>
                            <li class="product__item">
                                <a href="" class="product__link">
                                    <span class="product__promotion">-5%</span>
                                    <img src="{{ asset('client/images/product-8.png') }}" alt="" class="product__image">
                                    <div class="product__info">
                                        <span class="product__category">Jordan</span>
                                        <span class="product__name">Air Jordan 1 Retro High OG</span>
                                    </div>
                                    <div class="product__review-wrap">
                                        <span class="product__rating">
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </span>
                                        <span class="product__review">(5 reviews)</span>
                                    </div>
                                    <div class="product__price">
                                        <span class="product__promotion-price">$309.00</span>
                                        <span class="product__initial-price">$325.00</span>
                                    </div>
                                </a>
                            </li>
                            <li class="product__item">
                                <a href="" class="product__link">
                                    <span class="product__promotion">-5%</span>
                                    <img src="{{ asset('client/images/product-9.png') }}" alt="" class="product__image">
                                    <div class="product__info">
                                        <span class="product__category">Jordan</span>
                                        <span class="product__name">Air Jordan 3 SK NRG</span>
                                    </div>
                                    <div class="product__review-wrap">
                                        <span class="product__rating">
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </span>
                                        <span class="product__review">(5 reviews)</span>
                                    </div>
                                    <div class="product__price">
                                        <span class="product__promotion-price">$309.00</span>
                                        <span class="product__initial-price">$325.00</span>
                                    </div>
                                </a>
                            </li>
                            <li class="product__item">
                                <a href="" class="product__link">
                                    <span class="product__promotion">-5%</span>
                                    <img src="{{ asset('client/images/product-10.png') }}" alt="" class="product__image">
                                    <div class="product__info">
                                        <span class="product__category">Nike</span>
                                        <span class="product__name">Air Max 1/97 VF SW</span>
                                    </div>
                                    <div class="product__review-wrap">
                                        <span class="product__rating">
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </span>
                                        <span class="product__review">(5 reviews)</span>
                                    </div>
                                    <div class="product__price">
                                        <span class="product__promotion-price">$309.00</span>
                                        <span class="product__initial-price">$325.00</span>
                                    </div>
                                </a>
                            </li>
                            <li class="product__item">
                                <a href="" class="product__link">
                                    <span class="product__promotion">-5%</span>
                                    <img src="{{ asset('client/images/product-11.png') }}" alt="" class="product__image">
                                    <div class="product__info">
                                        <span class="product__category">Adidas</span>
                                        <span class="product__name">Yeezy Boost 700</span>
                                    </div>
                                    <div class="product__review-wrap">
                                        <span class="product__rating">
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </span>
                                        <span class="product__review">(5 reviews)</span>
                                    </div>
                                    <div class="product__price">
                                        <span class="product__promotion-price">$309.00</span>
                                        <span class="product__initial-price">$325.00</span>
                                    </div>
                                </a>
                            </li>
                            <li class="product__item">
                                <a href="" class="product__link">
                                    <span class="product__promotion">-5%</span>
                                    <img src="{{ asset('client/images/product-12.png') }}" alt="" class="product__image">
                                    <div class="product__info">
                                        <span class="product__category">Jordan</span>
                                        <span class="product__name">Air Jordan 18 Retro</span>
                                    </div>
                                    <div class="product__review-wrap">
                                        <span class="product__rating">
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </span>
                                        <span class="product__review">(5 reviews)</span>
                                    </div>
                                    <div class="product__price">
                                        <span class="product__promotion-price">$309.00</span>
                                        <span class="product__initial-price">$325.00</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </section>
                </main>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/client.js') }}"></script>
</body>
</html>
