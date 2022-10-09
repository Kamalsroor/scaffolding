<template>
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-9">
            <Alert class="alert-warning grid grid-cols-1 mt-6 gap-2 items-center" v-slot="{ dismiss }">
                <div class="flex items-center">
                    <EditIcon class="w-5 h-5 mr-2" />
                    <h2 class="font-bold">Your Profile is NOT completed</h2>
                </div>
                <p>
                    Please add the missing details for better WSA Rate. <a href="#" class="font-medium">click here to Edit  your profile</a>
                </p>
                <button type="button" class="btn-close" aria-label="Close" @click="dismiss">
                    <XIcon class="w-4 h-4" />
                </button>
            </Alert>
            <Alert class="alert-danger grid grid-cols-1 mt-6 gap-2 items-center" v-slot="{ dismiss }">
                <div class="flex items-center">
                    <AlertOctagonIcon class="w-5 h-5 mr-2" />
                    <h2 class="font-semibold">Your Membership will expire in 28 days,  <Link to="#">Renew Your Membership</Link></h2>
                </div>
                <p>
                    You can renew your membership by visiting <a href="#" class="font-medium ml-1">Renewal Section</a>. if you think this is a mistake please contact <a href="#" class="font-medium ml-1">WSA Support</a>
                </p>
                <button type="button" class="btn-close" aria-label="Close" @click="dismiss">
                    <XIcon class="w-4 h-4 text-white/75" />
                </button>
            </Alert>
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: General Report -->
                <div class="col-span-12 mt-6">
                    <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5 flex items-center">
                            <UserIcon class="h-5 w-5 mr-2" />
                            Member Overview
                        </h2>
                    </div>
                    <div class="intro-y report-box mt-12 sm:mt-4">
                        <div class="box py-0 xl:py-5 grid grid-cols-12 gap-0 divide-y xl:divide-y-0 divide-x divide-dashed divide-slate-200 dark:divide-white/5">
                            <div class="report-box__item py-5 xl:py-0 px-5 col-span-12 sm:col-span-6 xl:col-span-3">
                                <div class="report-box__content">
                                    <div class="flex items-center">
                                        <div class="report-box__item__icon text-success bg-success/20 border border-success/20 flex items-center justify-center rounded-full">
                                            <DollarSignIcon />
                                        </div>
                                        <div class="ml-auto">
                                            <Tippy tag="div"
                                                   class="report-box__item__indicator text-primary cursor-pointer"
                                                   content="You can use in WSA Payments with other members and services">
                                                View All Orders
                                            </Tippy>
                                        </div>
                                    </div>
                                    <div class="text-slate-500 mt-6"><span class="font-semibold">Total</span> Orders Payments</div>
                                    <div class="text-2xl font-medium leading-7 mt-1">$11490</div>
                                </div>
                            </div>
                            <div class="report-box__item py-5 xl:py-0 px-5 sm:!border-t-0 col-span-12 sm:col-span-6 xl:col-span-3">
                                <div class="report-box__content">
                                    <div class="flex items-center">
                                        <div
                                            class="report-box__item__icon text-success bg-success/20 border border-success/20 flex items-center justify-center rounded-full">
                                            <CalendarIcon />
                                        </div>
                                        <div class="ml-auto">
                                            <Tippy tag="div"
                                                   class="report-box__item__indicator text-primary cursor-pointer"
                                                   content="An Email will be sent 60 days before your WSA subscription ends for reminder">
                                                244 Days Left
                                            </Tippy>
                                        </div>
                                    </div>
                                    <div class="text-slate-500 mt-6"><span class="font-semibold">Membership</span> Valid Until</div>
                                    <div class="text-2xl font-medium leading-7 mt-1">15 October, 2022</div>
                                </div>
                            </div>
                            <div class="report-box__item py-5 xl:py-0 px-5 col-span-12 sm:col-span-6 xl:col-span-3">
                                <div class="report-box__content">
                                    <div class="flex items-center">
                                        <div
                                            class="report-box__item__icon text-danger bg-danger/20 border border-danger/20 flex items-center justify-center rounded-full">
                                            <ShieldIcon />
                                        </div>
                                        <div class="ml-auto">
                                            <Tippy tag="div"
                                                   class="report-box__item__indicator text-success cursor-pointer"
                                                   content="Upgrade your plan and enjoy WSA Financial Protection Program to guarantee your deals is secured">
                                                Upgrade
                                            </Tippy>
                                        </div>
                                    </div>
                                    <Tippy tag="div"
                                           class="text-danger mt-6 font-semibold"
                                           content="WSA Financial Protection Program  is Not Active. Upgrade to to guarantee your deals is secured">
                                        Financial Protection Program
                                    </Tippy>
                                    <div class="text-2xl font-medium leading-7 mt-1"><span class="font-light text-sm">Up To  </span>50,000<span class="font-light text-sm"> USD</span></div>
                                </div>
                            </div>
                            <div class="report-box__item py-5 xl:py-0 px-5 col-span-12 sm:col-span-6 xl:col-span-3">
                                <div class="report-box__content">
                                    <div class="flex items-center">
                                        <div
                                            class="report-box__item__icon text-success bg-success/20 border border-success/20 flex items-center justify-center rounded-full">
                                            <StarIcon />
                                        </div>
                                        <div class="ml-auto">
                                            <Tippy tag="div"
                                                   class="report-box__item__indicator text-primary cursor-pointer"
                                                   content="This rate is based on your activities in WSA such as view others member's profiles and making requests... Click to learn more">
                                                Learn More...
                                            </Tippy>
                                        </div>
                                    </div>
                                    <div class="text-slate-500 mt-6">WSA <span class="font-semibold">Activity Rate</span></div>
                                    <div class="text-2xl font-medium leading-7 mt-1">95%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: General Report -->
            </div>
        </div>
        <div class="col-span-12 2xl:col-span-3">
            <div class="2xl:border-l border-slate-300/50 h-full 2xl:pt-6 pb-6">
                <div class="2xl:pl-6 grid grid-cols-12 gap-x-6 gap-y-8">
                    <!-- BEGIN: Rate Progress -->
                    <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12">
                        <div class="intro-x flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5 flex items-center">
                                <BarChartIcon class="h-5 w-5 mr-2" />
                                Your Weekly Progress
                            </h2>
                            <a href="#" class="ml-auto text-sm text-slate-500 truncate">Learn More</a>
                        </div>
                        <div class="mt-4">
                            <div class="intro-x">
                                <div class="box px-5 py-3 flex items-center mb-3">
                                    <div class="mr-auto w-full">
                                        <div class="font-medium group-hover:text-white flex items-start">
                                            <UserIcon class="h-5 w-5 mr-2" />
                                            Profile Completion
                                        </div>
                                        <div class="progress h-4 mt-2">
                                            <div class="progress-bar w-10/12" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                83%
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box px-5 py-3 flex items-center mb-3">
                                    <div class="mr-auto w-full">
                                        <div class="font-medium group-hover:text-white flex items-start">
                                            <EyeIcon class="h-5 w-5 mr-2" />
                                            Add your active service ports
                                        </div>
                                        <div class="progress h-4 mt-2">
                                            <div class="progress-bar w-8/12" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                67%
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box px-5 py-3 flex items-center mb-3">
                                    <div class="mr-auto w-full">
                                        <div class="font-medium group-hover:text-white flex items-start">
                                            <UsersIcon class="h-5 w-5 mr-2" />
                                            Add More Contact Persons
                                        </div>
                                        <div class="progress h-4 mt-2">
                                            <div class="progress-bar w-4/12" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                33%
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box px-5 py-3 flex items-center mb-3">
                                    <div class="mr-auto w-full">
                                        <div class="font-medium group-hover:text-white flex items-start">
                                            <FileTextIcon class="h-5 w-5 mr-2" />
                                            Make a Rate request
                                        </div>
                                        <div class="progress h-4 mt-2">
                                            <div class="progress-bar w-1/12" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                0%
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box px-5 py-3 flex items-center mb-3">
                                    <div class="mr-auto w-full">
                                        <div class="font-medium group-hover:text-white flex items-start">
                                            <FileTextIcon class="h-5 w-5 mr-2" />
                                            Reply to a Rate request
                                        </div>
                                        <div class="progress h-4 mt-2">
                                            <div class="progress-bar w-1/12" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                0%
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box px-5 py-3 flex items-center mb-3">
                                    <div class="mr-auto w-full">
                                        <div class="font-medium text-success flex items-start">
                                            <ShieldIcon class="h-5 w-5 mr-2" />
                                            Financial Protection Program
                                        </div>
                                        <div class="progress h-4 mt-2">
                                            <div class="progress-bar w-12/12 bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                100%
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Rate Progress -->
                    <!-- BEGIN: Services Slider -->
                    <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12">
                        <div class="intro-x flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5 flex items-center">
                                <StarIcon class="h-5 w-5 mr-2" />
                                WSA Services
                            </h2>
                        </div>
                        <div class="pb-8">
                            <TinySlider :options="{mode:gallery, controls: false, nav: true, speed: 500}">
                                <div class="h-64 mt-4">
                                    <div class="h-full image-fit rounded-md overflow-hidden">
                                        <a href="#" title="WSA Service 01">
                                            <img alt="World Shipping Alliance Title 01" class="image-fit h-64 w-full rounded-md" :src="'https://via.placeholder.com/500'" />
                                        </a>
                                    </div>
                                </div>
                                <div class="h-64 mt-4">
                                    <div class="h-full image-fit rounded-md overflow-hidden">
                                        <a href="#" title="WSA Service 02">
                                            <img alt="World Shipping Alliance Title 02" class="image-fit h-64 w-full rounded-md" :src="'https://via.placeholder.com/500'" />
                                        </a>
                                    </div>
                                </div>
                                <div class="h-64 mt-4">
                                    <div class="h-full image-fit rounded-md overflow-hidden">
                                        <a href="#" title="WSA Service 03">
                                            <img alt="World Shipping Alliance Title 03" class="image-fit h-64 w-full rounded-md" :src="'https://via.placeholder.com/500'" />
                                        </a>
                                    </div>
                                </div>
                            </TinySlider>
                        </div>
                    </div>
                    <!-- END: Services Slider -->
                    <!-- BEGIN: Transactions -->
                    <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12">
                        <div class="intro-x flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5 flex items-center">
                                <FileTextIcon class="h-5 w-5 mr-2" />
                                Recent News
                            </h2>
                        </div>
                        <div class="mt-4">
                            <div class="intro-x">
                                <div class="box px-5 py-3 flex items-center zoom-in mb-3 hover:bg-primary group">
                                    <div class="mr-auto">
                                        <div class="font-medium group-hover:text-white flex items-start">
                                            <FileTextIcon class="h-5 w-5 mr-2" />
                                            News Title goes here
                                        </div>
                                        <div class="text-slate-500 text-xs mt-1 group-hover:text-blue-200 flex items-center">
                                            <CalendarIcon class="h-4 w-4 mr-2" />
                                            15 September, 2022
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="" class="intro-x btn w-full py-3 border-dashed border-slate-300 dark:border-darkmode-300">View More</a>
                        </div>
                    </div>
                    <!-- END: Transactions -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {

  data() {
    return {

    };
  },
  methods: {

  },
  created() {

  },

};

</script>
