<!-- Template for the modal component -->
<script type="text/x-template" id="modal-template">
	<transition name="modal">
		<div class="modal">
			<div class="modal__content">
				<a class="modal__close" @click="$emit('close')">
					<i class="far fa-times"></i>
				</a>
				<div class="modal__header">
					<slot name="header"></slot>
				</div>
				<div class="modal__body">
					<slot name="body"></slot>
				</div>
				<div class="modal__footer">
					<slot name="footer"></slot>
				</div>
			</div>
		</div>
	</transition>
</script>

<!-- Modal login -->
<v-modal v-if="modalName === 'login'" @close="modalName = null">
    <div class="login-heading" slot="header">
        <span class="auth-title">Log in</span>
        <span>Welcome back</span>
    </div>
    <div slot="body">
        <form class="form" @submit.prevent="login">
            <p class="alert alert--danger" v-if="loginError">@{{ loginError }}</p>
            <div class="form__group" :class="{ 'form__group--invalid': errors.has('email') }">
                <label class="form__label">Email</label>
                <input class="form__control" name="email" v-model="user.email" v-validate="'required|email'" placeholder="Please enter your email">
                <span class="form__invalid-feedback" v-if="errors.has('email')">@{{ errors.first('email') }}</span>
            </div>
            <div class="form__group" :class="{ 'form__group--invalid': errors.has('password') }">
                <label class="form__label">Password</label>
                <input type="password" class="form__control" name="password" v-model="user.password" v-validate="'required|between:6,32'" placeholder="Please enter your password">
                <span class="form__invalid-feedback" v-if="errors.has('password')">@{{ errors.first('password') }}</span>
            </div>
            <a href="" class="forgot-password">Forgot password?</a>
            <button type="submit" class="btn btn--teal">Log in</button>
        </form>
        <div class="my-1 text-center">Or log in with</div>
        <div class="d-flex justify-content-between">
            <a href="" class="btn btn--social btn--facebook">
                <i class="fab fa-facebook-f"></i>
                <span class="btn__text">Facebook</span>
            </a>
            <a href="" class="btn btn--social btn--google">
                <i class="fab fa-google"></i>
                <span class="btn__text">Google</span>
            </a>
        </div>
    </div>
    <div slot="footer">
        <a href="" class="suggested" @click.prevent="showModal('signup')">Don't have an account? <span class="text-success">Sign up</span></a>
    </div>
</v-modal>

 <!-- Modal signup -->
<v-modal v-if="modalName === 'signup'" @close="modalName = null">
    <div class="login-heading" slot="header">
        <span class="auth-title">Sign up</span>
        <span>Give us some valuable information</span>
    </div>
    <div slot="body">
        <form action="{{ route('signup') }}" method="POST" class="form">
            {{ csrf_field() }}
            <div class="form__group">
                <label class="form__label">Name</label>
                <input type="text" class="form__control" name="name" placeholder="First and last name">
            </div>
            <div class="form__group">
                <label class="form__label">Email</label>
                <input type="text" class="form__control" name="email" placeholder="Please enter email">
            </div>
            <div class="form__group">
                <label class="form__label">Password</label>
                <input type="password" class="form__control" name="password" placeholder="Must be at least 6 characters">
            </div>
            <button type="submit" class="btn btn--teal">Sign up</button>
        </form>
        <div class="my-1 text-center">Or sign up with</div>
        <div class="d-flex justify-content-between">
            <a href="" class="btn btn--social btn--facebook">
                <i class="fab fa-facebook-f"></i>
                <span class="btn__text">Facebook</span>
            </a>
            <a href="" class="btn btn--social btn--google">
                <i class="fab fa-google"></i>
                <span class="btn__text">Google</span>
            </a>
        </div>
    </div>
    <div slot="footer">
        <a href="" class="suggested" @click.prevent="showModal('login')">Already have an account? <span class="text-primary">Log in</span></a>
    </div>
</v-modal>
