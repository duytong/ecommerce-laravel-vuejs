<template>
  <div class="row row--center">
      <div class="col-xl-4">
        <div class="card">
          <div class="card__header">
          <span :class="{ 'placeholder': loading }">{{ headerText }}</span>
          </div>
          <div class="card__body">
            <div
              class="form__group form__group--column"
              v-if="!permission.id"
            >
              <div class="radio radio--between">
                <div :class="{ 'placeholder': loading }">
                  <input
                    type="radio"
                    id="basic"
                    value="basic"
                    v-model="permissionType"
                    @change="focus('name')"
                  >
                  <label for="basic">Basic permission</label>
                </div>
                <div :class="{ 'placeholder': loading }">
                  <input
                    type="radio"
                    id="crud"
                    value="crud"
                    v-model="permissionType"
                    @change="focus('resource')"
                  >
                  <label for="crud">CRUD permission</label>
                </div>
              </div>
            </div>
            <form
              class="form"
              autocomplete="off"
              novalidate
              data-vv-scope="basic"
              v-show="permissionType === 'basic'"
              @submit.prevent="onSubmit('basic')"
            >
              <div
                class="form__group form__group--column"
                :class="{
                  'placeholder': loading,
                  'form__group--invalid': errors.has('basic.name') || serverError
                }"
              >
                <div class="form__input">
                  <input
                    name="name"
                    required
                    ref="name"
                    v-focus
                    v-validate="'required'"
                    v-model="permission.name"
                  >
                  <label>Name</label>
                  <div
                    class="form__icon form__icon--invalid"
                    v-if="errors.has('basic.name') || serverError"
                  >
                    <div class="tooltip tooltip--top">
                      <i class="fas fa-exclamation-circle"></i>
                      <span class="tooltip__content">There was an error</span>
                    </div>
                  </div>
                </div>
                <div
                  class="form__invalid-text"
                  v-if="errors.has('basic.name') || serverError"
                >
                  <span>{{ errors.first('basic.name') || serverError }}</span>
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
                    v-model="permission.display_name"
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
                    v-model="permission.description"
                  >
                  <label>Description (optional)</label>
                </div>
              </div>
              <button
                type="submit"
                class="btn btn--primary"
                :class="{ 'placeholder': loading }"
                :disabled="!permission.name"
                v-if="!permission.id"
              >
                Create
              </button>
              <button
                type="submit"
                class="btn btn--success"
                :class="{ 'placeholder': loading }"
                :disabled="!permission.name"
                v-if="permission.id"
              >
                Update
              </button>
            </form>
            <form
              class="form"
              autocomplete="off"
              novalidate
              data-vv-scope="crud"
              v-show="permissionType === 'crud'"
              @submit.prevent="onSubmit('crud')"
            >
              <div
                class="form__group form__group--column"
                :class="{
                  'placeholder': loading,
                  'form__group--invalid': errors.has('crud.resource') || serverError
                }"
              >
                <div class="form__input">
                  <input
                    name="resource"
                    required
                    ref="resource"
                    v-validate="'required'"
                    v-model="resource"
                  >
                  <label>Resource</label>
                  <div
                    class="form__icon form__icon--invalid"
                    v-if="errors.has('crud.resource') || serverError"
                  >
                    <div class="tooltip tooltip--top">
                      <i class="fas fa-exclamation-circle"></i>
                      <span class="tooltip__content">There was an error</span>
                    </div>
                  </div>
                </div>
                <div
                  class="form__invalid-text"
                  v-if="errors.has('crud.resource') || serverError"
                >
                  <span>{{ errors.first('crud.resource') || serverError }}</span>
                </div>
              </div>
              <div class="form__group form__group--between">
                  <div
                    v-for="(crudOption, index) in crudOptions"
                    :key="index"
                  >
                    <input
                      type="checkbox"
                      :id="crudOption"
                      :value="crudOption"
                      v-model="crudSelected"
                    >
                    <label :for="crudOption">{{ crudOption }}</label>
                  </div>
              </div>
              <button
                type="submit"
                class="btn btn--primary"
                :class="{ 'placeholder': loading }"
                :disabled="!resource"
              >
                Create
              </button>
            </form>
          </div>
        </div>
      </div>
      <div
        class="col-xl-8"
        v-if="permissionType === 'crud'"
      >
        <div class="card">
          <div class="card__header">Preview</div>
          <div class="card__body">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Display name</th>
                    <th>Description</th>
                  </tr>
                </thead>
                <tbody v-if="resource.length >= 1">
                  <tr v-for="item in crudSelected">
                    <td v-text="crudName(item)"></td>
                    <td v-text="cruddisplay_name(item)"></td>
                    <td v-text="crudDescription(item)"></td>
                  </tr>
                </tbody>
              </table>
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
      loading: {
        type: Boolean
      },
      propPermission: {
        type: Object,
        default() {
          return {
            id: '',
            name: '',
            display_name: '',
            description: ''
          }
        }
      }
    },
    computed: {
      headerText() {
        return this.permission.id ? 'Edit permission' : 'Create permission'
      }
    },
    watch: {
      propPermission(val) {
        this.permission = val
      }
    },
    directives: {
      focus: {
        inserted(el) {
          el.focus()
        }
      }
    },
    data() {
      return {
        permissionType: 'basic',
        permission: this.propPermission,
        resource: '',
        crudOptions: ['Create', 'Read', 'Update', 'Delete'],
        crudSelected: ['Create', 'Read', 'Update', 'Delete'],
        actioning: false,
        serverError: ''
      }
    },
    methods: {
      focus(ref) {
        this.$nextTick(() => {
          this.$refs[ref].focus()
        })
      },
      clearInputField(ref) {
        this.permission[ref] = ''
        this.resource = ''
        this.$refs[ref].focus()
      },
      crudName(item) {
        return _.kebabCase(item + ' ' + this.resource)
          .normalize('NFD')
          .replace(/[\u0300-\u036f]/g, '')
      },
      cruddisplay_name(item) {
        return item + ' ' + this.resource
      },
      crudDescription(item) {
        return 'Allow a user to ' + item.toLowerCase() + ' ' + this.resource
      },
      onSubmit(scope) {
        this.$validator.validateAll(scope).then(result => {
          if (result) {
            this.$Progress.start()
            this.actioning = true

            let permission = this.permission,
                permissionId = permission.id,
                permissionType = this.permissionType,
                apiUrl = 'api/admin/permissions' + (permissionId ? '/' + permissionId : ''),
                method = permissionId ? 'patch' : 'post',
                action = permissionId ? 'Update' : 'Create'

            if (!permissionId) {
              permission.permission_type = permissionType

              if (permissionType === 'crud') {
                permission.resource = this.resource
                permission.crud_selected = this.crudSelected
              }
            }

            axios[method](apiUrl, permission).then(res => {
              toastr.success(action + ' successfully!')

              if (method === 'post') {
                this.$router.push('/permissions')
              } else {
                this.$router.push(`/permissions/${this.$route.params.id}`)
              }
            }, err => {
              this.$Progress.fail()
              this.actioning = false
              this.serverError = err.response.data.errors.name[0]
              this.$refs.name.focus()
            })
          }
        })
      },
      removeErrorsMessage() {
        this.serverError = ''
      }
    }
  }
</script>
