<template>
  <section>
    <div class="w-full mx-auto px-6 sm:px-12">
      <div class="pb-12 md:pb-20">

        <!-- CTA box -->
        <div class="relative bg-gray-900 rounded py-10 px-8 md:py-16 md:px-12 shadow-2xl overflow-hidden"
             data-aos="zoom-y-out">

          <!-- Background illustration -->
          <div aria-hidden="true" class="absolute right-0 bottom-0 pointer-events-none hidden lg:block">
            <svg height="328" width="428" xmlns="http://www.w3.org/2000/svg">
              <defs>
                <radialGradient id="ni-a" cx="35.542%" cy="34.553%" fx="35.542%" fy="34.553%" r="96.031%">
                  <stop offset="0%" stop-color="#DFDFDF"/>
                  <stop offset="44.317%" stop-color="#4C4C4C"/>
                  <stop offset="100%" stop-color="#333"/>
                </radialGradient>
              </defs>
              <g fill="none" fill-rule="evenodd">
                <g fill="#FFF">
                  <ellipse cx="185" cy="15.576" fill-opacity=".04" rx="16" ry="15.576"/>
                  <ellipse cx="100" cy="68.402" fill-opacity=".24" rx="24" ry="23.364"/>
                  <ellipse cx="29" cy="251.231" fill-opacity=".12" rx="29" ry="28.231"/>
                  <ellipse cx="29" cy="251.231" fill-opacity=".64" rx="8" ry="7.788"/>
                  <ellipse cx="342" cy="31.303" fill-opacity=".12" rx="8" ry="7.788"/>
                  <ellipse cx="62" cy="126.811" fill-opacity=".48" rx="2" ry="1.947"/>
                  <ellipse cx="78" cy="7.072" fill-opacity=".12" rx="2" ry="1.947"/>
                  <ellipse cx="185" cy="15.576" fill-opacity=".64" rx="6" ry="5.841"/>
                </g>
                <circle cx="276" cy="237" fill="url(#ni-a)" r="200"/>
              </g>
            </svg>
          </div>

          <div class="relative flex flex-col lg:flex-row justify-between items-center">

            <!-- CTA content -->
            <div class="text-center lg:text-left lg:max-w-xl">
              <h3 class="h3 text-white mb-2">Want more tutorials & guides?</h3>
              <p class="text-gray-300 text-lg mb-6">Lorem ipsum dolor sit amet consectetur adipisicing elit nemo
                expedita voluptas culpa sapiente.</p>

              <!-- CTA form -->
              <form class="w-full lg:w-auto">
                <div class="flex flex-col sm:flex-row justify-center max-w-xs mx-auto sm:max-w-md lg:mx-0">
                  <input aria-label="Your email…"
                         class="w-full appearance-none bg-gray-800 border border-gray-700 focus:border-gray-600 rounded-sm px-4 py-3 mb-2 sm:mb-0 sm:mr-2 text-white placeholder-gray-500"
                         placeholder="Your email…" type="email"/>
                  <a class="btn text-white bg-[#1b7035] hover:bg-green-700 shadow" href="#0">Subscribe</a>
                </div>
                <!-- Success message -->
                <!-- <p class="text-sm text-gray-400 mt-3">Thanks for subscribing!</p> -->
                <p class="text-sm text-gray-400 mt-3">No spam. You can unsubscribe at any time.</p>
              </form>
            </div>

          </div>

        </div>

      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'Newsletter',
}
</script>
