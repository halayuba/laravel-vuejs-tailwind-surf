<template>
  <div class="fixed z-10 inset-0 overflow-y-auto resource-modal">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <!--
        Background overlay, show/hide based on modal state.

        Entering: "ease-out duration-300"
          From: "opacity-0"
          To: "opacity-100"
        Leaving: "ease-in duration-200"
          From: "opacity-100"
          To: "opacity-0"
      -->
      <transition name="fade">
      <div class="fixed inset-0 transition-opacity" aria-hidden="true"
        @click="closeModal"
      >
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>
      </transition>

      <!-- This element is to trick the browser into centering the modal contents. -->
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
      <!--
        Modal panel, show/hide based on modal state.

        Entering: "ease-out duration-300"
          From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          To: "opacity-100 translate-y-0 sm:scale-100"
        Leaving: "ease-in duration-200"
          From: "opacity-100 translate-y-0 sm:scale-100"
          To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
      -->
      <transition name="fade">
      <div class="modal-container inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">

          <!-- MODAL CONTENT -->
          <slot name="content"></slot>

        </div>

        <!-- CLOSE BUTTON -->
        <div class="mt-2 pb-4 w-full flex justify-center items-center">
          <a href="#" class="border border-gray-300 rounded px-4 py-2 hover:bg-gray-200"
            @click.prevent="closeModal"
          >
            <span class="uppercase text-lg text-gray-500 tracking-wide">Close</span>
          </a>
        </div> <!-- CLOSE BUTTON -->
      </div>
      </transition>
    </div>
  </div>

</template>

<script>
  export default {
    methods:{
      closeModal() {
        this.isOpen = false
        this.$emit('closeModal')
      },
    },
    created(){
      document.addEventListener('keyup', (e) => {
        if (e.keyCode === 27) {
          this.closeModal()
        }
      });
    },
    destroyed: function () {
      document.removeEventListener('keyup', this.escapeKeyListener);
    },

  }
</script>

<style>
  .fade-enter-active,
  .fade-leave-active {
    transition: all .5s ease-out;
  }

  .fade-enter,
  .fade-leave-to {
    opacity: 0;
  }
</style>
