<template>
	<div class="grid grid--show">
		<div class="card">
			<div class="card__body">
				<div class="info">
					<div class="info__main-title">{{ role.display_name }}</div>
					<div class="info__sub-title">({{ role.name }})</div>
					<div class="info__icon">
						<i class="fas fa-shield-alt"></i>
					</div>
					<div class="info__description">{{ role.description }}</div>
					<router-link :to="{ name: 'roles-edit', params: role.id }" class="btn btn--success">Edit Role</router-link>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {

		data() {
			return {
				role: {},
				permissions: []
			}
		},
		created() {
			this.fetchRole()
		},
		methods: {
			fetchRole() {
				axios.get(`api/admin/roles/${ this.$route.params.id }`).then(response => {
					this.role = response.data.role
					this.role.created_at = response.data.created_at
					this.role.updated_at = response.data.updated_at
					this.permissions = response.data.permissions.display_name
				})
			}
		}
	}
</script>
