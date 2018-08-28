<template>
  <div class="auth">
    <div class="auth__illustration">
      <img src="assets/images/auth-illustration.svg">
    </div>
    <div
      class="auth__content"
      :class="{ 'signing-up': signingUp }"
    >
      <span class="auth__title">Đăng ký</span>
      <span class="auth__description">Cho chúng tôi một số thông tin</span>
      <form
        class="form"
        autocomplete="off"
        novalidate
        @submit.prevent='signup'
      >
        <div
          class="form__group form__group--column"
          :class="{ 'form__group--invalid': errors.has('name') }"
        >
          <div class="form__input">
            <input
              name="name"
              data-vv-as="Tên"
              autofocus
              required
              ref="name"
              v-validate="'required'"
              v-model="user.name"
            >
            <label>Tên</label>
            <div
              class="form__icon"
              v-if="user.name && !errors.has('name')"
              @click="clearInputField('name')"
            >
              <div class="tooltip tooltip--top">
                <i class="fas fa-times-circle"></i>
                <span class="tooltip__content">Xóa</span>
              </div>
            </div>
            <div
              class="form__icon form__icon--invalid"
              v-if="errors.has('name')"
            >
              <div class="tooltip tooltip--top">
                <i class="fas fa-exclamation-circle"></i>
                <span class="tooltip__content">Lỗi</span>
              </div>
            </div>
          </div>
          <div
            class="form__invalid-text"
            v-if="errors.has('name')"
          >
            <span>{{ errors.first('name') }}</span>
          </div>
        </div>
        <div
          class="form__group form__group--column"
          :class="{ 'form__group--invalid': errors.has('email') || signupErrors }"
        >
          <div class="form__input">
            <input
              name="email"
              data-vv-as="Email"
              autofocus
              required
              ref="email"
              v-validate="'required|email'"
              v-model="user.email"
            >
            <label>Email</label>
            <div
              class="form__icon"
              v-if="user.email && !errors.has('email') && !signupErrors"
              @click="clearInputField('email')"
            >
              <div class="tooltip tooltip--top">
                <i class="fas fa-times-circle"></i>
                <span class="tooltip__content">Xóa</span>
              </div>
            </div>
            <div
              class="form__icon form__icon--invalid"
              v-if="errors.has('email') || signupErrors"
            >
              <div class="tooltip tooltip--top">
                <i class="fas fa-exclamation-circle"></i>
                <span class="tooltip__content">Lỗi</span>
              </div>
            </div>
          </div>
          <div
            class="form__invalid-text"
            v-if="errors.has('email') || signupErrors"
          >
            <span>{{ errors.first('email') || signupErrors }}</span>
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
              v-validate="'required|min:6'"
              v-model="user.password"
            >
            <label>Mật khẩu</label>
            <div
              class="form__icon"
              v-if="user.password && !errors.has('password')"
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
            v-if="user.password.length"
          >
            <span
              class="pointer"
              @click="tooglePasswordVisibility"
            >
              {{ passwordStates }}
            </span>
          </div>
        </div>
        <div class="form__group">
          <span>Bằng cách nhấp vào đăng ký, bạn đồng ý với <a href="terms" @click.prevent="showPopup">Điều khoản</a> của chúng tôi</span>
        </div>
        <div class="form__group form__group--x-center">
          <button
            type="submit"
            class="btn btn--main"
            :disabled="!user.name || !user.email || !user.password || errors.any()"
          >
            Đăng ký
          </button>
        </div>
        <div class="form__group form__group--item-full">
          <div class="separator">
            <div class="separator__line"></div>
            <span class="separator__text">hoặc đăng ký với</span>
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
        <span>Đã có tài khoản?<a href="login"> Đăng nhập</a></span>
      </form>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        passwordFieldType: 'password',
        user: {
          name: '',
          email: '',
          password: ''
        },
        signingUp: false,
        signupErrors: ''
      }
    },
    computed: {
      passwordStates() {
        return this.passwordFieldType === 'password' ? 'Hiện mật khẩu' : 'Ẩn mật khẩu'
      }
    },
    methods: {
      clearInputField(field) {
        this.user[field] = ''
        this.$refs[field].focus()
      },
      tooglePasswordVisibility() {
        this.passwordFieldType = this.passwordFieldType === 'password' ? 'text' : 'password'
      },
      signup() {
        this.$validator.validateAll().then(result => {
          if (result) {
            this.$Progress.start()
            this.signingUp = true

            axios.post('signup', this.user).then(response => {
              this.$Progress.finish()
              this.signingUp = false
              // window.location.href = response.data.redirectPath
            }, error => {
              this.$Progress.fail()
              this.signingUp = false
              this.signupErrors = error.response.data.errors.email[0]
              this.$refs.email.focus()
            })
          }
        })
      },
      showPopup() {
        alert('Trang web đang trong quá trình phát triển, tính năng bạn muốn sử dụng tạm thời chưa có.')
      }
    }
  }
</script>
