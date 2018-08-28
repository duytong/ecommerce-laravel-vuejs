<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Login</div>

          <div class="card-body">
            <form @submit.prevent='login'>

              <div class="form-group row">
                <label class="col-sm-4 col-form-label text-md-right">E-Mail Address</label>

                <div class="col-md-6">
                  <input
                    name="email"
                    autocomplete="off"
                    autofocus
                    v-validate="{
                      required: true,
                      email: true
                    }"
                    v-model="credentials.email"
                    :class="{
                      'form-control': true,
                      'is-invalid': errors.has('email') || loginErrors.length
                    }"
                  >

                  <span
                    class="invalid-feedback"
                    v-if="errors.has('email') || loginErrors.length"
                  >
                    <strong>{{ errors.first('email') || loginErrors[0] }}</strong>
                  </span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">Password</label>

                <div class="col-md-6">
                  <input
                    type="password"
                    name="password"
                    v-validate="'required'"
                    v-model="credentials.password"
                    :class="{
                      'form-control': true,
                      'is-invalid': errors.has('password')
                    }"
                  >

                  <span
                    class="invalid-feedback"
                    v-if="errors.has('password')"
                  >
                    <strong>{{ errors.first('password') }}</strong>
                  </span>
                </div>
              </div>

              <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                  <button
                    type="submit"
                    class="btn btn-primary"
                  >
                    Login
                  </button>

                  <a
                    class="btn btn-link"
                    href="password/reset"
                  >
                    Forgot Your Password?
                  </a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        credentials: {},
        loginErrors: []
      }
    },
    methods: {
      login() {
        this.$validator.validateAll().then(result => {
          if (result) {
            this.$Progress.start()

            axios.post('login', this.credentials).then(response => {
              this.$Progress.finish()
              window.location.href = response.data.redirectPath
            }, error => {
              this.$Progress.fail()
              this.loginErrors = error.response.data.errors.email
            })
          }
        })
      }
    }
  }
</script>
