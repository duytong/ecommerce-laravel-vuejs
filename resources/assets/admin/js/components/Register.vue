<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Register</div>

          <div class="card-body">
            <form autocomplete="off" @submit.prevent="register">

              <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">Name</label>

                <div class="col-md-6">
                  <input
                    name="name"
                    autofocus
                    v-validate="'required'"
                    v-model="user.name"
                    :class="{
                      'form-control': true,
                      'is-invalid': errors.has('name')
                    }"
                  >

                  <span
                    class="invalid-feedback"
                    v-if="errors.has('name')"
                  >
                    <strong>{{ errors.first('name') }}</strong>
                  </span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                <div class="col-md-6">
                  <input
                    name="email"
                    v-validate="'required|email'"
                    v-model="user.email"
                    :class="{
                      'form-control': true,
                      'is-invalid': errors.has('email') || registerErrors.length
                    }"
                  >

                  <span
                      class="invalid-feedback"
                      v-if="errors.has('email') || registerErrors.length"
                    >
                      <strong>{{ errors.first('email') || registerErrors[0] }}</strong>
                    </span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">Password</label>

                <div class="col-md-6">
                  <input
                    type="password"
                    name="password"
                    v-validate="{
                      required: true,
                      min: 6,
                      confirmed: user.password_confirmation
                    }"
                    v-model="user.password"
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

              <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                <div class="col-md-6">
                  <input
                    type="password"
                    name="password confirmation"
                    v-validate="'required'"
                    v-model="user.password_confirmation"
                    :class="{
                      'form-control': true,
                      'is-invalid': errors.has('password confirmation')
                    }"
                  >

                  <span
                    class="invalid-feedback"
                    v-if="errors.has('password confirmation')"
                  >
                    <strong>{{ errors.first('password confirmation') }}</strong>
                  </span>
                </div>
              </div>

              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button
                    type="submit"
                    class="btn btn-primary"
                  >
                    Register
                  </button>
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
        user: {},
        registerErrors: []
      }
    },
    methods: {
      register() {
        this.$validator.validateAll().then(result => {
          if (result) {
            this.$Progress.start()

            axios.post('register', this.user).then(response => {
              this.$Progress.finish()
              window.location.href = '/'
            }, error => {
              this.$Progress.fail()
              this.registerErrors = error.response.data.errors.email
            })
          }
        })
      }
    }
  }
</script>
