<template>
  <div class="">
    <div class="mt-4 xl:mt-0 flex justify-end w-auto">
      <a href="#" class="flex justify-center items-center inline-block px-6 py-4 leading-none bg-gray-800 hover:bg-gray-700 text-sm font-medium text-white rounded"
        @click.prevent="addResource"
      >
        Add Resource
      </a>
    </div> <!-- ADD NEW Resource -->

    <!-- ADD NEW RESOURCE DETAILS -->
    <base-modal
      v-show="showModal"
      @closeModal="showModal = false"
    >
       <template #content>
         <add-resource-modal />
       </template>
    </base-modal>

  </div>
</template>

<script>
  import { mapGetters } from 'vuex'
  import AddResourceModal from '../modals/AddResourceModal'
  import BaseModal from '../modals/BaseModal'

  export default {
    data() {
      return {
        showModal: false,
      }
    },
    components:{
      AddResourceModal,
      BaseModal
    },
    computed: {
      ...mapGetters({
        auth: 'auth/auth',
      }),
    },
    methods: {
      addResource(){
        if(this.auth){
          this.showModal = true
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
