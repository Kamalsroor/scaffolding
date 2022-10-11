<template>
  <section class="relative">

    <!-- Section background (needs .relative class on parent and next sibling elements) -->
    <div aria-hidden="true" class="absolute inset-0 pointer-events-none mb-16"></div>
    <!--    <div class="absolute left-0 right-0 m-auto w-px p-px h-20 bg-gray-200 transform -translate-y-1/2"></div>-->

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6">
      <div class="pt-12 md:pt-20">

        <!-- Section header -->
        <div class="max-w-5xl mx-auto text-center pb-12 md:pb-16">
          <h1 class="h2 mb-4 bg-clip-text text-transparent bg-gradient-to-l from-primary to-primary-hover">
            Why Choose WSA Consol
          </h1>
          <p class="text-xl text-text-secondary justify-center">
            As a specific partner in WSA Consol We will help you to contribute with</p>
        </div>

      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'FeaturesHome',
  data: function () {
    return {
      tab: '1',
    }
  },
}
</script>
