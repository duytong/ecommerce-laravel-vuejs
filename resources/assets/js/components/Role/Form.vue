<template>
  <form class="form" @submit.prevent="onSubmit">
    <div class="form__data">
      <div class="form__group" :class="{ 'form__group--valid': role.name && !errorMessages.name, 'form__group--invalid': errors.has('name') || errorMessages.name }">
        <label class="form__label">Name</label>
        <div class="form__input-group">
          <input type="text" class="form__control form__control--validate" placeholder="The name of the role" name="name" v-model="role.name" v-validate="'required'" @keyup="removeErrorMessages">
          <i class="fas fa-check-circle" v-if="role.name && !errorMessages.name"></i>
          <i class="fas fa-exclamation-triangle" v-if="errors.has('name') || errorMessages.name"></i>
        </div>
        <span class="form__invalid-feedback" v-if="errors.has('name')">{{ errors.first('name') }}</span>
        <span class="form__invalid-feedback" v-if="errorMessages.name">{{ errorMessages.name[0] }}</span>
      </div>
      <div class="form__group" :class="{ 'form__group--valid': role.display_name }">
        <label class="form__label">Display Name<span class="form__help">(Optional)</span></label>
        <div class="form__input-group">
          <input type="text" class="form__control form__control--validate" placeholder="The display name of the role" v-model="role.display_name">
          <i class="fas fa-check-circle" v-if="role.display_name"></i>
        </div>
      </div>
      <div class="form__group" :class="{ 'form__group--valid': role.description }">
        <label class="form__label">Description<span class="form__help">(Optional)</span></label>
        <div class="form__input-group">
          <input type="text" class="form__control form__control--validate" placeholder="Describe what this role does" v-model="role.description">
          <i class="fas fa-check-circle" v-if="role.description"></i>
        </div>
      </div>
      <div class="form__group">
        <label class="form__label">All permissions:</label>
        <div class="checkbox__group">
          <input type="checkbox" id="check-all" class="checkbox__input" v-model="checkAll">
          <label for="check-all" class="checkbox__label">All permissions</label>
        </div>
        <label class="form__label">Only few permission:</label>
        <div class="checkbox">
          <div class="checkbox__group" v-for="permission in permissions">
            <input type="checkbox" :id="permission.id" class="checkbox__input" :value="permission.id" v-model="permissionsChecked">
            <label :for="permission.id" class="checkbox__label">{{ permission.display_name }}<span class="checkbox__help">({{ permission.description }})</span></label>
          </div>
        </div>
      </div>
    </div>
    <div class="form__action">
      <button type="submit" class="btn btn--primary" v-if="!role.id" :disabled="loading">Create Role</button>
      <button type="submit" class="btn btn--success" v-if="role.id" :disabled="loading">Update Role</button>
    </div>
  </form>
</template>

<script>
  import toastr from 'toastr'

  export default {
    props: {
      initialRole: {
        type: Object,
        default() {
          return {}
        }
      },
      checked: {
        type: Array,
        default() {
          return []
        }
      }
    },
    data() {
      return {
        permissions: [],
        permissionsChecked: this.checked,
        role: this.initialRole,
        inheritUrl: 'api/admin/',
        loading: false,
        errorMessages: {}
      }
    },
    created() {
      this.fetchPermissions()
    },
    computed: {
      checkAll: {
        get() {
          return this.permissions.length ? this.permissionsChecked.length === this.permissions.length : false
        },
        set(value) {
          let checked = []  

          if (value) {
            this.permissions.forEach(function (permission) {
              checked.push(permission.id)
            })
          }

          this.permissionsChecked = checked
        }
      }
    },
    methods: {
      fetchPermissions() {
        let columns = ['id', 'display_name', 'description']
        let apiUrl = this.inheritUrl + 'permissions/index/' + columns 

        axios.get(apiUrl).then(response => {
          this.permissions = response.data
        })
      },
      onSubmit() {
        this.loading = true

        this.$validator.validateAll().then(result => {
          if (result) {
            this.role.permissions_id = this.permissionsChecked

            let method = this.role.id ? 'patch' : 'post'
            let apiUrl = this.inheritUrl + 'roles' + (this.role.id ? '/' + this.role.id : '')
            let action = this.role.id ? 'Updated' : 'Created'

            axios[method](apiUrl, this.role).then(() => {
              toastr.success(action + ' successfully!')

              if (method === 'post') {
                this.$router.push({ name: 'roles' })
              } else {
                this.$router.push({ name: 'roles-show', params: this.$route.params.id })
              }
            }, error => {
              this.loading = false
              this.errorMessages = error.response.data.errors
            })
          } else {
            this.loading = false
          }
        })
      },
      removeErrorMessages() {
        this.errorMessages = {}
      }
    }
  }
</script>
