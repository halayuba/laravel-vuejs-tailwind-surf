<template>
  <div class="">
    <div class="mt-4 xl:mt-0 flex justify-end w-auto">
      <a href="#" class="flex justify-center items-center inline-block px-6 py-4 leading-none bg-gray-800 hover:bg-gray-700 text-sm font-medium text-white rounded"
        @click.prevent="addResource"
      >
        Add Resource
      </a>
    </div> <!-- ADD NEW Resource -->

    <!-- MODAL -->
    <modal name="add-resource-modal" :adaptive="true" width="50%" height="auto" classes="bg-white rounded-lg p-4 shadow-sm">
      <add-resource-modal />
    </modal> <!-- MODAL -->
  </div>
</template>

<script>
  import { mapGetters } from 'vuex'
  import AddResourceModal from '../modals/AddResourceModal'

  export default {
    data() {
      return {

      }
    },
    components:{
      AddResourceModal,
    },
    computed: {
      ...mapGetters({
        auth: 'auth/auth',
      }),
    },
    methods: {
      addResource(){
        if(this.auth){
          this.$modal.show('add-resource-modal')
        } else {
          this.$toastr.w('No user logged in')
          setTimeout(function () {
            location = '/login'
          }, 2000);
        }
      },
    },
    mounted() {

    }
  }
</script>
