<template>
  <div class="container">
    <!-- <DarkModeSwitcher/>
    <MainColorSwitcher/> -->
    <div
      class="w-full min-h-screen p-5 md:p-20 flex items-center justify-center"
    >
      <div class="w-96 intro-y">
        <!-- <img
          class="mx-auto h-20"
          alt="Rocketman - Tailwind HTML Admin Template"
          src="../../assets/images/wsa-dashboard-logo.svg"
        /> -->
        <div
          class="text-white dark:text-slate-300 text-lg text-center mt-14"
        >
          <div class="font-medium">Welcome</div>
          <div class="font-light">Please login to your account!</div>
        </div>
        <div
          class="box px-5 py-8 mt-10 max-w-[450px] relative before:content-[''] before:z-[-1] before:w-[95%] before:h-full before:bg-slate-200 before:border before:border-slate-200 before:-mt-5 before:absolute before:rounded-lg before:mx-auto before:inset-x-0 before:dark:bg-darkmode-600/70 before:dark:border-darkmode-500/60"
        >
          <input
            type="text"
            class="form-control py-3 px-4 block"
            placeholder="Email"
            v-model="auth.email"
          />
          <input
            type="password"
            class="form-control py-3 px-4 block mt-4"
            placeholder="Password"
            v-model="auth.password"
          />

          <div class="text-slate-500 flex text-xs sm:text-sm mt-4">
            <div class="flex items-center mr-auto">
              <input
                type="checkbox"
                class="form-check-input border mr-2"
                id="remember-me"
              />
              <label class="cursor-pointer select-none" for="remember-me"
              >Remember me</label
              >
            </div>
            <a href="">Forgot Password?</a>
          </div>
          <div class="mt-5 xl:mt-8 text-center xl:text-left">
            <button class="btn btn-primary w-full xl:mr-3" @click="login">Login</button>

          </div>
        </div>
      </div>
    </div>
  </div>
</template>



<script>
    import { mapActions } from 'vuex'

    // import Auth from '../../Auth.js';
    // import { useAuthStore } from "@/V2/stores/auth.store.js";

    // import DarkModeSwitcher from "../../components/dark-mode-switcher/Main.vue";
    // import MainColorSwitcher from "../../components/main-color-switcher/Main.vue";
    export default {
        name:"login",

        data() {
            return {
                auth:{
                    email:"",
                    password:""
                },
                validationErrors:{},
                processing:false
            };
        },

        methods: {
            ...mapActions({
                signIn:'auth/login'
            }),
           async login(){
                this.processing = true

                axios.get("/sanctum/csrf-cookie").then(response => {
                    console.log(response); //This is one success but it did set cookie in application cookie
                    axios
                    .post("/login",this.auth)
                    .then(res => {
                        this.signIn()

                        console.log(res);
                    }).catch(({response})=>{
                        if(response.status===422){
                            this.validationErrors = response.data.errors
                        }else{
                            this.validationErrors = {}
                            alert(response.data.message)
                        }
                    }).finally(()=>{
                        this.processing = false
                    }); // this one failed with 419 csrf token mismatch
                });

                // this.processing = true
                // await axios.get('/sanctum/csrf-cookie')
                // await axios.post('/login',this.auth).then(({data})=>{
                //     this.signIn()
                // }).catch(({response})=>{
                //     if(response.status===422){
                //         this.validationErrors = response.data.errors
                //     }else{
                //         this.validationErrors = {}
                //         alert(response.data.message)
                //     }
                // }).finally(()=>{
                //     this.processing = false
                // })
            },
        }
    }
</script>
