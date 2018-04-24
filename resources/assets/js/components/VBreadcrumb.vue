<template>
	<ul class="breadcrumb">
		<li class="breadcrumb__item" :class="{ 'active': index >= breadcrumbs.length - 1 }" v-for="(breadcrumb, index) in breadcrumbs">
			<router-link v-if="index < breadcrumbs.length - 1" :to="breadcrumb.path">{{ breadcrumb.name }}</router-link>
			<span v-else>{{ breadcrumb.name }}</span>
		</li>
	</ul>
</template>

<script>
	export default {
		computed: {
			breadcrumbs() {
				let path = ''
				let breadcrumbs = []
				let pathArray = (this.$route.path).split('/')
				let breadcrumbArray = (this.$route.matched[0].meta.breadcrumbs || '').split('/')

				for (let i = 1; i < pathArray.length; i++)
				{
					let name = (breadcrumbArray[i] || pathArray[i])

					name = name.charAt(0).toUpperCase() + name.slice(1)
					path  += '/'  + name
					breadcrumbs.push({ name: name, path: path })
				}

				return breadcrumbs
			}
		}
	}
</script>
