<template>
  <div class="m-0 p-0 flex justify-center items-center cursor-wait"
    :title="`Status: ${status}`"
  >

    <!-- RED: NOT STARTED -->
    <span class="p-2 rounded-full"
      :class="[ status === 'Not Started' ? 'incomplete' : 'bg-red-200' ]"
    >
    </span>

    <!-- YELLOW: IN PROGRESS -->
    <span class="p-2 rounded-full"
      :class="[ status === 'In Progress' ? 'bg-yellow-700' : 'bg-yellow-200' ]"
    >
    </span>

    <!-- GREEN: COMPLETED -->
    <span class="p-2 rounded-full"
      :class="[ status === 'Completed' ? 'bg-green-700' : 'bg-green-200' ]"
    >
    </span>
  </div>
</template>

<script>

  export default {
    data() {
      return {

      }
    },
    props: {
      status: { required: true }
    },
    methods: {

    },
    mounted() {

    }
  }
</script>


<style>
.incomplete{ background-color: red; opacity: 0.85 }
</style>
