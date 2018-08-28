<template>
  <form
    class="form"
    autocomplete="off"
    novalidate
    @submit.prevent="onSubmit"
  >
    <div
      class="form__group"
      :class="{ 'form__group--invalid': errors.has('name') }"
    >
      <div class="form__input">
        <input
          name="name"
          autofocus
          required
          ref="name"
          v-validate="'required'"
          v-model="user.name"
        >
        <label>Name</label>
        <div
          class="form__icon"
          v-if="user.name"
          @click="removeValue('name')"
        >
          <div class="tooltip tooltip--top">
            <i class="fas fa-times-circle"></i>
            <span class="tooltip__content">Clear input</span>
          </div>
        </div>
        <div
          class="form__icon form__icon--invalid"
          v-if="errors.has('name')"
        >
          <div class="tooltip tooltip--top">
            <i class="fas fa-exclamation-circle"></i>
            <span class="tooltip__content">There was an error</span>
          </div>
        </div>
      </div>
      <div class="form__invalid-text">
        <vv-error for="name"></vv-error>
      </div>
    </div>
    <div
      class="form__group"
      :class="{ 'form__group--invalid': errors.has('email') }"
    >
      <div class="form__input">
        <input
          name="email"
          required
          v-validate="'required|email'"
          v-model="user.email"
        >
        <label>Email</label>
        <div
          class="form__icon"
          v-if="user.email && !errors.has('email')"
          @click="removeValue('email')"
        >
          <div class="tooltip tooltip--top">
            <i class="fas fa-times-circle"></i>
            <span class="tooltip__content">Clear input</span>
          </div>
        </div>
        <div
          class="form__icon form__icon--invalid"
          v-if="errors.has('email')"
        >
          <div class="tooltip tooltip--top">
            <i class="fas fa-exclamation-circle"></i>
            <span class="tooltip__content">There was an error</span>
          </div>
        </div>
      </div>
      <div class="form__invalid-text">
        <vv-error for="email"></vv-error>
      </div>
    </div>
    <div
      class="form__group"
      :class="{ 'form__group--invalid': errors.has('password') }"
    >
      <div class="form__input">
        <input
          type="password"
          name="password"
          required
          v-validate="'required|min:6|confirmed:password_confirmation'"
          v-model="user.password"
        >
        <label>Password</label>
        <div
          class="form__icon"
          v-if="user.password && !errors.has('password')"
          @click="removeValue('password')"
        >
          <div class="tooltip tooltip--top">
            <i class="fas fa-times-circle"></i>
            <span class="tooltip__content">Clear input</span>
          </div>
        </div>
        <div
          class="form__icon form__icon--invalid"
          v-if="errors.has('password')"
        >
          <div class="tooltip tooltip--top">
            <i class="fas fa-exclamation-circle"></i>
            <span class="tooltip__content">There was an error</span>
          </div>
        </div>
      </div>
      <div class="form__invalid-text">
        <vv-error for="password"></vv-error>
      </div>
    </div>
    <div class="form__group">
      <div class="form__input">
        <input
          type="password"
          name="password_confirmation"
          required
          ref="password_confirmation"
        >
        <label>Confirm Password</label>
      </div>
    </div>
    <div class="form__button">
      <slot name="button"></slot>
    </div>
  </form>
</template>

<script>
  import toastr from 'toastr'

  export default {
    props: {
      user: {
        type: Object,
        required: true,
        default() {
          return {
            name: '',
            email: '',
            password: ''
          }
        }
      },
      selectedRoles: {
        type: Array,
        required: true
      }
    },
    data() {
      return {
        focus: false,
        passwordOptions: this.options,
        errorsMessage: {}
      }
    },
    methods: {
      removeValue(field) {
        this.user[field] = ''
        this.$refs[field].focus()
      },
      onSubmit() {
        this.$validator.validateAll().then(result => {
          if (result) {
          // this.user.roles_id = this.rolesSelected

          // let url = 'api/admin/users' + (this.user.id ? '/' + this.user.id : '')
          // let method = this.user.id ? 'patch' : 'post'
          // let action = this.user.id ? 'Updated' : 'Created'

          // axios[method](url, this.user).then(response => {
          //   toastr.success(action + ' successfully!')
          //   this.$router.push('/users')
          // }, error => {
          //   this.errorsMessage = error.response.data.errors
          // })
          }
        })
      },
      removeErrorsMessage() {
        this.errorsMessage = {}
      }
    }
  }
</script>
