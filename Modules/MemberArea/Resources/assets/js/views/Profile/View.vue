<template>

  <TransitionRoot appear :show="isOpen" as="template">
    <Dialog as="div" @close="closeModal" class="relative z-40">
      <TransitionChild
        as="template"
        enter="duration-300 ease-out"
        enter-from="opacity-0"
        enter-to="opacity-100"
        leave="duration-200 ease-in"
        leave-from="opacity-100"
        leave-to="opacity-0">
        <div class="fixed inset-0 bg-black bg-opacity-25" />
      </TransitionChild>
      <div class="fixed inset-0 overflow-y-auto">
        <div
          class="flex min-h-full items-center justify-center p-4 text-center">
          <TransitionChild
            as="template"
            enter="duration-300 ease-out"
            enter-from="opacity-0 scale-95"
            enter-to="opacity-100 scale-100"
            leave="duration-200 ease-in"
            leave-from="opacity-100 scale-100"
            leave-to="opacity-0 scale-95">
            <DialogPanel
              class="w-full max-w-4xl transform text-left rounded-lg bg-white p-6 align-middle shadow-xl transition-all">
              <DialogTitle
                as="h3"
                class="text-lg font-medium leading-6 text-text-primary pb-3 border-b border-slate-200">
                Add a New Contact Person
              </DialogTitle>
              <div class="my-4 grid grid-cols-6 gap-6">
                <Field v-model="form.contactPerson.name"
                       :hasSelect="true"
                       :required="true"
                       :selectData="titles"
                       :selectedIdValue="form.contactPerson.name.selected"
                       class="sm:col-span-3"
                       label="Contact Name"
                       name="full-name"
                       placeholder="John Deo"
                       selectKeyLabel="name"
                       selectKeyValue="value"
                       selectPlaceholder="Title"
                       type="text"
                />
                <Field v-model="form.contactPerson.jobTitle"
                       :icon="true"
                       :isLight="true"
                       :required="true"
                       class="sm:col-span-3"
                       iconName="BriefcaseIcon"
                       label="Job Title"
                       name="job-title"
                       placeholder="John Doe"
                       type="text"
                />
                <Field v-model="form.contactPerson.email"
                       :icon="true"
                       :isLight="true"
                       :required="true"
                       :validator="['email']"
                       class="sm:col-span-3"
                       iconName="MailIcon"
                       label="Email"
                       name="email"
                       placeholder="name@company.com"
                       type="email"
                />
                <Field v-model="form.contactPerson.birthDate"
                       :icon="true"
                       :isLight="true"
                       :required="true"
                       class="sm:col-span-3"
                       iconName="CalendarIcon"
                       label="Birth Date"
                       name="birth-date"
                       type="date"
                />
                <Field v-model="form.contactPerson.cell"
                       :hasSelect="true"
                       :searchable="true"
                       :required="true"
                       :selectData="countries.data"
                       :selectedIdValue="form.contactPerson.cell.selected"
                       :validator="['min', 'max']"
                       class="sm:col-span-3"
                       label="Cell Number"
                       max="13"
                       min="10"
                       name="cell-number"
                       placeholder="### #### ####"
                       searchPlaceholderValue="Search... "
                       selectImgValue="icon"
                       selectKeyLabel="key"
                       selectKeyValue="id"
                       selectPlaceholder="Code"
                       type="text"
                />
                <Field v-model="form.contactPerson.direct"
                       :hasSelect="true"
                       :searchable="true"
                       :required="true"
                       :selectData="countries.data"
                       :selectedIdValue="form.contactPerson.direct.selected"
                       :validator="['min', 'max']"
                       class="sm:col-span-3"
                       label="Direct Number"
                       max="13"
                       min="10"
                       name="direct-number"
                       placeholder="### #### ####"
                       searchPlaceholderValue="Search... "
                       selectImgValue="icon"
                       selectKeyLabel="key"
                       selectKeyValue="id"
                       selectPlaceholder="Code"
                       type="text"
                />
              </div>
              <div class="pt-4 space-x-4 border-t border-slate-200">
                <ActionButton label="Save" button-style="secondary" @click="closeModal" />
                <ActionButton label="Save & Add New" button-style="secondary" @click="closeModal" />
                <ActionButton label="Discard" button-style="danger" @click="closeModal" />
              </div>
            </DialogPanel>
          </TransitionChild>
        </div>
      </div>
    </Dialog>
  </TransitionRoot>
    <!-- Site header -->

    <!-- Page content -->
    <main class="flex-grow bg-slate-200">
      <section>

        <div class="flex flex-col min-w-0 flex-1">
          <article class="mb-12">
            <!-- Profile header -->
            <div class="section-bg h-64 w-full object-cover lg:h-80">
            </div>
            <div class="mx-auto mx-6 sm:mx-12 sm:rounded-md sm:p-6 p-4 -mt-12 sm:-mt-24 grid xl:grid-cols-9 grid-cols-1 sm:gap-6 gap-4 bg-white shadow-lg">
              <div class="xl:col-span-2">
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
              <div class="xl:col-span-3">
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
              <!-- WSA ID -->
              <div class="xl:col-span-1 flex text-center my-auto border border-dashed border-slate-300 bg-slate-100 text-text-secondary flex-col rounded-md px-4 py-2" v-if="company.wsaId !== null">
                <HashtagIcon class="h-5 w-5 mx-auto"/>
                <div class="text-sm font-light text-text-secondary">
                  WSA ID
                </div>
                <div class="text-base font-medium text-text-secondary">
                    {{ company.wsaId }}
                  </div>
              </div>
              <!-- Member Status -->
              <div class="xl:col-span-1 flex text-center my-auto border border-dashed border-slate-300 bg-slate-100 text-text-secondary flex-col rounded-md px-4 py-2" v-if="company.membership.type !== null">
                <UserIcon class="h-5 w-5 mx-auto"/>
                <span class="text-sm font-light text-text-secondary">
                    Status
                  </span>
                <span class="text-base font-medium text-text-secondary capitalize">
                    {{ company.membership.type }}
                  </span>
              </div>
              <!-- Member Since -->
              <div class="xl:col-span-1 flex text-center my-auto border border-dashed border-slate-300 bg-slate-100 text-text-secondary flex-col rounded-md px-4 py-2" v-if="company.membership.since !== null">
                <CalendarIcon class="h-5 w-5 mx-auto"/>
                <div class="text-sm font-light">
                    Member Since
                  </div>
                <div class="text-base font-medium">

                    {{ membershipSinceYear }}
                  </div>
              </div>
              <!-- FPP Status -->
              <div class="xl:col-span-1 flex text-center my-auto border border-dashed border-slate-300 bg-slate-100 flex-col rounded-md px-4 py-2" v-if="company.membership.since !== null">
                <BadgeCheckIcon :class="[(company.membership.fpp ? 'text-success' : 'text-danger'), 'h-5 w-5 mx-auto']"/>
                <div :class="[(company.membership.fpp ? 'text-success' : 'text-danger'), 'text-sm font-light']" class="">
                  FPP
                </div>
                <div :class="[(company.membership.fpp ? 'text-success' : 'text-danger'), 'text-base font-medium']" class="">
                    Verified
                  </div>
              </div>
            </div>
            <!-- Description list -->
            <div class="mt-6 mx-auto mx-6 sm:mx-12 lg:flex gap-6">
              <div class="w-full lg:w-2/3 lg:sticky lg:top-28 h-fit bg-white sm:rounded-md shadow-lg sm:py-6 py-4 px-4 sm:px-6 lg:px-8">
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
                        <img :alt="company.country.name" :src="company.country.flagUrl" class="h-5 w-6 mr-2 rounded"/>
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
                <div class="mt-4 pt-4 border-t border-slate-200">
                  <router-link  :to="{ name: 'edit-profile'}">
                    <ActionButton :icon="true" :isLight="true" buttonStyle="secondary" class="float-right" iconName="PencilAltIcon"
                                  label="Update Company Profile"/>
                  </router-link>
                </div>
              </div>
              <div class="lg:mt-0 mt-12 w-full lg:w-1/3">
                <div>
                  <div class="flex items-center justify-between">
                    <div class="flex items-center text-text-secondary">
                      <UsersIcon class="h-6 w-6 mr-2" />
                      <h2 class="text-base font-medium">
                        Contact Persons
                      </h2>
                    </div>
                    <div>
                      <ActionButton @click="setIsOpen(true)" label="Add Contact Person" :icon="true" iconName="PlusIcon" buttonStyle="secondary" button-size="small" />
                    </div>
                  </div>
                  <div class="mt-4 grid grid-cols-1 gap-6">
                    <template v-if="company.contactPersons.length >= 1">
                      <div v-for="person in company.contactPersons" :key="person.id"
                           class="rounded-md border border-bg-lighter bg-white sm:rounded-md shadow-lg px-6 duration-300 ease-in-out">
                        <div class="flex items-center justify-between border-b border-bg-light">
                          <div class="flex items-center space-x-3 w-full py-4">
                            <div class="flex-shrink-0">
                              <img :src="person.avatarUrl" alt="" class="h-10 w-10 rounded-md"/>
                            </div>
                            <div class="flex-1 min-w-0">
                              <p class="text-sm font-light text-text-secondary font-medium flex items-center">
                            <span v-if="person.title !== null" class="mr-1">
                              {{ person.title }}
                            </span>
                                <span class="font-semibold" v-if="person.name !== null">
                          {{ person.name }}
                        </span>
                              </p>
                              <p v-if="person.jobTitle !== null" class="text-sm text-text-secondary truncate">
                                {{ person.jobTitle }}
                              </p>
                            </div>
                          </div>
                          <div class="flex items-center space-x-2">
                            <ActionButton label="Edit" button-style="alternative" button-size="small" :icon="true" iconName="PencilAltIcon" />
                            <ActionButton label="Edit" button-style="danger" button-size="small" :icon="true" iconName="TrashIcon" />
                          </div>
                        </div>
                        <div class="pt-2 pb-4">
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
                                {{ person.directNumber.key }}
                              </span>
                                {{ person.directNumber.value }}
                              </dd>
                            </div>
                          </dl>
                        </div>
                      </div>
                    </template>
                    <template v-else>
                      <div class="border border-slate-400/80 text-center font-semibold text-text-primary p-6 rounded-lg border-dashed">
                        <IdentificationIcon class="h-16 w-16 text-slate-300 mx-auto mb-4" />
                        You have no contact persons.
                      </div>
                    </template>
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
  Dialog,
  DialogPanel,
  DialogTitle,
  DialogDescription,
  TransitionRoot,
  TransitionChild,
} from '@headlessui/vue'
import {
  XIcon,
  MenuIcon,
  UserIcon,
  ChevronLeftIcon,
  LocationMarkerIcon,
  BadgeCheckIcon,
  MailIcon,
  PhoneIcon,
  CheckIcon,
  SearchIcon,
  FilterIcon,
  IdentificationIcon,
  CalendarIcon,
  HashtagIcon,
} from '@heroicons/vue/outline'

export default {
  name: 'ViewProfile',
  components: {
    Header,
    GreenSection,
    UserIcon,
    LocationMarkerIcon,
    Dialog,
    DialogPanel,
    DialogTitle,
    DialogDescription,
    IdentificationIcon,
    BadgeCheckIcon,
    MenuIcon,
    CheckIcon,
    ChevronLeftIcon,
    MailIcon,
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
    CalendarIcon,
    HashtagIcon,
    moment,
    TransitionRoot,
    TransitionChild,
  },
  data() {
    return {
      isOpen : false,
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
            {
              id: 3,
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
              id: 4,
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
              id: 5,
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
              id: 6,
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
              id: 7,
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
      form: {
        id: null,
        contactPerson: {
          name: {
            selected: null,
            value: null,
          },
          jobTitle: null,
          email: null,
          cell: {
            selected: null,
            value: null,
          },
          direct: {
            selected: null,
            value: null,
          },
          birthDate: null,
        },
      },
      titles: [
          {name: 'Mr', value:'mr'},
          {name: 'Mrs', value:'mrs'},
          {name: 'Ms', value:'ms'}
        ],
      countries: {
        data: [
          {
            name: 'Egypt',
            key: '+20',
            code: 'egy',
            icon: 'https://upload.wikimedia.org/wikipedia/commons/f/fe/Flag_of_Egypt.svg',
            active: true,
          },
          {
            name: 'Libya',
            key: '+218',
            code: 'lb',
            icon: 'https://upload.wikimedia.org/wikipedia/commons/0/05/Flag_of_Libya.svg',
            active: true,
          },
        ]

      }


    }
  },
  methods:{
    setIsOpen(value){
      this.isOpen = true;
    },
    closeModal(){
      this.isOpen = false;
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
