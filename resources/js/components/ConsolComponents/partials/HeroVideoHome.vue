<template>
  <section class="relative">

    <!-- Illustration behind hero content -->
    <div aria-hidden="true" class="absolute left-1/2 transform -translate-x-1/2 bottom-0 pointer-events-none -z-1">
      <svg height="578" opacity="80%" viewBox="0 0 1360 578" width="1360" xmlns="http://www.w3.org/2000/svg">
        <defs>
          <linearGradient id="illustration-01" x1="50%" x2="50%" y1="0%" y2="100%">
            <stop offset="0%" stop-color="#69BA79"/>
            <stop offset="77.402%" stop-color="#15813D"/>
            <stop offset="100%" stop-color="#146535"/>
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
          <h1 class="text-xl md:text-2xl font-medium leading-tighter tracking-tighter mb-4" data-aos="zoom-y-out">World
            Shipping Alliance</h1>
          <div
            class="text-5xl md:text-6xl font-extrabold leading-tighter tracking-tighter bg-clip-text text-transparent bg-gradient-to-l from-green-500 to-green-800">
            Consolidation
          </div>
          <div class="max-w-3xl mx-auto">
            <p class="text-xl text-text-primary text-justify mb-8" data-aos="zoom-y-out" data-aos-delay="150">
              <span class="font-semibold">World Shipping Alliance</span> is an independent worldwide network for all
              freight forwarders. We have very good experience in the field of freight services, OTI / NVOCCs and
              logistics specialists with success. Besides our intimate and various multi-relations with the freight
              forwarders around the globe. WSA will immediately connect you to a large network of reliable presence
              members/agents.
            </p>
            <div class="max-w-xs mx-auto sm:max-w-none sm:flex sm:justify-center" data-aos="zoom-y-out"
                 data-aos-delay="300">
              <div>
                <a class="btn text-white bg-[#1b7035] hover:bg-green-700 w-full mb-4 sm:w-auto sm:mb-0" href="#0">Start
                  free trial</a>
              </div>
              <div>
                <a class="btn text-white bg-gray-900 hover:bg-gray-800 w-full sm:w-auto sm:ml-4" href="#0">Learn
                  more</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Hero image -->
        <div>
          <div class="relative flex justify-center mb-8" data-aos="zoom-y-out" data-aos-delay="450">
            <div class="flex flex-col justify-center">
              <img :src=" '/storage/consol/images/hero-image-01.png'" alt="Hero" class="mx-auto"
                   height="432" width="768"/>
              <svg class="absolute inset-0 max-w-full mx-auto md:max-w-none h-auto" height="432" viewBox="0 0 768 432"
                   width="768" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <defs>
                  <linearGradient id="hero-ill-a" x1="50%" x2="50%" y1="0%" y2="100%">
                    <stop offset="0%" stop-color="#FFF"/>
                    <stop offset="77.402%" stop-color="#EAEAEA"/>
                    <stop offset="100%" stop-color="#DFDFDF"/>
                  </linearGradient>
                  <linearGradient id="hero-ill-b" x1="50%" x2="50%" y1="0%" y2="99.24%">
                    <stop offset="0%" stop-color="#FFF"/>
                    <stop offset="48.57%" stop-color="#EAEAEA"/>
                    <stop offset="100%" stop-color="#DFDFDF" stop-opacity="0"/>
                  </linearGradient>
                  <radialGradient id="hero-ill-e" cx="21.152%" cy="86.063%" fx="21.152%" fy="86.063%" r="79.941%">
                    <stop offset="0%" stop-color="#4FD1C5"/>
                    <stop offset="25.871%" stop-color="#81E6D9"/>
                    <stop offset="100%" stop-color="#338CF5"/>
                  </radialGradient>
                  <circle id="hero-ill-d" cx="384" cy="216" r="64"/>
                </defs>
                <g fill="none" fill-rule="evenodd">
                  <circle cx="384" cy="216" fill="url(#hero-ill-a)" fill-opacity=".04" r="128"/>
                  <circle cx="384" cy="216" fill="url(#hero-ill-b)" fill-opacity=".16" r="96"/>
                  <g fill-rule="nonzero">
                    <use fill="#000" xlink:href="#hero-ill-d"/>
                    <use fill="url(#hero-ill-e)" xlink:href="#hero-ill-d"/>
                  </g>
                </g>
              </svg>
            </div>
            <button
              aria-controls="modal"
              class="absolute top-full flex items-center transform -translate-y-1/2 bg-white rounded-full font-medium group p-4 shadow-lg"
              @click.prevent.stop="videoModalOpen = true">
              <svg class="w-6 h-6 fill-current text-gray-400 group-hover:text-[#1b7035] flex-shrink-0"
                   viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10zm0 2C5.373 24 0 18.627 0 12S5.373 0 12 0s12 5.373 12 12-5.373 12-12 12z"/>
                <path d="M10 17l6-5-6-5z"/>
              </svg>
              <span class="ml-3">Watch the full video (2 min)</span>
            </button>
          </div>

          <!-- Modal -->
          <Modal id="modal" :show="videoModalOpen" ariaLabel="modal-headline" @handleClose="videoModalOpen = false">
            <div class="relative pb-9/16">
              <iframe allowFullScreen class="absolute w-full h-full" src="https://player.vimeo.com/video/174002812"
                      title="Video"></iframe>
            </div>
          </Modal>

        </div>

      </div>

    </div>
  </section>
</template>

<script>
import Modal from './../utils/Modal.vue'

export default {
  name: 'HeroVideoHome',
  components: {
    Modal,
  },
  data: function () {
    return {
      videoModalOpen: false,
    }
  },
}
</script>
