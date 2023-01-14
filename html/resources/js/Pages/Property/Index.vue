<template>
  <div class="p-4">
    <div class="w-full flex gap-4">
      <button>Prev</button>
      <button>Next</button>
    </div>
    <div class="grid grid-cols-4 gap-2 mt-4">
      <div v-for="property in properties.data" :key="property.id">
        <div class="w-full">
          <img :src="property.photos.thumb">
          <p>{{ property.title }}</p>
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
  },
  mounted() {
    console.log('-----------------');
    console.log(this.properties);
    console.log('-----------------');
  },
  data() {
    return {
      currentPage: 1,
    };
  },
  methods: {
    nextPage() {
      const nextPage = this.currentPage + 1;
      if (nextPage > this.properties.meta.total_pages) {
        return;
      }
      Inertia.visit(route())

    },
    prevPage() {

    },

  },
  watch: {},
  computed: {}

};
</script>
