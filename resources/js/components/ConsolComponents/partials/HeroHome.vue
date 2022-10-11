<template>
  <section class="relative">
    <!--    <PageIllustration />-->

    <!-- Illustration behind hero content -->
    <div aria-hidden="true" class="absolute left-1/2 transform -translate-x-1/2 bottom-0 pointer-events-none -z-1">
      <svg height="578" opacity="80%" viewBox="0 0 1360 578" width="1360" xmlns="http://www.w3.org/2000/svg">
        <defs>
          <linearGradient id="illustration-01" x1="50%" x2="50%" y1="0%" y2="100%">
            <stop offset="0%" stop-color="#F97316"/>
            <stop offset="77.402%" stop-color="#FF9D29"/>
            <stop offset="100%" stop-color="#F97316"/>
          </linearGradient>
        </defs>
        <g fill="url(#illustration-01)" fill-rule="evenodd">
          <circle cx="1232" cy="128" r="128"/>
          <circle cx="155" cy="443" r="64"/>
        </g>
      </svg>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6">

      <!-- Hero content -->
      <div class="pt-10 pb-6 md:pt-12 md:pb-20">

        <!-- Section header -->
        <div class="text-center pb-12 md:pb-16">
          <h1 class="text-xl md:text-2xl text-text-secondary font-medium leading-tighter tracking-tighter mb-4"
              data-aos="zoom-y-out">World
            Shipping Alliance</h1>
          <div
            class="text-5xl md:text-7xl font-extrabold leading-tighter tracking-tighter bg-clip-text text-transparent bg-gradient-to-l from-primary to-primary-hover">
            Consolidation
          </div>
          <div class="max-w-5xl mx-auto">
            <p class="text-xl text-text-secondary mb-8" data-aos="zoom-y-out" data-aos-delay="150">
              <span class="font-semibold">WSA CONSOL</span> is an independent worldwide network for specific and
              selected leading consolidators. who offer much flexibility in transport planning and have the potential to
              efficiently consolidate goods, even if these goods have distinct pickup locations and destinations with
              proven experience in handling many types of consolidation and LCL issues, WSA CONSOL will immediately
              connect you to a large network of reliable presence members/agents
            </p>
            <div class="max-w-xs mx-auto sm:max-w-none sm:flex sm:justify-center" data-aos="zoom-y-out"
                 data-aos-delay="300">
              <div>
                <Link :href="'consol.benefit.index'"
                      class="btn text-white bg-primary hover:bg-primary-hover w-full mb-4 sm:w-auto sm:mb-0">
                  <GlobeIcon class="h-5 w-5 mr-2"/>
                  <span>Our Directory</span>
                </Link>
              </div>
              <div>
                <Link :href="'consol.about'"
                      class="btn text-white bg-gray-900 hover:bg-gray-800 w-full sm:w-auto sm:ml-4">
                  <InformationCircleIcon class="h-5 w-5 mr-2"/>
                  <span>About WSA</span>
                </Link>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section>
</template>

<script>
import {GlobeIcon, InformationCircleIcon} from '@heroicons/vue/outline'
import PageIllustration from "@/Components/ConsolComponents/partials/PageIllustration.vue";

export default {
  name: 'HeroHome',
  components: {
    PageIllustration,
    GlobeIcon,
    InformationCircleIcon,
  },
  data: function () {
    return {
      videoModalOpen: false,
    }
  },
}
</script>
