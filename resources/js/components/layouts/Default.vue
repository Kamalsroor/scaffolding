<template>
  <div class="flex">
<!--    <DarkModeSwitcher />-->
<!--    <MainColorSwitcher />-->
    <!-- BEGIN: Side Menu -->
    <nav class="side-nav" :class="{
        'side-nav--simple': simpleMenu.active,
        hover: simpleMenu.hover,
        'side-nav--active': mobileMenu,}">
      <div class="pt-4 mb-4">
        <div class="side-nav__header flex items-center">
          <a href="" class="intro-x flex items-center">
            <img alt=""
              class="side-nav__header__logo"
              :src="$h.getSettingByName('app' ,'global_navbar_logo',null,'../assets/images/logo.svg')"/>
            <span class="side-nav__header__text text-white pt-0.5 text-lg ml-2.5">
              {{ $h.getSettingByName('app' ,'general_app_name',null,'WSA Events') }}
            </span>
          </a>
          <a href="javascript:;"
            @click="setSimpleMenu"
            class="side-nav__header__toggler hidden xl:block ml-auto text-white text-opacity-70 hover:text-opacity-100 transition-all duration-300 ease-in-out pr-5">
            <ArrowLeftCircleIcon class="w-5 h-5" />
          </a>
          <a href="javascript:;"
            @click="setMobileMenu"
            class="mobile-menu-toggler xl:hidden ml-auto text-white text-opacity-70 hover:text-opacity-100 transition-all duration-300 ease-in-out pr-5">
            <XCircleIcon class="w-5 h-5" />
          </a>
        </div>
      </div>
      <div class="scrollable">
        <ul class="scrollable__content">
          <!-- BEGIN: First Child -->

          <template v-for="(menu, menuKey) in formattedMenu">
            <li
              v-if="typeof menu === 'string'"
              :key="menu + menuKey"
              class="side-nav__devider mb-4">
              {{ menu }}
            </li>
            <li v-else-if="menu.show" :key="menu + menuKey" >
              <a :href="
                  menu.subMenu
                    ? 'javascript:;'
                    : router.resolve({ name: menu.pageName }).path
                "

                class="side-menu"
                :class="{
                  'side-menu--active': menu.active,
                  'side-menu--open': menu.activeDropdown,
                }"
                @click="linkTo(menu, router, $event)">
                <div class="side-menu__icon">
                  <component :is="menu.icon" />
                </div>
                <div class="side-menu__title">
                  {{ menu.title }}
                  <div v-if="menu.subMenu"
                    class="side-menu__sub-icon"
                    :class="{ 'transform rotate-180': menu.activeDropdown }">
                    <ChevronDownIcon />
                  </div>
                </div>
              </a>
              <!-- BEGIN: Second Child -->
              <transition @enter="enter" @leave="leave">
                <ul v-if="menu.subMenu && menu.activeDropdown">
                  <template    v-for="(subMenu, subMenuKey) in menu.subMenu"
                    :key="subMenuKey">
                     <li v-if="subMenu.show" >
                    <a :href="
                        subMenu.subMenu
                          ? 'javascript:;'
                          : '#'
                      "
                      class="side-menu"
                      :class="{ 'side-menu--active': subMenu.active }"
                      @click="linkTo(subMenu, router, $event)">
                      <div class="side-menu__icon">
                        <ActivityIcon />
                      </div>
                      <div class="side-menu__title">
                        {{ subMenu.title }}
                        <div v-if="subMenu.subMenu"
                          class="side-menu__sub-icon"
                          :class="{
                            'transform rotate-180': subMenu.activeDropdown,
                          }">
                          <ChevronDownIcon />
                        </div>
                      </div>
                    </a>
                    <!-- BEGIN: Third Child -->
                    <transition @enter="enter" @leave="leave">
                      <ul v-if="subMenu.subMenu && subMenu.activeDropdown">
                        <template   v-for="(
                            lastSubMenu, lastSubMenuKey
                          ) in subMenu.subMenu"
                          :key="lastSubMenuKey">
                        <li  v-if="lastSubMenu.show">
                          <a :href="lastSubMenu.subMenu ? 'javascript:;' : '#'"
                            class="side-menu"
                            :class="{ 'side-menu--active': lastSubMenu.active }"
                            @click="linkTo(lastSubMenu, router, $event)">
                            <div class="side-menu__icon">
                              <ZapIcon />
                            </div>
                            <div class="side-menu__title">
                              {{ lastSubMenu.title }}
                            </div>
                          </a>
                        </li>
                        </template>
                      </ul>
                    </transition>
                    <!-- END: Third Child -->
                  </li>
                  </template>

                </ul>
              </transition>
              <!-- END: Second Child -->
            </li>
          </template>
          <!-- END: First Child -->
        </ul>
      </div>
    </nav>
    <!-- END: Side Menu -->
    <!-- BEGIN: Content -->
    <div class="wrapper" :class="{'wrapper--simple': simpleMenu.wrapper,}">
      <TopBar @setMobileMenu="setMobileMenu" />
      <div class="content">
        <vue3-progress />

        <!-- <loading :active="isPageLoading"
        :is-full-page="fullPage" loader="dots" transition="bounce"></loading> -->

        <router-view />
      </div>
    </div>
    <!-- END: Content -->
  </div>
</template>

<script setup>
        import { computed, onMounted , onBeforeMount, provide, ref, watch, reactive } from "vue";
        import { useRoute, useRouter } from "vue-router";
        import TopBar from "@/components/top-bar/Main.vue";

        // import DarkModeSwitcher from "@/components/dark-mode-switcher/Main.vue";
        // import MainColorSwitcher from "@/components/main-color-switcher/Main.vue";
        import { linkTo as link, nestedMenu, enter, leave } from "./index";
        import dom from "@left4code/tw-starter/dist/js/dom";
        import SimpleBar from "simplebar";
        import {useI18n} from 'vue-i18n';


        /**
         * Simulate a login
         * @param {string} a
         * @param {string} p
         */
        function translate(string, opject) {
            // return string;
        const {t} = useI18n();
        return t(string, opject);
        }



        const store = useStore();
        const route = useRoute();
        const router = useRouter();
        const formattedMenu = ref([]);
        const mainMenuStore = [
             "OVERVIEW",
                {
                    icon: "MonitorIcon",
                    pageName: "dashboard",
                    title: "Event Dashboard",
                    // permission:['test']
                },

                {
                    icon: "ListIcon",
                    pageName: "admins",
                    title: "Admins",
                    subMenu: [
                        {
                            pageName: "admins",
                            title: translate('admins.plural'),
                            permission: ['list-admin'],
                        },
                        {
                            pageName: "roles",
                            title: translate('roles.plural'),
                            permission: ['list-role'],
                        },
                    ]
                },
        ];
        const authStore = {
            currentUserPermissions :[],
            currentServer : 'Event',
        };
        const mainMenu = computed(() =>  nestedMenu(mainMenuStore, route , [] , 'Event') );
        const simpleMenu = reactive({
        active: false,
        hover: false,
        wrapper: false,
        });
        const mobileMenu = ref(false);

        // Set active/inactive simple menu
        const setSimpleMenu = () => {
        if (simpleMenu.active) {
            simpleMenu.hover = true;
            dom(".wrapper")[0].animate(
            {
                marginLeft: "270px",
            },
            {
                duration: 200,
            }
            ).onfinish = function () {
            simpleMenu.hover = false;
            simpleMenu.active = false;
            simpleMenu.wrapper = false;
            };
        } else {
            simpleMenu.active = true;
            dom(".wrapper").css("margin-left", "270px");
            dom(".wrapper")[0].animate(
            {
                marginLeft: "112px",
            },
            {
                duration: 200,
            }
            ).onfinish = function () {
            dom(".wrapper").removeAttr("style");
            simpleMenu.wrapper = true;
            };
        }
        };
        // console.log();
        // Set active/inactive mobile menu
        const setMobileMenu = () => {
        mobileMenu.value = !mobileMenu.value;
        };

        // Link to specified page
        const linkTo = (menu, router, event) => {
          console.log('linkTo1');
        if (!menu.subMenu) {
            mobileMenu.value = false;
        }
        link(menu, router, event);
        };

        provide("forceActiveMenu", (pageName) => {
        route.forceActiveMenu = pageName;
        formattedMenu.value = $h.toRaw(mainMenu.value);
        });

        // const Server = computed(() => {
        // return authStore.server_database ?? 'Event';
        // })

        // watch(Server, (newValue, oldValue) => {
        //     formattedMenu.value = this.$h.toRaw(mainMenu.value);
        // })
        // const perimssions = computed(() => {
        // return authStore.user ? authStore.user.permissions : []
        // })

        // watch(perimssions, (newValue, oldValue) => {
        // // console.log( oldValue,newValue )
        //     formattedMenu.value = this.$h.toRaw(mainMenu.value);
        // if(route.meta.permissions && route.meta.permissions.length > 0){
        //     console.log(route);
        //     useAuthStore().checkPermission(route.meta.permissions).then((response) => {
        //     if (!response) {
        //         router.push('/403-page');
        //     }
        //     })
        // }
        // })


        watch(
        computed(() => route.path),
        () => {
            // console.log('forceActiveMenu');
            delete route.forceActiveMenu;
            formattedMenu.value = $h.toRaw(mainMenu.value);
            if(route.meta.permissions && route.meta.permissions.length > 0){
            // useAuthStore().checkPermission(route.meta.permissions).then((response) => {
            //     if (!response) {
            //     router.push('/403-page');
            //     }
            // })
            }
        },
        );

        onMounted(() => {
        dom("body").removeClass("error-page").removeClass("login").addClass("main");
        new SimpleBar(dom(".side-nav .scrollable")[0]);
        formattedMenu.value = $h.toRaw(mainMenu.value);
        // authStore.refreshUserPermissions();
        // successNotificationToggle();
        });
        onBeforeMount(() => {

        // authStore.refreshUserPermissions();
        // settingStore.refreshSettings();
        // successNotificationToggle();
        });
</script>


<script>
import { mapActions , useStore   } from 'vuex';



export default {
    name:"default-layout",
    data(){
        return {
            user:this.$store.state.auth.user
        }
    },

    methods:{
        ...mapActions({
            signOut:"auth/logout",
            // menuList:"mainMenu/setMenuList",
        }),
        async logout(){
            await axios.post('/logout').then(({data})=>{
                this.signOut()
                this.$router.push({name:"login"})
            })
        }
    }
}
</script>
