<template>
  <section class="">
    <GreenSection>
      <h1 class="h2 mb-4 text-white">{{ headerData.title }}</h1>

      <p class="text-xl text-white sm:center-justified">
        {{ headerData.des }}
      </p>

    </GreenSection>
  </section>
  <section>
    <div class="w-full mx-auto px-6 sm:px-12">
      <div class="border-b border-gray-200">
        <!-- Section header -->


        <!-- Items -->
        <div class="grid divide-y divide-dashed divide-gray-200">

          <!-- WHO WE ARE -->
          <div class="md:grid py-6 md:grid-cols-12 md:gap-6 items-center">
            <!-- Image -->
            <div class="max-w-xl md:w-full mx-auto md:col-span-6 col-span-12 md:mb-0 md:order-1" data-aos="fade-up">
              <img :src=" '/storage/consol/images/about/02.png'" alt="Features 01"
                   class="max-w-full mx-auto h-auto" height="405" width="540"/>
            </div>
            <!-- Content -->
            <div class="max-w-xl md:max-w-none md:w-full mx-auto md:col-span-6 col-span-12" data-aos="fade-right">
              <div class="md:pr-4 lg:pr-12 xl:pr-16">
                <!--                <div class="font-architects-daughter text-xl text-primary mb-2">More speed. Less spend</div>-->
                <h3 class="h3 mb-3 text-text-primary">Who <span class="text-primary">We Are</span></h3>
                <p class="text-xl text-text-secondary mb-4">WSA CONSOL is a part of the World Shipping Alliance (WSA)
                  group
                  which is operated by Rom & Jay USA, a company registered in New York, USA, with a branch in Hong Kong.
                  Our professional staff with their vast experience are working hard to engage our members/agents
                  worldwide to provide top-notch services. Therefore, we are always near you.</p>
              </div>
            </div>
          </div>

          <!-- WHY WSA? -->
          <div class="md:grid py-6 md:grid-cols-12 md:gap-6 items-center">
            <!-- Image -->
            <div class="max-w-xl md:w-full mx-auto md:col-span-6 mb-8 md:mb-0 md:rtl" data-aos="fade-up">
              <img :src=" '/storage/consol/images/about/03.png'" alt="Features 02"
                   class=" max-w-full mx-auto h-auto" height="405" width="540"/>
            </div>
            <!-- Content -->
            <div class="max-w-xl md:max-w-none md:w-full mx-auto md:col-span-6" data-aos="fade-left">
              <div class="md:pl-4 lg:pl-12 xl:pl-16">
                <!--                <div class="font-architects-daughter text-xl text-primary mb-2">More speed. Less spend</div>-->
                <h3 class="h3 mb-3 text-text-primary">Why Choose <span class="text-primary"> WSA Consol?</span></h3>
                <p class="text-xl text-text-secondary mb-4">As a specific partner in WSA CONSOL We will help you to
                  contribute
                  with a trusted and distinctive communication with all members in the network to build a strong base
                  and gain mutual benefits that will be reflected in increasing your company's efficiency rates.Being
                  part of WSA CONSOL widens and strengthen your horizons, it gives you the opportunity to make new
                  multi-partners while expanding your business opportunities endlessly and enhance your independent
                  international consolidation and LCL business.</p>
              </div>
            </div>
          </div>

          <!-- OUR VISION. -->
          <div class="md:grid py-6 md:grid-cols-12 md:gap-6 items-center">
            <!-- Image -->
            <div class="max-w-xl md:w-full mx-auto md:col-span-6 col-span-12 mb-8 md:mb-0 md:order-1"
                 data-aos="fade-up">
              <img :src=" '/storage/consol/images/about/04.png'" alt="Features 01"
                   class="max-w-full mx-auto h-auto" height="405" width="540"/>
            </div>
            <!-- Content -->
            <div class="max-w-xl md:max-w-none md:w-full mx-auto md:col-span-6 col-span-12" data-aos="fade-right">
              <div class="md:pr-4 lg:pr-12 xl:pr-16">
                <!--                <div class="font-architects-daughter text-xl text-primary mb-2">More speed. Less spend</div>-->
                <h3 class="h3 mb-3 text-text-primary">Our <span class="text-primary">Vision</span></h3>
                <p class="text-xl text-text-secondary mb-4">WSA has an energetic, forward-thinking corporate culture
                  based on
                  our strong commitment to our core values: Conduct all affairs with integrity.</p>
              </div>
            </div>
          </div>

          <!-- TEAM WORK. -->
          <div class="md:grid py-6 md:grid-cols-12 md:gap-6 items-center">
            <!-- Image -->
            <div class="max-w-xl md:w-full mx-auto md:col-span-6 mb-8 md:mb-0 md:rtl" data-aos="fade-up">
              <img :src=" '/storage/consol/images/about/05.png'" alt="Features 02"
                   class=" max-w-full mx-auto h-auto" height="405" width="540"/>
            </div>
            <!-- Content -->
            <div class="max-w-xl md:max-w-none md:w-full mx-auto md:col-span-6" data-aos="fade-left">
              <div class="md:pl-4 lg:pl-12 xl:pl-16">
                <!--                <div class="font-architects-daughter text-xl text-primary mb-2">More speed. Less spend</div>-->
                <h3 class="h3 mb-3 text-text-primary">Team <span class="text-primary">Work</span></h3>
                <p class="text-xl text-text-secondary mb-4">Create long-term value by the economic means for customers,
                  the
                  company, and society. Envision what could be, challenge that status quo and drive creative destruction
                  through experimental discovery.</p>
              </div>
            </div>
          </div>


        </div>

      </div>
    </div>
  </section>
</template>

<script>
import GreenSection from '@/Components/ConsolComponents/partials/GreenSection.vue'

export default {
  name: 'FeaturesZigzag',
  components: {
    GreenSection,
  },
  data() {
    return {
      headerData: {
        title: 'About WSA Consol',
        des: 'WSA CONSOL is an independent worldwide network for specific and selected leading consolidators. who offer much flexibility in transport planning and have the potential to efficiently consolidate goods, even if these goods have distinct pickup locations and destinations with proven experience in handling many types of consolidation and LCL issues, WSA CONSOL will immediately connect you to a large network of reliable presence members/agents.',
      }
    }
  },
}
</script>
