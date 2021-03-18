<template>
  <div class="">

    <!-- ALERT COMPONENTS -->
    <error-alert
      v-if="errorsExist"
      :errors="errors"
    />

    <!-- CARD -->
    <div class="mt-4 sm:mt-0 bg-white rounded-lg shadow-cc p-2 text-sm text-gray-600">

      <!-- TITLE -->
      <a class="px-2 py-2 leading-tight hover:bg-gray-50 block"
        :href="resource.url"
      >
        <div class="flex justify-between">

          <!-- LEARNING MATERIAL SOURCE -->
          <source-icons :source="resource.source.name" />

          <status-indicator :status="resource.status.name" />
        </div>

        <p class="mt-1 block">{{ resource.title }}</p>

        <!-- LINK -->
        <icon name="link" class="w-4 h-4 fill-current text-gray-400 hover:text-gray-500 inline-block ml-1" />
      </a>

      <!-- AUTHOR -->
      <div class="px-2 flex items-center">
        <icon name="user" class="w-4 h-4" />
        <span class="ml-2 text-xs">{{ resource.author }}</span>
      </div>

      <!-- ACTION BUTTONS -->
      <div class="mt-2 pt-2 px-4 flex justify-between border-t border-gray-200">

        <!-- SHOW DETAILS -->
        <a href="#" class="rounded-sm bg-blue-500 hover:bg-blue-400 text-white px-2 py-1"
          @click.prevent="showModal = 'details'"
        >
          <font-awesome-icon icon="eye" />
        </a>

        <!-- RIGHT SIDE GROUP ACTIONS -->
        <div class="flex items-center">

          <!-- TOGGLE COMPLETE CHECKBOX -->
          <a href="#" class=""
            @click.prevent="toggleDone(resource.id)"
          >
            <span class="rounded-sm bg-gray-500 hover:bg-gray-400 text-white px-2 py-1"
              v-if="resourceComplete"
            >
              <font-awesome-icon icon="undo" />
            </span>
            <span class="rounded-sm bg-green-500 hover:bg-green-400 text-white px-2 py-1"
              v-else
            >
              <font-awesome-icon icon="check-square" />
            </span>
          </a> <!-- TOGGLE COMPLETE CHECKBOX -->

          <!-- EDIT -->
          <a href="#" class="rounded-sm bg-yellow-500 hover:bg-yellow-400 text-white px-2 py-1 ml-1" title="Edit"
            @click.prevent="editResource"
          >
            <font-awesome-icon icon="edit" />
          </a>

          <!-- DELETE -->
          <a href="#" class="rounded-sm bg-red-500 hover:bg-red-400 text-white px-2 py-1 ml-1" title="delete"
            @click.prevent="deleteResource(resource.id)"
          >
            <font-awesome-icon icon="trash" />
          </a>

        </div>
      </div> <!-- ACTIONS -->

    </div> <!-- CARD -->

    <!-- SHOW / EDIT RESOURCE DETAILS -->
    <base-modal
      v-show="showModal"
      @closeModal="showModal = ''"
    >
       <template #content>

         <!-- SHOW RESOURCE DETAIL -->
         <ResourceDetailsModal v-if="showModal==='details'" :resource="resource" />

         <!-- EDIT RESOURCE -->
         <EditResourceModal v-if="showModal==='edit'" :resource="resource" @closeModal="showModal = ''" />

       </template>
    </base-modal>

  </div>
</template>

<script>
  import { mapActions, mapGetters } from 'vuex'
  import ResourceDetailsModal from './modals/ResourceDetailsModal'
  import EditResourceModal from './modals/EditResourceModal'
  import BaseModal from './modals/BaseModal'
  import ErrorAlert from '@/misc/ErrorAlert'
  import SourceIcons from "./partials/SourceIcons"
  import StatusIndicator from "./partials/StatusIndicator"

  export default {
    data() {
      return {
        showModal: '',
        editModalOpen: false,
        errors: []
      }
    },
    props: {
      resource: { required: true }
    },
    components: {
      ResourceDetailsModal,
      EditResourceModal,
      BaseModal,
      ErrorAlert,
      SourceIcons,
      StatusIndicator
    },
    computed:{
      ...mapGetters({
        auth: 'auth/auth',
      }),
      errorsExist() {
        return this.errors.length > 0
      },
      resourceComplete(){
        return this.resource.status.name == "Completed"
      }
    },
    methods: {
      ...mapActions({
        updateResourceCompletion: 'resources/updateResourceCompletion',
        removeResource: 'resources/removeResource',
        resetAllFilters: 'filters/resetAllFilters'
      }),
      toggleDone(resourceId) {
        /* == UPDATE STATE == */
        this.updateResourceCompletion(resourceId)
          .then(response => {
            /* == ALERT MESSAGE == */
            this.$toastr.s('Updated successfully')
            location = response.data.redirect
          })
          .catch(error => {
            this.$toastr.e('Update failed!')
          })
      },
      editResource(resourceId){
        if(this.auth){
          this.showModal = 'edit'
        } else {
          this.$toastr.w('No user logged in')
          location = '/login'
        }
      },
      deleteResource(resourceId) {
        this.removeResource(resourceId)
        .then(response => {
          this.$toastr.s('Deleted successfully')
          this.resetAllFilters()
          location = response.data.redirect
        })
        .catch(error => {
          if(error.response.status === 403){
            this.$toastr.e("You are not authorized to create users.")
          } else if(error.response.status === 500){
            this.$toastr.e("Internal Server Error.")
          } else {
            this.flashErrors(error.response.data.errors)
            this.$toastr.e(error.response.data.message)
          }
        })
      },
      flashErrors(errors) {
        for( const [key, value] of Object.entries(errors)) {
          for(let item in value) {
            if( value[item] ) this.errors.push(value[item])
          }
        }
      },

    },

  }
</script>
