<template>
	<div
		class="form__invalid-text"
	>
		<span>{{ invalidText }}</span>
	</div>
</template>

<script>
	export default {
		props: {
			name: {
				type: String,
				required: true
			}
		},
		computed: {
			invalidText() {
				return errors.first(name)
			}
		}
	}
</script>
