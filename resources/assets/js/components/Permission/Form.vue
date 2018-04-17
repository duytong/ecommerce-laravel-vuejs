<template>
  <div>
    <div
      class="form__group"
      v-if="!initialPermission.id"
    >
      <label class="form__label">Permission Type</label>
      <div class="radio">
        <div class="radio__group">
          <input
            type="radio"
            id="basic"
            class="radio__input"
            value="basic" v-model="permissionType"
          >
          <label for="basic" class="radio__label">
            <span class="radio__text">Basic Permission</span>
          </label>
        </div>
        <div class="radio__group">
          <input
            type="radio"
            id="crud"
            class="radio__input"
            value="crud"
            v-model="permissionType"
          >
          <label for="crud" class="radio__label">
            <span class="radio__text">CRUD Permission</span>
          </label>
        </div>
      </div>
    </div>
    <form
      class="form"
      v-show="permissionType === 'basic'"
      data-vv-scope="basic"
      @submit.prevent="onSubmit('basic')"
    >
      <div class="form__wrapper">
        <div class="form__data">
          <div
            class="form__group"
            :class="{ 'form__group--invalid': errors.has('basic.name') || errorsMessage.name }"
          >
            <label class="form__label">Name</label>
            <input
              id="name"
              class="form__input"
              name="name"
              v-validate="'required'"
              v-model="initialPermission.name"
            >
            <strong
              class="form__invalid-text"
              v-if="errors.has('basic.name')"
            >
              {{ errors.first('basic.name') }}
            </strong>
            <strong
              class="form__invalid-text"
              v-if="errorsMessage.name"
            >
              {{ errorsMessage.name[0] }}
            </strong>
          </div>
          <div class="form__group">
            <label class="form__label">Display Name<small class="form__help">(Optional)</small></label>
            <input
              class="form__input"
              name="display name"
              v-model="initialPermission.display_name"
            >
          </div>
          <div class="form__group">
            <label class="form__label">Description<small class="form__help">(Optional)</small></label>
            <input
              class="form__input"
              name="description"
              placeholder="Describe what this permission does"
              v-model="initialPermission.description"
            >
          </div>
          <input
            type="hidden"
            v-model="permissionType"
          >
        </div>
        <div class="form__action">
          <button
            type="submit"
            class="btn btn--primary"
            v-if="!initialPermission.id"
            :disabled="loading"
          >
            Create
          </button>
          <button
            type="submit"
            class="btn btn--success"
            v-if="initialPermission.id"
            :disabled="loading"
          >
            Update
          </button>
        </div>
      </div>
    </form>
    <form
      class="form"
      v-show="permissionType === 'crud'"
      data-vv-scope="crud"
      @submit.prevent="onSubmit('crud')"
    >
      <div class="form__wrapper">
        <div class="form__data">
          <!-- <div class="form__group">
            <label class="form__label">Permission Type</label>
            <div class="radio">
              <div class="radio__group">
                <input
                  type="radio"
                  id="basic"
                  class="radio__input"
                  value="basic"
                  v-model="permissionType"
                >
                <label for="basic" class="radio__label">
                  <span class="radio__text">Basic Permission</span>
                </label>
              </div>
              <div class="radio__group">
                <input
                  type="radio"
                  id="crud"
                  class="radio__input"
                  value="crud"
                  v-model="permissionType"
                >
                <label for="crud" class="radio__label">
                  <span class="radio__text">CRUD Permission</span>
                </label>
              </div>
            </div>
          </div> -->
          <div
            class="form__group"
            :class="{ 'form__group--invalid': errors.has('crud.resource') }"
          >
            <label class="form__label">Resource</label>
            <input
              id="resource"
              class="form__input"
              name="resource"
              v-validate="'required'"
              placeholder="The name of the resource"
              autofocus
              v-model="resource"
            >
            <strong
              class="form__invalid-text"
              v-if="errors.has('crud.resource')"
            >
              {{ errors.first('crud.resource') }}
            </strong>
          </div>
          <div class="form__group">
            <div class="checkbox">
              <div
                class="checkbox__group"
                v-for="crudOption in crudOptions"
                :key="crudOption.key"
              >
                <input
                  type="checkbox"
                  :id="crudOption"
                  class="checkbox__input"
                  :value="crudOption.action"
                  v-model="crudSelected"
                >
                <label :for="crudOption" class="checkbox__label">
                  <span class="checkbox__text">{{ crudOption.action }}</span>
                </label>
                <span class="checkbox__description">({{ crudOption.description }})</span>
              </div>
            </div>
          </div>
          <input type="hidden" v-model="permissionType">
        </div>
        <div class="form__action">
          <button
            type="submit"
            class="btn btn--primary"
            :disabled="loading"
          >
            Create
          </button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
  import toastr from 'toastr'

  export default {
    props: {
      initialPermission: {
        type: Object,
        default() {
          return {}
        }
      }
    },
    data() {
      return {
        permissionType: 'basic',
        permission: this.initialPermission,
        resource: '',
        crudOptions: [
          {
            key: 1,
            action: 'Create',
            description: 'Allows a user to CREATE a permission'
          },
          {
            key: 2,
            action: 'Read',
            description: 'Allows a user to READ a permission'
          },
          {
            key: 3,
            action: 'Update',
            description: 'Allows a user to UPDATE a permission'
          },
          {
            key: 4,
            action: 'Delete',
            description: 'Allows a user to DELETE a permission'
          }
        ],
        crudSelected: ['Create', 'Read', 'Update', 'Delete'],
        loading: false,
        errorsMessage: {}
      }
    },
    methods: {
      crudName(item) {
        return item.toLowerCase() + '-' + this.resource.toLowerCase()
      },
      crudDisplayName(item) {
        return item + ' ' + this.resource.substr(0, 1).toUpperCase() + this.resource.substr(1).toLowerCase()
      },
      crudDescription(item) {
        return 'Allows a user to ' + item.toUpperCase() + ' a ' + this.resource.substr(0, 1).toUpperCase() + this.resource.substr(1).toLowerCase()
      },
      onSubmit(scope) {
        this.$validator.validateAll(scope).then(result => {
          if (result) {
            this.loading = true

            if (!this.initialPermission.id) {
              this.permission.permission_type = this.permissionType

              if (this.permissionType === 'crud') {
                this.permission.resource = this.resource
                this.permission.crud_selected = this.crudSelected
              }
            }

            let url = 'api/admin/permissions' + (this.initialPermission.id ? '/' + this.initialPermission.id : '')
            let method = this.initialPermission.id ? 'patch' : 'post'
            let request = this.initialPermission.id ? this.initialPermission : this.permission
            let action = this.initialPermission.id ? 'Updated' : 'Created'

            axios[method](url, request).then(response => {
              toastr.success(action + ' successfully!')

              if (method === 'post') {
                this.$router.push('/permissions')
              } else {
                this.$router.push(`/permissions/${this.$route.params.id}`)
              }
            }, error => {
              this.loading = false
              this.errorsMessage = error.response.data.errors
            })
          }
        })
      },
      removeErrorsMessage() {
        this.errorsMessage = {}
      }
    }
  }
</script>
