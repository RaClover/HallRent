<script setup>
import NavBarLayout from "@/Layouts/User/NavBarLayout.vue";
import Breadcrumb from "@/Components/User/Halls/Breadcrumb.vue";
import {Link, router, useForm, usePage} from "@inertiajs/vue3";
import StepContentRight from "@/Pages/User/Booking/StepContentRight.vue"
import PartnerAuthenticatedLayout from "@/Layouts/Partner/PartnerAuthenticatedLayout.vue";
import {computed, ref} from "vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";


const currentStep = ref(1);
const stepLabels = ["Address", "HallData", "Types&Others", "Images", "Profile"];

const totalSteps = computed(() => stepLabels.length);

const getStepLabel = (step) => stepLabels[step - 1];

//forms

const form1 = useForm({
    type: '',
    city: '',
    state: '',
    zip: '',
    step: 1
});


const saveStep1Data = () => {
    // Perform form validation
    // Perform any necessary actions before redirecting to the next step
    form1.post(route("partner.hallList.store") );
    currentStep.value = 2; // Move to the next step
};

const saveStep2Data = () => {
    // Store form data in the session
    router.post(route("partner.hallList.store"));
    currentStep.value = 3; // Move to the next step
};

const saveStep3Data = () => {
    // Submit form and save data to the database
    router.post(route("partner.hallList.store"));
    currentStep.value = 4; // Move to the next step

    // Redirect to a success page or show a success message
};

const saveStep4Data = () => {
    // Submit form and save data to the database
    router.post(route("partner.hallList.store"));
    currentStep.value = 5; // Move to the next step

    // Redirect to a success page or show a success message
};

const saveStep5Data = () => {
    // Submit form and save data to the database
    router.post(route("partner.hallList.store"));

    // Redirect to a success page or show a success message
};

const goBack = () => {
    // Go back to the previous step
    currentStep.value -= 1;
};

// Component registration
defineProps({
    // Props here
});

defineEmits([
    // Emits here
]);

// Component imports
const components = {
    PartnerAuthenticatedLayout,
    StepContentRight,
    Breadcrumb,
    NavBarLayout,
    Link,
    router,
};
</script>

<template>
<PartnerAuthenticatedLayout>
    <div class="flex flex-col items-center border-b bg-white py-4 sm:flex-row sm:px-10 lg:px-20 xl:px-32">


        <div class="mt-4 py-2 text-xs sm:mt-0  sm:text-base">
            <div class="relative">
                <ul class="relative flex w-full items-center justify-between space-x-2 sm:space-x-4">
                    <li v-for="(step, index) in totalSteps" :key="step"
                        class="flex items-center space-x-3 text-left sm:space-x-4">
                        <a
                            :class="{
                    'flex h-6 w-6 items-center justify-center rounded-full bg-amber-600 ring-amber-600': currentStep === step,
                    'flex h-6 w-6 items-center justify-center rounded-full bg-gray-300 ring ring-gray-300 ring-offset-2': currentStep !== step
                  }"
                            class="flex h-6 w-6 items-center justify-center rounded-full bg-amber-600 ring-amber-600 text-xs font-semibold text-black ring  ring-offset-2"
                            href="#">
                            {{ step }}
                        </a>
                        <span class="font-semibold text-gray-900">{{ getStepLabel(step) }}</span>
                        <template v-if="index < totalSteps - 1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </template>
                    </li>
                </ul>
            </div>
        </div>
    </div>




    <!-- Step 1 -->
    <div v-if="currentStep === 1">
        <form @submit.prevent="saveStep1Data">
                    <div class="rounded-lg  bg-white ">
                        <div class="p-6 ">
                            <div class="pb-6 text-center border-b border-gray-100 dark:border-gray-300 ">
                                <h2 class="text-xl font-bold text-gray-800 md:text-3xl dark:text-black">
                                    Hall Address
                                </h2>


                                <h2 class="text-gray-800 md:text-md dark:text-black">
                                    Your hall’s address will not be displayed publicly on your  listing.
                                </h2>

                                <h2 class="text-gray-800 md:text-md dark:text-black">
                                   It will only be shared with a guest after they book the hall.
                                </h2>

                            </div>
                            <div class="py-6 dark:border-gray-800">
                                <div class="w-full md:w-10/12">
                                    <div class="flex flex-wrap -m-3">

                                        <div class="w-full p-3 md:flex-1">
                                            <div class="flex flex-wrap -m-3">
                                                <div class="w-full p-3 md:w-1/2">
                                                    <p class="mb-1.5 font-medium text-base text-gray-800 dark:text-black">
                                                        Type</p>
                                                    <select
                                                        required
                                                        v-model="form1.type"
                                                        class="appearence-none dark:text- dark:bg-white  dark:border-gray-800  w-full py-2.5 px-4 text-gray-700 text-base font-normal border border-gray-200 rounded-lg "
                                                        name="type" id="">
                                                        <option>type1</option>
                                                        <option>type2</option>
                                                        <option>type3</option>
                                                    </select>
<!--                                                    <span v-if="errors.type" class="text-red-500">{{ errors.type }}</span>-->
                                                    <InputError class="text-red-500" :message="form1.errors.type" />
                                                </div>
                                                <div class="w-full p-3 md:w-1/2">
                                                    <p class="mb-1.5 font-medium text-base text-gray-800 dark:text-black">
                                                        City</p>
                                                    <input
                                                        required
                                                        v-model="form1.city"
                                                        class="w-full px-4 py-2.5 dark:bg-white dark:border-gray-800 dark:placeholder-gray-500 dark:text-black  text-base text-gray-900 rounded-lg font-normal border border-gray-200"
                                                        type="text"
                                                        name="city"
                                                        placeholder="City">
<!--                                                    <span v-if="errors.city" class="text-red-500">{{ errors.city }}</span>-->
                                                    <InputError class="text-red-500" :message="form1.errors.city" />

                                                </div>
                                                <div class="w-full p-3 md:w-1/2">
                                                    <p class="mb-1.5 font-medium text-base text-gray-800 dark:text-black">
                                                        State / Province
                                                    </p>
                                                    <input
                                                        required
                                                        v-model="form1.state"
                                                        class="w-full px-4 py-2.5 dark:bg-white dark:border-gray-800 dark:placeholder-gray-500 dark:text-black  text-base text-gray-900 rounded-lg font-normal border border-gray-200"
                                                        type="text"
                                                        name="state"
                                                        placeholder="State / Province">
<!--                                                    <span v-if="errors.state" class="text-red-500">{{ errors.state }}</span>-->
                                                    <InputError class="text-red-500" :message="form1.errors.state" />

                                                </div>
                                                <div class="w-full p-3 md:w-1/2">
                                                    <p class="mb-1.5 font-medium text-base text-gray-800 dark:text-black">
                                                        ZIP / Postal code
                                                    </p>
                                                    <input
                                                        required
                                                        v-model="form1.zip"
                                                        class="w-full px-4 py-2.5 dark:bg-white dark:border-gray-800 dark:placeholder-gray-500 dark:text-black  text-base text-gray-900 rounded-lg font-normal border border-gray-200"
                                                        type="text"
                                                        name="zip"
                                                        placeholder="ZIP / Postal code">
<!--                                                    <span v-if="errors.zip" class="text-red-500">{{ errors.zip }}</span>-->
                                                    <InputError class="text-red-500" :message="form1.errors.zip" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <input type="hidden" name="step" v-model="form1.step"> <!-- Include the step parameter -->
            <div class="w-4/5 ml-10 h-16 bg-white fixed  bottom-0 flex  justify-between text-white text-md pt-3 pb-20 " style="box-shadow: 0px 0px 2px 0 white">
                <div class="ml-20">
                    <button v-if="currentStep > 1" @click="goBack" class="px-6 py-3 bg-gray-500 text-white rounded">
                        Back
                    </button>
                </div>
                <div class="mr-20">
                    <button type="submit" class="px-6 py-3 bg-amber-600 text-white rounded">
                        Next
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Step 2 -->
    <div v-if="currentStep === 2">
        <form @submit.prevent="saveStep2Data">
            <div class="rounded-lg  bg-white ">
                <div class="p-6 ">
                    <div class="pb-6 text-center border-b border-gray-100 dark:border-gray-300 ">
                        <h2 class="text-xl font-bold text-gray-800 md:text-3xl dark:text-black">
                            Hall Data
                        </h2>


                        <h2 class="text-gray-800 md:text-md dark:text-black">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, sed!
                        </h2>

                        <h2 class="text-gray-800 md:text-md dark:text-black">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, esse ex.
                        </h2>

                    </div>
                    <div class="py-6 dark:border-white">
                        <div class="w-full md:w-10/12">
                            <div class="flex flex-wrap -m-3">

                                <div class="w-full p-3 md:flex-1 pb-40">
                                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                                <label for="company_website" class="block text-sm font-medium text-gray-700">
                                                    Hall Name
                                                </label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <input type="text" name="company_website" id="company_website" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                                           placeholder="Hall Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="about" class="block text-sm font-medium text-gray-700">
                                                Hall Description
                                            </label>
                                            <div class="mt-1">
                                                <textarea id="about" name="about" rows="6"  class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
                                                          placeholder="Tell users mote about you hall"></textarea>
                                            </div>
                                        </div>


                                        <div class="mb-5">
                                            <label for="activity" class="mb-3 block text-base font-medium text-[#07074D]">
                                                Activity
                                            </label>
                                            <input type="text" name="activity" id="activity" placeholder="Type"
                                                   class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                                        </div>
                                        <div class="mb-5">
                                            <label for="guests" class="mb-3 block text-base font-medium text-[#07074D]">
                                                How many guests are you bringing?
                                            </label>
                                            <input type="number" name="guests" id="guests" placeholder="Max capacity is 100" min="0"  class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                                        </div>

                                        <div class="mb-5">
                                            <label class="mb-3 block text-base font-medium text-[#07074D]">
                                                Will alcohol be consumed?
                                            </label>
                                            <div class="flex items-center space-x-6">
                                                <div class="flex items-center">
                                                    <input type="radio" name="alcohol" id="radioButton1" value="Yes"  class="h-5 w-5"/>
                                                    <label for="radioButton1" class="pl-3 text-base font-medium text-[#07074D]">
                                                        Yes
                                                    </label>
                                                </div>
                                                <div class="flex items-center">
                                                    <input type="radio" name="alcohol" id="radioButton2" value="No"  class="h-5 w-5"/>
                                                    <label for="radioButton2" class="pl-3 text-base font-medium text-[#07074D]">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <input type="hidden" name="step" value="2"> <!-- Include the step parameter -->
            <!-- Form fields -->
            <div class="w-4/5 ml-10 h-16 bg-white fixed  bottom-0 flex  justify-between text-white text-md pt-3 pb-20 ">
                <div class="ml-20">
                    <button v-if="currentStep > 1" @click="goBack" class="px-6 py-3 bg-gray-500 text-white rounded">
                        Back
                    </button>
                </div>
                <div class="mr-20">
                    <button type="submit" class="px-6 py-3 bg-amber-600 text-white rounded">
                        Next
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Step 3 -->
    <div v-if="currentStep === 3">
        <form @submit.prevent="saveStep3Data">
            <input type="hidden" name="step" value="3"> <!-- Include the step parameter -->
            <!-- Form fields -->
            <div class="w-4/5 ml-10 h-16 bg-white fixed  bottom-0 flex  justify-between text-white text-md pt-3 pb-20 " style="box-shadow: 0px 0px 2px 0 white">
                <div class="ml-20">
                    <button v-if="currentStep > 1" @click="goBack" class="px-6 py-3 bg-gray-500 text-white rounded">
                        Back
                    </button>
                </div>
                <div class="mr-20">
                    <button type="submit" class="px-6 py-3 bg-amber-600 text-white rounded">
                        Next
                    </button>
                </div>
            </div>
        </form>
    </div>





    <!-- Step 4 -->
    <div v-if="currentStep === 4">
        <form @submit.prevent="saveStep4Data">
            <input type="hidden" name="step" value="4"> <!-- Include the step parameter -->
            <!-- Form fields -->
            <div class="w-4/5 ml-10 h-16 bg-white fixed  bottom-0 flex  justify-between text-white text-md pt-3 pb-20 " style="box-shadow: 0px 0px 2px 0 white">
                <div class="ml-20">
                    <button v-if="currentStep > 1" @click="goBack" class="px-6 py-3 bg-gray-500 text-white rounded">
                        Back
                    </button>
                </div>
                <div class="mr-20">
                    <button type="submit" class="px-6 py-3 bg-amber-600 text-white rounded">
                        Next
                    </button>
                </div>
            </div>

        </form>
    </div>



    <!-- Step 5 -->
    <div v-if="currentStep === 5">
        <form @submit.prevent="saveStep5Data">
            <input type="hidden" name="step" value="5"> <!-- Include the step parameter -->
            <!-- Form fields -->
            <div class="w-4/5 ml-10 h-16 bg-white fixed  bottom-0 flex  justify-between text-white text-md pt-3 pb-20 " style="box-shadow: 0px 0px 2px 0 white">
                <div class="ml-20">
                    <button v-if="currentStep > 1" @click="goBack" class="px-6 py-3 bg-gray-500 text-white rounded">
                        Back
                    </button>
                </div>
                <div class="mr-20">
                    <button type="submit" class="px-6 py-3 bg-amber-600 text-white rounded">
                        Next
                    </button>
                </div>
            </div>
        </form>
    </div>
</PartnerAuthenticatedLayout>
</template>

<style scoped>

</style>
