<template>
	<v-card>
		<role-form slot="content"></role-form>
	</v-card>
</template>

<script>
	import Form from './Form'

	export default {
		components: {
			RoleForm: Form
		}
	}
</script>
