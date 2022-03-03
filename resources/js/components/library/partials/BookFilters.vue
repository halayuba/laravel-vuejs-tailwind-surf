<template>
  <div class="flex flex-col sm:flex-row my-8 justify-center items-center">
    <h2 class="hidden lg:inline-block text-xl tracking-wide text-gray-700 font-semibold uppercase lg:mr-4">Filters</h2>

    <div class="grid grid-rows-2 grid-flow-col gap-4 md:grid-rows-none md:flex px-4 md:px-0">

      <div
        v-for="subject in subjects"
        :key="subject.id"
      >
        <button type="button" class="text-center align-middle whitespace-no-wrap select-none cursor-pointer inline-block mb-0 bg-transparent border border-gray-400 text-gray-700 font-semibold text-lg rounded leading-tight px-4 py-2 md:mr-4 transition"
          @click="getBooksBySubject(subject.id)"
          :class="[selectedId && subject.id === selectedId ? 'ring-1 ring-gray-300 ring-offset-2 ring-offset-blue-100' : 'opacity-75']"
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
    data(){
      return{
        selectedId: ''
      }
    },
    props: {
      subjects: { required: true }
    },
    methods: {
      ...mapActions({
        fetchSubjectBooks: 'books/fetchSubjectBooks'
      }),
      getBooksBySubject(id) {
        this.fetchSubjectBooks({
          subject: id
        })

        this.selectedId = id
      },

    },

  }
</script>
