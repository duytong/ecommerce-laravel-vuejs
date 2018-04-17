<template>
  <div class="card">
    <div class="card__header">
      <breadcrumb></breadcrumb>
    </div>
    <div class="card__body">
      <form class="form">
        <div class="form__wrapper">
          <div class="form__group">
            <label>Id:</label>
            <span>{{ permission.id }}</span>
          </div>
          <div class="form__group">
            <label>Name:</label>
            <span>{{ permission.name }}</span>
          </div>
          <div class="form__group">
            <label>Display Name:</label>
            <span>{{ permission.display_name }}</span>
          </div>
          <div class="form__group">
            <label>Description:</label>
            <span>{{ permission.description }}</span>
          </div>
          <div class="form__group">
            <label>Created at:</label>
            <span>{{ permission.created_at }}</span>
          </div>
          <div class="form__group">
            <label>Updated at:</label>
            <span>{{ permission.updated_at }}</span>
          </div>
          <router-link :to="`/permissions/${ permission.id }/edit`" class="btn btn--success">Edit</router-link>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        permission: {}
      }
    },
    created() {
      this.fetchPermission()
    },
    methods: {
      fetchPermission() {
        axios.get(`api/admin/permissions/${ this.$route.params.id }`).then(response => {
          this.permission = response.data.permission
          this.permission.created_at = response.data.created_at
          this.permission.updated_at = response.data.updated_at
        })
      }
    }
  }
</script>
