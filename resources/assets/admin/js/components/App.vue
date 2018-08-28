<template>
	<div :class="{
			'wrapper': true,
			'sidebar-open': sidebarToggle
	}">
		<TheSidebar/>
		<div class="main">
			<TheNavbar>
				<a
					class="sidebar-toggle"
					slot="sidebar-toggle"
					@click="sidebarToggle = !sidebarToggle"
				>
					<span></span>
					<span></span>
					<span></span>
				</a>
			</TheNavbar>
			<div class="content">
				<div class="container">
					<router-view></router-view>
				</div>
			</div>
		</div>
		<vue-progress-bar/>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				sidebarToggle: false
			}
		}
	}
</script>
