<template>
  <div class="md:mt-36 mt-24 mb-16">
    <GreenSection>
      <h1 class="h2 mb-4 text-white">Benefits</h1>

      <p class="text-xl text-white center-justified">
        As someone whose business relies on efficient receiving and shipping of consolidations and LCL services, you’re
        probably aware of the benefits of using the consolidators network.
      </p>

    </GreenSection>
  </div>
  <section>
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
      <div class="pb-12 md:pb-20">

        <!-- Job list -->
        <div class="-my-3" data-aos-id-career>

          <!-- Benefits List -->
          <template v-for="benefit in benefits" :key="benefit.id">
            <Link :href="'consol.benefit.show'">
              <div
                class="relative shadow-lg my-6 bg-gray-50 hover:bg-white grid md:grid-cols-12 sm:grid-cols-5 grid-cols-1 rounded-md border border-gray-200 ease-in-out duration-500 group hover:border-primary hover:scale-105">
                <!-- Icon -->
                <div class="md:col-span-2 sm:col-span-3 p-12">
                  <BenefitsIcons :iconName="benefit.icon"
                                 class="self-center h-auto w-full group-hover:rotate-[360deg] ease-in-out duration-1000"
                                 colorOne="text-primary" colorTwo="text-secondary-hover"/>
                </div>
                <!-- Content -->
                <div class="md:col-span-10 sm:col-span-9 px-6 py-4 border-l border-gray-200">
                  <div class="text-xl font-bold text-primary">
                    {{ benefit.name }}
                  </div>
                  <p class="text-text-secondary text-justify text-lg line-clamp-3">
                    {{ benefit.mini_des }}
                  </p>
                </div>
                <!-- Click Action -->
                <div
                  class="absolute flex items-center space-x-2 text-primary bottom-4 right-4 ease-in-out duration-500 group-hover:opacity-100 opacity-0">
                  <ArrowRightIcon class="h-5 w-5"/>
                  <span class="font-bold text-lg">Read More...</span>
                </div>
              </div>
            </Link>
          </template>

        </div>

      </div>
    </div>
  </section>
</template>

<script>

import GreenSection from '@/Components/ConsolComponents/partials/GreenSection.vue'
import BenefitsIcons from "@/Components/ConsolComponents/partials/BenefitsIcons.vue";
import {ArrowRightIcon} from '@heroicons/vue/outline'

export default {
  name: 'Career',
  props: {
    benefits: Array,
  },
  components: {GreenSection, BenefitsIcons, ArrowRightIcon},
}
</script>
