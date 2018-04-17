<template>
	<v-form>
		<permission-form slot="content"></permission-form>
	</v-form>
</template>

<script>
	import Form from './Form'

	export default {
		components: {
			PermissionForm: Form
		}
	}
</script>
