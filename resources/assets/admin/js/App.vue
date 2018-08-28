<template>
	<div id="app">
		<TheHeader :authenticated-user="authenticatedUser"/>
		<TheNavbar/>
		<div class="main">
			<div class="container">
				<router-view/>
			</div>
		</div>
		<vue-progress-bar/>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				authenticatedUser: {}
			}
		},
		created() {
			// this.getAuthenticatedUser()
		},
		methods: {
			getAuthenticatedUser() {
				axios.get('api/authenticated').then(response => {
					this.authenticatedUser = response.data
					console.log(this.authenticatedUser)
				})
			}
		}
	}
</script>
