<template>

    <!-- Hero section -->
    <section class="md:mt-36 mt-24">
        <GreenSection>
            <h1 class="h2 mb-4 text-white">{{ headerData.title }}</h1>

            <p class="text-xl text-white sm:center-justified">
                {{ headerData.des }}
            </p>

        </GreenSection>
    </section>

    <!-- Contact section -->
    <section>
      <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="pt-8 pb-12 md:pt-12 md:pb-20">

          <!-- Map -->
          <div id="components-demo">
            <Map></Map>
          </div>
          <!-- Filter -->
          <div v-if="Auth" class="mt-8 grid lg:grid-cols-5 md:grid-cols-3 grid-cols-1 gap-6">
            <Field
              class="lg:col-span-2"
              placeholder="Search For..."
              type="text"
            />
            <Field
              class="lg:col-span-2"
              placeholder="Select a Country"
              type="select"
            />
            <div class="">
              <ActionButton :icon="true" class="md:w-full" iconName="SearchIcon" label="Search"/>
            </div>
          </div>
          <!-- Table -->
          <div v-if="Auth">
            <div class="mt-8">
              <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                  <div class="overflow-hidden border-2 md:rounded-md border-bg-light">
                    <table class="min-w-full divide-y divide-bg-light">
                      <thead class="bg-slate-50">
                      <tr>
                        <th class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-slate-800 sm:pl-6" scope="col">
                          Company
                        </th>
                        <th class="px-3 py-3.5 text-left text-sm font-semibold text-slate-800" scope="col">Location</th>
                        <th class="px-3 py-3.5 text-left text-sm font-semibold text-slate-800" scope="col">WSA ID</th>
                        <th class="px-3 py-3.5 text-left text-sm font-semibold text-slate-800" scope="col">
                          Membership Type
                        </th>
                        <th class="relative py-3.5 pl-3 pr-4 sm:pr-6" scope="col">
                          <span class="sr-only">Edit</span>
                        </th>
                      </tr>
                      </thead>
                      <tbody class="divide-y divide-slate-200 bg-white">
                      <tr v-for="company in companies" :key="company.email">
                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm sm:pl-6">
                          <div class="flex items-center">
                            <div class="h-10 w-24 flex-shrink-0">
                              <img :src="company.logo" alt=""
                                   class="h-10 w-24 rounded-md object-contain bg-white ring-2 ring-gray-200"/>
                            </div>
                            <div class="ml-4">
                              <div class="font-medium text-gray-900">{{ company.name }}</div>
                              <div class="text-gray-500">{{ company.email }}</div>
                            </div>
                          </div>
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                          <div class="flex items-center">
                            <div class="h-10 w-10 flex-shrink-0">
                              <img :alt="company.country.name" :src="company.country.flagUrl"
                                   class="h-10 w-10 rounded-md object-cover bg-white"/>
                            </div>
                            <div class="ml-4">
                              <div class="font-medium text-gray-900">{{ company.country.name }}</div>
                              <div class="text-gray-500">
                                <span>{{ company.city }}</span>
                                <span v-if="company.state !== null || company.state !== '' " class="mr-2">,</span>
                                <span v-if="company.state !== null || company.state !== '' ">
                                  {{ company.state }}
                                </span>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                          <span class="font-bold">
                            {{ company.wsaId }}
                          </span>
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                          <span
                            class="inline-flex rounded-md bg-slate-100 px-2 text-xs font-semibold leading-5 text-slate-800">
                            {{ company.type }}
                          </span>
                        </td>
                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                          <a href="#">
                            <ActionButton :icon="true"
                                          buttonSize="small"
                                          iconName="EyeIcon"
                                          label="View"/>
                          </a>
                        </td>
                      </tr>
                      </tbody>
                    </table>
                    <nav
                      class="-mt-px px-4 border-t-2 bg-slate-50 border-bg-light flex items-center justify-between sm:px-4">
                      <div class="-mt-px w-0 flex-1 flex">
                        <a
                          class="border-t-2 border-transparent py-4 pr-1 inline-flex items-center text-sm font-medium text-secondary hover:text-secondary-hover hover:border-bg-light"
                          href="#">
                          <ArrowNarrowLeftIcon aria-hidden="true" class="mr-3 h-5 w-5 text-slate-400"/>
                          Previous
                        </a>
                      </div>
                      <div class="hidden md:-mt-px md:flex">
                        <a
                          class="border-transparent text-secondary hover:text-secondary-hover hover:border-bg-light border-t-2 py-4 px-4 inline-flex items-center text-sm font-medium"
                          href="#">
                          1 </a>
                        <!-- Current: "border-indigo-500 text-indigo-600", Default: "border-transparent text-secondary hover:text-secondary-hover hover:border-bg-light" -->
                        <a aria-current="page"
                           class="border-primary text-primary-hover bg-slate-200 border-t-2 py-4 px-4 inline-flex items-center text-sm font-medium"
                           href="#"> 2 </a>
                        <a
                          class="border-transparent text-secondary hover:text-secondary-hover hover:border-bg-light border-t-2 py-4 px-4 inline-flex items-center text-sm font-medium"
                          href="#">
                          3 </a>
                        <span
                          class="border-transparent text-secondary border-t-2 py-4 px-4 inline-flex items-center text-sm font-medium"> ... </span>
                        <a
                          class="border-transparent text-secondary hover:text-secondary-hover hover:border-bg-light border-t-2 py-4 px-4 inline-flex items-center text-sm font-medium"
                          href="#">
                          8 </a>
                        <a
                          class="border-transparent text-secondary hover:text-secondary-hover hover:border-bg-light border-t-2 py-4 px-4 inline-flex items-center text-sm font-medium"
                          href="#">
                          9 </a>
                        <a
                          class="border-transparent text-secondary hover:text-secondary-hover hover:border-bg-light border-t-2 py-4 px-4 inline-flex items-center text-sm font-medium"
                          href="#">
                          10 </a>
                      </div>
                      <div class="-mt-px w-0 flex-1 flex justify-end">
                        <a
                          class="border-t-2 border-transparent py-4 pl-1 inline-flex items-center text-sm font-medium text-secondary hover:text-secondary-hover hover:border-bg-light"
                          href="#">
                          Next
                          <ArrowNarrowRightIcon aria-hidden="true" class="ml-3 h-5 w-5 text-slate-400"/>
                        </a>
                      </div>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</template>

<script>
// import TestimonialsCarousel from '@/Components/ConsolComponents/partials/TestimonialsCarousel.vue'
import {ArrowNarrowLeftIcon, ArrowNarrowRightIcon} from "@heroicons/vue/outline"
import Field from '@/Components/FormItems/Field.vue'
import ActionButton from '@/Components/FormItems/ActionButton.vue'
import Map from '@/Components/ConsolComponents/Map.vue'
import GreenSection from '@/Components/ConsolComponents/partials/GreenSection.vue'


export default {
  components: {
      Field,
      ArrowNarrowLeftIcon,
      ArrowNarrowRightIcon,
      ActionButton,
      GreenSection,
      Map,
  },
  data() {
    return {
        form: {
        name: null,
        companyName: null,
        wsaId: null,
        phone: {},
        email: null,
        subject: null,
        message: null,
        country: null,
      },
        companies: [
        {
          name: 'Lindsay Walton',
          country: {
            id: 1,
            name: 'Egypt',
            code: 'EG',
            flagUrl: 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fe/Flag_of_Egypt.svg/255px-Flag_of_Egypt.svg.png',
          },
          city: 'Cairo',
          state: '',
          email: 'lindsay.walton@example.com',
          type: 'Member',
          wsaId: '14522',
          logo:
            'https://d1csarkz8obe9u.cloudfront.net/posterpreviews/business-logo-design-template-78655edda18bc1196ab28760f1535baa_screen.jpg?ts=161764532',
        },
        {
          name: 'Lindsay Walton',
          country: {
            id: 1,
            name: 'Egypt',
            code: 'EG',
            flagUrl: 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fe/Flag_of_Egypt.svg/255px-Flag_of_Egypt.svg.png',
          },
          city: 'Cairo',
          state: null,
          email: 'lindsay.walton@example.com',
          type: 'Member',
          wsaId: '14522',
          logo:
            'https://d1csarkz8obe9u.cloudfront.net/posterpreviews/business-logo-design-template-78655edda18bc1196ab28760f1535baa_screen.jpg?ts=161764532',
        },
        {
          name: 'Lindsay Walton',
          country: {
            id: 1,
            name: 'Egypt',
            code: 'EG',
            flagUrl: 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fe/Flag_of_Egypt.svg/255px-Flag_of_Egypt.svg.png',
          },
          city: 'Cairo',
          state: 'Upper Egypt',
          email: 'lindsay.walton@example.com',
          type: 'Member',
          wsaId: '14522',
          logo:
            'https://d1csarkz8obe9u.cloudfront.net/posterpreviews/business-logo-design-template-78655edda18bc1196ab28760f1535baa_screen.jpg?ts=161764532',
        },
        {
          name: 'Lindsay Walton',
          country: {
            id: 1,
            name: 'Egypt',
            code: 'EG',
            flagUrl: 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fe/Flag_of_Egypt.svg/255px-Flag_of_Egypt.svg.png',
          },
          city: 'Alexandria',
          state: '',
          email: 'lindsay.walton@example.com',
          type: 'Member',
          wsaId: '14522',
          logo:
            'https://d1csarkz8obe9u.cloudfront.net/posterpreviews/business-logo-design-template-78655edda18bc1196ab28760f1535baa_screen.jpg?ts=161764532',
        },
      ],
        headerData: {
            title: 'Network Directory',
            des: 'Search for freight forwarders worldwide with WSA Consol',
        }
    };
  },
  methods: {

  },
  created() {

  },

};

</script>
