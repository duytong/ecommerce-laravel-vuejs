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
                    v-model="product.name"
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
              <button
                type="submit"
                class="btn btn--primary"
                :class="{ 'placeholder': loading }"
                :disabled="!product.name || actioning"
                v-if="!product.id"
              >
                Create
              </button>
              <button
                type="submit"
                class="btn btn--success"
                :class="{ 'placeholder': loading }"
                :disabled="!product.name || actioning"
                v-if="product.id"
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
            <span :class="{ 'placeholder': loading }">Specifications</span>
          </div>
          <div class="card__body">
            <div class="form__group form__group--column"></div>
          </div>
        </div>
        <div class="card">
          <div class="card__header">
            <span :class="{ 'placeholder': loading }">Configuration</span>
          </div>
          <div class="card__body">
            <!--  -->
          </div>
        </div>
      </div>
  </div>
</template>

<script>
  import toastr from 'toastr'

  export default {
    props: {
      propproduct: {
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
      propproduct(val) {
        this.product = val
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
        product: this.propproduct,
        loading: false,
        actioning: false,
        serverError: ''
      }
    },
    computed: {
      headerText() {
        return this.product.id ? 'Edit product' : 'Create product'
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
            this.product.permissions = this.selectedPermissions

            let product = this.product,
                productId = product.id,
                apiUrl = 'api/admin/products' + (productId ? '/' + productId : ''),
                method = productId ? 'patch' : 'post',
                action = productId ? 'Update' : 'Create'

            axios[method](apiUrl, product).then(res => {
              toastr.success(action + ' successfully!')

              if (method === 'post') {
                this.$router.push('/products')
              } else {
                this.$router.push(`/products/${this.$route.params.id}`)
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
