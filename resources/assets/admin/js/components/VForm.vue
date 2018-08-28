<template>
	<div class="row row--center">
		<div class="card">
			<div class="card__header">{{ action }} {{ table }}</div>
			<div class="card__body">
				<slot name="content"></slot>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		props: {
			table: {
				type: String,
				required: true
			},
			action: {
				type: String,
				required: true
			}
		}
	}
</script>
