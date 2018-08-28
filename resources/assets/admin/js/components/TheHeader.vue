<template>
	<div class="header">
		<div class="container">
			<div class="header__wrapper">
				<router-link
					to="/"
					class="header__logo">
					<img src="assets/admin/images/logo.png">
				</router-link>
				<div class="dropdown">
					<a class="dropdown__toggle">
						<span>Administrator</span>
						<i class="fas fa-caret-down"></i>
					</a>
					<div class="dropdown__menu dropdown__menu--right">
						<a
							href="logout"
							class="dropdown__item"
						>
							Log out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		
	}
</script>
