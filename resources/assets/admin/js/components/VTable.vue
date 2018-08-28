<template>
  <div>
    <div
      class="card"
      v-if="!noData"
    >
      <div class="card__header">
          <span
            :class="{ 'placeholder': loading }"
            v-if="!selectedItems.length"
          >
            {{ capitalizeTable }}
          </span>
          <span
            :class="{ 'placeholder': loading }"
            v-if="selectedItems.length"
          >
            {{ selectedItems.length }} {{ singularOrPluralTable }} selected
          </span>
        <div class="btn-group">
          <div
            class="dropdown dropdown--checkbox"
            :class="{ 'placeholder': loading }"
          >
            <button class="btn btn--icon tooltip tooltip--top">
              <span>Manage columns</span>
            </button>
            <div class="dropdown__menu dropdown__menu--right">
              <div
                v-for="(column, index) in columns"
                :key="index"
              >
                <input
                  type="checkbox"
                  :id="column.name"
                  :value="column.name"
                  v-model="selectedColumns"
                >
                <label
                  :for="column.name"
                  :class="{ 'disabled': column.name === 'id' || column.name === 'name' }"
                >
                  {{ column.displayName }}
                </label>
              </div>
              <div
                class="dropdown__item"
                @click="selectAllColumns"
              >
                Select all
              </div>
            </div>
          </div>
          <button
            class="btn btn--icon tooltip tooltip--top"
            :class="{ 'placeholder': loading }"
            @click="getData(perPage)"
          >
            <span>Refresh</span>
          </button>
        </div>
      </div>
      <div class="card__body">
        <div class="datatable">
          <div class="datatable__header">
            <div class="datatable__action">
              <button
                class="btn btn--danger"
                data-modal="delete-modal"
                v-if="selectedItems.length"
                :class="{
                  'placeholder': loading,
                  'disabled': deleting === 'Deleting'
                }"
              >
                {{ deleting }}
              </button>
              <ConfirmDelete
                :table="table"
                :selected-items="selectedItems"
                @deleteData="deleteData"
              >
              </ConfirmDelete>
               <router-link
                :to="`/${table}/create`"
                class="btn btn--primary"
                :class="{ 'placeholder': loading }"
              >
                Add {{ singularTable }}
              </router-link>
            </div>
            <div class="datatable__filter">
              <div
                class="datatable__per-page"
                :class="{ 'placeholder': loading }"
              >
                <span>Show</span>
                <div class="dropdown dropdown--select">
                  <input
                    type="hidden"
                    v-model="perPage"
                  >
                  <button class="btn dropdown__toggle">
                    <span>{{ perPage }}</span>
                    <i class="fas fa-angle-down"></i>
                  </button>
                  <div class="dropdown__menu">
                    <div
                      class="dropdown__item"
                      v-for="(perPageItem, index) in perPages"
                      :key="index"
                      :class="{ 'disabled': perPageItem === perPage }"
                      @click="selectItemsPerPage(perPageItem)"
                    >
                      <span>{{ perPageItem }}</span>
                      <i
                        class="fas fa-check"
                        v-if="perPageItem === perPage"
                      >
                      </i>
                    </div>
                  </div>
                </div>
                <span>{{ table }}</span>
              </div>
              <form
                novalidate
                :class="{ 'placeholder': loading }"
              >
                <div class="form__input">
                  <input
                    type="text"
                    required
                    v-model="keywords"
                    @keyup="search"
                  >
                  <label>Search</label>
                </div>
              </form>
            </div>
          </div>
          <div class="datatable__body">
            <div
              class="datatable__content"
              :class="{ 'placeholder': loading }"
            >
              <table class="table">
                <thead>
                  <tr>
                    <th>
                      <input
                        type="checkbox"
                        id="select-all"
                        v-model="selectAll"
                      >
                      <label for="select-all"></label>
                    </th>
                    <th
                      v-for="(column, index) in visibleColumns"
                      :key="index"
                      @click="sortBy(column.name)"
                    >
                      <div class="table__action">
                        <div class="table__sort">
                          <i
                            :class="{
                              'fas fa-long-arrow-alt-up': true,
                              'active': sortKey === column.name && sortOrder === 'asc'
                            }"
                          >
                              
                          </i>
                          <i
                            :class="{
                              'fas fa-long-arrow-alt-down': true,
                              'active': sortKey === column.name && sortOrder === 'desc'
                            }"
                          >
                          </i>
                        </div>
                        <span>{{ column.displayName }}</span>
                      </div>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="(item, index) in sortedItems"
                    :key="index"
                  >
                    <td>
                      <input
                        type="checkbox"
                        :id="item.id"
                        :value="item.id"
                        v-model="selectedItems"
                      >
                      <label :for="item.id"></label>
                    </td>
                    <td
                      v-for="column in orderSelectedColumns"
                    >
                      <router-link
                        :to="`/${table}/${item.id}`"
                        v-if="column === 'name'"
                      >
                        {{ item[column] }}
                      </router-link>
                      <template v-else>{{ item[column] }}</template>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="datatable__status">
              <span v-if="!noData && keywords.length && !items.length">No matching records found</span>
            </div>
          </div>
          <div class="datatable__footer">
            <div :class="{ 'placeholder': loading }">
              Showing
                {{ pagination.from }}
              to
                {{ pagination.to }}
              of
                {{ pagination.total }}
              {{ table }}
              <span v-if="keywords">(filtered from {{ totalItems }} total {{ table }})</span>
            </div>
            <pagination
              :class="{ 'placeholder': loading }"
              :pagination="pagination"
              @redirectPage="redirectPage"
            >
            </pagination>
          </div>
        </div>
      </div>
    </div>
    <div
      class="row row--center"
      v-if="noData"
    >
      <div class="col-xl-6">
        <div class="empty-state">
          <img :src="`assets/admin/images/emptystate-${table}.svg`">
          <div class="empty-state__content">
            <span class="empty-state__title">No data available</span>
            <span class="empty-state__describe">Let's start creating your {{ table }}</span>
            <router-link
              :to="`/${table}/create`"
              class="btn btn--primary"
            >
              Create {{ singularTable }}
            </router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
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
      table: {
        type: String,
        required: true
      },
      columns: {
        type: Array,
        required: true
      }
    },
    data() {
      return {
        inheritUrl: `api/admin/${this.table}/`,
        perPage: 10,
        perPages: [10, 25, 50, 100],
        items: [],
        pagination: {},
        totalItems: '',
        loading: false,
        noData: false,
        selectedColumns: [],
        sortKey: 'id',
        sortOrder: 'asc',
        keywords: '',
        selectedItems: [],
        deleting: 'Delete'
      }
    },
    computed: {
      capitalizeTable() {
        return _.capitalize(this.table)
      },
      singularTable() {
        let table = this.table

        if (table.slice(-3) === 'ies') {
          table = table.slice(0, -3) + 'y'
        } else {
          table = table.slice(0, -1)
        }

        return table
      },
      orderSelectedColumns() {
        const columnNames = _.map(this.columns, 'name')

        return _.filter(columnNames, columnName => {
          return _.includes(this.selectedColumns, columnName)
        })
      },
      visibleColumns() {
        return _.filter(this.columns, column => {
          return _.includes(this.selectedColumns, column.name)
        })
      },
      sortedItems() {
        return _.orderBy(this.items, this.sortKey, this.sortOrder)
      },
      selectAll: {
        get() {
          return this.items.length ? this.selectedItems.length === this.items.length : false
        },
        set(value) {
          let itemIds = []

          if (value) {
            _.forEach(this.items, item => {
              itemIds.push(item.id)
            })
          }

          this.selectedItems = itemIds
        }
      },
      singularOrPluralTable() {
        return this.selectedItems.length > 1 ? this.table : this.singularTable
      }
    },
    created() {
      this.getData(this.perPage)
      this.selectAllColumns()
    },
    methods: {
      getData(perPage) {
        const apiUrl = this.inheritUrl + 'paginate/' + perPage

        this.$Progress.start()
        this.loading = true

        axios.get(apiUrl).then(response => {
          this.$Progress.finish()
          this.loading = false
          this.items = response.data.data
          this.pagination = response.data
          this.totalItems = response.data.total

          !this.items.length ? this.noData = true : this.noData = false

          const itemIds = _.map(this.items, 'id')

          this.selectedItems = _.filter(itemIds, itemId => {
            return this.selectedItems.indexOf(itemId) > -1
          })
        })
      },
      selectItemsPerPage(perPage) {
        this.perPage = perPage

        if (!this.noData) {
          this.keywords ? this.search(perPage) : this.getData(perPage)
        }
      },
      redirectPage(page) {
        this.$Progress.start()

        if (this.keywords) {
          var apiUrl = this.inheritUrl + this.perPage + '/search?q=' + this.keywords + '&page=' + page
        } else {
          var apiUrl = this.inheritUrl + 'paginate/' + this.perPage + '?page=' + page
        }

        axios.get(apiUrl).then(response => {
          this.$Progress.finish()
          this.pagination = response.data
          this.items = response.data.data
          this.selectedItems = []
        })
      },
      selectAllColumns() {
        this.selectedColumns = _.map(this.columns, 'name')
      },
      sortBy(sortKey) {
        this.sortKey = sortKey
        this.sortOrder === 'asc' ? this.sortOrder = 'desc' : this.sortOrder = 'asc'
      },
      search(perPage) {
        if (!this.noData) {
          let apiUrl = this.inheritUrl + this.perPage + '/search?q=' + this.keywords

          this.$Progress.start()

          axios.get(apiUrl).then(response => {
            this.$Progress.finish()

            if (this.keywords.length) {
              this.pagination = response.data
              this.items = response.data.data
            } else {
              this.getData(this.perPage)
            }
          })
        }
      },
      deleteData(ids) {
        const apiUrl = this.inheritUrl + this.selectedItems

        this.$Progress.start()
        this.deleting = 'Deleting'

        axios.delete(apiUrl).then(() => {
          this.$Progress.finish()
          this.deleting = 'Delete'
          this.getData(this.perPage)

          toastr.success('Deleted successfully!')
        })
      }
    }
  }
</script>
