<template>
  <div>

    <!-- SEARCH & FILTER BUTTONS -->
    <div class="mt-6 md:mt-8 xl:mt-12 flex flex-col sm:flex-row sm:justify-between sm:items-center">

      <!-- SEARCH FIELD -->
      <SearchInput
        @captured="quickSearch"
        @clearSearch="clearSearch"
      />

      <!-- ADD NEW RESOURCE BTN -->
      <AddNewResourceBtn />

    </div>

    <!-- SEARCH & FILTER BUTTONS -->
    <div class="mt-6 flex flex-col xl:flex-row xl:justify-between xl:items-center">

      <!-- FILTERS -->
      <filters />

    </div>


    <div class="mt-4 sm:grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 sm:gap-2 xl:gap-4"
      v-if="result"
    >
      <Resource
        v-for="resource in result"
        :key="resource.id"
        :resource="resource"
      />
    </div>

    <!-- ALERT MESSAGE -->
    <div class="alert-no-records mt-4 md:mt-8 xl:mt-24"
      v-if="alertMsg"
    >
      There are no Resources to display
    </div>

  </div>
</template>

<script>
  import { mapGetters } from 'vuex'
  import Resource from  './Resource'
  import AddNewResourceBtn from './partials/AddNewResourceBtn'
  import SearchInput from './partials/SearchInput'
  import Filters from './partials/Filters'

  export default {
    data() {
      return {
        result: [],
        alertMsg: false,
      }
    },
    props: {
      resources: { required: true }
    },
    components: {
      Resource,
      AddNewResourceBtn,
      SearchInput,
      Filters
    },
    computed: {
      ...mapGetters({
        filterPriority: 'filters/filterPriority',
        filterSource: 'filters/filterSource',
        filterStatus: 'filters/filterStatus',
        filterType: 'filters/filterType',
        resetFilters: 'filters/resetFilters',
      }),
    },
    methods: {
      quickSearch(val) {
        /* == PERFORM IF THERE ARE RECORDS TO SEARCH THROUGH IN THE FIRST PLACE == */
        if(this.resources.length){
          let value = this.captureSearchValue(val)
          if(value){
            this.setList(this.resources.filter(resource => {
              return (
                ( resource.title.toLowerCase().includes(value) ) ||
                ( resource.author.toLowerCase().includes(value) )
              )
            }))
          }
        } else {
          this.$toastr.w('There are currently no records to perform any search on.')
        }
      },
      filteredSearch() {
        this.setList(this.resources.filter(resource => {
          return (
            ( this.filterPriority === "" || this.filterPriority === 0 || resource.priority.id === this.filterPriority ) &&
            ( this.filterSource === "" || this.filterSource === 0 || resource.source.id === this.filterSource ) &&
            ( this.filterStatus === "" || this.filterStatus === 0 || resource.status.id === this.filterStatus ) &&
            ( this.filterType === "" || this.filterType === 0 || resource.type.id === this.filterType )
          )
        }))
      },
      setList(filtered) {
        this.clearList()
        if(filtered.length){
          this.result = filtered
        } else {
          this.$toastr.i('No records found for the selected criteria.')
          this.alertMsg = true
        }
      },
      clearList() {
        this.result = []
        this.alertMsg = false
      },
      clearSearch() {
        this.alertMsg = false
        this.result = this.filterResult()
        // this.result = this.resources
      },
      captureSearchValue(value) {
        if( value && value.trim().length > 0) {
          return value.trim().toLowerCase()
        }
        else this.clearSearch()
      },
      processFilters(){
        if( !this.filterPriority && !this.filterSource && !this.filterType && !this.filterStatus ){
          this.clearSearch()
        } else {
          this.filteredSearch()
        }
      },
      /* == I PREFER TO INITIALLY SHOW A SUBSET OF THE ENTIRE LEARNING RESOURCES NOT TO INCLUDE "COMPLETE" / "CANCELED" / "DEFERRED" == */
      filterResult(){
        return this.resources.filter(item => {
          return item.status.name != "Completed" && item.status.name != "Canceled" && item.status.name != "Deferred"
        })
      },

    },
    watch:{
      resetFilters(resetFilters){
        if(resetFilters){
          this.clearSearch()
        }
      },
      filterPriority(filterPriority){
          this.processFilters()
      },
      filterSource(filterSource){
          this.processFilters()
      },
      filterStatus(filterStatus){
          this.processFilters()
      },
      filterType(filterType){
          this.processFilters()
      },

    },
    mounted(){
      this.result = this.filterResult()
    },
    // updated(){
    //   this.result = this.filterResult()
    // },

  }
</script>
