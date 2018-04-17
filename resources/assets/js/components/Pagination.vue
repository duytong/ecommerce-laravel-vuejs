<template>
  <ul class="pagination">
    <li class="pagination__item" :class="{ 'disabled': currentPage === 1 }">
      <a href="" class="pagination__link" @click.prevent="pageNavigation(currentPage - 1)">Previous</a>
    </li>
    <li class="pagination__item" v-if="first">
      <a href="" class="pagination__link" @click.prevent="pageNavigation(1)">1</a>
    </li>
    <li class="pagination__item disabled" v-if="first">
      <a class="pagination__link">...</a>
    </li>
    <li class="pagination__item" v-for="page in pages" :class="{ 'active': page === currentPage }">
      <a href="" class="pagination__link" @click.prevent="pageNavigation(page)">{{ page }}</a>
    </li>
    <li class="pagination__item disabled" v-if="last">
      <a class="pagination__link">...</a>
    </li>
    <li class="pagination__item" v-if="last">
      <a href="" class="pagination__link" @click.prevent="pageNavigation(totalPages)">{{ totalPages }}</a>
    </li>
    <li class="pagination__item" :class="{ 'disabled': currentPage === totalPages }">
      <a href="" class="pagination__link" @click.prevent="pageNavigation(currentPage + 1)">Next</a>
    </li>
  </ul>
</template>

<script>
  export default {
    props: {
      pagination: {
        type: Object,
        required: true
      }
    },
    computed: {
      totalPages() {
        return this.pagination.last_page
      },
      currentPage() {
        return this.pagination.current_page
      },
      startPosition() {
        let start = this.currentPage - 1

        if (this.totalPages > 7) {
          if (this.currentPage < 5) {
            start = 1
          } else if (this.totalPages - this.currentPage < 4) {
            start = this.totalPages - 4
          }
        } else {
          start = 1
        }

        return start
      },
      endPosition() {
        let end = this.currentPage + 1

        if (this.totalPages > 7) {
          if (this.currentPage < 5) {
            end = 5
          } else if (this.totalPages - this.currentPage < 4) {
            end = this.currentPage + 3
          }
        } else {
          end = 7
        }

        return end < this.totalPages ? end : this.totalPages
      },
      pages() {
        let pages = []

        for (let i = this.startPosition; i <= this.endPosition; i++) {
          pages.push(i)
        }

        return pages
      },
      first() {
        return this.totalPages > 7 && this.currentPage > 4
      },
      last() {
        return this.totalPages > 7 && this.endPosition < this.totalPages
      }
    },
    methods: {
      pageNavigation(page) {
        this.$emit('pageNavigation', page)
      }
    }
  }
</script>
