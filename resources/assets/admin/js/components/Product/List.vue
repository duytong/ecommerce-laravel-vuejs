<template>
	<VTable
		table="products"
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
						name: 'image',
						displayName: 'Image'
					},
					{
						name: 'initial_price',
						displayName: 'Initial price'
					},
					{
						name: 'promotion_price',
						displayName: 'Promotion price'
					},
					{
						name: 'quantity',
						displayName: 'Quantity'
					},
					{
						name: 'quantity_sold',
						displayName: 'Quantity sold'
					},
					{
						name: 'rating',
						displayName: 'Rating'
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
