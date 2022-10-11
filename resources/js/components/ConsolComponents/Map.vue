<template>
  <div id="map"></div>
  <div>
    <!--    <button v-if="!map_red" v-on:click="make_red">Make Red</button>-->
  </div>
</template>

<script>
export default {
  props: ['href', 'active'],
  data() {
    return {
      map_red: false
    }
  },
  created() {
    window.simplemaps_worldmap.mapdata.main_settings.state_color = document.documentElement.style.getPropertyValue('--color-primary-hover');
    window.simplemaps_worldmap.mapdata.main_settings.state_hover_color = document.documentElement.style.getPropertyValue('--color-primary');

  },
  mounted: function () {

    window.simplemaps_worldmap.load();
  },
  computed: {
    // simplemaps_worldmap: function () {
    //   return window.simplemaps_worldmap;
    // }
  },
  methods: {
    make_red: function () {
      this.map_red = true;
      window.simplemaps_worldmap.mapdata.main_settings.state_color = 'red';
      window.simplemaps_worldmap.refresh();
    }
  }
}
</script>
