<template>
  <section class="mt-28 sm:mt-32 border-t-4 border-primary">
    <div>
      <swiper
        :loop="true"
        :modules="modules"
        :navigation="true"
        :pagination="{
          clickable: true,
          }"
        :slidesPerView="1"
        :spaceBetween="0"
        class="mySwiper"
        effect="fade"
      >
        <swiper-slide v-for="slide in sliders" :key="slide.id" class="relative md:h-[40rem] h-[30rem]">
          <div class="absolute inset-0 bg-slate-900/80 text-white flex flex-col items-center justify-center">
            <h1
              class="text-4xl md:text-6xl font-extrabold text-center leading-tighter tracking-tighter mb-4 bg-clip-text text-transparent bg-gradient-to-l from-primary to-primary-hover uppercase"
              data-aos="zoom-y-out"><span class="">{{ slide.name }}</span></h1>
            <div class="max-w-3xl mx-auto text-center">
              <p class="text-2xl text-gray-200 mb-4 uppercase leading-tighter" data-aos="zoom-y-out"
                 data-aos-delay="150">{{ slide.sub_title }}</p>
              <p class="text-xl text-gray-200 font-light mb-8" data-aos="zoom-y-out" data-aos-delay="150">
                {{ slide.second_sub_title }}
              </p>
              <div class="max-w-xs mx-auto sm:max-w-none sm:flex sm:justify-center sm:space-x-6 sm:space-y-0 space-y-4"
                   data-aos="zoom-y-out" data-aos-delay="300">
                <div>
                  <a :href="slide.button_link"
                     class="btn text-text-primary bg-gray-200 hover:bg-gray-100 w-full sm:w-auto">
                    {{ slide.button_name }}
                  </a>
                </div>
                <div>
                  <a :href="slide.button_second_link"
                     class="btn text-white bg-primary hover:bg-primary-hover w-full sm:w-auto">
                    {{ slide.button_second_name }}
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="md:h-[40rem] h-[30rem]">
            <img :alt="slide.name" :src="slide.img_url" :title="slide.name" class="object-cover h-full w-full"/>
          </div>
        </swiper-slide>
      </swiper>
    </div>
  </section>
</template>
<script>
// Import Swiper Vue.js components
import {Swiper, SwiperSlide} from "swiper/vue";

// Import Swiper styles
import "swiper/css";

import 'swiper/scss';
import 'swiper/scss/navigation';
import 'swiper/scss/pagination';
import 'swiper/scss/effect-fade';

// import required modules
import {EffectFade, Navigation, Pagination} from "swiper";

export default {
  name: 'HomeSlider',
  components: {
    Swiper,
    SwiperSlide,
  },
  props: {
    sliders: Array
  },
  data() {
    return {
      slides: [
        {
          id: '1',
          imageUrl:  '/storage/consol/images/sliders/01.jpg',
          title: 'WSA Consol',
          subTitle: 'One Alliance, Target Consolidation',
          des: 'World Shipping Alliance Consolidation for all LCL and NVOCC',
          actionButtonText: 'Our Benefits',
          actionButtonUrl: 'consol.benefit.index',
          infoButtonText: 'Apply Now',
          infoButtonUrl: 'consol.register',

        },
        {
          id: '2',
          imageUrl:  '/storage/images/slider/02.jpg',
          title: 'WSA Elite Conference',
          subTitle: 'Hilton Istanbul Bomonti Hotel & Conference Center',
          des: 'from 7th to 10th of September, 2022 - Istanbul, Turkey',
          actionButtonText: 'Read More...',
          actionButtonUrl: 'https://wsa-events.com/',
          infoButtonText: 'Apply Now',
          infoButtonUrl: 'https://wsa-events.com/register',
        },
        {
          id: '2',
          imageUrl:  '/storage/consol/images/sliders/04.jpg',
          title: 'WSA Consol',
          subTitle: 'we make consolidations become easier',
          des: '',
          actionButtonText: 'Read More...',
          actionButtonUrl: 'https://wsa-events.com/',
          infoButtonText: 'Apply Now',
          infoButtonUrl: 'https://wsa-events.com/register',
        },
        {
          id: '2',
          imageUrl:  '/storage/consol/images/sliders/05.jpg',
          title: 'With WSA Consol',
          subTitle: 'Imagine what we can do!',
          des: '',
          actionButtonText: 'Read More...',
          actionButtonUrl: 'https://wsa-events.com/',
          infoButtonText: 'Apply Now',
          infoButtonUrl: 'https://wsa-events.com/register',
        },
        {
          id: '2',
          imageUrl:  '/storage/consol/images/sliders/06.jpg',
          title: 'Based on Trust',
          subTitle: 'Meet your future partner today.',
          des: '',
          actionButtonText: 'Read More...',
          actionButtonUrl: 'https://wsa-events.com/',
          infoButtonText: 'Apply Now',
          infoButtonUrl: 'https://wsa-events.com/register',
        },
      ],
    }
  },
  setup() {
    return {
      modules: [Pagination, Navigation, EffectFade],
    };
  },
};
</script>
