-400<template>
  <div class="xl:w-500">
    <!-- FORM -->
    <form class="w-full bg-gray-300 border-2 border-gray-dark rounded p-4"
      @submit.prevent="formSubmit"
    >

    <!-- SHOW ONLY FOR XL SCREEN -->
    <div class="w-full flex flex-col">

      <!-- TITLE -->
      <div class="w-full mb-4">
        <div class="mb-2">
          <label for="title" class="inline text-gray-600 text-sm font-bold"
            :class="[ highlight ? 'text-red-dark' : 'text-gray-800' ]"
          >
            Title
          </label>
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 inline">
            <polygon points="5,0 15,0 10,15" fill="#cc3333"/>
          </svg>
        </div>

        <input id="title" type="text" class="form_input"
          v-model="title"
          :class="{ formFieldHighlight : highlight }"
        >
      </div>

      <!-- AUTHOR -->
      <div class="w-full mb-4">
        <div class="mb-2">
          <label for="author" class="inline text-gray-600 text-sm font-bold"
            :class="[ highlight ? 'text-red-dark' : 'text-gray-800' ]"
          >
            Author
          </label>
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 inline">
            <polygon points="5,0 15,0 10,15" fill="#cc3333"/>
          </svg>
        </div>

        <input id="author" type="text" class="form_input"
          v-model="author"
          :class="{ formFieldHighlight : highlight }"
        >
      </div>

      <!-- PUBLISH DATE -->
      <div class="w-full mb-4">
        <label for="publish_date" class="form_label">
          Publish Date
        </label>

        <!-- DISPLAY INITIALLY -->
        <div class="form_input"
          v-if="state === 'default' && dateExist"
          @click="state='editing'"
        >
          <span>
            {{ showDate }}
          </span>
        </div>

        <!-- EDIT PUBLISH DATE -->
        <input id="publish_date" type="date" class="form_input"
          v-if="state === 'editing' || ! dateExist"
          v-model="publish_date"
        >
      </div>

      <!-- XL SCREEN SHOW BOTH PRIORITY & PAGES -->
      <div class="flex flex-col xl:flex-row xl:mb-4">

        <!-- PRIORITY -->
        <div class="w-full xl:flex-1 mb-4 xl:mb-0 xl:mr-1">
          <label for="pages" class="form_label xl:inline-block">
            Priority
          </label>
          <input id="priority" type="number" class="form_input" min="1" max="5"
            v-model="priority"
          >
        </div>

        <!-- PAGES -->
        <div class="w-full xl:flex-1 mb-4 xl:mb-0 xl:ml-1">
          <label for="pages" class="form_label xl:inline-block">
            Pages
          </label>
          <input id="pages" type="number" class="form_input" min="10" max="1200"
            v-model="pages"
          >
        </div>
      </div>

      <!-- URL -->
      <div class="w-full mb-4">
        <label for="url" class="form_label">
          URL
        </label>
        <input id="url" type="text" class="form_input"
          v-model="url"
        >
      </div>

      <!-- SUBJECTS -->
      <div class="w-full mb-4">
        <div class="mb-2">
          <label for="subject" class="inline text-gray-600 text-sm font-bold"
            :class="[ highlight ? 'text-red-dark' : 'text-gray-800' ]"
          >
            Subjects
          </label>
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 inline">
            <polygon points="5,0 15,0 10,15" fill="#cc3333"/>
          </svg>
        </div>

        <v-selectpage key-field="id" show-field="name" class="form_input"
          :data="subjects"
          :multiple="true"
          :pagination="false"
          v-model="multipleValue"
        >
        </v-selectpage>
      </div>

      <!-- IMAGE -->
      <div class="w-full mb-4">

        <label class="form_label">
          Cover Image
        </label>

        <div class="flex">
          <div class="block w-32 h-32 cursor-pointer bg-cover bg-center bg-gray hover:bg-gray-light"
            :style="{ 'background-image': `url(${imageData})` }"
            @click="$refs.fileInput.click()"
          >
            <span class="w-full h-full text-gray-600 text-sm flex justify-center items-center"
              v-if="!imageData"
            >
              Choose an Image
            </span>
            <input type="file" class="hidden"
              ref="fileInput"
              @input="onFileSelected"
            >
          </div>

          <!-- UPDATE & DELETE ACTION BUTTONS -->
          <div class="ml-2 flex flex-col justify-start">
            <a href="#" title="Update" class="mb-2"
              @click.prevent="$refs.fileInput.click()"
            >
              <img src="img/icons/update.png" alt="">
            </a>
            <a href="#" title="Remove"
              @click.prevent="removeImage"
            >
              <img src="img/icons/erase.png" alt="">
            </a>
          </div> <!-- END UPDATE & DELETE ACTION BUTTONS -->

        </div>
      </div> <!-- END IMAGE -->
    </div> <!-- END CONTAINING DIV -->

    <!-- BUTTONS -->
    <div class="flex mt-6">

      <!-- CANCEL -->
      <button class="flex-1 btn_cancel mr-2"
        @click="cancelForm"
      >
        Cancel
      </button>

      <!-- UPDATE -->
      <button class="flex-1 btn_lazeeza xl:text-xl xl:px-16" type="submit"
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
import moment from 'moment'
import { isEmpty } from 'lodash'

export default {
  props: {
    book: { required: true }
  },
  data () {
    return {
      state: 'default',
      modalOpen: true,
      highlight: false,
      selectedFile: '',
      imageData: this.book.file? this.book.file : '',
      title: this.book.title,
      author: this.book.author,
      publish_date: '',
      url: this.book.url === 'null'? '' : this.book.url,
      pages: this.book.pages,
      priority: this.book.priority,
      multipleValue: ''
    }
  },
  computed: {
    ...mapGetters({
      subjects: 'books/subjects'
    }),
    formEditNotReady() {
      return ( this.title && this.author )? false : true
    },
    formEditIsReady() {
      return ! this.formEditNotReady
    },
    btnState() {
      return {
        'cursor-not-allowed opacity-50': this.formEditNotReady
      }
    },
    fetchImage() {
      return this.book.file? this.book.file : null
    },
    dateExist() {
      return isEmpty(this.book.publish_date)? false : true
    },
    showDate() {
      return this.dateExist? this.fixDateFormat : ''
    },
    fixDateFormat() {
      return moment(this.book.publish_date).format("MM/DD/YYYY")
    },
    sendDateFormat() {
      return moment(this.book.publish_date).format("YYYY-MM-DD")
    }

  },
  methods: {
    ...mapActions({
      updateBook: 'books/updateBook',
    }),
    formSubmit() {
      if ( this.formEditIsReady ) {

        /* == BUILD FORM DATA == */
        const formData = new FormData()
        formData.append('title', this.title)
        formData.append('author', this.author)

        /* == WHEN THERE IS AN UPDATE TO THE IMAGE == */
        if ( this.selectedFile != null ) {
          formData.append('file', this.selectedFile)
        } else if ( isEmpty(this.imageData) ) {
          formData.append('file', this.selectedFile)
        }

         //== PUBLISH DATE WORKAROUND: 3 SCENARIOS
        //====================

        /* == THERE IS AN UPDATE TO THE PUBLISH DATE == */
        if ( ! isEmpty(this.publish_date) ) {
          formData.append('publish_date', this.publish_date)
        }
        /* == NO UPDATE TO THE PUBLISH DATE BUT OLD PUBLISH DATE EXISTS == */
        else if ( isEmpty(this.publish_date) && ! isEmpty(this.book.publish_date) ) {
          formData.append('publish_date', this.sendDateFormat)
        }
        /* == NO UPDATE TO THE PUBLISH DATE AND OLD PUBLISH DATE DOES NOT EXIST == */
        //== DO NOTHING

        /* == PAGES == */
        formData.append('pages', this.pages)

        /* == PRIORITY == */
        formData.append('priority', this.priority)

        /* == URL == */
        formData.append('url', this.url)

        /* == SUBJECTS == */
        formData.append('subjects', this.multipleValue)

        this.updateBook({
          book: this.book.uuid,
          formData: formData
        })
        .then(response => {
          this.$toastr.s('Book updated successfully.')
          this.closeForm()
        })
        .catch(error => {
          this.$toastr.e(`${error.message.data}`)
          // this.closeForm()
        })

      } else {
        this.highlight = true
        this.$toastr.e('Missing required fields.')
      }

    },
    chooseImage () {
      this.$refs.fileInput.click()
    },
    onFileSelected (event) {
      if (event.target.files.length !== 0) {
        this.selectedFile = event.target.files[0]
        /* == VALIDATION == */
        if( this.isImage() ) {
          if( this.isSizeAcceptable() ) {
            const input = this.$refs.fileInput
            const files = input.files
            if (files && files[0]) {
              const reader = new FileReader
              reader.onload = e => {
              this.imageData = e.target.result
              }
              reader.readAsDataURL(files[0])
              this.$emit('input', files[0])
            }
          } else {
            this.$toastr.e('The file you are trying to upload is too large.')
          }
        } else {
          this.$toastr.e('The file you are trying to upload does not seem to be an image.')
        }
      } else {
        this.$toastr.e('No file selected.')
      }
    },
    isImage() {
      return this.selectedFile.type.match('image.*') ? true : false
    },
    isSizeAcceptable() {
      return (this.selectedFile.size < 99999)? true : false
    },
    closeForm() {
      this.$modal.hide('book-edit-form')
      this.title = null
      this.imageData = null
    },
    cancelForm() {
      this.closeForm()
      this.$toastr.i('Your edits have been cancelled.')
    },
    removeImage() {
      this.imageData = null
      this.selectedFile = null
      this.$toastr.i('Book cover image is removed.')
    },

  },

}
</script>

<style>

</style>
