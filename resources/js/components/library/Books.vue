<template>
  <div class="">

    <div class="max-w-7xl mx-auto px-2">

      <!-- BOOK FILTERS -->
      <book-filters :subjects="subjects" />

      <!-- SEARCH -->
      <div class="w-full relative my-4">

        <!-- SEARCH ICON -->
        <figure class="absolute top-0 left-0 pl-2 flex items-center h-full">
          <icon name="search" class="w-6 h-6 fill-current text-gray-400 inline-block" />
        </figure>

        <!-- CLEAR SEARCH -->
        <figure class="absolute right-0 top-0 pr-4 mt-2 flex items-center text-red-500 cursor-pointer" title="clear search"
          @click="clearSearch"
          v-if="searchField"
        >
          <icon name="backspace" class="w-10 h-10" />
        </figure>

        <input class="w-full pl-10 pr-4 py-4 bg-gray-200 border border-gray-400 outline-none" placeholder="Search" autofocus
          v-model="searchField"
          @input="quickSearch"
        >

      </div> <!-- SEARCH -->

      <!-- HEADING SECTION -->
      <div class="mt-8 flex flex-col-reverse sm:flex-row sm:justify-between mb-2">
        <div class="flex items-center">
          <h2 class="text-lg md:text-xl xl:text-2xl sm:font-medium uppercase">Book LIST</h2>
          <label class="rounded-full bg_color text-black text-xs px-3 py-1 ml-2 tracking-wide"
            v-if="countBooks"
          >{{ countBooks }}</label>
        </div>

        <!-- BUTTON TO ADD A NEW BOOK -->
        <div class="mb-4 sm:mb-0">
          <button type="button" class="btn_new transition"
            :class="btnState"
            @click="addNewBook"
          >
            Add new book
          </button>
        </div>
      </div>

      <!-- TABLE -->
      <div class="bg-white border border-gray-300 border-t-4 border_t_color rounded px-4 py-6 mb-4">
        <!-- HEADER -->
        <div class="hidden sm:flex sm:justify-between sm:mb-4 tbl_header">
          <div class="">Title</div>
          <div class="">Author</div>
          <div class="">Publish Date</div>
          <div class=" flex justify-end">Actions</div>
        </div>

        <!-- BOOK LIST -->
        <div class=""
          v-if="countBooks"
        >
          <div class=""
            v-for="book in result"
            :key="book.id"
          >
            <div class="flex flex-col sm:flex-row border-b border-gray-300 py-2 my-2">

              <!-- BOOK COVER -->
              <div class="flex-none sm:mr-2">

                <div class="block bg-cover bg-center w-24 h-32 rounded-sm shadow-md"
                  :style="{ 'background-image': `url(${book.file})` }"
                >
                </div>
              </div>

              <!-- BOOK TITLE -->
              <div class="flex-1 sm:px-2 mt-2 sm:mt-0">
                <a class="no-underline text-indigo-500"
                  :href="book.url"
                >
                  {{ book.title }}
                </a>

                <!-- PAGES -->
                <div class="text-gray-700 text-sm mt-2"
                  v-if="book.pages"
                >
                  {{ book.pages }}
                  <span class="text-xs ml-1 tracking-tight">pages</span>
                </div>

                <!-- PRIORITY -->
                <div class="text-gray-700 text-sm mt-2"
                  v-if="book.priority"
                >
                  <span class="text-xs mr-1 tracking-tight">Priority:</span>
                  {{ book.priority | priority }}
                </div>
              </div>

              <!-- AUTHOR -->
              <div class="flex-1 sm:px-2 mt-2 sm:mt-0">
                {{ book.author }}
              </div>

              <!-- PUBLISH DATE -->
              <div class="flex-1 mt-2 sm:mt-0">
                <!-- SHOW ONLY IF EXISTS -->
                <span
                  v-if="book.publish_date"
                >
                  {{ book.publish_date | orderDate }}
                </span>
              </div>

              <!-- ACTION BUTTONS -->
              <div class="flex-none mt-4 sm:mt-0">
                <div class="flex sm:flex-col lg:flex-row">

                  <!-- SECTIONS -->
                  <div class="btn_action mr-1 sm:mr-0 sm:mb-1 lg:mb-0 lg:mr-1 cursor-pointer">
                      <icon name="sections" />
                  </div>

                  <!-- COMMENTS -->
                  <div class="btn_action mr-1 sm:mr-0 sm:mb-1 lg:mb-0 lg:mr-1 cursor-pointer">
                      <icon name="comments" />
                  </div>

                  <!-- EDIT -->
                  <div class="btn_action mr-1 sm:mr-0 sm:mb-1 lg:mb-0 lg:mr-1 cursor-pointer"
                    :class="btnState"
                  >
                    <a href="#" class="" title="edit"
                      :class="btnState"
                      @click.prevent="editBook(book)"
                    >
                      <icon name="edit2" class="fill-current text-yellow-500 inline-block" />
                    </a>
                  </div>

                  <!-- DELETE -->
                  <div class="btn_action cursor-pointer"
                    :class="btnState"
                  >
                    <a href="#" class="" title="delete"
                      :class="btnState"
                      @click.prevent="deleteBook(book)"
                    >
                      <icon name="delete2" class="fill-current text-red-500 inline-block" />
                    </a>
                  </div>
                </div>
              </div> <!-- END BUTTONS -->
            </div>
          </div>
        </div> <!-- END BOOK LIST -->

        <div class="alert-no-records"
          v-else
        >
          There are currently no books in your list
        </div>

      </div> <!-- END TABLE -->

    </div> <!-- END TABLE SECTION -->

    <!-- MODAL: BOOK ADD FORM -->
    <modal name="book-add-form" :adaptive="true" width="50%" :maxWidth="650" height="auto">
      <book-add-form />
    </modal>

    <!-- MODAL: BOOK EDIT FORM -->
    <modal name="book-edit-form" :adaptive="true" width="50%" :maxWidth="650" height="auto">
      <book-edit-form
        :book="selectedBook"
      />
    </modal>

  </div>
</template>

<script>
  import { mapActions, mapGetters } from 'vuex'
  import moment from 'moment'
  import BookAddForm from './modals/BookAddForm'
  import BookEditForm from './modals/BookEditForm'
  import BookFilters from './BookFilters'

  export default {
    name: 'books',
    data() {
      return {
        selectedBook: '',
        result: [],
        searchField: '',
        searchFlag: false,
        authenticated: false,
        // booksCount: 0
      }
    },
    components: {
      BookAddForm,
      BookEditForm,
      BookFilters,
    },
    computed: {
      ...mapGetters({
        auth: 'auth/auth',
        subjects: 'books/subjects',
        books: 'books/books',
      }),
      countBooks() {
        return this.books? this.books.length : false
        // return this.books.length? this.books.length : false
      },
      link(uuid) {
        return {
          name: 'comments',
          params: {
            uuid: uuid
          }
        }
      },
      btnState() {
        return {
          'cursor-not-allowed opacity-50': ! this.auth,
        }
      },

    },
    filters: {
      orderDate(date) {
        return moment(date).format("MM-DD-YYYY")
        // let pubDate = date.split(' ')
        // return pubDate[0]
      },
      priority(value){
        if( value == 1 ) return 'Very low priority'
        else if( value == 2 ) return 'Low priority'
        else if( value == 3 ) return 'Medium priority'
        else if( value == 4 ) return 'High priority'
        else if( value == 5 ) return 'Very high priority'
      }

    },
    methods: {
      ...mapActions({
        userAuth: 'auth/userAuth',
        fetchSubjects: 'books/fetchSubjects',
        getBooks: 'books/getBooks',
        removeBook: 'books/removeBook',
      }),
      fetchBooks() {
        this.getBooks()
        .then(() => {
           this.result = this.books

          if ( ! this.result.length > 0 ) {
            this.$toastr.i('No books found')
          } else {
            this.$toastr.s('Books have been retrieved successfully')
          }
        })
      },
      addNewBook() {
        if( this.auth ) {
          window.scrollTo(0, 0)
          this.$modal.show('book-add-form')
        } else {
          this.$toastr.w('You must log in to add a new book.')
          setTimeout(function () {
            location = '/login'
          }, 2000);
        }
      },
      editBook(book) {
        if( this.auth ) {
          window.scrollTo(0, 0)
          this.selectedBook = book
          this.$modal.show('book-edit-form')
        } else {
          this.$toastr.w('Only authenticated and authorized users may perform this action.')
        }
      },
      deleteBook(book) {
        if( this.auth ) {
          let confirmAction = confirm("Are you sure?")
          if (confirmAction) {
            this.removeBook({book})
            .then(response => {
              this.$toastr.s('Deleted successfully')

              let bookIndex = this.result.findIndex(book => book.id === bookId)
              this.result.splice(bookIndex, 1)

            })
          }
        } else {
          this.$toastr.w('Only authenticated and authorized users may perform this action.')
        }
      },
      quickSearch(e) {
        let value = this.captureSearchValue(e)
          this.setList(this.result.filter(book => {
            return book.title.toLowerCase().includes(value)
          }).sort((bookA, bookB) => {
            return this.relevancy(bookB.title, value) - this.relevancy(bookA.title, value)
          }))

      },
      setList(filtered) {
        this.clearList()
        this.result = filtered
      },
      clearList() {
        this.result = []
      },
      relevancy(value, searchTerm) {
        if( value === searchTerm ) return 2
        else if ( value.startsWith(searchTerm) ) return 1
        else if ( value.includes(searchTerm) ) return 0
      },
      clearSearch() {
        this.searchField = ''
        this.searchFlag = false
      },
      captureSearchValue(e) {
        let value = e.target.value
        if( value && value.trim().length > 0) {
          this.searchFlag = true
          return value.trim().toLowerCase()
        }
        else {
          this.searchFlag = false
          this.clearList()
        }
      },

    },
    created() {
      this.fetchBooks()
      this.fetchSubjects()
    },
    mounted() {
      this.userAuth()
    },
    updated() {
      if ( ! this.searchFlag ) {
        this.result = this.books
      }

      // this.authenticated = this.auth
    },

  }
</script>
