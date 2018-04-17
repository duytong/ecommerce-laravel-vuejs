<template>
  <v-card>
    <div
      class="datatable"
      slot="content"
    >
      <div class="datatable__header">
        <div class="datatable__action">
          <v-breadcrumb v-if="!selected.length"></v-breadcrumb>
          <span v-if="selected.length">{{ selected.length }} item selected</span>
          <div class="datatable__handle">
            <button
              class="btn js-modal"
              title="Delete"
              v-if="selected.length"
              :disabled="deleting"
            >
              <i class="far fa-trash-alt"></i>
            </button>
            <confirm-delete
              :selected="selected"
              @deleteData="deleteData"
            >
            </confirm-delete>
            <button
              class="btn"
              @click="fetchData(perPage)"
            >
              <i class="far fa-sync-alt"></i>
            </button>
            <div class="dropdown">
              <button class="btn js-dropdown">
                <span class="btn__text">Filter</span>
                <i class="far fa-outdent"></i>
              </button>
              <div class="dropdown__menu">
                <a
                  href=""
                  class="dropdown__item"
                >
                  <i class="far fa-sort-amount-up"></i>
                  <span>Sort by asc</span>
                </a>
                <a
                  href=""
                  class="dropdown__item"
                >
                  <i class="far fa-sort-amount-down"></i>
                  <span>Sort by desc</span>
                </a>
              </div>
            </div>
            <slot name="button-create"></slot>
          </div>
        </div>
        <div class="datatable__filter">
          <div class="datatable__per-page">
            <span>Show</span>
            <select
              class="form__input"
              v-model="perPage"
              @change="selectItemsPerPage(perPage)"
            >
              <option
                v-for="perPageOption in perPageOptions"
                :key="perPageOption.key"
                :value="perPageOption.value"
              >
                {{ perPageOption.value }}
              </option>
            </select>
            <span>items</span>
          </div>
          <input
            class="form__input"
            placeholder="Search"
            v-model="keywords"
            @keyup="search"
          >
        </div>
      </div>
      <div class="datatable__body">
        <table>
          <thead>
            <tr>
              <th v-if="!unselectAll">
                <input
                  type="checkbox"
                  id="select-all"
                  class="checkbox__input"
                  v-model="selectAll"
                >
                <label
                  for="select-all"
                  class="checkbox__label"
                >
                </label>
              </th>
              <th v-if="selected.length && selected.length !== items.length">
                <input
                  type="checkbox"
                  id="unselect-all"
                  class="checkbox__input"
                  v-model="unselectAll"
                >
                <label
                  for="unselect-all"
                  class="checkbox__label checkbox__label--minus"
                >
                </label>
              </th>
              <th
                v-for="field in fields"
                :key="field.key"
              >
                {{ field.title }}
              </th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="item in items"
              :key="item.id"
            >
              <td>
                <input
                  type="checkbox"
                  :id="item.id"
                  class="checkbox__input"
                  v-model="selected"
                  :value="item.id"
                >
                <label
                  :for="item.id"
                  class="checkbox__label"
                >
                </label>
              </td>
              <td
                v-for="field in fields"
                :key="field.key"
              >
                {{ item[field.name] }}
              </td>
              <td>
                <div class="datatable__behavior">
                  <router-link
                    :to="`/${apiName}/${item.id}`"
                    class="btn btn--small btn--info"
                  >
                    <i class="fal fa-link"></i>
                    <span>Show</span>
                  </router-link>
                  <router-link
                    :to="`/${apiName}/${item.id}/edit`"
                    class="btn btn--small btn--success"
                  >
                    <i class="fal fa-edit"></i>
                    <span>Edit</span>
                  </router-link>
                  <a
                    href=""
                    class="btn btn--small btn--danger js-modal"
                  >
                    <i class="fal fa-trash-alt"></i>
                    <span>Delete</span>
                  </a>
                  <confirm-delete
                    :id="item.id"
                    @deleteData="deleteData"
                  >
                  </confirm-delete>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div
        class="datatable__footer"
        v-if="items.length"
      >
        <span>Showing {{ pagination.from }} to {{ pagination.to }} of {{ pagination.total }} items</span>
        <pagination
          :pagination="pagination"
          @pageNavigation="pageNavigation"
        >
        </pagination>
      </div>
      <div
        class="datatable__status"
        v-if="noData"
      >
        No data available in table
      </div>
      <div
        class="datatable__status"
        v-if="keywords.length && !items.length"
      >
        No matching records found
      </div>
    </div>
  </v-card>
</template>

<script>
  import toastr from 'toastr'
  import Pagination from './Pagination'
  import ConfirmDelete from './ConfirmDelete'

  export default {
    components: {
      Pagination,
      ConfirmDelete
    },
    props: {
      fields: {
        type: Array
      },
      apiName: {
        type: String,
        required: true
      },
    },
    data() {
      return {
        inheritUrl: `api/admin/${this.apiName}/`,
        perPage: 10,
        perPageOptions: [
          {
            key: 1,
            value: 10
          },
          {
            key: 2,
            value: 25
          },
          {
            key: 3,
            value: 50
          },
          {
            key: 4,
            value: 100
          }
        ],
        pagination: {},
        items: [],
        noData: false,
        selected: [],
        keywords: '',
        deleting: false
      }
    },
    computed: {
      selectAll: {
        get() {
          return this.items.length ? this.selected.length === this.items.length : false
        },
        set(value) {
          let selected = []

          if (value) {
            this.items.forEach(item => {
              selected.push(item.id)
            })
          }

          this.selected = selected
        }
      },
      unselectAll: {
        get() {
          return this.selected.length && this.selected.length !== this.items.length ? true : false
        },
        set() {
          this.selected = []
        }
      }
    },
    methods: {
      fetchData(perPage) {
        this.$Progress.start()

        let apiUrl = this.inheritUrl + 'index/' + perPage

        axios.get(apiUrl).then(response => {
          this.$Progress.finish()
          this.pagination = response.data
          this.items = response.data.data

          let selected = this.items.map(currentValue => {
            return currentValue.id
          })

          this.selected = selected.filter(currentValue => {
            return this.selected.indexOf(currentValue) > -1
          })

          !this.items.length ? this.noData = true : this.noData = false
        })
      },
      pageNavigation(page) {
        this.$Progress.start()

        if (this.keywords) {
          var apiUrl = this.inheritUrl + this.perPage + '/search?q=' + this.keywords + '&page=' + page
        } else {
          var apiUrl = this.inheritUrl + 'index/' + this.perPage + '?page=' + page
        }

        axios.get(apiUrl).then(response => {
          this.$Progress.finish()
          this.pagination = response.data
          this.items = response.data.data
        })
      },
      selectItemsPerPage(perPage) {
        this.keywords ? this.search(perPage) : this.fetchData(perPage)
      },
      search(perPage) {
        this.$Progress.start()

        let apiUrl = this.inheritUrl + this.perPage + '/search?q=' + this.keywords

        axios.get(apiUrl).then(response => {
          this.$Progress.finish()

          if (this.keywords.length) {
            this.pagination = response.data
            this.items = response.data.data
          } else {
            this.fetchData(this.perPage)
          }
        })
      },
      deleteData(id) {
        this.$Progress.start()
        this.deleting = true

        if (this.selected.length) {
          var apiUrl = this.inheritUrl + this.selected
        } else {
          var apiUrl = this.inheritUrl + id
        }

        axios.delete(apiUrl).then(() => {
          this.$Progress.finish()
          this.deleting = false
          this.fetchData(this.perPage)

          toastr.success('Deleted successfully!')
        })
      }
    },
    created() {
      this.fetchData(this.perPage)
    }
  }
</script>
