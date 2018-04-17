<template>
	<div class="landing-page">
		<div class="grid">
			<div class="signup">
	        <div class="signup__header">
	        	<a href="">
	        		<img src="images/logo.jpg" alt="" class="logo">
	        	</a>
	            <h2 class="signup__title">Sign up</h2>
	            <p class="signup__description">Give us some valuable information.</p>
	        </div>
	        <div class="signup__body">
	            <form action="" method="POST">
	                <div class="form-group" :class="{'has-error': errors.has('name')}">
	                    <label for="name">Name</label>
	                    <input type="text" id="name" class="form-control" name="name"
	                    	v-model="name"
	                    	v-validate="'required'">
	                    <span class="invalid-feedback" v-if="errors.has('name')">
	                    	<strong>{{ errors.first('name') }}</strong>
	                    </span>
	                </div>
	                <div class="form-group" :class="{'has-error': errors.has('email')}">
	                    <label for="email">Email</label>
	                    <input type="text" id="email" class="form-control" name ="email"
	                    	v-model="email"
	                    	v-validate="'required|email'">
	                    <span class="invalid-feedback" v-if="errors.has('email')">
	                    	<strong>{{ errors.first('email') }}</strong>
	                    </span>
	                </div>
	                <div class="form-group" :class="{'has-error': errors.has('password')}">
	                    <label for="password">Password</label>
	                    <input type="password" id="password" class="form-control" name="password"
	                    	v-model="password"
	                    	v-validate="'required|min:6'">
	                    <span class="invalid-feedback" v-if="errors.has('password')">
	                    	<strong>{{ errors.first('password') }}</strong>
	                    </span>
	                </div>
	                <div class="form-group">
	                    <button type="submit" class="btn btn--signup">Sign up</button>
	                </div>
	            </form>
	        </div>
	        <div class="signup__footer">
	            <span>Already have an account? <a href="" class="login-link">Log in</a></span>
	        </div>
	    	</div>
		</div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				name: '',
				email: '',
				password: ''
			}
		},
		methods: {
			validate() {
			}
		}
	}
</script>
