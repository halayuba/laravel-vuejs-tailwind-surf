<template>
    <!-- SELECT -->
    <div class="mt-2 sm:mt-0">
      <select class="w-full bg-gray-100 text-gray-900 border border-gray-300 rounded px-3 py-3"
        v-model="status"
        @change="changed"
      >
        <option value="">- Select - Status</option>
        <option
          v-for="status in statuses"
          :key="status.id"
          :value="status.id"
        >
          {{ status.name }}
        </option>
      </select>
    </div> <!-- SELECT -->
</template>

<script>
import { mapGetters, mapActions } from 'vuex'

export default {
  data() {
    return {
      status: ''
    }
  },
  computed:{
    ...mapGetters({
      statuses: 'resources/statuses',
      resetFilters: 'filters/resetFilters'
    })
  },
  methods:{
    ...mapActions({
      updateFilterStatus: 'filters/updateFilterStatus'
    }),
    changed(){
      this.updateFilterStatus(this.status)
    }
  },
  watch:{
    resetFilters(resetFilters){
      if(resetFilters){
        this.status = ''
        this.changed()
      }
    },
  }

}

</script>
