import VeeValidate from 'vee-validate';

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('../bootstrap');

window.Vue = require('vue');

Vue.use(VeeValidate);

Vue.component('v-modal', {
	template: '#modal-template'
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
	el: '#app',
	data: {
		modalName: null,
		user: {},
		loginError: null
	},
	methods: {
		showModal(modalName) {
			this.modalName = modalName
		},
		documentClick(e) {
			let triggerModal = document.querySelector('.btn--modal')
			let modal = document.querySelector('.modal__content')
			let target = e.target

			if (modal) {
				if (target !== triggerModal && !modal.contains(target)) {
					this.modalName = null
				}
			}
		},
		login() {
			this.$validator.validateAll().then(result => {
				if (result) {
					axios.post('api/login', this.user).then(response => {
						if (response.data === 'Success') {
							location.reload()
						} else {
							this.loginError = response.data
						}
					})
				}
			})
		}
	}
});
