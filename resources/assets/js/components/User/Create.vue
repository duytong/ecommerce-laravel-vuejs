<template>
	<v-form>
		<template slot="form">
			<user-form :user="user" :selected="selected">
        <template slot="button-action">
					<button type="submit" class="btn btn--primary btn--raised">Create User</button>
				</template>
			</user-form>
		</template>
	</v-form>
</template>

<script>
	import UserForm from './Form'

	export default {
		components: { UserForm },
		data() {
      return {
      	user: {},
        selected: []
      }
    }
	}
</script>
