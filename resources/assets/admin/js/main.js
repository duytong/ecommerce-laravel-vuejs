import Vue from 'vue'
import App from './App.vue'
import router from './router'
import VueProgressbar from 'vue-progressbar'
import VeeValidate from 'vee-validate'
import Custom from './custom'
import Polyfill from './polyfill'

require('./bootstrap')
require('es6-promise').polyfill()

Vue.use(VueProgressbar, {
	color: '#18FFFF'
})

const config = {
	aria: false,
  classNames: {},
  classes: false,
  delay: 0,
  dictionary: null,
  errorBagName: 'errors', // change if property conflicts
  events: 'input|blur',
  fieldsBagName: 'fields',
  i18n: null, // the vue-i18n plugin instance
  i18nRootKey: 'validations', // the nested key under which the validation messages will be located
  inject: true,
  locale: 'en',
  strict: true,
  validity: false,
}


Vue.use(VeeValidate, config)

Vue.component('login', require('./components/Login.vue'))
Vue.component('TheHeader', require('./components/TheHeader.vue'))
Vue.component('TheNavbar', require('./components/TheNavbar.vue'))
Vue.component('VTable', require('./components/VTable.vue'))
Vue.component('VModal', require('./components/VModal.vue'))
Vue.component('VForm', require('./components/VForm.vue'))

new Vue({
	router,
	render: h => h(App),
	mounted() {
		this.$Progress.finish()
	},
	created() {
		this.$Progress.start()

		this.$router.beforeEach((to, from, next) => {
			if (to.meta.progress !== undefined) {
				let meta = to.meta.progress
				this.$Progress.parseMeta(meta)
			}

			this.$Progress.start()
			next()
		})

		this.$router.afterEach((to, from) => {
			this.$Progress.finish()
		})
	}
}).$mount('#app')
