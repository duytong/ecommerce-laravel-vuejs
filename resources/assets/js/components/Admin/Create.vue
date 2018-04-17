<template>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">Create</div>

					<div class="panel-body">
						<form class="form-horizontal">
							<div class="form-group">
								<label for="name" class="col-md-4 control-label">Name</label>

								<div class="col-md-6">
									<input id="name" type="text" class="form-control" v-model="admin.name" required autofocus>
								</div>
							</div>

							<div class="form-group" :class="{'has-error': errors.email}">
								<label for="email" class="col-md-4 control-label">E-Mail Address</label>

								<div class="col-md-6">
									<input id="email" type="email" class="form-control" v-model="admin.email" required>

									<error v-if="errors.email" :errors="errors">{{ errors.email[0] }}</error>
								</div>
							</div>

							<div class="form-group" :class="{'has-error': errors.password}">
								<label for="password" class="col-md-4 control-label">Password</label>

								<div class="col-md-6">
									<input id="password" type="password" class="form-control" v-model="admin.password" required>

									<error v-if="errors.password" :errors="errors">{{ errors.password[0] }}</error>
								</div>
							</div>

							<div class="form-group">
								<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

								<div class="col-md-6">
									<input id="password-confirm" type="password" class="form-control" v-model="admin.password_confirmation" required>
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<button class="btn btn-primary" @click.prevent="create">
										Register
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import error from '../Error'

	export default {
		components: {
			error,
		},
		data() {
			return {
				admin: {
					name: '',
					email: '',
					password: '',
					password_confirmation: '',
				},
				errors: [],
			}
		},
		methods: {
			create() {
				axios.post('api/admins', this.admin)
				.then(response => {
					this.admin = {
						name: '',
						email: '',
						password: '',
						password_confirmation: '',
					}

					this.errors = ''
				})
				.catch(error => {
					// this.errors = error.response.data.errors

					// if (this.errors.password) {
					// 	this.admin.password = ''
					// 	this.admin.password_confirmation = ''
					// }
				})
			}
		}
	}
</script>
