<template>
    <!-- SELECT -->
    <div class="mt-2 sm:mt-0">
      <select class="w-full bg-gray-100 text-gray-900 border border-gray-300 rounded px-3 py-3"
        v-model="type"
        @change="changed"
      >
        <option value="">- Select - Type</option>
        <option
          v-for="type in types"
          :key="type.id"
          :value="type.id"
        >
          {{ type.name }}
        </option>
      </select>
    </div> <!-- SELECT -->
</template>

<script>
import { mapGetters, mapActions } from 'vuex'

export default {
  data() {
    return {
      type: ''
    }
  },
  computed:{
    ...mapGetters({
      types: 'resources/types',
      resetFilters: 'filters/resetFilters'
    })
  },
  methods:{
    ...mapActions({
      updateFilterType: 'filters/updateFilterType'
    }),
    changed(){
      this.updateFilterType(this.type)
    }
  },
  watch:{
    resetFilters(resetFilters){
      if(resetFilters){
        this.type = ''
        this.changed()
      }
    }
  }

}

</script>
