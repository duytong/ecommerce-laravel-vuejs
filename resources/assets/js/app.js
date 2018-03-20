import VueRouter from 'vue-router';
import router from './routes';
import VeeValidate from 'vee-validate';

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

Vue.use(VueRouter);
Vue.use(VeeValidate);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('breadcrumb', require('./components/Breadcrumb.vue'));
Vue.component('v-table', require('./components/Table.vue'));
Vue.component('v-form', require('./components/Form.vue'));

const app = new Vue({
	el: '#app',
	router
});

router.afterEach(route => {
	document.title = route.meta.title
})
