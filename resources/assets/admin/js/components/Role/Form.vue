<template>
  <div class="row row--center">
      <div class="col-xl-4">
        <div class="card">
          <div class="card__header">
            <span :class="{ 'placeholder': loading }">{{ headerText }}</span>
          </div>
          <div class="card__body">
            <form
              class="form"
              autocomplete="off"
              novalidate
              @submit.prevent="onSubmit()"
            >
              <div
                class="form__group form__group--column"
                :class="{
                  'placeholder': loading,
                  'form__group--invalid': errors.has('name') || serverError
                }"
              >
                <div class="form__input">
                  <input
                    name="name"
                    required
                    ref="name"
                    v-focus
                    v-validate="'required'"
                    v-model="role.name"
                  >
                  <label>Name</label>
                  <div
                    class="form__icon form__icon--invalid"
                    v-if="errors.has('name') || serverError"
                  >
                    <div class="tooltip tooltip--top">
                      <i class="fas fa-exclamation-circle"></i>
                      <span class="tooltip__content">There was an error</span>
                    </div>
                  </div>
                </div>
                <div
                  class="form__invalid-text"
                  v-if="errors.has('name') || serverError"
                >
                  <span>{{ errors.first('name') || serverError }}</span>
                </div>
              </div>
              <div
                class="form__group form__group--column"
                :class="{ 'placeholder': loading }"
              >
                <div class="form__input">
                  <input
                    name="display_name"
                    required
                    ref="display_name"
                    v-model="role.display_name"
                  >
                  <label>Display name (optional)</label>
                </div>
              </div>
              <div
                class="form__group form__group--column"
                :class="{ 'placeholder': loading }"
              >
                <div class="form__input">
                  <input
                    name="description"
                    required
                    ref="description"
                    v-model="role.description"
                  >
                  <label>Description (optional)</label>
                </div>
              </div>
              <button
                type="submit"
                class="btn btn--primary"
                :class="{ 'placeholder': loading }"
                :disabled="!role.name || actioning"
                v-if="!role.id"
              >
                Create
              </button>
              <button
                type="submit"
                class="btn btn--success"
                :class="{ 'placeholder': loading }"
                :disabled="!role.name || actioning"
                v-if="role.id"
              >
                Update
              </button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-xl-8">
        <div class="card">
          <div class="card__header">
            <span :class="{ 'placeholder': loading }">Permissions</span>
          </div>
          <div class="card__body">
            <div
              class="checkbox"
              :class="{ 'placeholder': loading }"
            >
              <div class="checkbox__group">
                <input
                  type="checkbox"
                  id="select-all"
                  v-model="selectAll"
                >
                <label for="select-all">All permissions</label>
              </div>
              <div
                class="checkbox__group"
                v-for="(permission, index) in permissions"
                :key="index"
              >
                <input
                  type="checkbox"
                  :id="permission.id"
                  :value="permission.id"
                  v-model="selectedPermissions"
                >
                <label :for="permission.id">{{ permission.display_name }} ({{ permission.description }})</label>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</template>

<script>
  import toastr from 'toastr'

  export default {
    props: {
      propRole: {
        type: Object,
        default() {
          return {
            id: '',
            name: '',
            display_name: '',
            description: ''
          }
        }
      },
      propSelectedPermissions: {
        type: Array,
        default() {
          return []
        }
      }
    },
    directives: {
      focus: {
        inserted(el) {
          el.focus()
        }
      }
    },
    watch: {
      propRole(val) {
        this.role = val
      },
      propSelectedPermissions(val) {
        this.selectedPermissions = val
      }
    },
    created() {
      this.getPermissions()
    },
    data() {
      return {
        permissions: [],
        selectedPermissions: this.propSelectedPermissions,
        role: this.propRole,
        loading: false,
        actioning: false,
        serverError: ''
      }
    },
    computed: {
      headerText() {
        return this.role.id ? 'Edit role' : 'Create role'
      },
      selectAll: {
        get() {
          return this.permissions.length ? this.selectedPermissions.length === this.permissions.length : false
        },
        set(value) {
          let itemIds = []

          if (value) {
            _.forEach(this.permissions, item => {
              itemIds.push(item.id)
            })
          }

          this.selectedPermissions = itemIds
        }
      }
    },
    methods: {
      getPermissions() {
        this.loading = true

        let apiUrl = 'api/admin/permissions'

        axios.get(apiUrl).then(response => {
          this.loading = false
          this.permissions = response.data
        })
      },
      onSubmit() {
        this.$validator.validateAll().then(result => {
          if (result) {
            this.$Progress.start()
            this.actioning = true
            this.role.permissions = this.selectedPermissions

            let role = this.role,
                roleId = role.id,
                apiUrl = 'api/admin/roles' + (roleId ? '/' + roleId : ''),
                method = roleId ? 'patch' : 'post',
                action = roleId ? 'Update' : 'Create'

            axios[method](apiUrl, role).then(res => {
              toastr.success(action + ' successfully!')

              if (method === 'post') {
                this.$router.push('/roles')
              } else {
                this.$router.push(`/roles/${this.$route.params.id}`)
              }
            }, err => {
              this.$Progress.fail()
              this.actioning = false
              this.serverError = err.response.data.errors.name[0]
              this.$refs.name.focus()
            })
          }
        })
      }
    }
  }
</script>
