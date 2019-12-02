<template>
  <nav class="flex justify-between px-2 py-2">
    <span class="px-3 text-xl text-gray-600 py-2">
      Showing Up to
      {{ paginator.uptoItems | currency }}
      results out of
      {{ paginator.totalItems | currency }}
    </span>
    <ul
      class="flex list-reset border border-grey-light rounded w-auto"
      v-if="paginator.shouldPaginate"
    >
      <li class="page-item" :class="{ disabled: paginator.onFirstPage }">
        <a
          class="block hover:text-gray-400 hover:bg-blue text-blue border-r border-grey-light px-3 py-2"
          href="#"
          aria-label="Previous"
          @click="--paginator.currentPage"
        >
          <span aria-hidden="true">&laquo;</span>
          <span>Previous</span>
        </a>
      </li>
      <template v-for="(link, index) in paginator.links">
        <li class="page-item" :key="index" :class="stateClass(link)">
          <a
            class="block hover:text-gray-400 hover:bg-blue text-blue border-r border-grey-light px-3 py-2"
            href="#"
            @click.prevent="paginator.currentPage = link"
          >{{ link }}</a>
        </li>
      </template>

      <li class="page-item" :class="{ disabled: paginator.onLastPage }">
        <a
          class="block hover:text-gray-400 hover:bg-blue text-blue px-3 py-2"
          href="#"
          aria-label="Next"
          @click.prevent="++paginator.currentPage"
        >
          <span>Next</span>
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
    </ul>
  </nav>
</template>

<script>
import { range } from "lodash";

export default {
  props: ["paginator"],

  methods: {
    stateClass(link) {
      if (typeof link == "string") {
        return "disabled";
      }
      if (link == this.paginator.currentPage) {
        return "active";
      }
    }
  }
};
</script>
