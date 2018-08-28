<template>
  <div class="row row--center">
    <div class="col-xl-4">
      <div class="card">
        <div class="card__header">
          <span :class="{ 'placeholder': loading }">Role</span>
        </div>
        <div class="card__body">
          <form class="form">
            <div
              class="form__group"
              :class="{ 'placeholder': loading }"
            >
              <label>Id:</label>
              <span>{{ role.id }}</span>
            </div>
            <div
              class="form__group"
              :class="{ 'placeholder': loading }"
            >
              <label>Name:</label>
              <span>{{ role.name }}</span>
            </div>
            <div
              class="form__group"
              :class="{ 'placeholder': loading }"
            >
              <label>Display name:</label>
              <span>{{ role.display_name }}</span>
            </div>
            <div
              class="form__group"
              :class="{ 'placeholder': loading }"
            >
              <label>Description:</label>
              <span>{{ role.description }}</span>
            </div>
            <div
              class="form__group"
              :class="{ 'placeholder': loading }"
            >
              <label>Created at:</label>
              <span>{{ role.created_at }}</span>
            </div>
            <div
              class="form__group"
              :class="{ 'placeholder': loading }"
            >
              <label>Updated at:</label>
              <span>{{ role.updated_at }}</span>
            </div>
            <router-link
              :to="`/roles/${ role.id }/edit`"
              class="btn btn--success"
              :class="{ 'placeholder': loading }"
            >
              Edit
            </router-link>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        role: {},
        loading: false
      }
    },
    created() {
      this.getRole()
    },
    methods: {
      getRole() {
        this.loading = true

        axios.get(`api/admin/roles/${ this.$route.params.id }`).then(res => {
          this.loading = false
          this.role = res.data.role
          this.role.created_at = res.data.created_at
          this.role.updated_at = res.data.updated_at
        }, err => {
          this.loading = false
        })
      }
    }
  }
</script>
