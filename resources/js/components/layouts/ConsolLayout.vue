<template>

  <div class="flex flex-col min-h-screen ">
    <!-- Site header -->
    <notifications :width="250" classes="vue-notification-event"/>
    <Header/>

    <!-- Page content -->
    <main class="flex-grow antialiased ">

      <!-- Page sections -->
    <router-view />


    </main>

    <!-- Site footer -->
    <Footer/>

  </div>
</template>

<script>


import Header from '@/components/ConsolComponents/partials/Header.vue'
import Footer from '@/components/ConsolComponents/partials/Footer.vue'


export default {
  name: 'ConsolLayout',
  components: {

    Header,
    Footer,

  },

  data() {
    return {
      showingNavigationDropdown: false,
    };
  },
  watch: {
    '$page.props.flash': {
      handler() {
        console.log(this.$page.props.flash.message);
        // this.$notify(this.$page.props.flash.message);
        if (this.$page.props.flash.message) {
          // this.success_audio.play();
          this.$notify({
            speed: 1000,
            duration: 60000,
            type: this.$page.props.flash.type,
            title: this.$page.props.flash.type,
            text: this.$page.props.flash.message,
          });

        }

      }
    },
    '$page.props.errors': {
      handler() {
        console.log('kgfdlkjglkdsfjglkfdsjglkjfdslkgjl',this.$page.props.errors);
        // this.$notify(this.$page.props.flash.message);


      },
      deep: true,
    },
  },
};
</script>
<style>

.primary {
  background-image: var(--hero-image);
  border: 4px solid var(--accent-color);
  display: inline-block;
  width: 250px;
  height: 250px;
}


</style>


<style lang="scss">
.vue-notification-event {
  /* // styling */
  margin: 10px 5px 5px;
  padding: 20px;
  font-size: 16px;
  font-weight: 800;
  color: #ffffff;

  /* // default (blue) */
  background: #44a4fc;
  border-left: 5px solid #187fe7;

  /* // types (green, amber, red) */
  &.success {
    background: #68cd86;
    border-left-color: #42a85f;
  }

  &.warn {
    background: #ffb648;
    border-left-color: #f48a06;
  }

  &.error {
    background: #e54d42;
    border-left-color: #b82e24;
  }
}

</style>
