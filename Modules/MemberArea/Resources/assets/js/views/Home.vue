<template>
    <HomeSlider />
    <HeroHome />
    <FeaturesBlocks />
    <FeaturesHome/>
    <Process/>
    <!--    <TestimonialsCarousel/>-->
    <Cta/>
</template>

<script>
// import TestimonialsCarousel from '@/Components/ConsolComponents/partials/TestimonialsCarousel.vue'
import Process from '@/Components/ConsolComponents/partials/Process.vue'
import HeroHome from '@/Components/ConsolComponents/partials/HeroHome.vue'
import FeaturesHome from '@/Components/ConsolComponents/partials/FeaturesHome.vue'
import FeaturesBlocks from '@/Components/ConsolComponents/partials/FeaturesBlocks.vue'
// import FeaturesWorld from '@/Components/ConsolComponents/partials/FeaturesWorld.vue'
// import News from '@/Components/ConsolComponents/partials/News.vue'
import Cta from '@/Components/ConsolComponents/partials/Cta.vue'
// import Footer from '@/Components/ConsolComponents/partials/Footer.vue'
import HomeSlider from "@/Components/ConsolComponents/partials/HomeSlider.vue";

export default {
  components: {
    HeroHome,
    FeaturesHome,
    FeaturesBlocks,
    // FeaturesWorld,
    // News,
    Cta,
    // Footer,
    HomeSlider,
    // TestimonialsCarousel,
    Process,
  },
  data() {
    return {
    };
  },
  methods: {

  },
  created() {

  },

};

</script>
