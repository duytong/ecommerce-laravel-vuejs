<template>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header align-items-center">
                    <span class="text-dark">
                        Are you sure you want to delete {{ selected.length }} 
                        <span v-if="selected.length < 2">item</span>
                        <span v-else>items</span> 
                        selected?
                    </span>
                    <button type="button" class="modal__close d-flex justify-content-center p-0" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&#10005;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <strong class="text-dark">Type "delete" to confirm the action:</strong>
                    </div>
                    <input type="text" class="form-control" v-model="confirmText">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"
                        @click="deleteUser"
                        :disabled="confirmText !== 'delete'">
                        Confirm
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['selected'],
        data() {
            return {
                confirmText: ''
            }
        },
        methods: {
            deleteUser() {
                this.$emit('deleteUser')
                this.confirmText = ''
            }
        }
    }
</script>
