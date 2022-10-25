<template>


    <section class="flex-grow bg-slate-200">
      <div class="flex flex-col min-w-0 flex-1 overflow-hidden">
        <article class="mb-12">
          <!-- Profile header -->
          <div class="section-bg h-64 w-full object-cover lg:h-80">
          </div>
          <!-- Company Details -->
          <div class="mx-auto mx-6 sm:mx-12 -mt-12 sm:-mt-36">
            <div class="flex items-center justify-between">
              <h1 class="text-4xl text-white">{{company.name}}</h1>
              <div>
                <router-link :to="{ name: 'profile'}">
                  <ActionButton button-style="alternative" label="Back to Profile" :icon="true" iconName="ArrowLeftIcon"/>
                </router-link>
              </div>
            </div>
            <div class="mt-4 sm:rounded-md sm:p-6 p-4 bg-white shadow-lg">
              <!-- Form -->
              <FormSection class="w-full mx-auto">
                <template #form>
                  <div class="font-bold text-lg">Company Details</div>
                  <FormChildSection :gridCount="{'sm':3, 'md':4, 'lg':4}"
                                    class="border rounded-md border-gray-200 bg-gray-50/25" label="Company Details">
                    <div class="sm:col-span-2 md:col-span-3">
                      <div>
                        <div class="col-span-2 grid lg:grid-cols-4 grid-cols-1 gap-4">
                          <Field v-model="form.company.name"
                                 :disabled="true"
                                 :icon="true"
                                 :isLight="true"
                                 :readonly="true"
                                 :required="true"
                                 class="lg:col-span-4"
                                 iconName="OfficeBuildingIcon"
                                 label="Company Name"
                                 name="company-name"
                                 placeholder="Your Company Name"
                                 type="text"/>
                          <Field v-model="form.company.addressLine1"
                                 :icon="true"
                                 :isLight="true"
                                 :required="true"
                                 class="lg:col-span-2"
                                 iconName="LocationMarkerIcon"
                                 label="Address Line 1"
                                 name="address-line-1"
                                 placeholder="Address Line 1"
                                 type="text"/>
                          <Field v-model="form.company.addressLine2"
                                 :isLight="true"
                                 class="lg:col-span-2"
                                 label="Address Line 2"
                                 name="address-line-2"
                                 placeholder="Address Line 2"
                                 type="text"/>
                          <Field v-model="form.company.city"
                                 :disabled="true"
                                 :isLight="true"
                                 :readonly="true"
                                 :required="true"
                                 class="lg:col-span-2"
                                 label="City"
                                 name="city"
                                 placeholder="City"
                                 type="text"/>
                          <Field v-model="form.company.state"
                                 :disabled="true"
                                 :isLight="true"
                                 :readonly="true"
                                 class="lg:col-span-1"
                                 label="State"
                                 name="state"
                                 placeholder="State"
                                 type="text"/>
                          <Field v-model="form.company.postalCode"
                                 :disabled="true"
                                 :icon="true"
                                 :isLight="true"
                                 :readonly="true"
                                 class="lg:col-span-1"
                                 iconName="HashtagIcon"
                                 label="Postal Code"
                                 name="postal-code"
                                 placeholder="Postal Code"
                                 type="text"/>
                          <Field v-model="form.company.country.id"
                                 :data="countries.data"
                                 :icon="true"
                                 :isLight="true"
                                 :required="true"
                                 :searchable="true"
                                 class="lg:col-span-2"
                                 iconName="GlobeIcon"
                                 imgValue="icon_url"
                                 keyValue="id"
                                 label="Country"
                                 labelValue="name"
                                 name="country"
                                 placeholder="Select a country"
                                 searchPlaceholderValue="Search for a country..."
                                 type="select"/>
                          <Field v-model="form.company.email"
                                 :disabled="true"
                                 :icon="true"
                                 :isLight="true"
                                 :readonly="true"
                                 :required="true"
                                 class="lg:col-span-2"
                                 iconName="AtSymbolIcon"
                                 label="Company Email"
                                 name="company-email"
                                 placeholder="Company Email"
                                 type="email"/>
                          <Field v-model="form.company.phone"
                                 :hasSelect="true"
                                 :isLight="true"
                                 :searchable="true"
                                 :selectData="countries.data"
                                 :selectedIdValue="form.company.country.id"
                                 :validator="['min','number', 'max']"
                                 class="lg:col-span-2"
                                 label="Phone Number"
                                 max="13"
                                 min="10"
                                 name="phone-number"
                                 placeholder="Company Phone Number"
                                 searchPlaceholderValue="Code... "
                                 selectImgValue="icon_url"
                                 selectKeyLabel="key"
                                 selectKeyValue="id"
                                 selectPlaceholder="Code"
                                 type="text"
                          />
                          <Field v-model="form.company.fax"
                                 :hasSelect="true"
                                 :isLight="true"
                                 :searchable="true"
                                 :selectData="countries.data"
                                 :selectedIdValue="form.company.country.id"
                                 :validator="['min','number', 'max']"
                                 class="lg:col-span-2"
                                 label="Fax Number"
                                 max="13"
                                 min="10"
                                 name="phone-number"
                                 placeholder="Company Fax Number"
                                 searchPlaceholderValue="Code... "
                                 selectImgValue="icon_url"
                                 selectKeyLabel="key"
                                 selectKeyValue="id"
                                 selectPlaceholder="Code"
                                 type="text"
                          />
                          <Field v-model="form.company.website"
                                 :isLight="true"
                                 :required="true"
                                 :validator="['url']"
                                 class="lg:col-span-2"
                                 label="Website"
                                 name="company-website"
                                 placeholder="Your Website URL"
                                 type="url"
                          />
                          <Field v-model="form.company.businessEstDate"
                                 :disabled="true"
                                 :isLight="true"
                                 :readonly="true"
                                 :required="true"
                                 :validator="['exact', 'number']"
                                 class="lg:col-span-2"
                                 exact="4"
                                 label="Business Established"
                                 name="business-established"
                                 placeholder="Established Year example: 1989"
                                 type="text"/>
                          <Field v-model="form.company.employeesNumber"
                                 :isLight="true"
                                 :required="true"
                                 :validator="['number']"
                                 class="lg:col-span-2"
                                 label="Approximate Number Of Employees"
                                 name="business-employees-amount"
                                 placeholder="Example: 1,2 or 20"
                                 type="text"/>
                          <Field v-model="form.company.branchesNumber"
                                 :disabled="true"
                                 :isLight="true"
                                 :readonly="true"
                                 class="lg:col-span-4"
                                 label="Branches Number / Locations"
                                 name="branches-number-location"
                                 placeholder="Branches Number / Locations"
                                 type="textarea"/>
                          <Field v-model="form.company.profile"
                                 :isLight="true"
                                 :required="true"
                                 :validator="['min']"
                                 class="lg:col-span-4"
                                 label="Company profile"
                                 min="50"
                                 name="branches-number-location"
                                 placeholder="Company Profile"
                                 type="textarea"/>
                        </div>
                      </div>
                    </div>
                    <div class="sm:col-span-1 md:col-span-1">
                      <FileUploader
                        :disabled="true"
                        :isLight="true"
                        :isRounded="true"
                        :mimeType="['jpeg', 'jpg', 'png']"
                        :required="true"
                        label="Company Logo"
                        name="logo"
                        placeholderStyle="logo"
                        readonly="true"/>
                    </div>
                  </FormChildSection>
                  <div class="font-bold text-lg mt-6">Contact Person(s)</div>
                  <FormChildSection :gridCount="{'lg':4, 'md':4, 'sm':2}"
                                    class="border rounded-md border-gray-200 bg-gray-50/25"
                                    label="Company Details">
                    <template v-for="(contactPerson, index) in form.contactPersons" :key="index">
                      <div class="relative md:col-span-4 sm:col-span-2">
                        <XIcon
                          class="absolute h-6 w-6 text-red-500 hover:text-red-700 right-0 top-0 cursor-pointer ease-in-out duration-300"
                          @Click="RemoveContactPerson(index)"/>
                      </div>
                      <Field v-model="contactPerson.title"
                             :data="[{'id':'mr', 'name': 'Mr'},{'id':'mrs', 'name': 'Mrs'},{'id':'ms', 'name': 'Ms'}]"
                             :isLight="true"
                             :name="'contact-person-title-'+ index"
                             class="sm:col-span-1"
                             keyValue="id"
                             label="Title"
                             labelValue="name"
                             placeholder="Select a title"
                             type="select"/>
                      <Field v-model="contactPerson.name"
                             :icon="true"
                             :isLight="true"
                             :name="'contact-person-name-' + index"
                             :required="true"
                             class="sm:col-span-2"
                             iconName="UserIcon"
                             label="Full Name"
                             placeholder="Full Name"
                             type="text"/>
                      <Field v-model="contactPerson.jobTitle"
                             :icon="true"
                             :isLight="true"
                             :name="'contact-person-job-title-'+ index"
                             :required="true"
                             class="sm:col-span-1"
                             iconName="BriefcaseIcon"
                             label="Job Title"
                             placeholder="Job Title"
                             type="text"/>
                      <Field v-model="contactPerson.phone"
                             :hasSelect="true"
                             :isLight="true"
                             :name="'contact-person-phone-number-'+ index"
                             :searchable="true"
                             :selectData="countries.data"
                             :selectedIdValue="form.company.country.id"
                             :validator="['min','number', 'max']"
                             class="lg:col-span-2"
                             label="Direct Phone"
                             max="13"
                             min="10"
                             placeholder="Phone Number"
                             searchPlaceholderValue="Code... "
                             selectImgValue="icon_url"
                             selectKeyLabel="key"
                             selectKeyValue="id"
                             selectPlaceholder="Code"
                             type="text"
                      />
                      <Field v-model="contactPerson.cell"
                             :hasSelect="true"
                             :isLight="true"
                             :name="'contact-person-phone-number-'+ index"
                             :searchable="true"
                             :selectData="countries.data"
                             :selectedIdValue="form.company.country.id"
                             :validator="['min','number', 'max']"
                             class="lg:col-span-2"
                             label="Cell Number"
                             max="13"
                             min="10"
                             placeholder="Cell Number"
                             searchPlaceholderValue="Code... "
                             selectImgValue="icon_url"
                             selectKeyLabel="key"
                             selectKeyValue="id"
                             selectPlaceholder="Code"
                             type="text"
                      />
                      <Field v-model="contactPerson.email"
                             :icon="true"
                             :isLight="true"
                             :name="'contact-person-email-'+ index"
                             :required="true"
                             class="sm:col-span-2"
                             iconName="AtSymbolIcon"
                             label="Email"
                             placeholder="Email"
                             type="email"/>
                      <Field v-model="contactPerson.birthDate"
                             :isLight="true"
                             :name="'contact-person-birthdate-' + index"
                             :required="true"
                             class="sm:col-span-2"
                             label="Birth Date"
                             placeholder="Birth Date"
                             type="date"/>
                      <div class="md:col-span-4 sm:col-span-2 w-full border-b border-gray-200"></div>
                    </template>
                    <div>
                      <ActionButton :disabled="form.contactPersons.length >= 3" :icon="true" buttonSize="small"
                                    buttonStyle="secondary"
                                    class="md:col-span-4 sm:col-span-2 bg-[#16c524]"
                                    iconName="PlusIcon"
                                    label="Add Contact Person"
                                    @click="AddContactPerson"/>
                    </div>
                  </FormChildSection>
                  <div class="font-bold text-lg mt-6">Service(s)</div>
                  <p class="text-sm text-gray-600 font-light">Please indicate the services your company provides.</p>
                  <FormChildSection :gridCount="{'lg':4, 'md':4, 'sm':2}"
                                    class="border rounded-md border-gray-200 bg-gray-50/25"
                                    label="Company Details">
                    <Field v-model="form.services"
                           :data="Services.data"
                           :isGreen="true"
                           :isLight="true"
                           class="sm:col-span-4"
                           keyValue="id"
                           labelValue="name"
                           name="services"
                           slugValue="slug"
                           type="checkbox"
                    />


                    <template
                      v-if="form.services.includes(Services.data.find(item => item.slug === 'others') ? Services.data.find(item => item.slug === 'others').id : 0)">
                      <Field v-model="form.extraServices"
                             :isLight="true"
                             class="sm:col-span-2"
                             description="Use comma '  ,  ' to separate your extra services "
                             label="Extra Services"
                             name="services-extra"
                             placeholder="Extra Services"
                             type="text"/>
                    </template>
                  </FormChildSection>
                  <div class="font-bold text-lg mt-6">Certificate(s)</div>
                  <p class="text-sm text-gray-600 font-light">
                    Please indicate whether your company is certified by and/or a member of any of the following
                    organizations.
                  </p>
                  <FormChildSection :gridCount="{'lg':4, 'md':4, 'sm':2}"
                                    class="border rounded-md border-gray-200 bg-gray-50/25"
                                    label="Company Details">
                    <Field v-model="form.certifications"
                           :data="Certificates.data"
                           :isGreen="true"
                           :isLight="true"
                           class="sm:col-span-4"
                           keyValue="id"
                           labelValue="name"
                           name="certification"
                           slugValue="slug"
                           type="checkbox"
                    />
                    <template
                      v-if="form.certifications.includes(Certificates.data.find(item => item.slug === 'others') ? Certificates.data.find(item => item.slug === 'others').id : 0)">
                      <Field v-model="form.certifications"
                             :isLight="true"
                             class="sm:col-span-2"
                             description="Use comma '  ,  ' to separate your extra certifications"
                             label="Extra Certifications"
                             name="certifications-extra"
                             placeholder="Extra Certifications"
                             type="text"/>
                    </template>

                  </FormChildSection>
                </template>
                <template #actions>
                  <FormChildSection :gridCount="[{'sm':'1'},{'md':'1'},{'lg':'1'},]">
                    <ActionButton :icon="true" buttonSize="large"
                                  buttonStyle="secondary" class="mx-auto bg-[#16c524]"
                                  iconName="SaveIcon" label="Update Profile"/>
                  </FormChildSection>
                </template>
              </FormSection>
            </div>
          </div>


        </article>
      </div>
    </section>

</template>

<script>
import moment from "moment";
import GreenSection from '@/Components/ConsolComponents/partials/GreenSection.vue'
import FormSection from "@/Components/FormItems/FormSection.vue";
import FileUploader from "@/Components/FormItems/FileUploader.vue";
import Field from "@/Components/FormItems/Field.vue";
import FormChildSection from "@/Components/FormItems/Components/FormChildSection.vue";
import ActionButton from "@/Components/FormItems/ActionButton.vue";
import {
  XIcon,
  MenuIcon,
  ChevronLeftIcon,
  LocationMarkerIcon,
  BadgeCheckIcon,
  MailIcon,
  PhoneIcon,
  CheckIcon,
  SearchIcon,
  FilterIcon,
} from '@heroicons/vue/outline'

export default {
  name: 'ViewProfile',
  components: {
    GreenSection,
    LocationMarkerIcon,
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
    Field,
    XIcon,
    FormChildSection,
    ActionButton,
    moment,
  },

  data() {
    return {
        countries:{
            data:[],
        },
        Services:{
            data:[],
        },
        Certificates:{
            data:[],
        },
        Referrals:{
            data:[],
        },

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
      form: {
        company:
          {
            id: null,
            name: null,
            logo: null,
            addressLine1: null,
            addressLine2: null,
            city: null,
            state: null,
            postalCode: null,
            country: {
              id: null,
            },
            email: null,
            phone: {
              key: null,
              value: null,
            },
            fax: {
              key: null,
              value: null,
            },
            website: null,
            profile: null,
            businessEstDate: null,
            employeesNumber: null,
            branchesNumber: null,
          },
        contactPersons: [],
        certifications: [],
        extraCertification: null,
        services: [],
        extraServices: null,
        termsAndConditions: false,
        termsAndConditionsConfirm: false,
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
  methods: {
    AddContactPerson() {
      // console.log('AddContactPerson');
      if (this.form.contactPersons.length >= 3) {
        this.errorNotify('error', 'The maximum number of contact persons has been reached', 5000)
        return false;
      }
      this.form.contactPersons.push({
        id: null,
        title: null,
        name: null,
        jobTitle: null,
        phone: {
          key: null,
          value: null,
        },
        cell: {
          key: null,
          value: null,
        },
        email: null,
        birthDate: null,
      })
    },
    RemoveContactPerson(index) {

      if (this.form.contactPersons.length === 1) {
        this.errorNotify('error', 'You need at least one contact person for your company', 5000)
        return false;
      }
      // this.form.contactPersons.splice(personIndex, 1);
      // const person = this.form.contactPersons.find(person => person.title == title)
      // let personIndex = this.form.contactPersons.indexOf(person)

      this.form.contactPersons.splice(index, 1);
      // console.log(this.form.contactPersons, index, this.form.contactPersons[index])

    },
  },
}
</script>
