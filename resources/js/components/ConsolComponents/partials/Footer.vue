<template>
  <footer>
    <div class="w-full mx-auto px-6 sm:px-12">

      <!-- Top area: Blocks -->
      <div class="grid sm:grid-cols-12 gap-8 py-8 md:py-12 border-t border-gray-200">

        <!-- 1st block -->
        <div class="sm:col-span-12 lg:col-span-3">
          <div class="mb-2">
            <!-- Logo -->
            <Link aria-label="World Shipping Alliance | WSA Consol" class="inline-block" href="/">
              <CosnolLogo class="w-44 text-logo"/>
            </Link>
          </div>
        </div>

        <!-- 2nd block -->
        <div class="sm:col-span-6 md:col-span-3 lg:col-span-2">
          <h6 class="text-text-primary font-medium mb-2">WSA Network</h6>
          <ul class="text-sm">
            <li class="mb-2">
              <a class="text-text-secondary hover:text-text-primary transition duration-150 ease-in-out"
                 href="https://worldshippingalliance.com/home.aspx"
                 target="_blank">WSA
                Elite
              </a>
            </li>
            <li class="mb-2">
              <Link :href="'consol.home'"
                    class="text-text-secondary hover:text-text-primary transition duration-150 ease-in-out"
              >WSA
                Consol
              </Link>
            </li>
            <li class="mb-2">
              <a class="text-text-secondary hover:text-text-primary transition duration-150 ease-in-out"
                 href="https://wsa-events.com/"
                 target="_blank">WSA
                Events
              </a>
            </li>
            <li class="mb-2">
              <a class="text-text-secondary hover:text-text-primary transition duration-150 ease-in-out"
                 href="https://worldshippingalliance.com/news.aspx"
                 target="_blank">News
              </a>
            </li>
            <li class="mb-2">
              <Link :href="'consol.contact'"
                    class="text-text-secondary hover:text-text-primary transition duration-150 ease-in-out">Contact
                us
              </Link>
            </li>
          </ul>
        </div>

        <!-- 3rd block -->
        <div class="sm:col-span-6 md:col-span-3 lg:col-span-2">
          <h6 class="text-text-primary font-medium mb-2">WSA Consol</h6>
          <ul class="text-sm">
            <li class="mb-2">
              <Link :href="'consol.about'"
                    class="text-text-secondary hover:text-text-primary transition duration-150 ease-in-out">About
              </Link>
            </li>
            <li class="mb-2">
              <Link :href="'consol.benefit.index'"
                    class="text-text-secondary hover:text-text-primary transition duration-150 ease-in-out">
                Benefits
              </Link>
            </li>
            <li class="mb-2">
              <Link :href="'consol.network.directory'"
                    class="text-text-secondary hover:text-text-primary transition duration-150 ease-in-out">Network
                Directory
              </Link>
            </li>
            <li class="mb-2">
              <Link :href="'consol.home'"
                    class="text-text-secondary hover:text-text-primary transition duration-150 ease-in-out">Events
              </Link>
            </li>
            <!--            <li class="mb-2">-->
            <!--              <Link :href="'consol.contact'"-->
            <!--                    class="text-text-secondary hover:text-text-primary transition duration-150 ease-in-out">FAQ-->
            <!--              </Link>-->
            <!--            </li>-->
          </ul>
        </div>

        <!-- 4th block -->
        <div class="sm:col-span-6 md:col-span-3 lg:col-span-2">
          <h6 class="text-text-primary font-medium mb-2">Help & Tools</h6>
          <ul class="text-sm">
            <li class="mb-2">
              <a class="text-text-secondary hover:text-text-primary transition duration-150 ease-in-out"
                 href="https://worldshippingalliance.com/tracking.aspx"
                 target="_blank">Tracking
                System
              </a>
            </li>
            <li class="mb-2">
              <a class="text-text-secondary hover:text-text-primary transition duration-150 ease-in-out"
                 href="https://worldshippingalliance.com/FreightCalc.aspx"
                 target="_blank">Freight
                Calculator
              </a>
            </li>
            <li class="mb-2">
              <a class="text-text-secondary hover:text-text-primary transition duration-150 ease-in-out"
                 href="https://worldshippingalliance.com/Incoterms.aspx"
                 target="_blank">
                Incoterms
              </a>
            </li>
            <li class="mb-2">
              <a class="text-text-secondary hover:text-text-primary transition duration-150 ease-in-out"
                 href="https://worldshippingalliance.com/Request.aspx"
                 target="_blank">Rate
                Request
              </a>
            </li>
            <li class="mb-2">
              <Link :href="'consol.privacy'"
                    class="text-text-secondary hover:text-text-primary transition duration-150 ease-in-out">Privacy
                Policy
              </Link>
            </li>
          </ul>
        </div>

        <!-- 5th block -->
        <div class="sm:col-span-6 md:col-span-3 lg:col-span-3">
          <h6 class="text-text-primary font-medium mb-2">Newsletter Subscribe</h6>
          <p class="text-sm text-text-secondary mb-4">Subscribe to our newsletter to get our latest news, amazing offers &
            inside
            scoops.</p>
          <form>
            <div class="flex flex-wrap mb-4">
              <div class="w-full">
                <label class="block text-sm sr-only" for="newsletter">Email</label>
                <div class="relative flex items-center max-w-xs">
                  <input id="newsletter" class="form-input w-full text-text-primary px-3 py-2 pr-12 text-sm"
                         placeholder="Your email"
                         required type="email"/>
                  <button aria-label="Subscribe" class="absolute inset-0 left-auto" type="submit">
                    <span aria-hidden="true" class="absolute inset-0 right-auto w-px -ml-px my-2 bg-gray-300"></span>
                    <svg class="w-3 h-3 fill-current text-[#1b7035] mx-3 flex-shrink-0" viewBox="0 0 12 12"
                         xmlns="http://www.w3.org/2000/svg">
                      <path d="M11.707 5.293L7 .586 5.586 2l3 3H0v2h8.586l-3 3L7 11.414l4.707-4.707a1 1 0 000-1.414z"
                            fill-rule="nonzero"/>
                    </svg>
                  </button>
                </div>
                <!-- Success message -->
                <!-- <p class="mt-2 text-[#1b7035] text-sm">Thanks for subscribing!</p> -->
              </div>
            </div>
          </form>
        </div>

      </div>

      <!-- Bottom area -->
      <div class="md:flex md:items-center md:justify-between py-4 md:py-8 border-t border-gray-200">

        <!-- Social links -->
        <ul class="flex mb-4 md:order-1 md:ml-4 md:mb-0">
          <!--Social Link: Facebook-->
          <li class="ml-4">
            <a :href="'#'"
               aria-label="Facebook"
               class="flex justify-center items-center text-primary border border-gray-200 bg-gray-100 hover:text-gray-100 hover:bg-[#16c524] rounded-full transition duration-150 ease-in-out"
               target="_blank">
              <svg class="w-8 h-8 fill-current" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M14.023 24L14 17h-3v-3h3v-2c0-2.7 1.672-4 4.08-4 1.153 0 2.144.086 2.433.124v2.821h-1.67c-1.31 0-1.563.623-1.563 1.536V14H21l-1 3h-2.72v7h-3.257z"/>
              </svg>
            </a>
          </li>
          <!--Social Link: Linkedin-->
          <li class="ml-4">
            <a :href="'#'"
               aria-label="Linkedin"
               class="flex justify-center items-center text-primary border border-gray-200 bg-gray-100 hover:text-gray-100 hover:bg-[#16c524] rounded-full transition duration-150 ease-in-out"
               target="_blank">
              <svg class="w-8 h-8 fill-current" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M23.3 8H8.7c-.4 0-.7.3-.7.7v14.7c0 .3.3.6.7.6h14.7c.4 0 .7-.3.7-.7V8.7c-.1-.4-.4-.7-.8-.7zM12.7 21.6h-2.3V14h2.4v7.6h-.1zM11.6 13c-.8 0-1.4-.7-1.4-1.4 0-.8.6-1.4 1.4-1.4.8 0 1.4.6 1.4 1.4-.1.7-.7 1.4-1.4 1.4zm10 8.6h-2.4v-3.7c0-.9 0-2-1.2-2s-1.4 1-1.4 2v3.8h-2.4V14h2.3v1c.3-.6 1.1-1.2 2.2-1.2 2.4 0 2.8 1.6 2.8 3.6v4.2h.1z"/>
              </svg>
            </a>
          </li>
        </ul>

        <!-- Copyrights note -->
        <div class="text-sm text-text-secondary mr-4">&copy; 2022 World Shipping Alliance. All rights reserved.</div>

      </div>

    </div>
  </footer>
</template>

<script>
import CosnolLogo from "@/Components/ConsolComponents/partials/CosnolLogo.vue";

export default {
  name: "Footer",
  components: {
    CosnolLogo,
  }
}
</script>
