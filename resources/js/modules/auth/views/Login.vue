
<template>
  <div class="container">
    <!-- <SuccessNotification/> -->
    <vue3-progress />
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
        <form action="javascript:void(0)" method="post">

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
                <button :disabled="processing"  class="flex items-center btn btn-primary  w-full mr-1 mb-2"  @click="login">
                    <LoadingIcon :show="processing" icon="three-dots" color="white" class="w-4 h-4 mr-2" />
                    <Icon :show="!processing" color="white" class="w-4 h-4 mr-1" name="CheckSquare"/>Login
                </button>
            </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</template>



<script>
    import { mapActions } from 'vuex'

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

                axios.get(`${window.location.origin}/sanctum/csrf-cookie`).then(response => {
                    axios
                    .post("/login",this.auth)
                    .then(res => {
                        this.signIn()
                        this.$h.notify('Awesome!' , 'Login successfully');


                    }).catch(({response})=>{

                        if(response.status===422){
                            this.validationErrors = response.data.errors
                            for (const [key, value] of Object.entries(response.data.errors)) {
                                this.$h.errorNotify('Error' ,value[0] );
                            }

                        }else{
                            this.validationErrors = {}
                            this.$h.errorNotify('Error' ,response.data.message);
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
