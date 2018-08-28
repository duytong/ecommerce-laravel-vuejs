<template>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="card p-3">
					<ul class="nav nav-pills flex-column">
						<li class="nav-item">
							<router-link class="navlink active" to="/catalog">User</router-link>
						</li>
						<li class="nav-item">
							<router-link class="nav-link" to="/users/create">Category</router-link>
						</li>
						<li class="nav-item">
							<router-link class="nav-link" to="/users/create">Product</router-link>
						</li>
						<li class="nav-item">
							<router-link class="nav-link" to="/users/create">Order</router-link>
						</li>
						<li class="nav-item">
							<router-link class="nav-link" to="/users/create">Transaction</router-link>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-md-9">
				<router-view></router-view>
			</div>
		</div>
	</div>
</template>
