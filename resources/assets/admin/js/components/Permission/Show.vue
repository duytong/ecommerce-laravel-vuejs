<template>
  <div class="row row--center">
    <div class="col-xl-4">
      <div class="card">
        <div class="card__header">
          <span :class="{ 'placeholder': loading }">Permission</span>
        </div>
        <div class="card__body">
          <form class="form">
            <div
              class="form__group"
              :class="{ 'placeholder': loading }"
            >
              <label>Id:</label>
              <span>{{ permission.id }}</span>
            </div>
            <div
              class="form__group"
              :class="{ 'placeholder': loading }"
            >
              <label>Name:</label>
              <span>{{ permission.name }}</span>
            </div>
            <div
              class="form__group"
              :class="{ 'placeholder': loading }"
            >
              <label>Display name:</label>
              <span>{{ permission.display_name }}</span>
            </div>
            <div
              class="form__group"
              :class="{ 'placeholder': loading }"
            >
              <label>Description:</label>
              <span>{{ permission.description }}</span>
            </div>
            <div
              class="form__group"
              :class="{ 'placeholder': loading }"
            >
              <label>Created at:</label>
              <span>{{ permission.created_at }}</span>
            </div>
            <div
              class="form__group"
              :class="{ 'placeholder': loading }"
            >
              <label>Updated at:</label>
              <span>{{ permission.updated_at }}</span>
            </div>
            <router-link
              :to="`/permissions/${ permission.id }/edit`"
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
        permission: {},
        loading: false
      }
    },
    created() {
      this.getPermission()
    },
    methods: {
      getPermission() {
        this.loading = true

        axios.get(`api/admin/permissions/${ this.$route.params.id }`).then(res => {
          this.loading = false
          this.permission = res.data.data
          this.permission.created_at = res.data.created_at
          this.permission.updated_at = res.data.updated_at
        }, err => {
          this.loading = false
        })
      }
    }
  }
</script>
