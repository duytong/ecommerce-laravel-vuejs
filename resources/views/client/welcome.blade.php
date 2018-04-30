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
        <div class="header">
            <div class="container">
                <div class="header__inner">
                    <a href="" class="header__brand">Laravel</a>
                    <div class="header__search">
                        <form action="" class="form form--search">
                            <input class="form__control" placeholder="Search for shoes">
                            <button type="submit" class="btn">
                                <i class="fal fa-search"></i>
                            </button>
                            <a href="" class="js-hide-search-mobile">
                                <i class="fal fa-times"></i>
                            </a>
                        </form>
                    </div>
                    <div class="header__navbar">
                        <a href="" class="js-open-search-mobile">
                            <i class="fal fa-search"></i>
                        </a>
                        <a href="" class="btn btn--default">Log In</a>
                        <a href="" class="btn btn--primary">Sign Up</a>
                        <div class="divider-vertical"></div>
                        <a href="" class="cart">
                            <i class="fal fa-suitcase"></i>
                            <span class="cart__count">1</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <main>
            <div class="container">
                <div class="grid">
                    <aside class="aside">
                        <div class="filter-categories">
                            <div class="filter-categories__heading">Categories</div>
                            <div class="checkbox">
                                <div class="checkbox__group">
                                    <input type="checkbox" id="nike" class="checkbox__input">
                                    <label for="nike" class="checkbox__label">
                                        <span class="checkbox__text">Nike</span>
                                    </label>
                                </div>
                                <div class="checkbox__group">
                                    <input type="checkbox" id="jordan" class="checkbox__input">
                                    <label for="jordan" class="checkbox__label">
                                        <span class="checkbox__text">Jordan</span>
                                    </label>
                                </div>
                                <div class="checkbox__group">
                                    <input type="checkbox" id="adidas" class="checkbox__input">
                                    <label for="adidas" class="checkbox__label">
                                        <span class="checkbox__text">Adidas</span>
                                    </label>
                                </div>
                                <div class="checkbox__group">
                                    <input type="checkbox" id="footwear" class="checkbox__input">
                                    <label for="footwear" class="checkbox__label">
                                        <span class="checkbox__text">Footwear</span>
                                    </label>
                                </div>
                                <div class="checkbox__group">
                                    <input type="checkbox" id="supreme" class="checkbox__input">
                                    <label for="supreme" class="checkbox__label">
                                        <span class="checkbox__text">Supreme</span>
                                    </label>
                                </div>
                                <div class="checkbox__group">
                                    <input type="checkbox" id="palace" class="checkbox__input">
                                    <label for="palace" class="checkbox__label">
                                        <span class="checkbox__text">Palace</span>
                                    </label>
                                </div>
                                <div class="checkbox__group">
                                    <input type="checkbox" id="apparel" class="checkbox__input">
                                    <label for="apparel" class="checkbox__label">
                                        <span class="checkbox__text">Apparel</span>
                                    </label>
                                </div>
                                <div class="checkbox__group">
                                    <input type="checkbox" id="collectibles" class="checkbox__input">
                                    <label for="collectibles" class="checkbox__label">
                                        <span class="checkbox__text">Collectibles</span>
                                    </label>
                                </div>
                                <div class="checkbox__group">
                                    <input type="checkbox" id="trophy-case" class="checkbox__input">
                                    <label for="trophy-case" class="checkbox__label">
                                        <span class="checkbox__text">Trophy case</span>
                                    </label>
                                </div>
                                <div class="checkbox__group">
                                    <input type="checkbox" id="journal" class="checkbox__input">
                                    <label for="journal" class="checkbox__label">
                                        <span class="checkbox__text">Journal</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="filter-ratings">
                            <div class="filter-ratings__heading">Ratings</div>
                            <a href="" class="filter-ratings__item">
                                <span class="filter-ratings__icon">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </span>
                                <span class="filter-ratings__count">(215)</span>
                            </a>
                             <a href="" class="filter-ratings__item">
                                <span class="filter-ratings__icon">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </span>
                                <span class="filter-ratings__count">(192)</span>
                            </a>
                             <a href="" class="filter-ratings__item">
                                <span class="filter-ratings__icon">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                </span>
                                <span class="filter-ratings__count">(137)</span>
                            </a>
                             <a href="" class="filter-ratings__item">
                                <span class="filter-ratings__icon">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                </span>
                                <span class="filter-ratings__count">(68)</span>
                            </a>
                             <a href="" class="filter-ratings__item">
                                <span class="filter-ratings__icon">
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                </span>
                                <span class="filter-ratings__count">(4)</span>
                            </a>
                        </div>
                        <div class="filter-prices"></div>
                        <div class="filter-sizes"></div>
                        <div class="filter-colors"></div>
                    </aside>
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
                </div>
            </div>
        </main>
        {{-- <footer class="footer-page">
            
        </footer> --}}
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/client/app.js') }}"></script>
</body>
</html>
