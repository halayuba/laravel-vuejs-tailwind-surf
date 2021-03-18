<template>
  <div>

    <!-- ALERT COMPONENTS -->
    <error-alert
      v-if="errorsExist"
      :errors="errors"
    />

    <h3 class="text-center my-2 lg:my-4 text-xl lg:text-2xl text-indigo-500 font-bold">Edit Resource</h3>

    <!-- FORM -->
    <form class="p-4"
      @submit.prevent="formSubmit"
    >

    <!-- SHOW ONLY FOR XL SCREEN -->
    <div class="w-full flex flex-col">

      <!-- TITLE -->
      <div class="w-full">
        <label for="title" class="form_label"
          :class="[ highlight ? 'text-red-500' : 'text-gray-700' ]"
        >
          Title
        </label>
        <input id="title" type="text" class="form_input"
          v-model="form.title"
          :class="{ 'border border-red-500' : highlight }"
        >
      </div>

      <!-- AUTHOR -->
      <div class="w-full mt-4">
        <label for="author" class="form_label"
          :class="[ highlight ? 'text-red-500' : 'text-gray-700' ]"
        >
          Author
        </label>
        <input id="author" type="text" class="form_input"
          v-model="form.author"
          :class="{ 'border border-red-500' : highlight }"
        >
      </div>

      <!-- URL -->
      <div class="w-full mt-4">
        <label for="url" class="form_label">URL</label>
        <input id="url" type="text" class="form_input"
          v-model="form.url"
        >
      </div>

      <!-- XL SCREEN SHOW BOTH PRIORITY & PAGES -->
      <div class="flex flex-col lg:flex-row mt-0 sm:mt-4">

        <!-- SOURCE -->
        <div class="w-full lg:flex-1 mt-4 lg:mt-0">
          <label for="skills" class="form_label">Source</label>
          <select class="form_input"
            v-model="form.source"
            v-if="sources.length"
          >
            <option class=""
              v-for="source in sources"
              :value="source.id"
              :selected="source.id === 7? 'selected' : '' "
            >
              {{ source.name }}
            </option>
          </select>
        </div>

        <!-- TYPE -->
        <div class="w-full lg:flex-1 mt-4 lg:mt-0 lg:ml-2">
          <label for="skills" class="form_label">Type</label>
          <select class="form_input"
            v-model="form.type"
            v-if="types.length"
          >
            <option class=""
              v-for="type in types"
              :value="type.id"
            >
              {{ type.name }}
            </option>
          </select>
        </div>

        <!-- PRIORITY -->
        <div class="w-full lg:flex-1 mt-4 lg:mt-0 lg:ml-2">
          <label for="priority" class="form_label">Priority</label>
          <select class="form_input"
            v-model="form.priority"
            v-if="priorities.length"
          >
            <option class=""
              v-for="priority in priorities"
              :value="priority.id"
            >
              {{ priority.name }}
            </option>
          </select>
        </div>
      </div>

      <!-- SKILLS -->
      <div class="mt-4">
        <label for="skills" class="form_label">Skills</label>
        <input id="skills" type="text" class="form_input"
          v-model="form.skills"
        >
      </div>

      <!-- NOTES -->
      <div class="mt-4">
        <label for="note" class="form_label">Note</label>
        <textarea id="note" class="form_textarea resize-none" rows="3"
          v-model="form.note"
        ></textarea>
      </div> <!-- NOTES -->

    </div> <!-- END CONTAINING DIV -->

    <!-- BUTTONS -->
    <div class="flex mt-8">

      <!-- UPDATE -->
      <button type="submit" class="flex-1 xl:text-xl xl:px-16"
        :class="btnState"
      >
        Save
      </button>

    </div> <!-- END BUTTONS -->

    </form>
  </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'
import ErrorAlert from '@/misc/ErrorAlert'

export default {
  data () {
    return {
      highlight: false,
      errors: [],
      form:{
        title: this.resource.title,
        author: this.resource.author,
        url: this.resource.url,
        skills: this.resource.skills,
        note: this.resource.note,
        priority: this.resource.priority.id,
        source: this.resource.source.id,
        type: this.resource.type.id
      }
    }
  },
  components:{
    ErrorAlert,
  },
  props: {
    resource: { required: true }
  },
  computed: {
    ...mapGetters({
      sources: 'resources/sources',
      types: 'resources/types',
      priorities: 'resources/priorities',
    }),
    formEditIsReady() {
      return ( this.form.title && this.form.author && this.form.url ) ? true : false
    },
    btnState() {
      return {
        'pointer-events-none btn_cancel opacity-25': ! this.formEditIsReady,
        'btn_wide': this.formEditIsReady,
      }
    },
    errorsExist() {
      return this.errors.length > 0
    },

  },
  methods: {
    ...mapActions({
      updateResource: 'resources/updateResource',
    }),
    formSubmit() {
      if ( this.formEditIsReady ) {
        this.updateResource({
          payload: this.form,
          resourceId: this.resource.id
        })
        .then(response => {
          this.$toastr.s('Updated successfully')
          this.closeForm()
          location = response.data.redirect
        })
        .catch(error => {
          if(error.response.status === 403){
            this.$toastr.e("You are not authorized for this action.")
          } else if(error.response.status === 419){
            this.$toastr.e("CSRF token mismatch.")
          } else if(error.response.status === 500){
            this.$toastr.e("Internal Server Error.")
          } else if(error){
            this.flashErrors(error.response.data.errors)
            this.$toastr.e(error.response.data.message)
          }
        })
      } else {
        this.highlight = true
        this.$toastr.e('Missing required fields.')
      }

    },
    flashErrors(errors) {
      for( const [key, value] of Object.entries(errors)) {
        for(let item in value) {
          if( value[item] ) this.errors.push(value[item])
        }
      }
    },
    closeForm() {
      this.form.title = this.form.author = this.form.url = ''
      this.$emit('closeModal')
    },

  },

}
</script>
