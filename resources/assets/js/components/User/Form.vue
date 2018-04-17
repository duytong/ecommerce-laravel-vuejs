<template>
  <form class="form" @submit.prevent="onSubmit" enctype="multipart/form-data">
    <div class="form__wrapper">
      <div class="form__data">
        <div class="form__group" :class="{ 'form__group--invalid': errors.has('name') }">
          <label class="form__label">Name</label>
          <input id="name" type="text" class="form__control input" name="name" v-model="user.name" v-validate="'required'" autofocus>
          <strong class="form__invalid-text">{{ errors.first('name') }}</strong>
        </div>
        <div class="form__group" :class="{ 'form__group--invalid': errors.has('email') || errorsMessage.email }">
          <label class="form__label">E-Mail Address</label>
          <input type="text" class="form__control input" name="email" v-model="user.email" v-validate="'required|email'" @keyup="removeErrorsMessage">
          <strong class="form__invalid-text">{{ errors.first('email') }}</strong>
          <strong v-if="errorsMessage.email">{{ errorsMessage.email[0] }}</strong>
        </div>
        <div class="form__group">
          <label class="form__label">Date Of Birth<small class="form__help">(Optional)</small></label>
          <input type="date" class="form__control" v-model="user.date_of_birth">
        </div>
        <div class="form__group">
          <label class="form__label">Gender<small class="form__help">(Optional)</small></label>
          <div class="radio">
            <div class="radio__group">
              <input type="radio" id="male" class="radio__input radio__input--male" v-model="user.gender" value="male">
              <label for="male">Male</label>
            </div>
            <div class="radio__group">
              <input type="radio" id="female" class="radio__input radio__input--female" v-model="user.gender" value="female">
              <label for="female">Female</label>
            </div>
          </div>
        </div>
        <div class="form__group">
          <label class="form__label">Phone<small class="form__help">(Optional)</small></label>
          <input type="text" class="form__control" v-model="user.phone">
        </div>
        <div class="form__group">
          <label class="form__label">Address<small class="form__help">(Optional)</small></label>
          <input type="text" class="form__control" v-model="user.address">
        </div>
        <div class="form__group" v-if="user.id">
          <label class="form__label">Password</label>
          <div class="radio radio--column"
          >
            <div class="radio__group">
              <input type="radio" id="keep" class="radio__input" value="keep" v-model="passwordOptions">
              <label for="keep">Do not change password.</label>
            </div>
            <div class="radio__group">
              <input type="radio" id="new" class="radio__input"  value="new" v-model="passwordOptions">
              <label for="new">Set new password.</label>
            </div>
          </div>
        </div>
        <div class="form__group" :class="{ 'form__group--invalid': errors.has('password') }" v-if="!passwordOptions || passwordOptions === 'new'">
          <label class="form__label">Password</label>
          <input type="password" class="form__control input" name="password" v-model="user.password" v-validate="'required|min:6|confirmed:password_confirmation'">
          <strong class="form__invalid-text">{{ errors.first('password') }}</strong>
        </div>
        <div class="form__group" v-if="!passwordOptions || passwordOptions === 'new'">
          <label class="form__label">Confirm Password</label>
          <input type="password" class="form__control input" name="password_confirmation">
        </div>
        <div class="form__group">
          <label class="form__label">Role<small class="form__help">(Optional)</small></label>
          <div class="checkbox">
            <div class="checkbox__group" v-for="role in roles">
              <input type="checkbox" :id="role.id" class="checkbox__input" :value="role.id" v-model="rolesSelected"
              >
              <label :for="role.id">{{ role.display_name }}</label>
            </div>
          </div>
        </div>
        <div class="form__group">
          <label class="form__label">Avatar</label>
          <input type="file" @change="processFile($event)">
        </div>
      </div>
      <div class="form__action">
        <slot name="button-action"></slot>
      </div>
    </div>
  </form>
</template>

<script>
  import toastr from 'toastr'

  export default {
    props: ['user', 'options', 'selected'],
    data() {
      return {
        roles: [],
        passwordOptions: this.options,
        rolesSelected: this.selected,
        loading: false,
        errorsMessage: {}
      }
    },
    created() {
      this.loadRoles()
    },
    methods: {
      loadRoles() {
        let columns = ['id', 'display_name']

        axios.get('api/admin/roles/index/' + columns).then(response => {
          this.roles = response.data
        })
      },
      processFile(event) {
        this.user.avatar = event.target.files[0]
      },
      onSubmit() {
        if (!this.errors.items.length) {
          this.user.roles_id = this.rolesSelected

          let url = 'api/admin/users' + (this.user.id ? '/' + this.user.id : '')
          let method = this.user.id ? 'patch' : 'post'
          let action = this.user.id ? 'Updated' : 'Created'

          axios[method](url, this.user).then(response => {
            toastr.success(action + ' successfully!')
            this.$router.push('/users')
          }, error => {
            this.errorsMessage = error.response.data.errors
          })
        }
      },
      removeErrorsMessage() {
        this.errorsMessage = {}
      }
    }
  }
</script>
