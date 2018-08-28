import Vue from 'vue'
import VueProgressbar from 'vue-progressbar'
import VeeValidate, { Validator } from 'vee-validate'
import vi from 'vee-validate/dist/locale/vi'

require('./bootstrap')
require('es6-promise').polyfill()

Vue.use(VueProgressbar, {
	color: '#42b983'
})

Validator.localize({ vi: vi })

const config = {
	aria: false,
	events: 'input|blur',
	locale: 'vi'
}

Vue.use(VeeValidate, config)

Vue.component('signup', require('./components/Signup.vue'))
Vue.component('login', require('./components/Login.vue'))

new Vue({
	el: '#app'
})
