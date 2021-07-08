<template>
  <div class="flex flex-col sm:flex-row my-8 items-center">
    <h2 class="text-sm md:text-xl tracking-wide text-gray-700 font-semibold uppercase mb-2 sm:mb-0 sm:mr-4">Filters</h2>

    <div class="flex">

      <div
        v-for="subject in subjects"
        :key="subject.id"
      >
        <button type="button" class="text-center align-middle whitespace-no-wrap select-none cursor-pointer inline-block mb-0 bg-transparent border border-gray-400 text-gray-700 font-semibold text-lg rounded leading-tight px-4 py-2 mr-2 sm:mr-4 transition"
          @click="getBooksBySubject(subject.id)"
        >
          {{ subject.name }}
        </button>
      </div>

    </div>
  </div>
</template>

<script>
  import { mapActions, mapGetters} from 'vuex'

  export default {
    props: {
      subjects: { required: true }
    },
    // computed: {
    //   ...mapGetters({
    //     subjects: 'books/subjects'
    //   })
    // },
    methods: {
      ...mapActions({
        // fetchSubjects: 'books/fetchSubjects',
        fetchSubjectBooks: 'books/fetchSubjectBooks'
      }),
      getBooksBySubject(id) {
        this.fetchSubjectBooks({
          subject: id
        })
      },

    },
    // mounted() {
    //   this.fetchSubjects()
    // }

  }
</script>
