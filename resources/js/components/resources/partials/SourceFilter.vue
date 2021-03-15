<template>
    <!-- SELECT -->
    <div class="mt-2 sm:mt-0">
      <select class="w-full bg-gray-100 text-gray-900 border border-gray-300 rounded px-3 py-3"
        v-model="source"
        @change="changed"
      >
        <option value="">- Select - Source</option>
        <option
          v-for="source in sources"
          :key="source.id"
          :value="source.id"
        >
          {{ source.name }}
        </option>
      </select>
    </div> <!-- SELECT -->
</template>

<script>
  import { mapGetters, mapActions } from 'vuex'

  export default {
    data() {
      return {
        source: '',
      }
    },
    computed:{
      ...mapGetters({
        sources: 'resources/sources',
        resetFilters: 'filters/resetFilters'
      })
    },
    methods:{
      ...mapActions({
        updateFilterSource: 'filters/updateFilterSource'
      }),
      changed(){
        this.updateFilterSource(this.source)
      }
    },
    watch:{
      resetFilters(resetFilters){
        if(resetFilters){
          this.source = ''
          this.changed()
        }
      }
    }

  }
</script>
