<template>
  <section class="relative">
    <!--    <PageIllustration />-->

    <!-- Illustration behind hero content -->
    <div aria-hidden="true" class="absolute left-1/2 transform -translate-x-1/2 bottom-0 pointer-events-none -z-1">
      <svg height="578" opacity="80%" viewBox="0 0 1360 578" width="1360" xmlns="http://www.w3.org/2000/svg">
        <defs>
          <linearGradient id="illustration-01" x1="50%" x2="50%" y1="0%" y2="100%">
            <stop offset="0%" stop-color="#F97316"/>
            <stop offset="77.402%" stop-color="#FF9D29"/>
            <stop offset="100%" stop-color="#F97316"/>
          </linearGradient>
        </defs>
        <g fill="url(#illustration-01)" fill-rule="evenodd">
          <circle cx="1232" cy="128" r="128"/>
          <circle cx="155" cy="443" r="64"/>
        </g>
      </svg>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6">

      <!-- Hero content -->
      <div class="pt-10 pb-6 md:pt-12 md:pb-20">

        <!-- Section header -->
        <div class="text-center pb-12 md:pb-16">
          <h1 class="text-xl md:text-2xl text-text-secondary font-medium leading-tighter tracking-tighter mb-4"
              data-aos="zoom-y-out">World
            Shipping Alliance</h1>
          <div
            class="text-5xl md:text-7xl font-extrabold leading-tighter tracking-tighter bg-clip-text text-transparent bg-gradient-to-l from-primary to-primary-hover">
            Consolidation
          </div>
          <div class="max-w-5xl mx-auto">
            <p class="text-xl text-text-secondary mb-8" data-aos="zoom-y-out" data-aos-delay="150">
              <span class="font-semibold">WSA CONSOL</span> is an independent worldwide network for specific and
              selected leading consolidators. who offer much flexibility in transport planning and have the potential to
              efficiently consolidate goods, even if these goods have distinct pickup locations and destinations with
              proven experience in handling many types of consolidation and LCL issues, WSA CONSOL will immediately
              connect you to a large network of reliable presence members/agents
            </p>
            <div class="max-w-xs mx-auto sm:max-w-none sm:flex sm:justify-center" data-aos="zoom-y-out"
                 data-aos-delay="300">
              <div>
                <Link :href="'consol.benefit.index'"
                      class="btn text-white bg-primary hover:bg-primary-hover w-full mb-4 sm:w-auto sm:mb-0">
                  <GlobeIcon class="h-5 w-5 mr-2"/>
                  <span>Our Directory</span>
                </Link>
              </div>
              <div>
                <Link :href="'consol.about'"
                      class="btn text-white bg-gray-900 hover:bg-gray-800 w-full sm:w-auto sm:ml-4">
                  <InformationCircleIcon class="h-5 w-5 mr-2"/>
                  <span>About WSA</span>
                </Link>
              </div>
            </div>
          </div>
        </div>

        <!-- Hero image -->
        <div>
          <div class="relative flex justify-center mb-8" data-aos="zoom-y-out" data-aos-delay="450">
            <div class="relative">
              <!-- Halo effect -->
              <svg
                class="absolute inset-0 left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 pointer-events-none"
                height="800" style="max-width: 200%;" viewBox="0 0 800 800" width="800"
                xmlns="http://www.w3.org/2000/svg">
                <g class="fill-current text-gray-400 opacity-75">
                  <circle class="pulse" cx="400" cy="400" r="200"/>
                  <circle class="pulse pulse-1" cx="400" cy="400" r="200"/>
                  <circle class="pulse pulse-2" cx="400" cy="400" r="200"/>
                </g>
              </svg>
              <!-- Globe image -->
              <img :src=" '/storage/consol/images/planet.png'" alt="Planet"
                   class="relative rounded-full shadow-xl" height="400" width="400"/>

              <!-- Static dots -->
              <svg class="absolute top-0 w-full h-auto" style="left: 12%;" viewBox="0 0 400 400"
                   xmlns="http://www.w3.org/2000/svg">
                <defs>
                  <filter id="world-ill-a" filterUnits="objectBoundingBox" height="185.6%" width="183.3%" x="-41.7%"
                          y="-34.2%">
                    <feOffset dy="4" in="SourceAlpha" result="shadowOffsetOuter1"/>
                    <feGaussianBlur in="shadowOffsetOuter1" result="shadowBlurOuter1" stdDeviation="6"/>
                    <feColorMatrix in="shadowBlurOuter1"
                                   values="0 0 0 0 0 0 0 0 0 0.439215686 0 0 0 0 0.956862745 0 0 0 0.32 0"/>
                  </filter>
                  <filter id="world-ill-c" filterUnits="objectBoundingBox" height="271.2%" width="266.7%" x="-83.3%"
                          y="-68.5%">
                    <feOffset dy="4" in="SourceAlpha" result="shadowOffsetOuter1"/>
                    <feGaussianBlur in="shadowOffsetOuter1" result="shadowBlurOuter1" stdDeviation="6"/>
                    <feColorMatrix in="shadowBlurOuter1"
                                   values="0 0 0 0 0 0 0 0 0 0.439215686 0 0 0 0 0.956862745 0 0 0 0.32 0"/>
                  </filter>
                  <filter id="world-ill-e" filterUnits="objectBoundingBox" height="147.6%" width="114.5%" x="-7.3%"
                          y="-23.8%">
                    <feGaussianBlur in="SourceGraphic" stdDeviation="2"/>
                  </filter>
                  <ellipse id="world-ill-b" cx="51" cy="175.402" rx="24" ry="23.364"/>
                  <ellipse id="world-ill-d" cx="246" cy="256.201" rx="12" ry="11.682"/>
                  <linearGradient id="world-ill-f" x1="50%" x2="50%" y1="0%" y2="100%">
                    <stop offset="0%" stop-color="#0070F4" stop-opacity="0"/>
                    <stop offset="52.449%" stop-color="#0070F4" stop-opacity=".64"/>
                    <stop offset="100%" stop-color="#0070F4" stop-opacity="0"/>
                  </linearGradient>
                </defs>
                <g fill="none" fill-rule="evenodd" transform="translate(0 -.818)">
                  <path
                    d="M258 251.333c111.333-40.237 141-75.282 89-105.136M136 103.364c66.667 4.543 104.667 32.45 114 83.72"
                    stroke="url(#world-ill-f)" stroke-dasharray="2" stroke-width="2"/>
                </g>
              </svg>
              <!-- China -->
              <svg class="absolute max-w-full" height="48" style="width: 22%;top: 55%; left: 85%;" viewBox="0 0 48 48"
                   width="48" xmlns="http://www.w3.org/2000/svg">
                <g class="fill-current text-blue-600">
                  <circle class="pulse pulse-mini pulse-1" cx="24" cy="24" r="8"/>
                  <circle class="pulse pulse-mini pulse-2" cx="24" cy="24" r="8"/>
                  <circle cx="24" cy="24" r="8"/>
                </g>
              </svg>
              <!-- Egypt -->
              <svg class="absolute max-w-full" height="22" style="width: 22%;top: 46%; left: 49%;" viewBox="0 0 48 48"
                   width="22" xmlns="http://www.w3.org/2000/svg">
                <g class="fill-current text-yellow-600">
                  <circle class="pulse pulse-mini pulse-1" cx="24" cy="24" r="8"/>
                  <circle class="pulse pulse-mini pulse-2" cx="24" cy="24" r="8"/>
                  <circle cx="24" cy="24" r="8"/>
                </g>
              </svg>
              <!-- New York -->
              <svg class="absolute max-w-full" height="48" style="width: 12%;top: 37%; left: 7%;" viewBox="0 0 48 48"
                   width="48" xmlns="http://www.w3.org/2000/svg">
                <g class="fill-current text-primary">
                  <circle class="pulse pulse-mini pulse-1" cx="24" cy="24" r="8"/>
                  <circle class="pulse pulse-mini pulse-2" cx="24" cy="24" r="8"/>
                  <circle cx="24" cy="24" r="8"/>
                </g>
              </svg>
              <!-- Brazil -->
              <svg class="absolute max-w-full" height="22" style="width: 22%;top: 74%; left: 15%;" viewBox="0 0 48 48"
                   width="22" xmlns="http://www.w3.org/2000/svg">
                <g class="fill-current text-yellow-600">
                  <circle class="pulse pulse-mini" cx="24" cy="24" r="8"/>
                  <circle class="pulse pulse-mini pulse-2" cx="24" cy="24" r="8"/>
                  <circle cx="24" cy="24" r="8"/>
                </g>
              </svg>
              <!-- UK -->
              <svg class="absolute max-w-full" height="22" style="width: 12%;top: 33%; left: 40%;" viewBox="0 0 48 48"
                   width="22" xmlns="http://www.w3.org/2000/svg">
                <g class="fill-current text-blue-600">
                  <circle class="pulse pulse-mini" cx="24" cy="24" r="8"/>
                  <circle class="pulse pulse-mini pulse-2" cx="24" cy="24" r="8"/>
                  <circle cx="24" cy="24" r="8"/>
                </g>
              </svg>
              <!-- UAE -->
              <svg class="absolute max-w-full" height="30" style="width: 12%;top: 48%; left: 66%;" viewBox="0 0 48 48"
                   width="30" xmlns="http://www.w3.org/2000/svg">
                <g class="fill-current text-primary">
                  <circle class="pulse pulse-mini" cx="24" cy="24" r="8"/>
                  <circle class="pulse pulse-mini pulse-2" cx="24" cy="24" r="8"/>
                  <circle cx="24" cy="24" r="8"/>
                </g>
              </svg>
              <!-- Green Forward Icon -->
              <svg class="absolute max-w-full w-16 h-auto rounded-full shadow-xl transform animate-float"
                   style="width: 16%; top: 48%; left: -27%;" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
                <circle class="fill-current text-primary" cx="32" cy="32" r="32"/>
                <path class="stroke-current text-white" d="M20.733 31.416l18.127-8.452M43.039 31.926L24.913 40.38"
                      fill="none" stroke-width="2"/>
                <path class="stroke-current text-white"
                      d="M32.238 20.595l6.622 2.369-2.442 6.594M31.534 42.747l-6.621-2.368 2.442-6.595"
                      fill="none" stroke-linecap="square"
                      stroke-width="2"/>
              </svg>
              <!-- White icon -->
              <svg
                class="absolute max-w-full w-16 h-auto rounded-full shadow-xl transform animate-float animation-delay-500"
                style="width: 16%; top: 15%; right: -7%;" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
                <circle class="fill-current text-gray-100" cx="32" cy="32" fill="#FBFBFB" r="32"/>
                <path class="fill-current text-gray-700"
                      d="M37.11 32.44l-1.69 4.646-8.458-3.078.676-1.859-4.773 1.42 2.744 4.156.677-1.858 9.396 3.42a.994.994 0 001.278-.587l2.03-5.576-1.88-.684zM27.037 30.878l1.691-4.646 8.457 3.078-.676 1.858 4.773-1.42-2.744-4.155-.676 1.858-9.397-3.42a.994.994 0 00-1.278.587l-2.03 5.576 1.88.684z"/>
              </svg>
              <!-- Avatars -->
              <img :src=" '/storage/consol/images/planet-avatar-01.png'"
                   alt="Planet avatar 01" class="absolute max-w-full transform animate-float" height="105"
                   style="width: 65.25%; top: 70%; right: -27%;" width="261"/>
              <img :src=" '/storage/consol/images/planet-avatar-02.png'"
                   alt="Planet avatar 02" class="absolute max-w-full transform animate-float animation-delay-1000"
                   height="173"
                   style="width: 88.7%; bottom: 60%; right: 15%;" width="355"/>

            </div>
          </div>

        </div>

      </div>

    </div>
  </section>
</template>

<script>
import {GlobeIcon, InformationCircleIcon} from '@heroicons/vue/outline'
import PageIllustration from "@/Components/ConsolComponents/partials/PageIllustration.vue";

export default {
  name: 'HeroHome',
  components: {
    PageIllustration,
    GlobeIcon,
    InformationCircleIcon,
  },
  data: function () {
    return {
      videoModalOpen: false,
    }
  },
}
</script>
