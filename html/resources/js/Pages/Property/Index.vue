<template>
  <div class="p-4">
    <div class="w-full flex gap-4">
      <button @click="prevPage">Prev</button>
      <button @click="nextPage">Next</button>
      <input type="text" v-model="search">
    </div>
    <div class="grid grid-cols-4 gap-2 mt-4">
      <div v-for="property in properties.data" :key="property.id">
        <div class="w-full">
          <img :src="property.photos.thumb">
          <p class="font-bold">{{ property.title }}</p>
          <p>{{ property.description }}</p>
          <p class="text-red-500">{{ property.for_sale ? "For Sale" : "Sold" }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

import {Inertia} from "@inertiajs/inertia";

export default {
  name: "Index",
  components: {},
  props: {
    properties: {
      type: Array,
      required: true
    },
    filters: {
      type: Array,
      default: []
    }
  },
  mounted() {

  },
  data() {
    return {
      currentPage: this.filters.page ?? 1,
      search: this.filters.search ?? null,
      debounce: null
    };
  },
  methods: {
    nextPage() {
      const nextPage = parseInt(this.currentPage) + 1;
      if (nextPage > parseInt(this.properties.meta.pagination.total_pages)) {
        return;
      }
      const url = route('properties.index') + this.locationFilter + '?page=' + nextPage + this.computedSearch;
      Inertia.visit(url);
    },
    prevPage() {
      const prevPage = parseInt(this.currentPage) - 1;
      if (prevPage <= 0) {
        return;
      }
      const url = route('properties.index') + this.locationFilter + '?page=' + prevPage + this.computedSearch;
      Inertia.visit(url);
    },

  },
  watch: {
    search() {
      const url = route('properties.index') + this.locationFilter + '?page=' + this.currentPage + this.computedSearch;
      clearTimeout(this.debounce)
      this.debounce = setTimeout(() => {
        this.$inertia.replace(url);
      }, 500);
    }
  },
  computed: {
    computedSearch() {
      this.currentPage = 1;
      if (this.search == null) {
        return ""
      }
      return "&search=" + this.search;
    },
    locationFilter() {
      if (this.filters?.province == null) {
        return "";
      }
      return "/" + this.filters.province
    },
  }

};
</script>
