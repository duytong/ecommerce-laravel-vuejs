<template>
	<VTable
		table="roles"
		:columns="columns"
	>
	</VTable>
</template>

<script>
	export default {
		data() {
			return {
				columns: [
					{
						name: 'id',
						displayName: 'Id'
					},
					{
						name: 'name',
						displayName: 'Name'
					},
					{
						name: 'display_name',
						displayName: 'Display name'
					},
					{
						name: 'description',
						displayName: 'Description'
					},
					{
						name: 'created_at',
						displayName: 'Created at'
					},
					{
						name: 'updated_at',
						displayName: 'Updated at'
					}
				]
			}
		}
	}
</script>
