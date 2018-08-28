<template>
  <ul class="pagination">
    <li
      :class="{
        'pagination__item': true,
        'disabled': currentPage === 1
      }"
    >
      <a
        class="pagination__link"
        @click="redirectPage(currentPage - 1)"
      >
        Previous
      </a>
    </li>
    <li v-if="firstPage">
      <a
        class="pagination__link"
        @click="redirectPage(1)"
      >
        1
      </a>
    </li>
    <li
      v-if="firstPage"
      class="pagination__item disabled"
    >
      <a class="pagination__link">...</a>
    </li>
    <li
      v-for="page in pages"
      :class="{
        'pagination__item': true,
        'active': page === currentPage
      }"
    >
      <a
        class="pagination__link"
        @click="redirectPage(page)"
      >
        {{ page }}
      </a>
    </li>
    <li
      v-if="lastPage"
      class="pagination__item disabled"
    >
      <a class="pagination__link">...</a>
    </li>
    <li v-if="lastPage">
      <a
        class="pagination__link"
        @click="redirectPage(totalPages)"
      >
        {{ totalPages }}
      </a>
    </li>
    <li
      :class="{
        'pagination__item': true,
        'disabled': currentPage === totalPages
      }"
    >
      <a
        class="pagination__link"
        @click="redirectPage(currentPage + 1)"
      >
        Next
      </a>
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
      startPage() {
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
      finishPage() {
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
      firstPage() {
        return this.totalPages > 7 && this.currentPage > 4
      },
      lastPage() {
        return this.totalPages > 7 && this.finishPage < this.totalPages
      },
      pages() {
        let pages = [],
            i

        for (i = this.startPage; i <= this.finishPage; i++) {
          pages.push(i)
        }

        return pages
      }
    },
    methods: {
      redirectPage(page) {
        this.$emit('redirectPage', page)
      }
    }
  }
</script>
