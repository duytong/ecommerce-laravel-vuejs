<template>
  <div class="navbar">
    <div class="container">
      <ul class="navbar__list">
        <li>
          <router-link
            to="/"
            exact
            class="navbar__link"
          >
            <i class="fas fa-home"></i>
            <span>Home</span>
          </router-link>
        </li>
        <li>
          <router-link
            to="/users"
            class="navbar__link"
          >
            <i class="fas fa-users"></i>
            <span>Users</span>
          </router-link>
        </li>
        <li>
          <router-link
            to="/roles"
            class="navbar__link"
          >
            <i class="fas fa-shield-alt"></i>
            <span>Roles</span>
          </router-link>
        </li>
        <li>
          <router-link
            to="/permissions"
            class="navbar__link"
          >
            <i class="fas fa-medal"></i>
            <span>Permissions</span>
          </router-link>
        </li>
        <li>
          <router-link
            to="/categories"
            class="navbar__link"
          >
            <i class="fas fa-layer-group"></i>
            <span>Categories</span>
          </router-link>
        </li>
        <li>
          <router-link
            to="/products"
            class="navbar__link"
          >
            <i class="fas fa-laptop"></i>
            <span>Products</span>
          </router-link>
        </li>
        <li>
          <router-link
            to="/a"
            class="navbar__link"
          >
            <i class="fas fa-clipboard-list"></i>
            <span>Orders</span>
          </router-link>
        </li>
        <li>
          <router-link
            to="/a"
            class="navbar__link"
          >
            <i class="fas fa-credit-card"></i>
            <span>Payments</span>
          </router-link>
        </li>
      </ul>
    </div>
  </div>
</template>
