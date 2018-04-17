<template>
  <div class="modal">
    <div class="modal__dialog">
      <div class="modal__content">
        <div class="modal__header">
          <h3 class="modal__title">{{ titleContent }}</h3>
          <a
            href=""
            class="modal__close js-dismiss-modal"
          >
            <i class="fal fa-times"></i>
          </a>
        </div>
        <div class="modal__body">{{ bodyContent }}</div>
        <div class="modal__footer">
          <button class="btn btn--secondary js-dismiss-modal">Cancel</button>
          <button class="btn btn--danger js-dismiss-modal" @click="deleteData(id)">Delete</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    props: {
      id: {
        type: Number
      },
      selected: {
        type: Array
      }
    },
    computed: {
        titleContent() {
          return 'Delete ' + (this.selected ? this.singularOrPlural : 'this item?')
        },
        bodyContent() {
          return 'Are you sure you want to delete ' + (this.selected ? this.singularOrPlural : 'this item?')
        },
        singularOrPlural() {
          return this.selected.length > 1 ? this.selected.length + ' items selected?' : ' item selected?'
        } 
    },
    methods: {
      deleteData(id) {
        this.$emit('deleteData', id)
      }
    }
  }
</script>
