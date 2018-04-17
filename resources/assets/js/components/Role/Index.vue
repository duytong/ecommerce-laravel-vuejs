<template>
	<v-table api-name="roles" :fields="fields">
		<template slot="button-create">
			<router-link to="/roles/create" class="btn btn--primary">New role</router-link>
		</template>
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
						title: 'Display Name',
						name: 'display_name'
					},
					{
						key: 4,
						title: 'Description',
						name: 'description'
					}
				]
			}
		}
	}
</script>
