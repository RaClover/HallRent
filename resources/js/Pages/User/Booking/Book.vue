<script>


import NavBarLayout from "@/Layouts/User/NavBarLayout.vue";
import Breadcrumb from "@/Components/User/Halls/Breadcrumb.vue";
import StepContent from "@/Pages/User/Booking/StepContent.vue";
import {Link, router, usePage} from "@inertiajs/vue3";


export default {
    components: {
        StepContent,
        Breadcrumb,
        NavBarLayout,
        Link,
        router
    },
    data() {
        return {
            currentStep: 1,
            // totalSteps: 4,
            stepLabels: ['Booking Details', 'Extras' ,  'Payment', 'Confirmation'],
        };
    },
    computed: {
        totalSteps() {
            return this.stepLabels.length;
        },
    },
    methods: {
        getStepLabel(step) {
            return this.stepLabels[step - 1];
        },
        saveStep1Data() {
            // Store form data in the session
            router.post(route('booking.book'),{
                // phone: this.phone,
                // email: this.email,
                // rental_time: this.rentalTime,
                // attendees: this.attendees,
            });
            this.currentStep = 2; // Move to the next step
        },
        saveStep2Data() {
            // Store form data in the session

            router.put(route('booking.book'),{
                // payment_type: this.paymentType,
                // payment_data: this.paymentData,
            });
            this.currentStep = 3; // Move to the next step
        },
        saveStep3Data() {
            // Submit form and save data to the database

            router.patch(route('booking.book'),{
                // confirmation_data: this.confirmationData,
            });
            // Redirect to a success page or show a success message
        },


        goBack() {
            // Go back to the previous step
            this.currentStep = this.currentStep - 1;
        },
    },
};
</script>

<template>
<NavBarLayout>
    <div class="flex flex-col items-center border-b bg-white py-4 sm:flex-row sm:px-10 lg:px-20 xl:px-32">

        <div class="mt-4 py-2 text-xs sm:mt-0 sm:ml-auto sm:text-base">
            <div class="relative">
                    <ul class="relative flex w-full items-center justify-between space-x-2 sm:space-x-4">
                        <li
                            v-for="(step, index) in totalSteps"
                            :key="step"
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
        <StepContent>
            <div class="py-8 lg:py-12 px-1 mx-auto max-w-screen-md mr-10">
                <div class="flex items-center justify-center p-12">
                    <!-- Author: FormBold Team -->
                    <div class="mx-auto w-full max-w-[550px]">
                            <div class="-mx-3 flex flex-wrap">
                                <div class="w-full px-3 sm:w-1/2">
                                    <div class="mb-5">
                                        <label
                                            for="fName"
                                            class="mb-3 block text-base font-medium text-[#07074D]"
                                        >
                                            First Name
                                        </label>
                                        <input
                                            type="text"
                                            name="fName"
                                            id="fName"
                                            placeholder="First Name"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                        />
                                    </div>
                                </div>
                                <div class="w-full px-3 sm:w-1/2">
                                    <div class="mb-5">
                                        <label
                                            for="lName"
                                            class="mb-3 block text-base font-medium text-[#07074D]"
                                        >
                                            Last Name
                                        </label>
                                        <input
                                            type="text"
                                            name="lName"
                                            id="lName"
                                            placeholder="Last Name"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="mb-5">
                                <label
                                    for="guest"
                                    class="mb-3 block text-base font-medium text-[#07074D]"
                                >
                                    How many guest are you bringing?
                                </label>
                                <input
                                    type="number"
                                    name="guest"
                                    id="guest"
                                    placeholder="5"
                                    min="0"
                                    class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                />
                            </div>

                            <div class="-mx-3 flex flex-wrap">
                                <div class="w-full px-3 sm:w-1/2">
                                    <div class="mb-5">
                                        <label
                                            for="date"
                                            class="mb-3 block text-base font-medium text-[#07074D]"
                                        >
                                            Date
                                        </label>
                                        <input
                                            type="date"
                                            name="date"
                                            id="date"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                        />
                                    </div>
                                </div>
                                <div class="w-full px-3 sm:w-1/2">
                                    <div class="mb-5">
                                        <label
                                            for="time"
                                            class="mb-3 block text-base font-medium text-[#07074D]"
                                        >
                                            Time
                                        </label>
                                        <input
                                            type="time"
                                            name="time"
                                            id="time"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                        />
                                    </div>
                                </div>
                            </div>

                            <div class="mb-5">
                                <label class="mb-3 block text-base font-medium text-[#07074D]">
                                    Are you coming to the event?
                                </label>
                                <div class="flex items-center space-x-6">
                                    <div class="flex items-center">
                                        <input
                                            type="radio"
                                            name="radio1"
                                            id="radioButton1"
                                            class="h-5 w-5"
                                        />
                                        <label
                                            for="radioButton1"
                                            class="pl-3 text-base font-medium text-[#07074D]"
                                        >
                                            Yes
                                        </label>
                                    </div>
                                    <div class="flex items-center">
                                        <input
                                            type="radio"
                                            name="radio1"
                                            id="radioButton2"
                                            class="h-5 w-5"
                                        />
                                        <label
                                            for="radioButton2"
                                            class="pl-3 text-base font-medium text-[#07074D]"
                                        >
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </StepContent>


        <div class="w-full h-16 bg-white fixed  bottom-0 flex justify-center justify-between text-white text-md pt-3 pb-20 " style="box-shadow: 3px 3px 8px 0px black">
            <div class="ml-20">
                <button
                    v-if="currentStep > 1"
                    @click="goBack"
                    class="px-6 py-3 bg-gray-500 text-white rounded">
                    Back
                </button>
            </div>
            <div class="mr-20">
                <button
                    type="submit"
                    class="px-6 py-3 bg-amber-600 text-white rounded">
                    Next
                </button>
            </div>
        </div>
        </form>
    </div>

    <!-- Step 2 -->
    <div v-if="currentStep === 2">








        <!-- Step 2 form fields -->
        <!-- Add form fields for payment type, payment data -->
        <!-- Handle form submission and store data in the session -->
        <form @submit.prevent="saveStep2Data">
            <!-- Form fields -->
            <div class="w-full h-16 bg-white fixed  bottom-0 flex justify-center justify-between text-white text-md pt-3 pb-20 " style="box-shadow: 3px 3px 8px 0px black">
                <div class="ml-20">
                    <button
                        v-if="currentStep > 1"
                        @click="goBack"
                        class="px-6 py-3 bg-gray-500 text-white rounded">
                        Back
                    </button>
                </div>
                <div class="mr-20">
                    <button
                        type="submit"
                        class="px-6 py-3 bg-amber-600 text-white rounded">
                        Next
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Step 3 -->
    <div v-if="currentStep === 3">
        <!-- Step 3 form fields -->
        <!-- Add form fields for confirmation data -->
        <!-- Handle form submission and save data to the database -->
        <form @submit.prevent="saveStep3Data">
            <!-- Form fields -->
            <div class="w-full h-16 bg-white fixed  bottom-0 flex justify-center justify-between text-white text-md pt-3 pb-20 " style="box-shadow: 3px 3px 8px 0px black">
                <div class="ml-20">
                    <button
                        v-if="currentStep > 1"
                        @click="goBack"
                        class="px-6 py-3 bg-gray-500 text-white rounded">
                        Back
                    </button>
                </div>
                <div class="mr-20">
                    <button
                        type="submit"
                        class="px-6 py-3 bg-amber-600 text-white rounded">
                        Next
                    </button>
                </div>
            </div>
        </form>
    </div>






</NavBarLayout>

</template>

<style scoped>

</style>
