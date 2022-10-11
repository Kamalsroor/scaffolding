<template>
  <section>
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
      <div class="pb-12 md:pb-20">

        <!-- CTA box -->
        <div
          class="rounded py-10 px-8 md:py-16 md:px-12 shadow-2xl section-bg"
          data-aos="zoom-y-out">

          <div class="flex flex-col lg:flex-row justify-between items-center">

            <!-- CTA content -->
            <div class="mb-6 lg:mr-16 lg:mb-0 text-center lg:text-left">
              <h3 class="h3 text-white mb-2">Be a WSA Consol Member?</h3>
              <p class="text-white text-lg">Enjoy all the WSA membership benefits and find the best rates for
                your shipments with trusted</p>
            </div>

            <!-- CTA button -->
            <div>
              <Link :href="'consol.register'">
                <ActionButton buttonSize="large" label="Apply Now" />
              </Link>
            </div>

          </div>

        </div>

      </div>
    </div>
  </section>
</template>

<script>
import ActionButton from "@/components/FormItems/ActionButton.vue";


export default {
  name: 'Cta',
  components: {
    ActionButton
  }
}
</script>
