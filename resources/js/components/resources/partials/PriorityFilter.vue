<template>
    <!-- SELECT -->
    <div class="">
      <select class="w-full bg-gray-100 text-gray-900 border border-gray-300 rounded px-3 py-3"
        v-model="priority"
        @change="changed"
      >
        <option value="">- Select - Priority</option>
        <option
          v-for="priority in priorities"
          :key="priority.id"
          :value="priority.id"
        >
          {{ priority.name }}
        </option>
      </select>
    </div> <!-- SELECT -->
</template>

<script>
import { mapGetters, mapActions } from 'vuex'

export default {
  data() {
    return {
      priority: ''
    }
  },
  computed:{
    ...mapGetters({
      priorities: 'resources/priorities',
      resetFilters: 'filters/resetFilters'
    })
  },
  methods: {
    ...mapActions({
      updateFilterPriority: 'filters/updateFilterPriority'
    }),
    changed(){
      this.updateFilterPriority(this.priority)
    }

  },
  watch:{
    resetFilters(resetFilters){
      if(resetFilters){
        this.priority = ''
        this.changed()
      }
    }
  }

}
</script>
