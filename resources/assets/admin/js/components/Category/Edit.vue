<template>
  <RoleForm
    slot="content"
    :prop-role="role"
    :prop-selected-permissions="propSelectedPermissions"
    :loading="loading"
  />
</template>

<script>
  import Form from './Form'

  export default {
    components: {
      RoleForm: Form
    },
    data() {
      return {
        loading: false,
        role: {},
        propSelectedPermissions: []
      }
    },
    created() {
      this.getrole()
    },
    methods: {
      getrole() {
        this.loading = true

        axios.get(`api/admin/roles/` + this.$route.params.id).then(res => {
          this.loading = false
          this.role = res.data.role
          this.propSelectedPermissions = res.data.permissions.id
        })
      }
    }
  }
</script>
