<template>
  <div class="mb-16">
  </div>
  <section>
    <div class="w-full mx-auto px-6 sm:px-12">
      <div class="pb-12 md:pb-20">

        <!-- Job list -->
        <div class="-my-3" data-aos-id-career>

          <!-- Events List -->
          <div class="text-2xl leading-6 text-text-primary uppercase font-bold">Upcoming Events</div>
          <template v-for="event in wsaEvents">
            <a :href="event.url" target="_blank">
              <div
                class="relative shadow-lg my-6 bg-gray-50 hover:bg-white grid md:grid-cols-12 sm:grid-cols-5 grid-cols-1 rounded-md border border-gray-200 ease-in-out duration-300 group md:hover:scale-105">
                <!-- Icon -->
                <div class="md:col-span-4 sm:col-span-5 inset-0 h-full w-full">
                  <img :alt="event.name" :src="event.imageUrl " :title="event.name "
                       class="md:rounded-l-md rounded-t-md object-cover h-full"/>
                </div>
                <!-- Content -->
                <div
                  class="md:col-span-8 sm:col-span-7 px-6 py-4 border-l border-gray-200">
                  <div class="text-2xl mb-6 font-bold text-primary">
                    {{ event.name }}
                  </div>
                  <p class="text-gray-700 text-justify text-text-secondary text-lg line-clamp-7">
                    {{ event.des }}
                  </p>
                  <div
                    class="flex items-center mt-6 sm:text-lg text-sm bottom-0 text-text-secondary font-bold space-x-6">
                    <div class="flex items-center">
                      <CalendarIcon class="h-6 w-6 mr-2"/>
                      <span>{{ event.date }}</span>
                    </div>
                    <div class="flex items-center">
                      <LocationMarkerIcon class="h-6 w-6 mr-2"/>
                      <span>{{ event.location }}</span>
                    </div>
                  </div>
                </div>
                <!-- Click Action -->
                <div
                  class="absolute md:flex hidden items-center space-x-2 text-primary bottom-4 right-6 ease-in-out duration-500 group-hover:opacity-100 opacity-0">
                  <ArrowRightIcon class="h-5 w-5"/>
                  <span class="font-bold text-lg">Read More...</span>
                </div>
              </div>
            </a>
          </template>

        </div>

      </div>
    </div>
  </section>
</template>

<script>
import GreenSection from '@/Components/ConsolComponents/partials/GreenSection.vue'
import BenefitsIcons from "@/Components/ConsolComponents/partials/BenefitsIcons.vue";
import {ArrowRightIcon, CalendarIcon, LocationMarkerIcon} from '@heroicons/vue/outline'

export default {
  name: 'Career',
  components: {
    GreenSection, BenefitsIcons, ArrowRightIcon, CalendarIcon,
    LocationMarkerIcon,
  },
  data() {
    return {
      wsaEvents: [
        {
          id: '1',
          name: 'WSA Elite Conference',
          des: 'It is our pleasure to announce that we will be hosting our In-Person Conference, on Sept 7-10, 2022 at Hilton Istanbul Bomonti & Conference Center, Istanbul Turkey. Its mutual benefits from your attendance will be reflected in increasing your company\'s efficiency rates while expanding your international business opportunities in the field of shipping, especially in light of the current difficult conditions that the world is going through due to the COVID 19.',
          imageUrl:  '/storage/consol/images/sliders/03.png',
          url: 'https://wsa-events.com/',
          date: '7 - 10 Sept, 2022',
          location: 'Istanbul, Turkey',
        },
      ]
    }
  },
}
</script>
