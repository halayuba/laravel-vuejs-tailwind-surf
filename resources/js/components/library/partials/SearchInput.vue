<template>
  <div class="w-full relative my-4">

    <!-- SEARCH ICON -->
    <figure class="absolute top-0 left-0 pl-2 flex items-center h-full">
      <icon name="search" class="w-6 h-6 fill-current text-gray-400 inline-block" />
    </figure>

    <!-- CLEAR SEARCH -->
    <figure class="absolute right-0 top-0 pr-4 mt-2 flex items-center text-red-500 cursor-pointer" title="clear search"
      @click="clearSearch"
      v-if="searchField"
    >
      <icon name="backspace" class="w-10 h-10" />
    </figure>

    <input class="w-full pl-10 pr-4 py-4 bg-gray-200 border border-gray-400 outline-none" placeholder="Search" autofocus
      v-model="searchField"
      @input="quickSearch"
    >

  </div> <!-- SEARCH -->
</template>

<script>

  export default {
    data() {
      return {
        searchField: '',
      }
    },
    methods: {
      clearSearch() {
        this.searchField = ''
        this.$emit('clearSearch')
      },
      quickSearch(e){
        this.$emit('quickSearch', e.target.value)
      }

    }
  }
</script>
