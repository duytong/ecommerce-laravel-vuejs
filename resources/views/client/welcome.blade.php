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
        <div class="header">
            <div class="header__grid">
                <div class="header__column">
                    <a href="" class="header__brand">
                        <img src="{{ asset('client/images/logo.png') }}" alt="">
                    </a>
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
                        @if (Auth::check())
                            <div class="dropdown">
                                <a href="" class="dropdown__toggle">
                                    <img src="{{ asset('client/images/logo.jpg') }}" alt="" class="avatar">
                                    <span class="user-profile__name">{{ Auth::user()->name }}</span>
                                </a>
                                <div class="dropdown__menu">
                                    <a href="" class="dropdown__item">Account</a>
                                    <a href="" class="dropdown__item">Orders</a>
                                    <a href="" class="dropdown__item">Favorites</a>
                                    <a href="" class="dropdown__item">Comments</a>
                                    <div class="dropdown__divider"></div>
                                    <a href="{{ route('logout') }}" class="dropdown__item">Log out</a>
                                </div>
                            </div>
                        @else
                            <button class="btn btn--light btn--modal" @click="showModal('login')">Log in</button>
                            <button class="btn btn--blue btn--modal" @click="showModal('signup')">Sign up</button>
                        @endif
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
        
        {{-- <main>
            <div class="container">
                <div class="login">
                    <div class="login__card">
                        <div class="login__heading">
                            <span class="login__title">Log in</span>
                            <span>Welcome back</span>
                        </div>
                        <form action="" class="form">
                            <div class="form__group">
                                <label class="form__label">Email</label>
                                <input type="text" class="form__control" name="email" placeholder="Please enter your email">
                            </div>
                            <div class="form__group">
                                <label class="form__label">Password</label>
                                <input type="password" class="form__control" name="password" placeholder="Please enter your password">
                            </div>
                            <button type="submit" class="btn btn--primary">Log in</button>
                        </form>
                        <a href="">Forgot password?</a>
                        <div class="login__footer">
                            <a href="">Don't have an account, <span class="text-success">Sign up</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </main> --}}

    

         {{-- <footer class="footer-page">
            
        </footer> --}}

        <!-- Template for the modal component -->
        <script type="text/x-template" id="modal-template">
            <transition name="modal">
                <div class="modal">
                    <div class="modal__content">
                        <a class="modal__close" @click="$emit('close')">
                            <i class="far fa-times"></i>
                        </a>
                        <div class="modal__header">
                            <slot name="header"></slot>
                        </div>
                        <div class="modal__body">
                            <slot name="body"></slot>
                        </div>
                        <div class="modal__footer">
                            <slot name="footer"></slot>
                        </div>
                    </div>
                </div>
            </transition>
        </script>

        <!-- Modal login -->
        <v-modal v-if="modalName === 'login'" @close="modalName = null">
            <div class="login-heading" slot="header">
                <span class="auth-title">Log in</span>
                <span>Welcome back</span>
            </div>
            <div slot="body">
                <form class="form" @submit.prevent="login">
                    <p class="alert alert--danger" v-if="loginError">@{{ loginError }}</p>
                    <div class="form__group" :class="{ 'form__group--invalid': errors.has('email') }">
                        <label class="form__label">Email</label>
                        <input class="form__control" name="email" v-model="user.email" v-validate="'required|email'" placeholder="Please enter your email">
                        <span class="form__invalid-feedback" v-if="errors.has('email')">@{{ errors.first('email') }}</span>
                    </div>
                    <div class="form__group" :class="{ 'form__group--invalid': errors.has('password') }">
                        <label class="form__label">Password</label>
                        <input type="password" class="form__control" name="password" v-model="user.password" v-validate="'required|between:6,32'" placeholder="Please enter your password">
                        <span class="form__invalid-feedback" v-if="errors.has('password')">@{{ errors.first('password') }}</span>
                    </div>
                    <a href="" class="forgot-password">Forgot password?</a>
                    <button type="submit" class="btn btn--teal">Log in</button>
                </form>
                <div class="my-1 text-center">Or log in with</div>
                <div class="d-flex justify-content-between">
                    <a href="" class="btn btn--social btn--facebook">
                        <i class="fab fa-facebook-f"></i>
                        <span class="btn__text">Facebook</span>
                    </a>
                    <a href="" class="btn btn--social btn--google">
                        <i class="fab fa-google"></i>
                        <span class="btn__text">Google</span>
                    </a>
                </div>
            </div>
            <div slot="footer">
                <a href="" class="suggested" @click.prevent="showModal('signup')">Don't have an account? <span class="text-success">Sign up</span></a>
            </div>
        </v-modal>

         <!-- Modal signup -->
        <v-modal v-if="modalName === 'signup'" @close="modalName = null">
            <div class="login-heading" slot="header">
                <span class="auth-title">Sign up</span>
                <span>Give us some valuable information</span>
            </div>
            <div slot="body">
                <form action="{{ route('signup') }}" method="POST" class="form">
                    {{ csrf_field() }}
                    <div class="form__group">
                        <label class="form__label">Name</label>
                        <input type="text" class="form__control" name="name" placeholder="First and last name">
                    </div>
                    <div class="form__group">
                        <label class="form__label">Email</label>
                        <input type="text" class="form__control" name="email" placeholder="Please enter email">
                    </div>
                    <div class="form__group">
                        <label class="form__label">Password</label>
                        <input type="password" class="form__control" name="password" placeholder="Must be at least 6 characters">
                    </div>
                    <button type="submit" class="btn btn--teal">Sign up</button>
                </form>
                <div class="my-1 text-center">Or sign up with</div>
                <div class="d-flex justify-content-between">
                    <a href="" class="btn btn--social btn--facebook">
                        <i class="fab fa-facebook-f"></i>
                        <span class="btn__text">Facebook</span>
                    </a>
                    <a href="" class="btn btn--social btn--google">
                        <i class="fab fa-google"></i>
                        <span class="btn__text">Google</span>
                    </a>
                </div>
            </div>
            <div slot="footer">
                <a href="" class="suggested" @click.prevent="showModal('login')">Already have an account? <span class="text-primary">Log in</span></a>
            </div>
        </v-modal>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/client/app.js') }}"></script>
</body>
</html>
