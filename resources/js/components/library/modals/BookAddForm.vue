<template>
  <div class="xl:w-500">
    <h3 class="text-center my-2 lg:my-4 md:text-xl lg:text-2xl text-indigo-500 font-bold">Add New Book Form</h3>

    <!-- FORM -->
    <form class="p-4" method="POST" enctype="multipart/form-data"
      @submit.prevent="formSubmit"
    >

    <!-- SHOW ONLY FOR XL SCREEN -->
    <div class="w-full flex flex-col px-2 md:px-4 xl:px-8">

      <!-- TITLE -->
      <div class="w-full mb-4">
        <div class="mb-2">
          <label for="title" class="inline text-gray-700 text-sm font-bold"
            :class="[ highlight ? 'text-red-600' : 'text-gray-800' ]"
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
          @blur="titleConfirm"
        >
      </div>

      <!-- AUTHOR -->
      <div class="w-full mb-4">
        <div class="mb-2">
          <label for="author" class="inline text-gray-700 text-sm font-bold"
            :class="[ highlight ? 'text-red-600' : 'text-gray-800' ]"
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
        <input id="publish_date" type="date" class="form_input"
          v-model="publish_date"
        >
      </div>

      <!-- XL SCREEN SHOW BOTH PRIORITY & PAGES -->
      <div class="flex flex-col xl:flex-row xl:mb-4">

        <!-- PRIORITY -->
        <div class="w-full xl:flex-1 mb-4 xl:mb-0 xl:mr-1">
          <label for="priority" class="form_label xl:inline-block">
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
          <label for="subject" class="inline text-gray-700 text-sm font-bold"
            :class="[ highlight ? 'text-red-600' : 'text-gray-800' ]"
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
          v-model="bookSubjects"
        >
        </v-selectpage>
      </div>

      <!-- IMAGE -->
      <div class="w-full mb-4">

        <label class="form_label">
          Cover Image
        </label>

        <div class="block w-32 h-32 cursor-pointer bg-cover bg-center bg-gray-200 hover:bg-gray-400"
          :style="{ 'background-image': `url(${imageData})` }"
          @click="$refs.fileInput.click()"
        >
          <span class="w-full h-full text-gray-700 text-sm flex justify-center items-center"
            v-if="!imageData"
          >
            <icon name="camera" class="w-10 h-10" />
          </span>
          <input type="file" class="hidden"
            ref="fileInput"
            @input="onFileSelected"
          >
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

      <!-- SAVE -->
      <button class="flex-1 btn_wide xl:text-xl xl:px-16" type="submit"
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

export default {
  components: {

  },
  data () {
    return {
      modalOpen: true,
      highlight: false,
      imageData: null,
      selectedFile: '',
      title: '',
      author: '',
      publish_date: '',
      url: '',
      pages: '',
      priority: '',
      bookSubjects: ''
    }
  },
  computed: {
    ...mapGetters({
      subjects: 'books/subjects',
      books: 'books/books',
    }),
    formEditNotReady() {
      return ( this.title && this.author && this.bookSubjects )? false : true
    },
    formEditIsReady() {
      return ! this.formEditNotReady
    },
    btnState() {
      return {
        'cursor-not-allowed opacity-50': this.formEditNotReady
      }
    },

  },
  methods: {
    ...mapActions({
      storeBook: 'books/storeBook',
    }),
    titleConfirm(){
      /* == CHECK IF THE BOOK TITLE IS A DUPLICATE (ANOTHER BOOK WITH THE SAME TITLE HAD PREVIOUSLY BEEN STORED) == */
      const flagExist = this.books.some(item => item.title.toLowerCase() == this.title.toLowerCase())

      if(flagExist){
        this.$toastr.e('Duplicated entry. Title already exists.')
        return
      }
    },
    formSubmit() {
      if ( this.formEditIsReady ) {

        /* == BUILD FORM DATA == */
        const formData = new FormData()
        formData.append('file', this.selectedFile)
        formData.append('title', this.title)
        formData.append('author', this.author)
        formData.append('publish_date', this.publish_date)
        formData.append('pages', this.pages)
        formData.append('priority', this.priority)
        formData.append('url', this.url)
        formData.append('subjects', this.bookSubjects)

        this.storeBook({formData})
        .then(response => {
          if(response.data.status === 401){
            this.$toastr.e("Unauthenticated.")
          } else if(response.data.status === 422){
            this.$toastr.e(response.data.messsage)
          } else {
            this.$toastr.s('Book has uploaded successfully')
            this.closeForm()
          }
        })
        .catch(error => {
          this.$toastr.e(error.response.data.messsage)
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
      this.$modal.hide('book-add-form')
      this.title = null
      this.imageData = null
    },
    cancelForm() {
      this.closeForm()
      this.$toastr.i('Form cancelled.')
    },

  },
  mounted() {
    // this.subjectSelectList = this.subjects
  }

}
</script>
