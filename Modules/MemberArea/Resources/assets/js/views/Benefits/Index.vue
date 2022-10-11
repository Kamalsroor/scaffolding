<template>

    <!-- Page sections -->
    <BenefitsList :benefits="benefits.data"/>
    <!--      <AboutStory />-->
    <!--      <Stats />-->
    <!--      <Team />-->
    <!--      <Career />-->
    <!--      <Process />-->
    <!--      <CtaAlternative />-->
    <Cta/>


</template>

<script>
import BenefitsList from '@/Components/ConsolComponents/partials/BenefitsList.vue'
import Cta from '@/Components/ConsolComponents/partials/Cta.vue'
import GreenSection from '@/Components/ConsolComponents/partials/GreenSection.vue'


export default {
  name: 'Benefits',
  components: {
    BenefitsList,
    GreenSection,
    Cta,
  },
  data() {
    return {
        benefits : {
            data : []
        }
    }
  },

}
</script>
