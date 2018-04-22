<aside class="aside">
    <div class="logo">
        <img src="{{ asset('server/images/logo.png') }}" alt="" class="logo__image">
        <span class="logo__text">Ecommerce</span>
    </div>
    <ul class="navbar">
        <section class="navbar__section">
            <div class="navbar__heading">Main</div>
            <li>
                <router-link to="/dashboard" class="navbar__link" data-toggle="tooltip" data-title="Dashboard">
                    <i class="fal fa-chart-pie"></i>
                    <span class="navbar__text">Dashboard</span>
                </router-link>
            </li>
            <li>
                <router-link to="/chart" class="navbar__link" data-toggle="tooltip" data-title="Chart">
                    <i class="fal fa-chart-bar"></i>
                    <span class="navbar__text">Chart</span>
                </router-link>
            </li>
        </section>
        <section class="navbar__section">
            <div class="navbar__heading">Library</div>
            <li>
                <router-link to="/users" class="navbar__link" data-toggle="tooltip" data-title="User">
                    <i class="fal fa-user"></i>
                    <span class="navbar__text">User</span>
                </router-link>
            </li>
            <li>
                <router-link to="/roles" class="navbar__link" data-toggle="tooltip" data-title="Role">
                    <i class="fal fa-shield-alt"></i>
                    <span class="navbar__text">Role</span>
                </router-link>
            </li>
            <li>
                <router-link to="/permissions" class="navbar__link" data-toggle="tooltip" data-title="Permission">
                    <i class="fal fa-magic"></i>
                    <span class="navbar__text">Permission</span>
                </router-link>
            </li>
            <li>
                <router-link to="/categorys" class="navbar__link" data-toggle="tooltip" data-title="Category">
                    <i class="fal fa-window-restore"></i>
                    <span class="navbar__text">Category</span>
                </router-link>
            </li>
            <li>
                <router-link to="/products" class="navbar__link" data-toggle="tooltip" data-title="Product">
                    <i class="fal fa-book"></i>
                    <span class="navbar__text">Product</span>
                </router-link>
            </li>
            <li>
                <router-link to="/tags" class="navbar__link" data-toggle="tooltip" data-title="Tag">
                    <i class="fal fa-tag"></i>
                    <span class="navbar__text">Tag</span>
                </router-link>
            </li>
            <li>
                <router-link to="/orders" class="navbar__link" data-toggle="tooltip" data-title="Order">
                    <i class="fal fa-suitcase"></i>
                    <span class="navbar__text">Order</span>
                </router-link>
            </li>
            <li>
                <router-link to="/transactions" class="navbar__link" data-toggle="tooltip" data-title="Transaction">
                    <i class="fal fa-archive"></i>
                    <span class="navbar__text">Transaction</span>
                </router-link>
            </li>
            <li>
                <a href="" class="navbar__link" data-toggle="tooltip" data-title="Contact">
                    <i class="fal fa-envelope"></i>
                    <span class="navbar__text">Contact</span>
                </a>
            </li>
        </section>
    </ul>
</aside>
