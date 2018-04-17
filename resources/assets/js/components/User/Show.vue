<template>
    <div class="card">
        <div class="card-header">Basic info</div>
        <div class="card-body">
            <div class="form__group">
                <label>Id:</label>
                <span>{{ user.id }}</span>
            </div>
            <div class="form__group">
                <label>Name:</label>
                <span>{{ user.name }}</span>
            </div>
            <div class="form__group">
                <label>Email:</label>
                <span>{{ user.email }}</span>
            </div>
            <div class="form__group">
                <label>Date of birth:</label>
                <em v-if="!user.date_of_birth">null</em>
                <span v-else>{{ user.date_of_birth }}</span>
            </div>
            <div class="form__group">
                <label>Gender:</label>
                <em v-if="!user.gender">null</em>
                <span>{{ user.gender }}</span>
            </div>
            <div class="form__group">
                <label>Phone:</label>
                <em v-if="!user.phone">null</em>
                <span>{{ user.phone }}</span>
            </div>
            <div class="form__group">
                <label>Address:</label>
                <em v-if="!user.address">null</em>
                <span>{{ user.address }}</span>
            </div>
            <div class="form__group">
                <label>Role:</label>
                <span>{{ user.role }}</span>
            </div>
            <div class="form__group">
                <label>Verify:</label>
                <span v-if="user.verify_token">not verified</span>
                <span v-else>verified</span>
            </div>
            <div class="form__group">
                <label>Role:</label>
                <span v-for="role in user.roles">{{ role }}</span>
            </div>
            <div class="form__group">
                <label>Created at:</label>
                <span>{{ user.created_at }}</span>
            </div>
            <div class="form__group">
                <label>Updated at:</label>
                <span>{{ user.updated_at }}</span>
            </div>
            <router-link :to="`/user/${user.id}/edit`" class="btn btn--success">Edit</router-link>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                user: {}
            }
        },
        mounted() {
            this.fetchUser()
        },
        methods: {
            fetchUser() {
                axios.get(`api/admin/users/${this.$route.params.id}`).then(response => {
                    this.user = response.data.user
                    this.user.created_at = response.data.created_at
                    this.user.updated_at = response.data.updated_at
                    this.user.roles = response.data.roles
                })
            }
        }
    }
</script>
