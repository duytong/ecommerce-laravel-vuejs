<template>
	<div
		class="form__icon"
		:class="formIconClass"
		@click="clearInputField(inputName)"
	>
		<div class="tooltip tooltip--top">
			<i
				class="fas"
				:class="iconClass"
			>
			</i>
			<span class="tooltip__content">{{ tooltipContent }}</span>
		</div>
	</div>
</template>

<script>
	export default {
		props: {
			tooltipType: {
				type: String,
				required: true
			},
			inputName: {
				type: String,
				required: true
			}
		},
		computed: {
			formIconClass() {
				return this.tooltipType === 'invalid' ? 'form__icon--invalid' : ''
			},
			iconClass() {
				return this.tooltipType === 'invalid' ? 'fa-exclamation-circle' : 'fa-times-circle'
			},
			tooltipContent() {
				return this.tooltipType === 'invalid' ? 'There was an error' : 'Clear input field'
			}
		},
		methods: {
			clearInputField(inputName) {
				this.$emit('clearInputField', inputName)
			}
		}
	}
</script>
