<template>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">List admin</div>
            <div class="panel-body">
                <router-link to="/admin/create" class="btn btn-primary pull-right">Create a admin</router-link>
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="admin in admins">
                            <td>{{ admin.id }}</td>
                            <td>{{ admin.name }}</td>
                            <td>{{ admin.email }}</td>
                            <td>
                                Edit
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                admins: []
            }
        },
        mounted() {
            this.getListAdmin()
        },
        methods: {
            getListAdmin() {
                axios.get('api/admins').then(response => {
                    this.admins = response.data
                })
            }
        }
    }
</script>
