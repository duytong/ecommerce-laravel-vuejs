<template>
  <v-form>
    <template slot="form">
      <user-form :user="user" :options="options" :selected="selected" v-if="childDataLoaded">
        <template slot="button-action">
          <button type="submit" class="btn btn--success btn--raised">Update User</button>
        </template>
      </user-form>
    </template>
  </v-form>
</template>

<script>
  import UserForm from './Form'

  export default {
    components: { UserForm },
    data() {
      return {
        user: {},
        options: 'keep',
        selected: [],
        childDataLoaded: false
      }
    },
    created() {
      this.loadUser()
    },
    methods: {
      loadUser() {
        axios.get(`api/admin/users/` + this.$route.params.id).then(response => {
          this.user = response.data.user
          this.selected = response.data.roles
          this.childDataLoaded = true
        })
      }
    }
  }
</script>
