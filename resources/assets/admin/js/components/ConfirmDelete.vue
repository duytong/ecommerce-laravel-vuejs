<template>
  <VModal :modal-name="'delete-modal'">
    <span slot="header">Delete {{ singularOrPlural }}</span>
    <template slot="body">Selected {{ singularOrPlural }} will be removed from your database.</template>
    <button
      class="btn btn--danger js-hide-modal"
      slot="footer"
      @click="deleteData(selectedItems)"
    >
      Delete
    </button>
  </VModal>
</template>

<script>
	export default {
		props: {
			table: {
				type: String,
				required: true
			},
			selectedItems: {
				type: Array,
				required: true
			}
		},
		computed: {
			singularOrPlural() {
				return this.selectedItems.length > 1 ? this.table : this.table.slice(0, -1)
			}
		},
		methods: {
			deleteData(selectedItems) {
				this.$emit('deleteData', selectedItems)
			}
		}
	}
</script>
