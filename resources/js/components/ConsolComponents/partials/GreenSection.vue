<template>
  <div class="w-full mx-auto text-center md:px-14 px-8 py-12 md:py-16 section-bg">
    <!--          <div class="inline-flex text-sm font-semibold py-2 px-6 m-2 text-green-700 bg-green-200 rounded-md mb-4">About</div>-->
    <div class="max-w-7xl mx-auto">
      <slot></slot>
    </div>
  </div>
</template>

<script>
export default {
  name: "GreenSection.vue"
}
</script>
