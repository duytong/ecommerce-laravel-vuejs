<template>
  <v-form>
    <template slot="content">
      <role-form :initial-role="role" :checked="checked" v-if="childDataLoaded"></role-form>
    </template>
  </v-form>
</template>

<script>
  import Form from './Form'

  export default {
    components: {
      roleForm: Form
    },
    data() {
      return {
        role: {},
        checked: [],
        childDataLoaded: false
      }
    },
    created() {
      this.fetchRole()
    },
    methods: {
      fetchRole() {
        axios.get(`api/admin/roles/${ this.$route.params.id }`).then(response => {
          this.role = response.data.role
          this.checked = response.data.permissions.id
          this.childDataLoaded = true
        })
      }
    }
  }
</script>
