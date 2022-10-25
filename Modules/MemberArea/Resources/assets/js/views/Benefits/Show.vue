<template>
    <GreenSection class="mt-32 md:mt-48">
      <div class="h-24 w-24 mx-auto mb-8">
        <BenefitsIcons :iconName="benefit.data.icon"
                       class="h-24 w-24 group-hover:rotate-[360deg] ease-in-out duration-1000" colorOne="text-white"
                       colorTwo="text-primary-hover"/>
      </div>
      <h1 class="h2 mb-4 text-white">{{ benefit.data.name }}</h1>

    </GreenSection>

    <section>
      <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="pt-8 pb-12 md:pt-12 md:pb-20">

          <!-- Main content -->
          <div class="md:flex md:justify-between">

            <!-- Sidebar -->
            <aside class="relative my-12 md:my-0 md:w-80 md:mr-8 md:flex-shrink-0">
              <div class="">

                <!-- Docs nav -->
                <nav class="-mt-2">
                  <div class="text-xl font-bold p-4 border-b-2 border-primary">
                    WSA Consol Benefits
                  </div>
                  <ul class="my-2 divide-y divide-gray-200">
                    <!-- 1st level -->
                    <li v-for="benefit in benefits.data" :key="benefit.id"
                        class="px-2 py-4 group hover:bg-primary cursor-pointer ease-in-out duration-300">
                      <router-link :href="route('consol.benefit.show',benefit.slug)" class="flex items-center">
                        <div class="flex items-center flex-grow">
                          <ChevronRightIcon
                            class="w-5 h-5 mr-3 flex-shrink-0 group-hover:text-white text-primary"/>
                          <span class="text-text-primary group-hover:text-white font-medium ease-in-out duration-300">
                            {{ benefit.name }}
                          </span>
                        </div>
                      </router-link>
                    </li>
                  </ul>
                </nav>

              </div>
            </aside>

            <!-- Page container -->
            <!--              <DocumentationContent />-->
            <div class="md:flex-grow">
              <div class="h2 text-text-primary mb-4">{{ benefit.data.name }}</div>
              <p class="text-lg text-gray-600 mb-8" v-html="benefit.data.des"></p>
              <!-- <img alt="01" class="mb-8 rounded-md"
                    src="http://wsa-consol.test/storage/consol/images/benefits/01.jpg"/> -->
            </div>

          </div>

        </div>
      </div>
    </section>

</template>

<script>
import DocumentationContent from '@/Components/ConsolComponents/partials/DocumentationContent'
import GreenSection from '@/Components/ConsolComponents/partials/GreenSection'
import BenefitsIcons from '@/Components/ConsolComponents/partials/BenefitsIcons'
import {ChevronRightIcon} from '@heroicons/vue/solid'


export default {
  name: 'ViewBenefitSinglePage',
  components: {
    DocumentationContent,
    ChevronRightIcon,
    BenefitsIcons,
    GreenSection,
  },
  data: function () {
    return {
      benefit :{},
      benefits :{},
      sidebarNavOpen: false,
      sidebarLinkOpen: true,
      // benefit: {
      //   id: '6',
      //   name: 'Members Satisfaction',
      //   icon: 'happy',
      //   des: 'WSA to ensure that our members are getting the best networking services and to cover all their needs in the freight forwarding world. Customer satisfaction is how happy WSA Members are with a world shipping alliance network services, and the capabilities of securing and support our members needs of freight forwarding worldwide.',
      // },
      benefitsSideMenu: [
        {
          id: '1',
          name: 'Limited Number Of Members',
          // iconName: 'lnm',
          benefitUrl: '/single-benefit',
        },
        {
          id: '2',
          name: 'Financial Protection Program',
          // iconName: 'fpp',
          benefitUrl: '/single-benefit',
        },
        {
          id: '3',
          name: 'Global Trade Data',
          // iconName: 'gtd',
          benefitUrl: '/single-benefit',
        },
        {
          id: '4',
          name: 'E-Marketing Solutions',
          // iconName: 'marketing',
          benefitUrl: '/single-benefit',
        },
        {
          id: '5',
          name: 'WSA Consol Conference',
          // iconName: 'conference',
          benefitUrl: '/single-benefit',
        },
        {
          id: '6',
          name: 'Find The Best Always',
          // iconName: 'best',
          benefitUrl: '/single-benefit',
        },
        {
          id: '7',
          name: 'Members Satisfaction',
          // iconName: 'happy',
          benefitUrl: '/single-benefit',
        },
        {
          id: '8',
          name: 'Neutral Network',
          // iconName: 'equal',
          benefitUrl: '/single-benefit',
        },
        {
          id: '9',
          name: 'CargoWise',
          // iconName: 'cargowise',
          benefitUrl: '/single-benefit',
        },
        {
          id: '10',
          name: 'WSA Brand',
          // iconName: 'brand',
          benefitUrl: '/single-benefit',
        },
        {
          id: '11',
          name: 'Priority Pass',
          // iconName: 'pass',
          benefitUrl: '/single-benefit',
        },
        {
          id: '12',
          name: 'Containers Xchange',
          // iconName: 'xchange',
          benefitUrl: '/single-benefit',
        },
      ],
    }
  },
}
</script>
