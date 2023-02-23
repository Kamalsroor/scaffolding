<template>
  <!-- BEGIN: Top Bar -->
  <div class="top-bar">
    <!-- BEGIN: Breadcrumb -->
    <nav aria-label="breadcrumb" class="-intro-x hidden xl:flex">
      <ol class="breadcrumb breadcrumb-light">
        <li v-for="breadcrumb in breadcrumbs" :key="breadcrumb" aria-current="page" class="breadcrumb-item active">
          <router-link :to="{ path: breadcrumb.path}">
            {{ breadcrumb.meta.title }}
          </router-link>
        </li>
      </ol>
    </nav>
    <!-- END: Breadcrumb -->
    <!-- BEGIN: Mobile Menu -->
    <div class="-intro-x xl:hidden mr-3 sm:mr-6">
      <div
        class="mobile-menu-toggler cursor-pointer"
        @click="$emit('setMobileMenu')"
      >
        <BarChart2Icon
          class="mobile-menu-toggler__icon transform rotate-90 dark:text-slate-500"
        />
      </div>
    </div>
    <!-- END: Mobile Menu -->
    <!-- BEGIN: Search -->
    <div class="intro-x relative ml-auto sm:mx-auto">
      <div class="search hidden sm:block">
        <input
          class="search__input form-control"
          placeholder="Search..."
          type="text"
          @blur="hideSearchDropdown"
          @focus="showSearchDropdown"
        />
        <SearchIcon class="search__icon"/>
      </div>
      <a class="notification sm:hidden" href="">
        <SearchIcon class="notification__icon dark:text-slate-500 mr-5"/>
      </a>
      <div :class="{ show: searchDropdown }" class="search-result">
        <div class="search-result__content">
          <div class="search-result__content__title">Applications</div>
          <div class="mb-5">
            <a class="flex items-center mt-3 first:mt-0" href="">
              <div
                class="w-7 h-7 bg-success/20 dark:bg-success/10 text-success flex items-center justify-center rounded-full"
              >
                <InboxIcon class="w-3.5 h-3.5"/>
              </div>
              <div class="ml-3">Compose New Mail</div>
              <div
                class="ml-auto w-48 truncate text-slate-500 text-xs flex justify-end items-center"
              >
                <LinkIcon class="w-3.5 h-3.5 mr-2"/>
                Quick Access
              </div>
            </a>
            <a class="flex items-center mt-3 first:mt-0" href="">
              <div
                class="w-7 h-7 bg-pending/10 text-pending flex items-center justify-center rounded-full"
              >
                <UsersIcon class="w-3.5 h-3.5"/>
              </div>
              <div class="ml-3">Contacts</div>
              <div
                class="ml-auto w-48 truncate text-slate-500 text-xs flex justify-end items-center"
              >
                <LinkIcon class="w-3.5 h-3.5 mr-2"/>
                Quick Access
              </div>
            </a>
            <a class="flex items-center mt-3 first:mt-0" href="">
              <div
                class="w-7 h-7 bg-primary/10 dark:bg-primary/20 text-primary/80 flex items-center justify-center rounded-full"
              >
                <CreditCardIcon class="w-3.5 h-3.5"/>
              </div>
              <div class="ml-3">Product Reports</div>
              <div
                class="ml-auto w-48 truncate text-slate-500 text-xs flex justify-end items-center"
              >
                <LinkIcon class="w-3.5 h-3.5 mr-2"/>
                Quick Access
              </div>
            </a>
          </div>
          <!-- <div class="search-result__content__title">Contacts</div>
          <div class="mb-5">
            <a
              v-for="(faker, fakerKey) in $_.take($f(), 4)"
              :key="fakerKey"
              class="flex items-center mt-2 first:mt-0"
              href
            >
              <div class="w-7 h-7 image-fit">
                <img
                  alt="Rocketman - HTML Admin Template"
                  class="rounded-full"
                  src="https://via.placeholder.com/300.png"
                />
              </div>
              <div class="w-36 truncate ml-3">{{ faker.users[0].name }}</div>
              <div
                class="ml-auto w-36 truncate text-slate-500 text-xs text-right"
              >
                {{ faker.users[0].email }}
              </div>
            </a>
          </div>
          <div class="search-result__content__title">Products</div>
          <div>
            <a
              v-for="(faker, fakerKey) in $_.take($f(), 4)"
              :key="fakerKey"
              class="flex items-center mt-3 first:mt-0"
              href
            >
              <div class="w-7 h-7 image-fit">
                <img
                  alt="Rocketman - HTML Admin Template"
                  class="rounded-full"
                  src="https://via.placeholder.com/300.png"
                />
              </div>
              <div class="w-36 truncate ml-3">{{ faker.products[0].name }}</div>
              <div
                class="ml-auto w-36 truncate text-slate-500 text-xs text-right"
              >
                {{ faker.products[0].category }}
              </div>
            </a>
          </div> -->
        </div>
      </div>
    </div>
    <!-- END: Search -->
    <!-- BEGIN: Notifications -->
    <!--    <div class="intro-x dropdown mr-5 sm:mr-6">-->
    <!--      <div-->
    <!--        class="dropdown-toggle notification notification&#45;&#45;bullet cursor-pointer"-->
    <!--        role="button"-->
    <!--        aria-expanded="false"-->
    <!--        data-tw-toggle="dropdown"-->
    <!--      >-->
    <!--        <BellIcon class="notification__icon dark:text-slate-500" />-->
    <!--      </div>-->
    <!--      <div class="notification-content pt-2 dropdown-menu">-->
    <!--        <div class="notification-content__box dropdown-content">-->
    <!--          <div class="notification-content__title">Notifications</div>-->

    <!--          <div-->
    <!--            v-for="(faker, fakerKey) in $_.take($f(), 3)"-->
    <!--            :key="fakerKey"-->
    <!--            class="cursor-pointer relative flex"-->
    <!--            :class="{-->
    <!--              'mt-5': fakerKey,-->
    <!--            }"-->
    <!--          >-->
    <!--            <div class="w-10 h-10 flex-none image-fit mr-1">-->
    <!--              <img-->
    <!--                alt="Rocketman - HTML Admin Template"-->
    <!--                class="rounded-full"-->
    <!--                :src="faker.photos[0]"-->
    <!--              />-->
    <!--              <div-->
    <!--                class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600"-->
    <!--              ></div>-->
    <!--            </div>-->
    <!--            <div class="ml-2">-->
    <!--              <a href="javascript:;" class="font-medium mr-1">{{-->
    <!--                faker.users[0].name-->
    <!--              }}</a>-->
    <!--              <span class="text-slate-500">{{-->
    <!--                faker.news[0].shortContent-->
    <!--              }}</span>-->
    <!--              <div class="text-xs text-slate-400 mt-1">-->
    <!--                {{ faker.times[0] }}-->
    <!--              </div>-->
    <!--            </div>-->
    <!--          </div>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--    </div>-->
    <!-- END: Notifications -->
    <!-- BEGIN: Notifications -->
    <Dropdown class="intro-x mr-5">
      <DropdownToggle class="px-3 rounded-md py-1.5 bg-white/10 text-white w-40">

        <div class="flex items-center justify-between w-full">
          <ServerIcon class="w-4 h-4 mr-2"/>
          <!-- {{ currentDatabaseName }} -->
          <span>{{ currentDatabaseName }}</span>
          <ChevronDownIcon class="w-4 h-4 ml-2"/>
        </div>
      </DropdownToggle>
      <DropdownMenu class="w-40">
        <DropdownContent>
          <!-- :class="[(currentDatabase == 'db_events' ? 'font-semibold' : ''), 'w-4 h-4 mr-2']" -->
          <DropdownItem @click="changeServer('Event')">
            <ChevronRightIcon class="w-4 h-4 mr-2"/>
            <span>WSA Events</span>
          </DropdownItem>
          <!-- :class="[(currentDatabase == 'db_elite' ? 'font-semibold' : ''), 'w-4 h-4 mr-2']" -->
          <DropdownItem @click="changeServer('Elite')">
            <ChevronRightIcon class="w-4 h-4 mr-2"/>
            <span>WSA Elite</span>
          </DropdownItem>
          <!-- :class="[(currentDatabase == 'db_consol' ? 'font-semibold' : ''), 'w-4 h-4 mr-2']" -->
          <DropdownItem>
            <ChevronRightIcon class="w-4 h-4 mr-2"/>
            <span>WSA Consol</span>
          </DropdownItem>
        </DropdownContent>
      </DropdownMenu>
    </Dropdown>
    <!-- END: Notifications -->
    <!-- BEGIN: Account Menu -->
    <Dropdown class="intro-x text-slate-200 h-10">
      <DropdownToggle
        class="h-full dropdown-toggle flex items-center"
        role="button"
        tag="div"
      >
        <div class="w-10 h-10 image-fit">
          <img
            alt="Rocketman - HTML Admin Template"
            class="rounded-md border-2 border-white border-opacity-10 shadow-lg"
            src="https://via.placeholder.com/300.png"
          />
        </div>
        <div class="hidden md:block ml-3">
          <div class="max-w-[7rem] truncate font-medium">
            {{ user?.name }}
          </div>
          <div class="text-xs text-slate-400"></div>
        </div>
      </DropdownToggle>
      <DropdownMenu class="w-56">
        <DropdownContent>
          <DropdownItem>
            <UserIcon class="w-4 h-4 mr-2"/>
            Edit Profile
          </DropdownItem>
          <DropdownItem>
            <LockIcon class="w-4 h-4 mr-2"/>
            Reset Password
          </DropdownItem>
          <DropdownDivider/>
          <DropdownItem @click="logout()">
            <ToggleRightIcon class="w-4 h-4 mr-2"/>
            Logout
          </DropdownItem>
        </DropdownContent>
      </DropdownMenu>
    </Dropdown>
    <!-- END: Account Menu -->
  </div>
  <!-- END: Top Bar -->
</template>


<script>
import {ref} from "vue";
import {mapActions  ,useStore} from 'vuex'
import {useRoute} from "vue-router";

export default {
  data() {
    return {
      searchDropdown: ref(false),
    };
  },

  methods: {
    ...mapActions({
        signOut:"auth/logout"
    }),
    showSearchDropdown() {
      this.searchDropdown = true;
    },
    hideSearchDropdown() {
      this.searchDropdown = false;
    },
    async logout(){
        await axios.post('/logout').then(({data})=>{
            this.signOut()
            this.$router.push({name:"login"})
        })
    },
    changeServer(server) {
      if (this.currentDatabaseName != 'WSA ' + server) {
        // useAuthStore().changeServer(server).then(() => {
        //   this.$router.go(this.$router.currentRoute)
        // });
      }
    },
  },
  computed: {
    user() {
      return this.$store.state.auth.user;
    },
    currentDatabaseName() {
      return 'Event';
    },
    breadcrumbs() {
      return useRoute().matched;
    },

  },
  created() {

  }
}
</script>


