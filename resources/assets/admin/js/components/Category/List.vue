<template>
	<VTable
		table="categories"
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
