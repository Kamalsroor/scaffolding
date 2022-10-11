<template>


    <!-- Hero section -->
    <section class="section-bg">
      <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="pt-44 pb-6 md:pt-48 md:pb-10">

          <!-- Section header -->
          <div class="max-w-3xl mx-auto text-center pb-12 md:pb-16">
            <h1 class="h1 mb-4 text-white" data-aos="zoom-y-out">Contact with WSA Team</h1>
            <p class="text-xl text-white" data-aos="zoom-y-out" data-aos-delay="150">Have a question about WSA
              Consol? Contact us directly</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact section -->
    <section>
      <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="pt-8 pb-12 md:pt-12 md:pb-20">

          <!-- Contact form -->
          <form class="max-w-4xl mx-auto">
            <div class="grid sm:grid-cols-4 grid-cols-1 gap-6">
              <Field v-model="form.name"
                     :icon="true"
                     :isLight="true"
                     :required="true"
                     class="sm:col-span-2"
                     iconName="UserIcon"
                     label="Full Name"
                     name="name"
                     placeholder="John Doe"
                     type="text"
              />
              <Field v-model="form.companyName"
                     :icon="true"
                     :isLight="true"
                     :required="true"
                     class="sm:col-span-2"
                     iconName="OfficeBuildingIcon"
                     label="Company Name"
                     name="company-name"
                     placeholder="Your Company Name"
                     type="text"
              />
              <Field v-model="form.wsaId"
                     :icon="true"
                     :isLight="true"
                     :validator="['number','exact']"
                     class="sm:col-span-2"
                     exact="5"
                     iconName="HashtagIcon"
                     label="WSA ID"
                     name="wsa-id"
                     placeholder="#####"
                     type="text"
              />
              <Field v-model="form.country"
                     :data="countries.data"
                     :icon="true"
                     :isLight="true"
                     :required="true"
                     :searchable="true"
                     class="sm:col-span-2"
                     extraTitle="code"
                     iconName="LocationMarkerIcon"
                     imgValue="icon_url"
                     keyValue="id"
                     label="Country"
                     labelValue="name"
                     name="country"
                     placeholder="Select a country"
                     searchPlaceholderValue="Search for country... "
                     type="select"
              />
              <Field v-model="form.phone"
                     :hasSelect="true"
                     :isLight="true"
                     :searchable="true"
                     :selectData="countries.data"
                     :selectedIdValue="form.country"
                     :validator="['min', 'max']"
                     class="sm:col-span-2"
                     label="Phone Number"
                     max="13"
                     min="10"
                     name="phone-number"
                     placeholder="### #### ####"
                     searchPlaceholderValue="Search... "
                     selectImgValue="icon_url"
                     selectKeyLabel="key"
                     selectKeyValue="id"
                     selectPlaceholder="Code"
                     type="text"
              />
              <Field v-model="form.email"
                     :icon="true"
                     :isLight="true"
                     :required="true"
                     :validator="['email']"
                     class="sm:col-span-2"
                     iconName="MailIcon"
                     label="Email"
                     name="email"
                     placeholder="name@company.com"
                     type="email"
              />
              <Field v-model="form.subject"
                     :isLight="true"
                     :required="true"
                     class="sm:col-span-4"
                     label="Subject"
                     name="subject"
                     placeholder="Your Subject"
                     type="text"
              />
              <Field v-model="form.message"
                     :isLight="true"
                     :required="true"
                     :validator="['min']"
                     class="sm:col-span-4"
                     label="Your Message"
                     min="25"
                     name="message"
                     placeholder="Your Message"
                     type="textarea"
              />
            </div>
            <div class="flex items-center mt-6">
              <ActionButton
                buttonSize="large"
                label="Send"
                type="button"
              />
            </div>
          </form>

        </div>
      </div>
    </section>

</template>

<script>
import Field from '@/Components/FormItems/Field.vue'

import ActionButton from '@/Components/FormItems/ActionButton.vue'


export default {
  components: {
    Field,
    ActionButton,
  },
  data() {
    return {
     countries: {
        data : [],
     },
      form: {
        name: null,
        companyName: null,
        wsaId: null,
        phone: {},
        email: null,
        subject: null,
        message: null,
        country: null,
      }
    }
  }
};
</script>
