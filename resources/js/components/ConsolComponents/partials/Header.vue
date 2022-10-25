<template>
  <header :class="{ 'shadow-lg border-b-4 border-primary': !top }"
       class="sticky top-0 w-full z-30 transition duration-300 ease-in-out bg-white">
    <div class="w-full mx-auto px-6 sm:px-12">
      <div :class="[(top ? 'md:h-36 h-20' : 'md:h-24 h-16')]"
           class="flex items-center justify-between h-28 md:h-36 duration-500 ease-in-out">

        <!-- Site branding -->
        <div class="flex-shrink-0 mr-4">
          <!-- Logo -->
          <router-link :to="'consol.home'" aria-label="World Shipping Alliance | WSA Consol" class="block">
            <CosnolLogo :class="[(!top ? 'md:w-24 w-20': 'md:w-48 w-24'), 'text-logo duration-500 ease-in-out']"/>
          </router-link>
        </div>

        <!-- Desktop navigation -->
        <nav class="hidden lg:flex lg:flex-grow">

          <!-- Desktop menu links -->
          <ul class="flex flex-grow justify-end flex-wrap items-center text-sm">
            <template v-for="item in topMenuLinks" :key="item.id">
              <li v-if="!item.childMenus?.length">
                <router-link
                  :class="[(!top ? 'text-text-secondary hover:text-primary-hover': 'text-text-secondary hover:text-primary-hover'), 'font-bold group px-3 lg:px-5 py-2 flex items-center transition duration-150 ease-in-out']"
                  :to="{ name: item.href}">
                  <component :is="item.icon" aria-hidden="true" class="h-5 w-5 mr-1"/>
                  <span>{{ item.name }}</span>
                </router-link>
              </li>

              <!-- 1st level: hover -->
              <Dropdown v-if="item.childMenus?.length" :icon="item.icon" :title="item.name">
                <li v-for="childMenu in item.childMenus" :key="childMenu.name">
                  <router-link
                    :class="[(!top ? 'text-text-secondary hover:text-primary-hover' : 'text-text-secondary hover:text-primary-hover'), 'font-bold text-sm flex py-2 px-5 leading-tight']"
                    :to="{ name: item.href}">
                    <component :is="childMenu.icon" aria-hidden="true" class="h-5 w-5 mr-1"/>
                    <span>{{ childMenu.name }}</span>
                  </router-link>
                </li>
              </Dropdown>
            </template>
          </ul>

          <!-- Desktop sign in links -->
          <ul class="flex flex-grow justify-end flex-wrap items-center text-sm">
            <li >
              <router-link :to="'consol.login'">
                <ActionButton
                  :class="['']"
                  :icon="true" buttonSize="small" buttonStyle="secondary" iconName="LoginIcon" isLight="true"
                  label="Login"/>
              </router-link>
            </li>
            <li >
              <router-link :to="'consol.register'">
                <ActionButton
                  :class="['ml-2']"
                  :icon="true" buttonSize="small" iconName="LogoutIcon" isLight="true"
                  label="Become A Member"/>
              </router-link>
            </li>


            <Menu as="div" class="relative inline-block text-left">
              <div>
                <MenuButton
                  class="inline-flex justify-center w-full text-sm rounded-md border-gray-200 border-2 border-opacity-75">
                  <img
                    :alt="user.name"
                    class="object-contain h-10 w-16 rounded-md bg-white"
                    :src="user.avatar_url" :title="user.name"/>
                </MenuButton>
              </div>

              <transition
                enter-active-class="transition duration-100 ease-out"
                enter-from-class="transform scale-95 opacity-0"
                enter-to-class="transform scale-100 opacity-100"
                leave-active-class="transition duration-75 ease-in"
                leave-from-class="transform scale-100 opacity-100"
                leave-to-class="transform scale-95 opacity-0">
                <MenuItems
                  class="absolute right-0 w-56 mt-2 origin-top-right bg-white divide-y divide-gray-200 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                  <div class="px-1 py-1">
                    <MenuItem v-for="item in userMenu" :key="item.name" v-slot="{ active }">
                      <router-link :to="item.href">
                        <button
                          :class="[(active ? 'bg-primary text-white' : 'text-text-primary'), 'group flex rounded-md items-center w-full px-2 py-2 text-sm']">
                          <component :is="item.icon" :active="active" aria-hidden="true" class="w-5 h-5 mr-2"/>
                          <span>{{ item.name }}</span>
                        </button>
                      </router-link>
                    </MenuItem>
                  </div>
                  <div class="px-1 py-1">
                    <MenuItem v-slot="{ active }">
                      <button
                        :class="[(active ? 'bg-danger text-white' : 'text-text-primary'),'group flex rounded-md items-center w-full px-2 py-2 text-sm',]"
                        @click="logout">
                        <LogoutIcon :active="active" aria-hidden="true" class="w-5 h-5 mr-2"/>
                        <span>Logout</span>
                      </button>
                    </MenuItem>
                  </div>
                </MenuItems>
              </transition>
            </Menu>


          </ul>

        </nav>

        <!-- Mobile menu -->
        <div class="flex lg:hidden">

          <!-- Hamburger button -->
          <button ref="hamburger" :aria-expanded="mobileNavOpen" :class="{ active: mobileNavOpen }"
                  aria-controls="mobile-nav"
                  class="hamburger" @click="mobileNavOpen = !mobileNavOpen">
            <span class="sr-only">Menu</span>
            <svg class="w-6 h-6 fill-current text-text-primary" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <rect height="2" width="24" y="4"/>
              <rect height="2" width="24" y="11"/>
              <rect height="2" width="24" y="18"/>
            </svg>
          </button>

          <!-- Mobile navigation -->
          <transition
            enter-active-class="transition ease-out duration-200 transform"
            enter-from-class="opacity-0 -translate-y-2"
            enter-to-class="opacity-100 translate-y-0"
            leave-active-class="transition ease-out duration-200"
            leave-from-class="opacity-100"
            leave-to-class="opacity-0"
          >
            <nav
              v-show="mobileNavOpen"
              id="mobile-nav"
              ref="mobileNav"
              class="absolute top-full h-screen pb-16 z-20 left-0 w-full overflow-scroll bg-white"
            >
              <ul class="px-5 py-2">
                <template v-for="item in topMenuLinks" :key="item.id">
                  <li v-if="!item.childMenus?.length">
                    <router-link :to="item.href" class="flex items-center text-text-primary hover:text-primary-hover py-2">
                      <component :is="item.icon" aria-hidden="true" class="h-5 w-5 mr-1"/>
                      <span>{{ item.name }}</span>
                    </router-link>
                  </li>
                  <li v-if="item.childMenus?.length" class="border-gray-200">
                  <span class="flex items-center text-text-primary hover:text-primary-hover py-2 cursor-pointer">
                    <component :is="item.icon" aria-hidden="true" class="h-5 w-5 mr-1"/>
                    <span>Contact</span>
                  </span>
                    <ul class="pl-4">
                      <li v-for="childMenu in item.childMenus" :key="childMenu.name">
                        <router-link :to="childMenu.url"
                              class="text-sm flex font-medium text-text-primary hover:text-primary-hover py-2">
                          <component :is="childMenu.icon" aria-hidden="true" class="h-5 w-5 mr-1"/>
                          <span>{{ childMenu.name }}</span>
                        </router-link>
                      </li>
                    </ul>
                  </li>
                </template>

                <li>
                  <router-link class="btn-sm text-white bg-secondary hover:bg-secondary-hover w-full my-2" to="/signin">
                    <span>Sign In</span>
                    <svg class="w-3 h-3 fill-current flex-shrink-0 ml-2 -mr-1" viewBox="0 0 12 12"
                         xmlns="http://www.w3.org/2000/svg">
                      <path d="M11.707 5.293L7 .586 5.586 2l3 3H0v2h8.586l-3 3L7 11.414l4.707-4.707a1 1 0 000-1.414z"
                            fill-rule="nonzero"/>
                    </svg>
                  </router-link>
                </li>
                <li>
                  <router-link class="btn-sm text-white bg-primary hover:bg-primary-hover w-full my-2" to="/signup">
                    <span>Sign up</span>
                    <svg class="w-3 h-3 fill-current flex-shrink-0 ml-2 -mr-1" viewBox="0 0 12 12"
                         xmlns="http://www.w3.org/2000/svg">
                      <path d="M11.707 5.293L7 .586 5.586 2l3 3H0v2h8.586l-3 3L7 11.414l4.707-4.707a1 1 0 000-1.414z"
                            fill-rule="nonzero"/>
                    </svg>
                  </router-link>
                </li>
                <li class="px-8 py-4 border-t border-b border-gray-200">
                  <ul class="space-y-1">
                    <li class="truncate font-bold">{{ user.name }}</li>
                    <li class="truncate">{{ user.email }}</li>
                    <template v-for="item in userMenu" :key="item.name">
                      <li class="hover:bg-primary hover:text-white py-2 px-4 rounded-md">
                        <router-link :to="item.href" class="flex items-center">
                          <component :is="item.icon" aria-hidden="true" class="h-5 w-5 mr-1"/>
                          <span>{{ item.name }}</span>
                        </router-link>
                      </li>
                    </template>
                  </ul>
                </li>
                <li>
                  <a class="btn-sm text-white bg-danger hover:bg-danger-hover w-full my-2" @click="logout">
                    <span>Logout</span>
                    <LogoutIcon aria-hidden="true" class="w-5 h-5 ml-2 -mr-1"/>
                  </a>
                </li>
              </ul>
            </nav>
          </transition>

        </div>

      </div>
    </div>
  </header>
</template>

<script>
import Dropdown from '@/components/ConsolComponents/utils/Dropdown.vue'
import {Menu, MenuButton, MenuItem, MenuItems} from '@headlessui/vue'
import {
  ChevronDownIcon,
  DocumentTextIcon,
  GlobeIcon,
  HomeIcon,
  LightBulbIcon,
  LogoutIcon,
  MailIcon,
  PencilAltIcon,
  UserGroupIcon,
  UserIcon,
  ViewGridIcon
} from '@heroicons/vue/outline'
import CosnolLogo from "@/components/ConsolComponents/partials/CosnolLogo.vue";
import {ClipboardListIcon, LoginIcon,} from '@heroicons/vue/solid'
import ActionButton from "@/components/FormItems/ActionButton.vue";


export default {
  name: 'Header',
  components: {
    ActionButton,
    ChevronDownIcon,
    PencilAltIcon,
    UserIcon,
    Menu,
    MenuButton,
    MenuItems,
    MenuItem,
    CosnolLogo,
    UserGroupIcon,
    LoginIcon,
    ClipboardListIcon,
    LightBulbIcon,
    LogoutIcon,
    DocumentTextIcon,
    ViewGridIcon,
    GlobeIcon,
    HomeIcon,
    Dropdown
  },
  data: function () {
    return {
      mobileNavOpen: false,
      top: true,
      topMenuLinks: [
        {id: '1', icon: HomeIcon, name: 'Home', href: 'home',},
        {id: '2', icon: LightBulbIcon, name: 'About', href: 'about',},
        {id: '3', icon: ViewGridIcon, name: 'Benefits', href: 'benefit',},
        {id: '4', icon: GlobeIcon, name: 'Network Directory', href: 'network.directory',},
        {id: '4', icon: GlobeIcon, name: 'Profile', href: 'profile',},
        // {id: '5', icon: UserGroupIcon, name: 'Events', href: 'consol.events.index',},
        {
          id: '6', name: 'Contact', href: 'contact', icon: MailIcon, childMenus: [
            // {id: '7', name: 'FAQ', href: 'consol.home', icon: DocumentTextIcon},
            // {id: '8', name: 'Contact us', href: 'consol.home', icon: MailIcon},
          ],
        },
      ],
      userMenu: [
        {id: '1', icon: UserIcon, name: 'Profile', href: 'consol.profile.show',},
        {id: '2', icon: PencilAltIcon, name: 'Edit Profile', href: 'consol.profile.edit',},
      ],
      user: {
        active: true,
        address_line1: "88 El Horreya ST, Al Ahram Building, 2nd Floor Alexandria, Egypt",
        address_line2: "",
        approximate_number_of_employees: 60,
        avatar_url: "https://d1csarkz8obe9u.cloudfront.net/posterpreviews/business-logo-design-template-78655edda18bc1196ab28760f1535baa_screen.jpg?ts=1617645324",
        businesse_stablished: "2008",
        city: "Alexandria",
        company_email: "info@pyramidsfreight.com",
        company_id: 1,
        company_type: "hq",
        country_id: 63,
        email: "info@pyramidsfreight.com",
        expire_date: "2022-01-14T17:00:00.000000Z",
        f_p_p: true,
        fax: " +202 22665515",
        group_id: null,
        id: 1,
        latitude: "31.197729",
        longitude: "29.89254",
        member_since: "2018-01-14T17:00:00.000000Z",
        membership_type: "member",
        name: "PYRAMIDS FREIGHT  SERVICES",
        phone: "+202 22665515 | +202 22692775",
        postal_code: null,
        show_in_network: true,
        slogan: "Logistics with a caring smile !",
        state: null,
        type: "company",
        website: "http://pyramidsfreight.com/",
        wsa_id: "18002",
      }
    }
  },
  created: function () {
    document.documentElement.style.setProperty('--color-logo', '#E25B00');
    document.documentElement.style.setProperty('--color-text-primary', '#0F172A');
    document.documentElement.style.setProperty('--color-text-secondary', '#1E293B');
    document.documentElement.style.setProperty('--color-primary', '#F97316');
    document.documentElement.style.setProperty('--color-primary-hover', '#FF9D29');
    document.documentElement.style.setProperty('--color-bg-light', '#f3f4f6');
    document.documentElement.style.setProperty('--color-bg-lighter', '#e5e7eb');
    document.documentElement.style.setProperty('--color-bg-dark', '#d1d5db');
    document.documentElement.style.setProperty('--color-secondary', '#0F172A');
    document.documentElement.style.setProperty('--color-secondary-hover', '#1E293B');
    document.documentElement.style.setProperty('--color-danger', '#dc2626');
    document.documentElement.style.setProperty('--color-danger-hover', '#b91c1c');
    document.documentElement.style.setProperty('--color-warning', '#f59e0b');
    document.documentElement.style.setProperty('--color-warning-hover', '#d97706');
    document.documentElement.style.setProperty('--color-success', '#16a34a');
    document.documentElement.style.setProperty('--color-success-hover', '#15803d');
  },
  methods: {
    logout() {
    //   this.$inertia.post("logout");
    },
    clickOutside(e) {
      if (!this.mobileNavOpen || this.$refs.mobileNav.contains(e.target) || this.$refs.hamburger.contains(e.target)) return
      this.mobileNavOpen = false
    },
    keyPress() {
      if (!this.mobileNavOpen || event.keyCode !== 27) return
      this.mobileNavOpen = false
    },
    handleScroll() {
      this.top = window.scrollY <= 20
    }
  },
  mounted() {
    document.addEventListener('click', this.clickOutside)
    document.addEventListener('keydown', this.keyPress)
    document.addEventListener('scroll', this.handleScroll)
  },
  beforeUnmount() {
    document.removeEventListener('click', this.clickOutside)
    document.removeEventListener('keydown', this.keyPress)
    document.removeEventListener('scroll', this.handleScroll)
  }
}
</script>
