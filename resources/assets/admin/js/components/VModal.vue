<template>
	<div
		class="modal"
		:id="modalName"
	>
		<div class="modal__content">
			<div class="modal__header">
				<slot name="header"></slot>
				<a class="modal__close js-hide-modal">
					<i class="fas fa-times"></i>
				</a>
			</div>
			<div class="modal__body">
				<slot name="body"></slot>
			</div>
			<div class="modal__footer">
				<button class="btn btn--secondary js-hide-modal">Cancel</button>
				<slot name="footer"></slot>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		props: {
			modalName: {
				type: String,
				required: true
			}
		}
	}
</script>
