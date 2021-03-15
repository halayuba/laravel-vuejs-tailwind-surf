<template>
  <!-- FILTERS -->
  <div class="mt-4 xl:mt-0 xl:flex-1 sm:grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 sm:gap-2 md:gap-4 px-2 xl:px-0">

    <!-- PRIORITY -->
    <priority-filter />

    <!-- SOURCE -->
    <source-filter />

    <!-- STATUS -->
    <status-filter />

    <!-- TYPE -->
    <type-filter />

      <!-- RESET -->
      <div class="mt-4 sm:mt-0 sm:ml-2 flex justify-center sm:justify-start items-center">
        <figure class="inline-block cursor-pointer p-2 bg-gray-800 rounded-lg" title="Reset all filters "
          v-if="! noFilterSelected"
          @click="resetAllFilters"
        >
          <icon name="undo" class="w-4 h-4 fill-current text-gray-100 hover:text-red-500" />
        </figure>
      </div>

  </div> <!-- FILTERS -->
</template>

<script>
import { mapActions, mapGetters } from 'vuex'

import PriorityFilter from './PriorityFilter'
import SourceFilter from './SourceFilter'
import TypeFilter from './TypeFilter'
import StatusFilter from './StatusFilter'

  export default {
    components: {
      PriorityFilter,
      SourceFilter,
      TypeFilter,
      StatusFilter,
    },
    computed:{
      ...mapGetters({
        filterPriority: 'filters/filterPriority',
        filterSource: 'filters/filterSource',
        filterStatus: 'filters/filterStatus',
        filterType: 'filters/filterType'
      }),
      noFilterSelected(){
        return this.filterPriority == '' && this.filterSource == '' && this.filterStatus == '' && this.filterType == ''
      }
    },
    methods:{
      ...mapActions({
        resetAllFilters: 'filters/resetAllFilters'
      }),
    },

  }
</script>
