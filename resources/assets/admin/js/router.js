import Vue from 'vue'
import Router from 'vue-router'
import Dashboard from './components/Dashboard.vue'
import Permission from './components/Permission/Index.vue'
import PermissionList from './components/Permission/List.vue'
import PermissionCreate from './components/Permission/Create.vue'
import PermissionShow from './components/Permission/Show.vue'
import PermissionEdit from './components/Permission/Edit.vue'
import Role from './components/Role/Index.vue'
import RoleList from './components/Role/List.vue'
import RoleCreate from './components/Role/Create.vue'
import RoleShow from './components/Role/Show.vue'
import RoleEdit from './components/Role/Edit.vue'
import User from './components/User/Index.vue'
import UserList from './components/User/List.vue'
import UserCreate from './components/User/Create.vue'
import Category from './components/Category/Index.vue'
import CategoryList from './components/Category/List.vue'
import CategoryCreate from './components/Category/Create.vue'
import CategoryShow from './components/Category/Show.vue'
import CategoryEdit from './components/Category/Edit.vue'
import Product from './components/Product/Index.vue'
import ProductList from './components/Product/List.vue'
import ProductCreate from './components/Product/Create.vue'
import ProductShow from './components/Product/Show.vue'
import ProductEdit from './components/Product/Edit.vue'

Vue.use(Router)

const router = new Router({
	// mode: 'history',
	linkActiveClass: 'active',
	linkExactActiveClass: 'exact-active',
	routes: [
		{
			path: '/',
			component: Dashboard,
			meta: {
				title: 'Dashboard'
			}
		},
		{
			path: '/users',
			component: User,
			children: [
				{
					path: '',
					component: UserList,
					meta: {
						title: 'Users'
					},
				},
				{
					path: 'create',
					component: UserCreate,
					meta: {
						title: 'Create user'
					},
				}
			]
		},
		{
			path: '/roles',
			component: Role,
			children: [
				{
					path: '',
					component: RoleList,
					meta: {
						title: 'Roles'
					},
				},
				{
					path: 'create',
					component: RoleCreate,
					meta: {
						title: 'Create role'
					},
				},
				{
					path: ':id',
					component: RoleShow,
					meta: {
						title: 'Show role'
					}
				},
				{
					path: ':id/edit',
					component: RoleEdit,
					meta: {
						title: 'Edit role'
					}
				}
			]
		},
		{
			path: '/permissions',
			component: Permission,
			children: [
				{
					path: '',
					component: PermissionList,
					meta: {
						title: 'Permission'
					},
				},
				{
					path: 'create',
					component: PermissionCreate,
					meta: {
						title: 'Create permission'
					}
				},
				{
					path: ':id',
					component: PermissionShow,
					meta: {
						title: 'Show permission'
					}
				},
				{
					path: ':id/edit',
					component: PermissionEdit,
					meta: {
						title: 'Edit permission'
					}
				}
			]
		},
		{
			path: '/categories',
			component: Category,
			children: [
				{
					path: '',
					component: CategoryList,
					meta: {
						title: 'Category'
					},
				},
				{
					path: 'create',
					component: CategoryCreate,
					meta: {
						title: 'Create category'
					}
				},
				{
					path: ':id',
					component: CategoryShow,
					meta: {
						title: 'Show category'
					}
				},
				{
					path: ':id/edit',
					component: CategoryEdit,
					meta: {
						title: 'Edit category'
					}
				}
			]
		},
		{
			path: '/products',
			component: Product,
			children: [
				{
					path: '',
					component: ProductList,
					meta: {
						title: 'Product'
					},
				},
				{
					path: 'create',
					component: ProductCreate,
					meta: {
						title: 'Create product'
					}
				},
				{
					path: ':id',
					component: ProductShow,
					meta: {
						title: 'Show product'
					}
				},
				{
					path: ':id/edit',
					component: ProductEdit,
					meta: {
						title: 'Edit product'
					}
				}
			]
		}
	]
})

router.afterEach(route => {
	document.title = route.meta.title
})

export default router;
