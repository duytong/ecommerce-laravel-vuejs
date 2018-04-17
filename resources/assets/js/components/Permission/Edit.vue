<template>
  <card>
    <template slot="content">
      <permission-form :initial-permission="permission"></permission-form>
    </template>
  </card>
</template>

<script>
  import Form from './Form'

  export default {
    components: {
      permissionForm: Form
    },
    data() {
      return {
        permission: {}
      }
    },
    created() {
      this.loadPermission()
    },
    methods: {
      loadPermission() {
        axios.get(`api/admin/permissions/` + this.$route.params.id).then(response => {
          this.permission = response.data.permission
        })
      }
    }
  }
</script>
