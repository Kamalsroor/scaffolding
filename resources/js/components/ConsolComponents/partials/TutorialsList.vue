<template>
  <section class="relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
      <div class="pt-32 pb-12 md:pt-40 md:pb-20">

        <!-- Page header -->
        <div class="max-w-3xl pb-12 md:pb-20 text-center md:text-left">
          <h1 class="h1">Tutorials & guides for using Simple with any project</h1>
        </div>

        <!-- Section tags -->
        <div class="border-b border-gray-300 pb-4 mb-12">
          <ul class="flex flex-wrap justify-center md:justify-start font-medium -mx-5 -my-1">
            <li class="mx-5 my-1">
              <a class="text-[#1b7035]" href="#0">All</a>
            </li>
            <li class="mx-5 my-1">
              <a class="text-text-primary hover:underline" href="#0">Tutorials</a>
            </li>
            <li class="mx-5 my-1">
              <a class="text-text-primary hover:underline" href="#0">Tips & Tricks</a>
            </li>
            <li class="mx-5 my-1">
              <a class="text-text-primary hover:underline" href="#0">Free ebooks</a>
            </li>
            <li class="mx-5 my-1">
              <a class="text-text-primary hover:underline" href="#0">Guides</a>
            </li>
          </ul>
        </div>

        <!-- Articles list -->
        <div class="max-w-sm mx-auto md:max-w-none">

          <!-- Articles container -->
          <div class="grid gap-12 md:grid-cols-3 md:gap-x-6 md:gap-y-8 items-start">

            <!-- 1st article -->
            <article class="flex flex-col h-full" data-aos="zoom-y-out">
              <header>
                <router-link class="block mb-6" to="/blog-post">
                  <figure class="relative h-0 pb-9/16 overflow-hidden translate-z-0 rounded">
                    <img
                      :src=" '/storage/consol/images/tutorial-01.jpg'"
                      alt="News 01"
                      class="absolute inset-0 w-full h-full object-cover transform scale-105 hover:-translate-y-1 transition duration-700 ease-out"
                      height="198"
                      width="352"/>
                  </figure>
                </router-link>
                <div class="mb-3">
                  <ul class="flex flex-wrap text-xs font-medium -m-1">
                    <li class="m-1">
                      <a
                        class="inline-flex text-center text-gray-100 py-1 px-3 rounded-full bg-green-500 hover:bg-[#1b7035] transition duration-150 ease-in-out"
                        href="#0">Guides</a>
                    </li>
                    <li class="m-1">
                      <a
                        class="inline-flex text-center text-text-primary py-1 px-3 rounded-full bg-green-100 hover:bg-green-200 transition duration-150 ease-in-out"
                        href="#0">Intermediate</a>
                    </li>
                    <li class="m-1">
                      <span class="inline-flex text-center text-text-primary py-1 px-3 rounded-full bg-white shadow-sm">4 min read</span>
                    </li>
                  </ul>
                </div>
                <h3 class="text-xl font-bold leading-snug tracking-tight mb-2">
                  <router-link class="hover:underline" to="/blog-post">Making component design decisions in React
                  </router-link>
                </h3>
              </header>
              <p class="text-gray-600 flex-grow">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                tempor incididunt ut labore.</p>
              <footer class="text-sm flex items-center mt-4">
                <div class="flex flex-shrink-0 mr-3">
                  <a class="relative" href="#0">
                    <span aria-hidden="true" class="absolute inset-0 -m-px"><span
                      class="absolute inset-0 -m-px bg-white rounded-full"></span></span>
                    <img :src=" '/storage/consol/images/news-author-01.jpg'"
                         alt="Author 01" class="relative rounded-full" height="32"
                         width="32"/>
                  </a>
                  <a class="relative -ml-2" href="#0">
                    <span aria-hidden="true" class="absolute inset-0 -m-px"><span
                      class="absolute inset-0 -m-px bg-white rounded-full"></span></span>
                    <img :src=" '/storage/consol/images/news-author-03.jpg'"
                         alt="Author 03" class="relative rounded-full" height="32"
                         width="32"/>
                  </a>
                </div>
                <div>
                  <span class="text-gray-600">By </span>
                  <a class="font-medium hover:underline" href="#0">Lisa Allison</a> & <a
                  class="font-medium hover:underline" href="#0">Justin Park</a>
                </div>
              </footer>
            </article>

            <!-- 2nd article -->
            <article class="flex flex-col h-full" data-aos="zoom-y-out" data-aos-delay="150">
              <header>
                <router-link class="block mb-6" to="/blog-post">
                  <figure class="relative h-0 pb-9/16 overflow-hidden translate-z-0 rounded">
                    <img
                      :src=" '/storage/consol/images/tutorial-02.jpg'"
                      alt="News 02"
                      class="absolute inset-0 w-full h-full object-cover transform scale-105 hover:-translate-y-1 transition duration-700 ease-out"
                      height="198"
                      width="352"/>
                  </figure>
                </router-link>
                <div class="mb-3">
                  <ul class="flex flex-wrap text-xs font-medium -m-1">
                    <li class="m-1">
                      <a
                        class="inline-flex text-center text-gray-100 py-1 px-3 rounded-full bg-green-500 hover:bg-[#1b7035] transition duration-150 ease-in-out"
                        href="#0">Tutorials</a>
                    </li>
                  </ul>
                </div>
                <h3 class="text-xl font-bold leading-snug tracking-tight mb-2">
                  <router-link class="hover:underline" to="/blog-post">How to use structured content for page building
                  </router-link>
                </h3>
              </header>
              <p class="text-gray-600 flex-grow">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                tempor incididunt ut labore.</p>
              <footer class="text-sm flex items-center mt-4">
                <div class="flex flex-shrink-0 mr-3">
                  <a class="relative" href="#0">
                    <span aria-hidden="true" class="absolute inset-0 -m-px"><span
                      class="absolute inset-0 -m-px bg-white rounded-full"></span></span>
                    <img :src=" '/storage/consol/images/news-author-02.jpg'"
                         alt="Author 02" class="relative rounded-full" height="32"
                         width="32"/>
                  </a>
                </div>
                <div>
                  <span class="text-gray-600">By </span>
                  <a class="font-medium hover:underline" href="#0">Knut Mayer</a>
                </div>
              </footer>
            </article>

            <!-- 3rd article -->
            <article class="flex flex-col h-full" data-aos="zoom-y-out" data-aos-delay="300">
              <header>
                <router-link class="block mb-6" to="/blog-post">
                  <figure class="relative h-0 pb-9/16 overflow-hidden translate-z-0 rounded">
                    <img
                      :src=" '/storage/consol/images/tutorial-03.jpg'"
                      alt="News 03"
                      class="absolute inset-0 w-full h-full object-cover transform scale-105 hover:-translate-y-1 transition duration-700 ease-out"
                      height="198"
                      width="352"/>
                  </figure>
                </router-link>
                <div class="mb-3">
                  <ul class="flex flex-wrap text-xs font-medium -m-1">
                    <li class="m-1">
                      <a
                        class="inline-flex text-center text-gray-100 py-1 px-3 rounded-full bg-green-500 hover:bg-[#1b7035] transition duration-150 ease-in-out"
                        href="#0">Guides</a>
                    </li>
                    <li class="m-1">
                      <a
                        class="inline-flex text-center text-text-primary py-1 px-3 rounded-full bg-green-100 hover:bg-green-200 transition duration-150 ease-in-out"
                        href="#0">Intermediate</a>
                    </li>
                    <li class="m-1">
                      <span class="inline-flex text-center text-text-primary py-1 px-3 rounded-full bg-white shadow-sm">7 min read</span>
                    </li>
                  </ul>
                </div>
                <h3 class="text-xl font-bold leading-snug tracking-tight mb-2">
                  <router-link class="hover:underline" to="/blog-post">Deploy on Netlify, Heroku or your favorite
                    platform
                  </router-link>
                </h3>
              </header>
              <p class="text-gray-600 flex-grow">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                tempor incididunt ut labore.</p>
              <footer class="text-sm flex items-center mt-4">
                <div class="flex flex-shrink-0 mr-3">
                  <a class="relative" href="#0">
                    <span aria-hidden="true" class="absolute inset-0 -m-px"><span
                      class="absolute inset-0 -m-px bg-white rounded-full"></span></span>
                    <img :src=" '/storage/consol/images/news-author-01.jpg'"
                         alt="Author 01" class="relative rounded-full" height="32"
                         width="32"/>
                  </a>
                </div>
                <div>
                  <span class="text-gray-600">By </span>
                  <a class="font-medium hover:underline" href="#0">Lisa Allison</a>
                </div>
              </footer>
            </article>

            <!-- 4th article -->
            <article class="flex flex-col h-full" data-aos="zoom-y-out">
              <header>
                <router-link class="block mb-6" to="/blog-post">
                  <figure class="relative h-0 pb-9/16 overflow-hidden translate-z-0 rounded">
                    <img
                      :src=" '/storage/consol/images/tutorial-04.jpg'"
                      alt="News 04"
                      class="absolute inset-0 w-full h-full object-cover transform scale-105 hover:-translate-y-1 transition duration-700 ease-out"
                      height="198"
                      width="352"/>
                  </figure>
                </router-link>
                <div class="mb-3">
                  <ul class="flex flex-wrap text-xs font-medium -m-1">
                    <li class="m-1">
                      <a
                        class="inline-flex text-center text-gray-100 py-1 px-3 rounded-full bg-green-500 hover:bg-[#1b7035] transition duration-150 ease-in-out"
                        href="#0">Free ebooks</a>
                    </li>
                  </ul>
                </div>
                <h3 class="text-xl font-bold leading-snug tracking-tight mb-2">
                  <router-link class="hover:underline" to="/blog-post">Create a custom type "Page" with Simple
                  </router-link>
                </h3>
              </header>
              <p class="text-gray-600 flex-grow">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                tempor incididunt ut labore.</p>
              <footer class="text-sm flex items-center mt-4">
                <div class="flex flex-shrink-0 mr-3">
                  <a class="relative" href="#0">
                    <span aria-hidden="true" class="absolute inset-0 -m-px"><span
                      class="absolute inset-0 -m-px bg-white rounded-full"></span></span>
                    <img :src=" '/storage/consol/images/news-author-04.jpg'"
                         alt="Author 04" class="relative rounded-full" height="32"
                         width="32"/>
                  </a>
                </div>
                <div>
                  <span class="text-gray-600">By </span>
                  <a class="font-medium hover:underline" href="#0">Micheal Osman</a>
                </div>
              </footer>
            </article>

            <!-- 5th article -->
            <article class="flex flex-col h-full" data-aos="zoom-y-out" data-aos-delay="150">
              <header>
                <router-link class="block mb-6" to="/blog-post">
                  <figure class="relative h-0 pb-9/16 overflow-hidden translate-z-0 rounded">
                    <img
                      :src=" '/storage/consol/images/tutorial-05.jpg'"
                      alt="News 05"
                      class="absolute inset-0 w-full h-full object-cover transform scale-105 hover:-translate-y-1 transition duration-700 ease-out"
                      height="198"
                      width="352"/>
                  </figure>
                </router-link>
                <div class="mb-3">
                  <ul class="flex flex-wrap text-xs font-medium -m-1">
                    <li class="m-1">
                      <a
                        class="inline-flex text-center text-gray-100 py-1 px-3 rounded-full bg-green-500 hover:bg-[#1b7035] transition duration-150 ease-in-out"
                        href="#0">Tips & Tricks</a>
                    </li>
                  </ul>
                </div>
                <h3 class="text-xl font-bold leading-snug tracking-tight mb-2">
                  <router-link class="hover:underline" to="/blog-post">Getting started with content modelling
                  </router-link>
                </h3>
              </header>
              <p class="text-gray-600 flex-grow">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                tempor incididunt ut labore.</p>
              <footer class="text-sm flex items-center mt-4">
                <div class="flex flex-shrink-0 mr-3">
                  <a class="relative" href="#0">
                    <span aria-hidden="true" class="absolute inset-0 -m-px"><span
                      class="absolute inset-0 -m-px bg-white rounded-full"></span></span>
                    <img :src=" '/storage/consol/images/news-author-03.jpg'"
                         alt="Author 03" class="relative rounded-full" height="32"
                         width="32"/>
                  </a>
                </div>
                <div>
                  <span class="text-gray-600">By </span>
                  <a class="font-medium hover:underline" href="#0">Justin Park</a>
                </div>
              </footer>
            </article>

            <!-- 6th article -->
            <article class="flex flex-col h-full" data-aos="zoom-y-out" data-aos-delay="300">
              <header>
                <router-link class="block mb-6" to="/blog-post">
                  <figure class="relative h-0 pb-9/16 overflow-hidden translate-z-0 rounded">
                    <img
                      :src=" '/storage/consol/images/tutorial-06.jpg'"
                      alt="News 06"
                      class="absolute inset-0 w-full h-full object-cover transform scale-105 hover:-translate-y-1 transition duration-700 ease-out"
                      height="198"
                      width="352"/>
                  </figure>
                </router-link>
                <div class="mb-3">
                  <ul class="flex flex-wrap text-xs font-medium -m-1">
                    <li class="m-1">
                      <a
                        class="inline-flex text-center text-gray-100 py-1 px-3 rounded-full bg-green-500 hover:bg-[#1b7035] transition duration-150 ease-in-out"
                        href="#0">Guides</a>
                    </li>
                    <li class="m-1">
                      <a
                        class="inline-flex text-center text-text-primary py-1 px-3 rounded-full bg-green-100 hover:bg-green-200 transition duration-150 ease-in-out"
                        href="#0">Beginner</a>
                    </li>
                    <li class="m-1">
                      <span class="inline-flex text-center text-text-primary py-1 px-3 rounded-full bg-white shadow-sm">6 min read</span>
                    </li>
                  </ul>
                </div>
                <h3 class="text-xl font-bold leading-snug tracking-tight mb-2">
                  <router-link class="hover:underline" to="/blog-post">How to add custom icons to your Simple project
                  </router-link>
                </h3>
              </header>
              <p class="text-gray-600 flex-grow">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                tempor incididunt ut labore.</p>
              <footer class="text-sm flex items-center mt-4">
                <div class="flex flex-shrink-0 mr-3">
                  <a class="relative" href="#0">
                    <span aria-hidden="true" class="absolute inset-0 -m-px"><span
                      class="absolute inset-0 -m-px bg-white rounded-full"></span></span>
                    <img :src=" '/storage/consol/images/news-author-05.jpg'"
                         alt="Author 05" class="relative rounded-full" height="32"
                         width="32"/>
                  </a>
                  <a class="relative -ml-2" href="#0">
                    <span aria-hidden="true" class="absolute inset-0 -m-px"><span
                      class="absolute inset-0 -m-px bg-white rounded-full"></span></span>
                    <img :src=" '/storage/consol/images/news-author-01.jpg'"
                         alt="Author 01" class="relative rounded-full" height="32"
                         width="32"/>
                  </a>
                </div>
                <div>
                  <span class="text-gray-600">By </span>
                  <a class="font-medium hover:underline" href="#0">Angela Fiorelli</a> & <a
                  class="font-medium hover:underline" href="#0">Lisa Allison</a>
                </div>
              </footer>
            </article>

            <!-- 7th article -->
            <article class="flex flex-col h-full" data-aos="zoom-y-out">
              <header>
                <router-link class="block mb-6" to="/blog-post">
                  <figure class="relative h-0 pb-9/16 overflow-hidden translate-z-0 rounded">
                    <img
                      :src=" '/storage/consol/images/tutorial-07.jpg'"
                      alt="News 07"
                      class="absolute inset-0 w-full h-full object-cover transform scale-105 hover:-translate-y-1 transition duration-700 ease-out"
                      height="198"
                      width="352"/>
                  </figure>
                </router-link>
                <div class="mb-3">
                  <ul class="flex flex-wrap text-xs font-medium -m-1">
                    <li class="m-1">
                      <a
                        class="inline-flex text-center text-gray-100 py-1 px-3 rounded-full bg-green-500 hover:bg-[#1b7035] transition duration-150 ease-in-out"
                        href="#0">Tips & Tricks</a>
                    </li>
                  </ul>
                </div>
                <h3 class="text-xl font-bold leading-snug tracking-tight mb-2">
                  <router-link class="hover:underline" to="/blog-post">Deploying a Vue.js web application with Simple
                  </router-link>
                </h3>
              </header>
              <p class="text-gray-600 flex-grow">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                tempor incididunt ut labore.</p>
              <footer class="text-sm flex items-center mt-4">
                <div class="flex flex-shrink-0 mr-3">
                  <a class="relative" href="#0">
                    <span aria-hidden="true" class="absolute inset-0 -m-px"><span
                      class="absolute inset-0 -m-px bg-white rounded-full"></span></span>
                    <img :src=" '/storage/consol/images/news-author-06.jpg'"
                         alt="Author 06" class="relative rounded-full" height="32"
                         width="32"/>
                  </a>
                </div>
                <div>
                  <span class="text-gray-600">By </span>
                  <a class="font-medium hover:underline" href="#0">Cory McCall</a>
                </div>
              </footer>
            </article>

            <!-- 8th article -->
            <article class="flex flex-col h-full" data-aos="zoom-y-out" data-aos-delay="150">
              <header>
                <router-link class="block mb-6" to="/blog-post">
                  <figure class="relative h-0 pb-9/16 overflow-hidden translate-z-0 rounded">
                    <img
                      :src=" '/storage/consol/images/tutorial-08.jpg'"
                      alt="News 08"
                      class="absolute inset-0 w-full h-full object-cover transform scale-105 hover:-translate-y-1 transition duration-700 ease-out"
                      height="198"
                      width="352"/>
                  </figure>
                </router-link>
                <div class="mb-3">
                  <ul class="flex flex-wrap text-xs font-medium -m-1">
                    <li class="m-1">
                      <a
                        class="inline-flex text-center text-gray-100 py-1 px-3 rounded-full bg-green-500 hover:bg-[#1b7035] transition duration-150 ease-in-out"
                        href="#0">Guides</a>
                    </li>
                    <li class="m-1">
                      <a
                        class="inline-flex text-center text-text-primary py-1 px-3 rounded-full bg-green-100 hover:bg-green-200 transition duration-150 ease-in-out"
                        href="#0">Advanced</a>
                    </li>
                    <li class="m-1">
                      <span class="inline-flex text-center text-text-primary py-1 px-3 rounded-full bg-white shadow-sm">12 min read</span>
                    </li>
                  </ul>
                </div>
                <h3 class="text-xl font-bold leading-snug tracking-tight mb-2">
                  <router-link class="hover:underline" to="/blog-post">Live preview changes to React websites with
                    Simple
                  </router-link>
                </h3>
              </header>
              <p class="text-gray-600 flex-grow">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                tempor incididunt ut labore.</p>
              <footer class="text-sm flex items-center mt-4">
                <div class="flex flex-shrink-0 mr-3">
                  <a class="relative" href="#0">
                    <span aria-hidden="true" class="absolute inset-0 -m-px"><span
                      class="absolute inset-0 -m-px bg-white rounded-full"></span></span>
                    <img :src=" '/storage/consol/images/news-author-04.jpg'"
                         alt="Author 04" class="relative rounded-full" height="32"
                         width="32"/>
                  </a>
                </div>
                <div>
                  <span class="text-gray-600">By </span>
                  <a class="font-medium hover:underline" href="#0">Micheal Osman</a>
                </div>
              </footer>
            </article>

            <!-- 9th article -->
            <article class="flex flex-col h-full" data-aos="zoom-y-out" data-aos-delay="300">
              <header>
                <router-link class="block mb-6" to="/blog-post">
                  <figure class="relative h-0 pb-9/16 overflow-hidden translate-z-0 rounded">
                    <img
                      :src=" '/storage/consol/images/tutorial-09.jpg'"
                      alt="News 09"
                      class="absolute inset-0 w-full h-full object-cover transform scale-105 hover:-translate-y-1 transition duration-700 ease-out"
                      height="198"
                      width="352"/>
                  </figure>
                </router-link>
                <div class="mb-3">
                  <ul class="flex flex-wrap text-xs font-medium -m-1">
                    <li class="m-1">
                      <a
                        class="inline-flex text-center text-gray-100 py-1 px-3 rounded-full bg-green-500 hover:bg-[#1b7035] transition duration-150 ease-in-out"
                        href="#0">Guides</a>
                    </li>
                    <li class="m-1">
                      <a
                        class="inline-flex text-center text-text-primary py-1 px-3 rounded-full bg-green-100 hover:bg-green-200 transition duration-150 ease-in-out"
                        href="#0">Intermediate</a>
                    </li>
                    <li class="m-1">
                      <span class="inline-flex text-center text-text-primary py-1 px-3 rounded-full bg-white shadow-sm">9 min read</span>
                    </li>
                  </ul>
                </div>
                <h3 class="text-xl font-bold leading-snug tracking-tight mb-2">
                  <router-link class="hover:underline" to="/blog-post">Create a custom app and deploy It with Simple
                  </router-link>
                </h3>
              </header>
              <p class="text-gray-600 flex-grow">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                tempor incididunt ut labore.</p>
              <footer class="text-sm flex items-center mt-4">
                <div class="flex flex-shrink-0 mr-3">
                  <a class="relative" href="#0">
                    <span aria-hidden="true" class="absolute inset-0 -m-px"><span
                      class="absolute inset-0 -m-px bg-white rounded-full"></span></span>
                    <img :src=" '/storage/consol/images/news-author-01.jpg'"
                         alt="Author 01" class="relative rounded-full" height="32"
                         width="32"/>
                  </a>
                </div>
                <div>
                  <span class="text-gray-600">By </span>
                  <a class="font-medium hover:underline" href="#0">Lisa Allison</a>
                </div>
              </footer>
            </article>
          </div>

        </div>

      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'TutorialsList',
}
</script>
