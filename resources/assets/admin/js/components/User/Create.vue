<template>
	<VForm
		table="user"
		action="create"
	>
		<template slot="content">
			<UserForm :user="user" :selected-roles="selectedRoles">
					<button
						type="submit"
						class="btn btn--primary"
						slot="button"
					>
						Create User
					</button>
			</UserForm>
		</template>
	</VForm>
</template>

<script>
	import UserForm from './Form'

	export default {
		components: { UserForm },
		data() {
		  return {
				user: {},
				selectedRoles: []
		  }
		}
	}
</script>
