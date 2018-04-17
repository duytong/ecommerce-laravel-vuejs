<template>
	<v-table api-name="users" :fields="fields">
		<router-link
			to="/users/create"
			class="btn btn--primary"
			slot="button-create"
		>
			Add user
		</router-link>
	</v-table>
</template>

<script>
	export default {
		data() {
			return {
				fields: [
					{
						key: 1,
						title: 'Id',
						name: 'id'
					},
					{
						key: 2,
						title: 'Name',
						name: 'name'
					},
					{
						key: 3,
						title: 'Email',
						name: 'email'
					}
				]
			}
		}
	}
</script>
