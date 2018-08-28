<template>
	<VTable
		table="users"
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
						name: 'email',
						displayName: 'Email'
					},
					{
						name: 'phone_number',
						displayName: 'Phone number'
					},
					{
						name: 'address',
						displayName: 'Address'
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
