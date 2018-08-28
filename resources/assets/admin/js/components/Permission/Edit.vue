<template>
  <PermissionForm
    slot="content"
    :prop-permission="permission"
    :loading="loading"
  />
</template>

<script>
  import Form from './Form'

  export default {
    components: {
      PermissionForm: Form
    },
    data() {
      return {
        loading: false,
        permission: {}
      }
    },
    created() {
      this.getPermission()
    },
    methods: {
      getPermission() {
        this.loading = true

        axios.get(`api/admin/permissions/` + this.$route.params.id).then(res => {
          this.loading = false
          this.permission = res.data.data
        })
      }
    }
  }
</script>
