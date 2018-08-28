<template>
  <div class="auth">
    <div class="auth__illustration">
      <img src="assets/images/auth-illustration.svg">
    </div>
    <div
      class="auth__content"
      :class="{ 'signing-up': signingUp }"
    >
      <span class="auth__title">Đăng nhập</span>
      <span class="auth__description">Vui lòng nhập thông tin xác thực</span>
      <form
        class="form"
        autocomplete="off"
        novalidate
        @submit.prevent='login'
      >
        <div
          class="form__group form__group--column"
          :class="{ 'form__group--invalid': errors.has('email') || loginErrors }"
        >
          <div class="form__input">
            <input
              name="email"
              data-vv-as="Email"
              autofocus
              required
              ref="email"
              v-validate="'required|email'"
              v-model="credentials.email"
            >
            <label>Email</label>
            <div
              class="form__icon"
              v-if="credentials.email && !errors.has('email')"
              @click="clearInputField('email')"
            >
              <div class="tooltip tooltip--top">
                <i class="fas fa-times-circle"></i>
                <span class="tooltip__content">Xóa</span>
              </div>
            </div>
            <div
              class="form__icon form__icon--invalid"
              v-if="errors.has('email') || loginErrors"
            >
              <div class="tooltip tooltip--top">
                <i class="fas fa-exclamation-circle"></i>
                <span class="tooltip__content">Lỗi</span>
              </div>
            </div>
          </div>
          <div
            class="form__invalid-text"
            v-if="errors.has('email') || loginErrors"
          >
            <span>{{ errors.first('email') || loginErrors }}</span>
          </div>
        </div>
        <div
          class="form__group form__group--column"
          :class="{ 'form__group--invalid': errors.has('password') }"
        >
          <div class="form__input">
            <input
              :type="passwordFieldType"
              name="password"
              data-vv-as="Mật khẩu"
              autofocus
              required
              ref="password"
              v-validate="'required'"
              v-model="credentials.password"
            >
            <label>Mật khẩu</label>
            <div
              class="form__icon"
              v-if="credentials.password && !errors.has('password')"
              @click="clearInputField('password')"
            >
              <div class="tooltip tooltip--top">
                <i class="fas fa-times-circle"></i>
                <span class="tooltip__content">Xóa</span>
              </div>
            </div>
            <div
              class="form__icon form__icon--invalid"
              v-if="errors.has('password')"
            >
              <div class="tooltip tooltip--top">
                <i class="fas fa-exclamation-circle"></i>
                <span class="tooltip__content">Lỗi</span>
              </div>
            </div>
          </div>
          <div
            class="form__invalid-text"
            v-if="errors.has('password')"
          >
            <span>{{ errors.first('password') }}</span>
          </div>
          <div
            class="form__helper-text form__helper-text--right"
            v-if="credentials.password"
          >
            <span
              class="pointer"
              @click="tooglePasswordVisibility"
            >
              {{ passwordStates }}
            </span>
          </div>
        </div>
        <div class="form__group form__group--between">
          <a href="password/reset">Quên mật khẩu?</a>
          <button
            type="submit"
            class="btn btn--main"
            :disabled="!credentials.email || !credentials.password || errors.any()"
          >
            Đăng nhập
          </button>
        </div>
        <div class="form__group form__group--item-full">
          <div class="separator">
            <div class="separator__line"></div>
            <span class="separator__text">hoặc đăng nhập với</span>
            <div class="separator__line"></div>
          </div>
        </div>
        <div class="form__group form__group--item-full">
          <a
            href="login/facebook"
            class="btn btn--icon btn--facebook"
            @click.prevent="showPopup"
          >
            <i class="fab fa-facebook-f"></i>
            <span>Facebook</span>
          </a>
          <a
            href="login/google"
            class="btn btn--icon btn--google"
            @click.prevent="showPopup"
          >
            <i class="fab fa-google"></i>
            <span>Google</span>
          </a>
        </div>
        <span>Không có tài khoản?<a href="signup"> Đăng ký</a></span>
      </form>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        passwordFieldType: 'password',
        credentials: {
          email: '',
          password: ''
        },
        signingIn: false,
        loginErrors: ''
      }
    },
    computed: {
      passwordStates() {
        return this.passwordFieldType === 'password' ? 'Hiện mật khẩu' : 'Ẩn mật khẩu'
      }
    },
    methods: {
      clearInputField(field) {
        this.credentials[field] = ''
        this.$refs[field].focus()
      },
      tooglePasswordVisibility() {
        this.passwordFieldType = this.passwordFieldType === 'password' ? 'text' : 'password'
      },
      login() {
        this.$validator.validateAll().then(result => {
          if (result) {
            this.$Progress.start()
            this.signingIn = true

            axios.post('login', this.credentials).then(response => {
              this.$Progress.finish()
              this.signingIn = false
              window.location.href = response.data.redirectPath
            }, error => {
              this.$Progress.fail()
              this.signingIn = false
              this.loginErrors = error.response.data.errors.email[0]
              this.$refs.email.focus()
            })
          }
        })
      }
    }
  }
</script>
