<template>
  <div class="">
    <div class=""
      v-if="source === 'Article'"
    >
      <icon name="Article" class="w-5 h-auto fill-current text-gray-600" title="Article" />
    </div>
    <div class=""
      v-else-if="source === 'Book'"
    >
      <icon name="Book" class="w-6 h-auto" title="Book" />
    </div>
    <div class=""
      v-else-if="source === 'Codecourse'"
    >
      <icon name="Codecourse" class="w-6 h-auto" title="Codecourse" />
    </div>
    <div class=""
      v-else-if="source === 'Laracasts'"
    >
      <icon name="Laracasts" class="w-5 h-auto" title="Laracasts" />
    </div>
    <div class=""
      v-else-if="source === 'Lynda'"
    >
      <icon name="Lynda" class="w-6 h-auto" title="Lynda" />
    </div>
    <div class=""
      v-else-if="source === 'Github'"
    >
      <icon name="Github" class="w-6 h-auto" title="Github" />
    </div>
    <div class=""
      v-else-if="source === 'Youtube'"
    >
      <icon name="Youtube" class="w-6 h-auto" title="Youtube" />
    </div>
    <div class=""
      v-else-if="source === 'Webinar'"
    >
      <icon name="Webinar" class="w-6 h-auto" title="Webinar" />
    </div>
    <div class=""
      v-else-if="source === 'OReilley'"
    >
      <icon name="OReilley" class="w-16 h-auto" title="OReilley" />
    </div>
    <div class=""
      v-else-if="source === 'Newsletter'"
    >
      <icon name="Magazine" class="w-6 h-auto fill-current text-gray-600" title="Newsletter" />
    </div>
    <div v-else class="text-xs">
      {{ source }}
    </div>
  </div>
</template>

<script>

  export default {
    props: {
      source: { required: true }
    },
  }
</script>

<style>

</style>
