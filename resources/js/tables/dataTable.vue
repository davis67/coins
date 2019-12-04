<template>
  <div class="w-full">
    <div class="w-full">
      <div class="flex justify-between mb-2" v-if="title">
        <span></span>
        <h3 class="text-md" v-text="title"></h3>
        <span>
          <slot name="icons"></slot>
        </span>
      </div>

      <div class="flex align-items-center mb-2 justify-between">
        <!-- <slot></slot> -->

        <div class="flex justify-between align-items-center">
          <span class="mx-2 font-size-2 text-dark">Show</span>
          <select
            class="block appearance-none bg-white border border-gray-700 py-1 px-2 pr-8 rounded focus:outline-none focus:bg-white focus:border-gray-500"
            @change="changePerPage"
          >
            <option>5</option>
            <option selected>10</option>
            <option>25</option>
            <option>50</option>
            <option>100</option>
          </select>
          <span class="mx-2 font-size-2 text-dark">entries</span>
        </div>
        <span class="font-size-2" v-if="results.totalItems">
          Page
          <span class="text-primary">
            {{
            results.currentPage | currency
            }}
          </span>
          of
          <span class="text-primary">
            {{
            results.lastPage | currency
            }}
          </span>
        </span>
        <input
          type="search"
          class="block appearance-none bg-white border border-gray-700 py-3 px-2 pr-8 rounded focus:outline-none focus:bg-white focus:border-gray-500"
          placeholder="search ....."
          v-model="query"
        />
      </div>

      <div class="relative" :class="{ backdrop: searchText }">
        <table class="table-auto w-full shadow-md rounded" :class="{ 'table-hover': rowClickable }">
          <thead>
            <tr class="text-left bg-gray-300 border-b border-grey uppercase">
              <th class="px-2 py-4">#</th>
              <th
                class="text-sm table-cell text-gray-700"
                v-for="(column, index) in columns"
                :key="index"
                v-text="column.label"
                :class="column.cellClass"
              ></th>
            </tr>
          </thead>
          <tbody class="bg-white">
            <tr class="accordion border-b border-grey-light hover:bg-gray-100" v-if="searchText">
              <td :colspan="columns.length + 1" class="text-center">
                <i class="fa fa-spin fa-spinner"></i>
                {{ searchText }} ............
              </td>
            </tr>
            <table-row
              v-for="(row, index) in results.collection"
              @clicked="$emit('rowClicked', row.data)"
              :key="index"
              :row="row"
              :columns="columns"
              :rowClickable="rowClickable"
            >
              <!-- pass the current numbering to the table row -->
              {{ results.startingIndex + index }}.
            </table-row>
            <tr
              v-if="results.isEmpty"
              class="accordion border-b border-grey-light hover:bg-gray-100"
            >
              <td
                class="table-cell px-3 py-4 text-center"
                :colspan="columns.length + 1"
              >No Records Were Found</td>
            </tr>
          </tbody>
          <tfoot v-if="$slots.foot && !results.isEmpty">
            <slot name="foot"></slot>
          </tfoot>
        </table>
      </div>
      <pagination-links :paginator="results"></pagination-links>
      <div style="display:none;">
        <slot></slot>
      </div>
    </div>
  </div>
</template>

<script>
import { get, debounce } from "lodash";

import Paginator from "./Paginator";

import PaginationLinks from "./links";

import TableRow from "./tableRow";

import Column from "./Column";

import Row from "./Row";

export default {
  components: { PaginationLinks, TableRow },

  props: {
    data: { required: true, type: [Array, Object] },
    title: { default: false },
    rowClickable: { default: false }
  },

  data() {
    return {
      searchText: false,
      results: new Paginator(this.data),
      query: "",
      columns: [],
      rows: []
    };
  },
  mounted() {
    let columns = this.$slots.default || [];
    this.columns = columns
      .filter(column => column.componentInstance)
      .map(column => new Column(column.componentInstance));

    //this.columns = columns;
    this.mapDatatoRows();
  },
  methods: {
    mapDatatoRows() {
      //ensure we reset the rows
      let rows = [];
      //just in case the data structure is an object
      for (let row in this.data) {
        rows.push(new Row(this.data[row], this.columns));
      }
      this.rows = rows;
      this.results.items = rows;

      //this.$set(this.results, "items", rows);
    },
    search: debounce(function() {
      this.searchText = false;
      this.results.items = this.rows.filter(row =>
        row.passesFilter(this.query)
      );
      //console.log(this.results.items);
    }, 300),

    changePerPage(event) {
      this.results.perPage = event.target.value;
    }
  },
  computed: {
    hasSomeData() {
      if (Array.isArray(this.data)) {
        return this.data.length > 0;
      }
      const keys = Object.keys(this.data);
      return keys && keys.length > 0;
    }
  },
  watch: {
    query(newValue) {
      if (!this.hasSomeData) {
        return;
      }
      if (newValue) {
        this.searchText = "Waiting for you to finish typing";
        this.search();
      } else {
        this.results.items = this.rows;
      }
    },
    data(newData) {
      this.mapDatatoRows();
    }
  }
};
</script>
<style scoped lang="scss"></style>
