import VueRouter from 'vue-router'

const routes = [
	
	// Dashboard.
	{
		path: '/',
		component: require('./components/Dashboard/Index'),
		meta: { title: 'Dashboard' }
	},

	// Users.
	{
		path: '/users',
		component: require('./components/User/Index'),
		meta: { title: 'User' }
	},
	{
		path: '/users/create',
		component: require('./components/User/Create'),
		meta: {
			title: 'Create',
			breadcrumb: 'User/Create'
		}
	},
	{
		path: '/users/:id',
		component: require('./components/User/Show'),
		meta: {
			title: 'Show',
			breadcrumb: 'User/Show'
		}
	},
	{
		path: '/users/:id/edit',
		component: require('./components/User/Edit'),
		meta: {
			title: 'Edit',
			breadcrumb: 'User/Edit'
		}
	},

	// Roles.
	{
		path: '/roles',
		name: 'roles',
		meta: { title: 'Roles' },
		component: require('./components/Role/Index')
	},
	{
		path: '/roles/create',
		name: 'roles-create',
		meta: {
			title: 'Create',
			breadcrumb: 'Role/Create'
		},
		component: require('./components/Role/Create')
	},
	{
		path: '/roles/:id',
		name: 'roles-show',
		meta: {
			title: 'Show',
			breadcrumb: 'Role/Show'
		},
		component: require('./components/Role/Show')
	},
	{
		path: '/roles/:id/edit',
		name: 'roles-edit',
		meta: {
			title: 'Edit',
			breadcrumb: 'Role/Edit'
		},
		component: require('./components/Role/Edit')
	},

	// Permissions.
	{
		path: '/permissions',
		component: require('./components/Permission/Index'),
		meta: { title: 'Permission' }
	},
	{
		path: '/permissions/create',
		component: require('./components/Permission/Create'),
		meta: {
			title: 'Create',
			breadcrumb: 'Permission/Create'
		}
	},
	{
		path: '/permissions/:id',
		component: require('./components/Permission/Show'),
		meta: {
			title: 'Show',
			breadcrumb: 'Permission/Show'
		}
	},
	{
		path: '/permissions/:id/edit',
		component: require('./components/Permission/Edit'),
		meta: {
			title: 'Edit',
			breadcrumb: 'Permission/Edit'
		}
	},

	// Categories.
	{
		path: '/categorys',
		component: require('./components/Category/Index'),
		meta: { title: 'Category' }
	},

	// Products.
	{
		path: '/products',
		component: require('./components/Product/Index'),
		meta: { title: 'Product' }
	},

	// Tag.
	{
		path: '/tags',
		component: require('./components/Tag/Index'),
		meta: { title: 'Tag' }
	},

	// Orders.
	{
		path: '/orders',
		component: require('./components/Order/Index'),
		meta: { title: 'Order' }
	},

	// Transactions.
	{
		path: '/transactions',
		component: require('./components/Transaction/Index'),
		meta: { title: 'Transaction' }
	},

	// Contacts.
	{
		path: '/contacts',
		component: require('./components/Contact/Index'),
		meta: { title: 'Contact' }
	},

	// Notifications.
	{
		path: '/notifications',
		component: require('./components/Notification/Index'),
		meta: { title: 'Notification' }
	}
]

export default new VueRouter({
	routes
})
