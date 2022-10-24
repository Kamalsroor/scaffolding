<template>


    <!-- Site header -->

    <!-- Page content -->
    <main class="flex-grow bg-gray-200">
      <section class="">
        <div class="flex flex-col min-w-0 flex-1 overflow-hidden">
          <article class="mb-12">
            <!-- Profile header -->
            <div class="section-bg h-64 w-full object-cover lg:h-80">
            </div>
            <div class="mx-auto mx-6 sm:mx-12 sm:rounded-md sm:p-6 p-4 -mt-12 sm:-mt-24 grid lg:grid-cols-12 grid-cols-1 sm:gap-6 gap-4 bg-white shadow-lg">
              <div class="lg:col-span-2">
                    <span class="relative">
                      <img
                        :alt="company.name"
                        :src="company.logo"
                        class="h-32 w-full rounded-md object-contain bg-white p-4 ring-4 ring-gray-200"/>
                      <span
                        class="absolute bottom-0 right-0 transform translate-y-1/2 translate-x-1/2 block border-4 border-gray-100 rounded-full">
                        <span class="block h-4 w-4 rounded-full bg-green-500"/>
                        <!--                         <span class="block h-4 w-4 rounded-full bg-gray-500"/>-->
                      </span>
                    </span>
              </div>
              <div class="lg:col-span-4">
                <div>
                  <h1 class="text-2xl font-medium">{{ company.name }}</h1>
                </div>
                <div class="sm:flex items-center text-text-secondary mt-2">
                  <div class="flex items-center">
                    <LocationMarkerIcon class="h-5 w-5 mr-2"/>
                    <img :alt="company.country.name" :src="company.country.flagUrl" class="h-5 rounded object-cover w-6 mr-2"/>
                    <span class="font-semibold">
                      {{ company.country.name }}
                    </span>
                    , {{ company.city }}
                  </div>
                </div>
                <div class="mt-2 flex items-center">
                  <BadgeCheckIcon :class="[(company.membership.fpp ? 'text-success' : 'text-danger'), 'h-5 w-5 mr-1']"/>
                  <span v-if="company.membership.fpp" class="font-medium text-success">FPP Verified</span>
                  <span v-else class="font-medium text-danger">FPP Not Active</span>
                </div>
              </div>
              <div class="lg:col-span-1 flex text-center my-auto border border-dashed border-slate-300 text-text-secondary flex-col rounded-md px-4 py-2" v-if="company.wsaId !== null">
                <CalendarDaysIcon class="h-5 w-5 mr-2"/>
                <div class="text-sm font-light text-text-secondary">
                  WSA ID
                </div>
                <div class="text-base font-medium text-text-secondary">
                    {{ company.wsaId }}
                  </div>
              </div>
              <div class="lg:col-span-1 flex text-center my-auto border border-dashed border-slate-300 text-text-secondary flex-col rounded-md px-4 py-2" v-if="company.membership.type !== null">
                  <span class="text-sm font-light text-text-secondary">
                    Status
                  </span>
                <span class="text-base font-medium text-text-secondary capitalize">
                    {{ company.membership.type }}
                  </span>
              </div>
              <div class="lg:col-span-1 flex text-center my-auto border border-dashed border-slate-300 text-text-secondary flex-col rounded-md px-4 py-2" v-if="company.membership.since !== null">
                <CalendarDaysIcon class="h-5 w-5 mx-auto"/>
                <div class="text-sm font-light">
                    Member Since
                  </div>
                <div class="text-base font-medium">

                    {{ membershipSinceYear }}
                  </div>
              </div>
              <div class="lg:col-span-1 flex text-center my-auto border border-dashed border-slate-300 flex-col rounded-md px-4 py-2" v-if="company.membership.since !== null">
                <BadgeCheckIcon :class="[(company.membership.fpp ? 'text-success' : 'text-danger'), 'h-5 w-5 mx-auto']"/>
                <div :class="[(company.membership.fpp ? 'text-success' : 'text-danger'), 'text-sm font-light']" class="">
                  FPP
                </div>
                <div :class="[(company.membership.fpp ? 'text-success' : 'text-danger'), 'text-base font-medium']" class="">
                    Verified
                  </div>
              </div>
              <div class="lg:col-span-2 my-auto">
                <router-link  :to="{ name: 'edit-profile'}">
                  <ActionButton :icon="true" :isLight="true" buttonStyle="secondary" class="float-right" iconName="CogIcon"
                                label="Edit Profile"/>
                </router-link>
              </div>
            </div>
            <!-- Description list -->
            <div class="mt-6 mx-auto mx-6 sm:mx-12 grid xl:grid-cols-3 grid-cols-1 xl:gap-6">
              <div class="lg:col-span-2 col-span-1 bg-white sm:rounded-md shadow-lg sm:py-6 py-4 px-4 sm:px-6 lg:px-8">
                <dl class="grid grid-cols-1 sm:grid-cols-1 divide-dashed divide-y divide-gray-300">
                  <div v-if="company.addressLine1 !== null || company.addressLine2 !== null"
                       class="py-2 sm:flex sm:items-center sm:col-span-1">
                    <dt class="text-sm font-light text-text-secondary sm:min-w-[12rem]">
                      Address
                    </dt>
                    <dd class="mt-1 text-sm text-text-secondary font-medium">
                      {{ company.addressLine1 + company.addressLine2 }}
                    </dd>
                  </div>
                  <div v-if="company.country.id !== null" class="py-2 sm:flex sm:items-center sm:col-span-1">
                    <dt class="text-sm font-light text-text-secondary sm:min-w-[12rem]">
                      Country
                    </dt>
                    <dd class="mt-1 text-sm text-text-secondary font-medium">
                      <div class="items-center flex">
                        <img :alt="company.country.name" :src="company.country.flagUrl" class="h-4 w-6 mr-2"/>
                        <span>{{ company.country.name }}</span>
                      </div>
                    </dd>
                  </div>
                  <div v-if="company.state !== null" class="py-2 sm:flex sm:items-center sm:col-span-1">
                    <dt class="text-sm font-light text-text-secondary sm:min-w-[12rem]">
                      State
                    </dt>
                    <dd class="mt-1 text-sm text-text-secondary font-medium">
                      {{ company.state }}
                    </dd>
                  </div>
                  <div v-if="company.city !== null" class="py-2 sm:flex sm:items-center sm:col-span-1">
                    <dt class="text-sm font-light text-text-secondary sm:min-w-[12rem]">
                      City
                    </dt>
                    <dd class="mt-1 text-sm text-text-secondary font-medium">
                      {{ company.city }}
                    </dd>
                  </div>
                  <div v-if="company.phone.value !== null" class="py-2 sm:flex sm:items-center sm:col-span-1">
                    <dt class="text-sm font-light text-text-secondary sm:min-w-[12rem]">
                      Company Phone
                    </dt>
                    <dd class="mt-1 text-sm text-text-secondary font-medium">
                      <span v-if="company.phone.key !== null" class="mr-1">{{ company.phone.key }}</span>
                      {{ company.phone.value }}
                    </dd>
                  </div>
                  <div v-if="company.fax.value !== null" class="py-2 sm:flex sm:items-center sm:col-span-1">
                    <dt class="text-sm font-light text-text-secondary sm:min-w-[12rem]">
                      Company Fax
                    </dt>
                    <dd class="mt-1 text-sm text-text-secondary font-medium">
                      <span v-if="company.fax.key !== null" class="mr-1">{{ company.fax.key }}</span>
                      {{ company.fax.value }}
                    </dd>
                  </div>
                  <div v-if="company.businessEstDate !== null" class="py-2 sm:flex sm:items-center sm:col-span-1">
                    <dt class="text-sm font-light text-text-secondary sm:min-w-[12rem]">
                      Year Established
                    </dt>
                    <dd class="mt-1 text-sm text-text-secondary font-medium">
                      {{ company.businessEstDate }}
                    </dd>
                  </div>
                  <div v-if="company.membership.since !== null" class="py-2 sm:flex sm:items-center sm:col-span-1">
                    <dt class="text-sm font-light text-text-secondary sm:min-w-[12rem]">
                      Member Since
                    </dt>
                    <dd class="mt-1 text-sm text-text-secondary font-medium">
                      {{ membershipSince }}
                    </dd>
                  </div>
                  <div v-if="company.website !== null" class="py-2 sm:flex sm:items-center sm:col-span-1">
                    <dt class="text-sm font-light text-text-secondary sm:min-w-[12rem]">
                      Website
                    </dt>
                    <dd class="mt-1 text-sm text-text-secondary font-medium">
                    <span class="text-primary hover:text-primary-hover">
                      <a :href="company.website" :title="'Visit -> '+company.website">{{ company.website }}</a>
                    </span>
                    </dd>
                  </div>
                  <div v-if="company.website !== null" class="py-2 sm:flex sm:items-center sm:col-span-1">
                    <dt class="text-sm font-light text-text-secondary sm:min-w-[12rem]">
                      Email
                    </dt>
                    <dd class="mt-1 text-sm text-text-secondary font-medium">
                    <span class="text-primary hover:text-primary-hover">
                      <a :href="'mailto:'+company.email"
                         :title="'Send Email to: '+company.email">
                        {{ company.email }}
                      </a>
                    </span>
                    </dd>
                  </div>
                  <div v-if="company.website !== null" class="py-2 sm:flex sm:items-center sm:col-span-1">
                    <dt class="text-sm font-light text-text-secondary sm:min-w-[12rem]">
                      Services
                    </dt>
                    <dd class="mt-1 text-sm text-text-secondary font-medium">
                      <ul class="flex flex-wrap gap-4 text-sm">
                        <li v-for="service in company.services" :key="service.id" class="flex items-center">
                          <CheckIcon class="text-primary mr-2 w-5 h-5"/>
                          <span>{{ service.name }}</span>
                        </li>
                        <li class="flex items-center">
                          <CheckIcon class="text-primary font-medium mr-2 w-5 h-5"/>
                          <span>{{ company.extraServices }}</span>
                        </li>
                      </ul>
                    </dd>
                  </div>
                  <div v-if="company.website !== null" class="py-2 sm:flex sm:items-center sm:col-span-1">
                    <dt class="text-sm font-light text-text-secondary sm:min-w-[12rem]">
                      Certificates
                    </dt>
                    <dd class="mt-1 text-sm text-text-secondary font-medium">
                      <ul class="flex flex-wrap gap-4 text-sm">
                        <li v-for="certificate in company.certifications" :key="certificate.id" class="flex items-center">
                          <CheckIcon class="text-primary mr-2 w-5 h-5"/>
                          <span>{{ certificate.name }}</span>
                        </li>
                        <li class="flex items-center">
                          <CheckIcon class="text-primary font-medium mr-2 w-5 h-5"/>
                          <span>{{ company.extraCertification }}</span>
                        </li>
                      </ul>
                    </dd>
                  </div>
                  <div v-if="company.profile !== null" class="sm:col-span-1 py-2">
                    <dt class="text-sm font-light text-text-secondary">Company Profile</dt>
                    <dd class="mt-1 text-sm text-text-secondary font-medium space-y-5" v-html="company.profile"/>
                  </div>
                </dl>
              </div>
              <div class="col-span-1">
                <div class="bg-white sm:rounded-md shadow-lg sm:py-6 sm:px-6 lg:px-8">
                  <h2 class="text-base font-medium text-text-secondary">Contact Person<span
                    v-if="company.contactPersons.length > 1">s</span></h2>
                  <div class="mt-4 grid grid-cols-1 gap-6">
                    <div v-for="person in company.contactPersons" :key="person.id"
                         class="rounded-md border border-bg-lighter bg-white px-6 duration-300 ease-in-out">
                      <div class="border-b border-bg-light flex items-center space-x-3 w-full py-4">
                        <div class="flex-shrink-0">
                          <img :src="person.avatarUrl" alt="" class="h-10 w-10 rounded-md"/>
                        </div>
                        <div class="flex-1 min-w-0">
                          <p class="text-sm font-light text-text-secondary font-medium flex items-center">
                        <span v-if="person.title !== null" class="mr-1">
                          {{ person.title }}
                        </span>
                            <span v-if="person.name !== null">
                          {{ person.name }}
                        </span>
                          </p>
                          <p v-if="person.jobTitle !== null" class="text-sm text-text-secondary truncate">
                            {{ person.jobTitle }}
                          </p>
                        </div>
                      </div>
                      <div class="py-4">
                        <dl class="grid grid-cols-1 divide-dashed divide-y divide-gray-300">
                          <div v-if="person.email !== null" class="py-2 flex items-center  space-x-6 sm:col-span-1">
                            <dt class="text-sm font-light text-text-secondary">
                              Email
                            </dt>
                            <dd class="mt-1 text-sm text-text-secondary font-medium">
                              {{ person.email }}
                            </dd>
                          </div>
                          <div v-if="person.cellNumber.value !== null"
                               class="py-2 flex items-center space-x-6 sm:col-span-1">
                            <dt class="text-sm font-light text-text-secondary">
                              Cell Number
                            </dt>
                            <dd class="mt-1 text-sm text-text-secondary font-medium">
                          <span v-if="person.cellNumber.key !== null" class="mr-1">
                            {{ person.cellNumber.key }}
                          </span>
                              {{ person.cellNumber.value }}
                            </dd>
                          </div>
                          <div v-if="person.directNumber.value !== null"
                               class="py-2 flex items-center  space-x-6 sm:col-span-1">
                            <dt class="text-sm font-light text-text-secondary">
                              Direct Phone
                            </dt>
                            <dd class="mt-1 text-sm text-text-secondary font-medium">
                          <span v-if="person.directNumber.key !== null" class="mr-1">
                            {{ person.directNumber.key }}</span>
                              {{ person.directNumber.value }}
                            </dd>
                          </div>
                        </dl>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Team member list -->


          </article>
        </div>
      </section>

    </main>

    <!-- Site footer -->

</template>

<script>
import moment from "moment";
import Header from '@/components/ConsolComponents/partials/Header.vue'
import Footer from '@/components/ConsolComponents/partials/Footer.vue'
import GreenSection from '@/components/ConsolComponents/partials/GreenSection.vue'
import FormSection from "@/components/FormItems/FormSection.vue";
import FileUploader from "@/components/FormItems/FileUploader.vue";
import Field from "@/components/FormItems/Field.vue";
import FormChildSection from "@/components/FormItems/Components/FormChildSection.vue";
import ActionButton from "@/components/FormItems/ActionButton.vue";
import {
  XIcon,
  MenuIcon,
  ChevronLeftIcon,
  LocationMarkerIcon,
  BadgeCheckIcon,
  EnvelopeIcon,
  PhoneIcon,
  CheckIcon,
  SearchIcon,
  FilterIcon,
  CalendarDaysIcon,
} from '@heroicons/vue/outline'

export default {
  name: 'ViewProfile',
  components: {
    Header,
    GreenSection,
    LocationMarkerIcon,
    BadgeCheckIcon,
    MenuIcon,
    CheckIcon,
    ChevronLeftIcon,
    EnvelopeIcon,
    PhoneIcon,
    SearchIcon,
    FilterIcon,
    FormSection,
    FileUploader,
    Footer,
    Field,
    XIcon,
    FormChildSection,
    ActionButton,
    moment,
  },
  data() {
    return {
      company:
        {
          id: 1,
          wsaId: '19042',
          name: 'TIEFFE GROUP SRL ',
          type: 'hq',
          logo: 'https://worldshippingalliance.com/Upload/2020/05/23/Members/644.png',
          addressLine1: 'VIA ADRIANO GOZZINI, 5 PISA 56121',
          addressLine2: 'VIA ADRIANO GOZZINI, 5 PISA 56121',
          city: 'Pisa',
          state: null,
          postalCode: '56121',
          country: {
            id: 22,
            name: 'Italy',
            code: 'IT',
            flagUrl: 'https://worldshippingalliance.com/Shipping/layout/flagSmall/Italy.png',
          },
          email: 'lorenzo@tieffe-group.it',
          phone: {
            key: '+39',
            value: '050988397',
          },
          fax: {
            key: '+39',
            value: '0509656234',
          },
          website: 'http://www.tieffe-group.it/',
          businessEstDate: '2012',
          profile: 'Founded in 2012, Tieffe Group is an innovative and dynamic company in the international transport trade. In a moment of economical struggles as the one we’re living in, our project is to analyze customer’s requests and study tailored services based on every and specific exigence with dedicated staff and competitive prices. • Worldwide coverage • Professional staff • Tailored solutions • Flexible services Our group evaluate the professionalism and the financial reliability of all our partner thanks to the use of our financial platform CRIF. We’re able to monitor and periodically analyze all the companies we’re daily working with. This is our added value to our customers. With Tieffe Group you won’t risk to incurr in misleading behaviors from unfair suppliers or matter that may lead to any problem with the handling of your cargo.',
          employeesNumber: null,
          branchesNumber: null,
          membership: {
            type: 'member',
            fpp: true,
            since: '1-1-2019',
          },
          contactPersons: [
            {
              id: 1,
              title: 'Mr',
              avatarUrl: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
              businessCardUrl: '',
              name: 'Lorenzo Faoro',
              jobTitle: 'CEO',
              cellNumber: {
                key: '+39',
                value: '3886378733',
              },
              directNumber: {
                key: '+39',
                value: '3886378733',
              },
              email: 'lorenzo@tieffe-group.it',
              birthDate: null,
            },
            {
              id: 2,
              title: 'Mr',
              avatarUrl: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
              businessCardUrl: '',
              name: 'Lorenzo Faoro',
              jobTitle: 'CEO',
              cellNumber: {
                key: '+39',
                value: '3886378733',
              },
              directNumber: {
                key: '+39',
                value: '3886378733',
              },
              email: 'lorenzo@tieffe-group.it',
              birthDate: null,
            },
          ],
          certifications: [
            {
              id: 1,
              name: 'Sea Freight',
            },
            {
              id: 2,
              name: 'Air Freight',
            },
            {
              id: 3,
              name: 'Consolidation Cargo',
            },
            {
              id: 4,
              name: 'Road Freight',
            },
            {
              id: 5,
              name: 'Cargo Insurance',
            },
            {
              id: 6,
              name: 'Door To Door Services',
            },
            {
              id: 7,
              name: 'Customs Clearance',
            },
            {
              id: 8,
              name: 'Bonded Warehouse',
            },
            {
              id: 9,
              name: 'Trade Consultants',
            },
          ],
          extraCertification: 'Extra ISO Certificate',
          services: [
            {
              id: 1,
              name: 'IATA / CNS',
            },
            {
              id: 2,
              name: 'Customs Broker',
            },
            {
              id: 3,
              name: 'ISO 9001/9002',
            },
            {
              id: 4,
              name: 'Forwarders Association',
            },
            {
              id: 5,
              name: 'Chamber of Commerce',
            },
          ],
          extraServices: 'Extra ISO Service',
          isActive: true,
          showInNetwork: true,

        },
    }
  },
  created() {
    // moment(this.company.membership.since).format('YYYY');
  },
  computed: {
    membershipSinceYear: function () {
      return moment(this.company.membership.since).format('YYYY');
    },
    membershipSince: function () {
      return moment(this.company.membership.since).format('MMMM, YYYY');
    },
  },
}
</script>
