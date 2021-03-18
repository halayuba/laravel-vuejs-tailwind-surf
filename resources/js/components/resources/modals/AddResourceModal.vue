<template>
  <div>

    <!-- ALERT COMPONENTS -->
    <ErrorAlert
      v-if="errorsExist"
      :errors="errors"
    />

    <h3 class="text-center my-2 lg:my-4 text-xl lg:text-2xl text-indigo-500 font-bold">Add New Resource</h3>

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
        <input id="title" type="text" class="form_input" autofocus
          v-model="form.title"
          :class="{ 'border border-red-500' : highlight }"
          v-focus
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
          <label for="source" class="form_label">Source</label>
          <select id="source" class="form_input"
            v-model="form.source"
            v-if="sources.length"
          >
            <option disabled value="">Please select one</option>
            <option class=""
              v-for="source in sources"
              :value="source.id"
            >
              {{ source.name }}
            </option>
          </select>
        </div>

        <!-- TYPE -->
        <div class="w-full lg:flex-1 mt-4 lg:mt-0 lg:ml-2">
          <label for="type" class="form_label">Type</label>
          <select id="type" class="form_input"
            v-model="form.type"
            v-if="types.length"
          >
            <option disabled value="">Please select one</option>
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
          <select id="priority" class="form_input"
            v-model="form.priority"
            v-if="priorities.length"
          >
            <option disabled value="">Please select one</option>
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
    <div class="flex mt-8 w-full">

      <!-- SAVE -->
      <button type="submit" class="flex-1"
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
        title: '',
        author: '',
        url: '',
        skills: '',
        priority: 3,
        note: null,
        source: 7,
        type: 1,
        status:{
          'name': "Not Started"
        }
      }
    }
  },
  components:{
    ErrorAlert
  },
  computed: {
    ...mapGetters({
      resources: 'resources/resources',
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
      return this.errors ? this.errors.length > 0 : false
    },
  },
  methods: {
    ...mapActions({
      storeResource: 'resources/storeResource',
    }),
    formSubmit() {
      if ( this.formEditIsReady ) {

        /* == CHECK IF THE LEARNING RESOURCE IS A DUPLICATE (HAD PREVIOUSLY BEEN STORED) == */
        const flagExist = this.resources.some(item => item.title.toLowerCase() == this.form.title.toLowerCase())
        if(flagExist){
          this.$toastr.e('Already exists.')
          this.errors.push('Duplicated entry. Try again.')
          return
        }
        this.storeResource({
          payload: this.form
        })
          .then(response => {
            this.$toastr.s('Created successfully')
            this.closeForm()
            location = response.data.redirect
          })
          .catch(error => {
            if(error.response.status === 403){
              this.$toastr.e("You are not authorized for this action.")
            } else if(error.response.status === 422){
                this.flashErrors(error.response.data.errors)
                this.$toastr.e(error.response.data.message)
            } else if(error.response.status === 419){
                this.$toastr.e("CSRF token mismatch.")
            } else if(error.response.status === 500){
              this.$toastr.e("Internal Server Error.")
            } else {
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
      this.form.title = ''
      this.form.author = ''
      this.form.url = ''
      this.$emit('closeModal')
    },

  },

}
</script>

<style>

</style>
