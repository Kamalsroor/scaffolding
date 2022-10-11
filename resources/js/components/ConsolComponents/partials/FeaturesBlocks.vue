<template>
  <section class="relative">

    <!-- Section background (needs .relative class on parent and next sibling elements) -->
    <div aria-hidden="true"
         class="absolute inset-0 bg-slate-900 pointer-events-none"></div>
    <!--    <div class="absolute left-0 right-0 bottom-0 m-auto w-px p-px h-20 bg-gray-200 transform translate-y-1/2"></div>-->
    <PageIllustration colorOne="ffffff" colorTwo="f3f3f3" colorThree="dddddd" class="hidden opacity-25 sm:block"/>
    <div class="relative w-full mx-auto px-6 sm:px-12">
      <div class="py-12 md:py-20">

        <!-- Section header -->
        <div class="max-w-3xl mx-auto text-center pb-12 md:pb-20">
          <h2 class="h2 mb-4 text-white">Our Benefits</h2>
          <p class="text-xl text-gray-50">As someone whose business relies on efficient receiving and shipping of
            consolidations and LCL services, you’re probably aware of the benefits of using the consolidators
            network.</p>
        </div>

        <!-- Items Container -->
        <div class="max-w-sm mx-auto grid gap-6 md:grid-cols-2 lg:grid-cols-3 items-start md:max-w-2xl lg:max-w-none">

          <!-- items List -->
          <div v-for="benefit in benefits" :key="benefit.id"
               class="relative hover:scale-105 ease-in-out duration-300 flex flex-col items-center p-6 bg-white rounded shadow-xl group">
            <BenefitsIcons :iconName="benefit.icon"
                           class="h-20 w-20 p-1 -mt-1 mb-2 group-hover:rotate-[360deg] ease-in-out duration-1000"
                           colorOne="text-primary" colorTwo="text-slate-800"/>
            <h4 class="text-xl text-text-primary font-bold leading-snug tracking-tight mb-1">{{ benefit.name }}</h4>
            <p class="text-text-secondary text-center line-clamp-2">{{ benefit.mini_des }}</p>
            <div class="mt-4">
              <Link :href="'consol.benefit.show'">
                <ActionButton label="Read More"/>
              </Link>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
</template>

<script>
import PageIllustration from "@/Components/ConsolComponents/partials/PageIllustration.vue";
import BenefitsIcons from "@/Components/ConsolComponents/partials/BenefitsIcons.vue";
import ActionButton from "@/components/FormItems/ActionButton.vue";

export default {
  name: 'FeaturesBlocks',
  props: {
    benefits: Array
  },
  components: {ActionButton, BenefitsIcons, PageIllustration},
}
</script>
