<template>
  <div class="max-w-7xl mx-auto px-2 py-4 sm:p-6 xl:p-8">

    <!-- LOADING SPINNER -->
    <div class="mt-5 row justify-content-center"
      v-if="fetching && results == ''"
    >
      <span class="sr-only">Loading...</span>
    </div> <!-- LOADING SPINNER -->

    <div class="mt-5"
      v-if="results !== ''"
    >
      <Resources :resources="results" />
    </div>
    <div class="mt-4 py-6"
      v-if="!fetching && results == ''"
    >
      <div class="alert-no-records">
        There are no Resources to display
      </div>
    </div>

  </div>
</template>

<script>
  import { mapActions, mapGetters } from 'vuex'
  import Resources from './Resources'

  export default {
    data() {
      return {
        results: '',
        fetching: false,
      }
    },
    components:{
      Resources
    },
    // computed:{
    //   ...mapGetters({
    //     auth: 'Resources/auth'
    //   })
    // },
    methods: {
      ...mapActions({
        getResources: 'resources/getResources',
        getSources: 'resources/getSources',
        getTypes: 'resources/getTypes',
        getStatuses: 'resources/getStatuses',
        getPriorities: 'resources/getPriorities',
        userAuth: 'auth/userAuth',
      }),
      async fetchResources() {
        this.fetching = true
        try {
          this.getResources()
            .then(response => {
              this.results = response
              this.$toastr.s('Resources have been retrieved successfully')
              this.fetching = false
            })
        } catch (error) {
          this.$toastr.e(error.data.response.errors)
          this.fetching = false
        }
      },
      async fetchSources() {
        try {
          this.getSources()
            .then(response => {
              // this.$toastr.s('Learning sources have been retrieved successfully')
            })
        } catch (error) {
          this.$toastr.e(error.data.response.messsage)
        }
      },
      async fetchTypes() {
        try {
          this.getTypes()
            .then(response => {
              // this.$toastr.s('Learning types have been retrieved successfully')
            })
        } catch (error) {
          this.$toastr.e(error.data.response.messsage)
        }
      },
      async fetchStatuses() {
        try {
          this.getStatuses()
            .then(response => {
              // this.$toastr.s('Learning types have been retrieved successfully')
            })
        } catch (error) {
          this.$toastr.e(error.data.response.messsage)
        }
      },
      async fetchPriorities() {
        try {
          this.getPriorities()
            .then(response => {
              // this.$toastr.s('Learning types have been retrieved successfully')
            })
        } catch (error) {
          this.$toastr.e(error.data.response.messsage)
        }
      },

    },
    mounted() {
      this.fetchResources()
      this.fetchSources()
      this.fetchTypes()
      this.fetchStatuses()
      this.fetchPriorities()
      this.userAuth()
    },

  }
</script>
