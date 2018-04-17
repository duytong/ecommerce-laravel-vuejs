<template>
	<div>
		<span class="help-block">
			<strong>
				<slot></slot>
			</strong>
		</span>
	</div>
</template>

<script>
	export default {
		props: ['error'],
	}
</script>
