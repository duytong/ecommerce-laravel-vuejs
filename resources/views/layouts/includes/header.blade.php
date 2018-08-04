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
