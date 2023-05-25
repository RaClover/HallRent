    <script>
    import NavBarLayout from "@/Layouts/User/NavBarLayout.vue";
    import Breadcrumb from "@/Components/User/Halls/Breadcrumb.vue";
    import { Link, router, usePage } from "@inertiajs/vue3";
    import StepContentRight from "@/Pages/User/Booking/StepContentRight.vue"
    export default {
        components: {
            StepContentRight,
            Breadcrumb,
            NavBarLayout,
            Link,
            router,
        },
        props: {
            selectedDate: String,
            selectedStartTime: String,
            selectedEndTime: String,
            hall: Object,
            type: Object,
            images: Object,
            address: Object,
        },
        data() {
            return {
                currentStep: 1,
                stepLabels: ["Booking Details", "Extras", "Payment", "Confirmation"],
                step1Data: {
                    activity: "",
                    guests: null,
                    date: this.selectedDate,
                    startTime: this.selectedStartTime,
                    endTime: this.selectedEndTime,
                    alcohol: "",
                },
                errors: {
                    activity: "",
                    guests: "",
                    alcohol: "",
                },
            };
        },
        computed: {
            totalSteps() {
                return this.stepLabels.length;
            },
            isStep1InputsFilled() {
                return (
                    this.step1Data.activity &&
                    this.step1Data.guests &&
                    this.step1Data.alcohol
                );
            },
        },
        methods: {
            getStepLabel(step) {
                return this.stepLabels[step - 1];
            },
            saveStep1Data() {
                if (this.isStep1InputsFilled) {
                    // Perform any necessary actions before redirecting to the next step
                    this.$inertia.post(route("booking.book" , {hall: this.hall}) , {
                        activity: this.step1Data.activity,
                        guests: this.step1Data.guests,
                        date: this.step1Data.date,
                        startTime: this.step1Data.startTime,
                        endTime: this.step1Data.endTime,
                        alcohol: this.step1Data.alcohol,
                    });
                    // Update the props with the selected values
                    this.$emit("update:selectedDate", this.step1Data.date);
                    this.$emit("update:selectedStartTime", this.step1Data.startTime);
                    this.$emit("update:selectedEndTime", this.step1Data.endTime);

                    this.currentStep = 2; // Move to the next step
                } else {
                    this.validateInputsStep1();
                }
            },
            validateInputsStep1() {
                this.errors = {
                    activity: "",
                    guests: "",
                    alcohol: "",
                };
                if (!this.step1Data.activity) {
                    this.errors.activity = "Please enter an activity";
                }

                if (!this.step1Data.guests) {
                    this.errors.guests = "Please enter the number of attendees.";
                }
                if (!this.step1Data.alcohol) {
                    this.errors.alcohol = "Please select an option.";
                }
            },
            saveStep2Data() {
                // Store form data in the session

                router.put(route("booking.book"), {
                    // payment_type: this.paymentType,
                    // payment_data: this.paymentData,
                });
                this.currentStep = 3; // Move to the next step
            },
            saveStep3Data() {
                // Submit form and save data to the database
                router.patch(route("booking.book"), {
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
        <StepContentRight :hall="hall" :type="type"  :images="images" :address="address" :date="selectedDate" :start-time="selectedStartTime" :end-time="selectedEndTime">
            <div class="py-8 lg:py-12 px-1 mx-auto max-w-screen-md mr-40">
                <div class="flex items-center justify-center p-12">
                    <!-- Author: FormBold Team -->
                    <div class="mx-auto w-full max-w-[550px]">
                        <div class="mb-5">
                            <label for="activity" class="mb-3 block text-base font-medium text-[#07074D]">
                                Activity
                            </label>
                            <input type="text" name="activity" id="activity" placeholder="Type" v-model="step1Data.activity" class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                            <p class="text-red-500 text-sm">{{ errors.activity }}</p>
                        </div>
                        <div class="mb-5">
                            <label for="guests" class="mb-3 block text-base font-medium text-[#07074D]">
                                How many guests are you bringing?
                            </label>
                            <input type="number" name="guests" id="guests" placeholder="Max capacity is 100" min="0" v-model="step1Data.guests" class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                            <p class="text-red-500 text-sm">{{ errors.guests }}</p>
                        </div>

                        <div class="mb-5">
                            <label class="mb-3 block text-base font-medium text-[#07074D]">
                                Will alcohol be consumed?
                            </label>
                            <div class="flex items-center space-x-6">
                                <div class="flex items-center">
                                    <input type="radio" name="alcohol" id="radioButton1" value="Yes" v-model="step1Data.alcohol" class="h-5 w-5"/>
                                    <label for="radioButton1" class="pl-3 text-base font-medium text-[#07074D]">
                                        Yes
                                    </label>
                                </div>
                                <div class="flex items-center">
                                    <input type="radio" name="alcohol" id="radioButton2" value="No" v-model="step1Data.alcohol" class="h-5 w-5"/>
                                    <label for="radioButton2" class="pl-3 text-base font-medium text-[#07074D]">
                                        No
                                    </label>
                                </div>
                            </div>
                            <p class="text-red-500 text-sm">{{ errors.alcohol }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </StepContentRight>
        <div class="w-full h-16 bg-white fixed  bottom-0 flex  justify-between text-white text-md pt-3 pb-20 " style="box-shadow: 3px 3px 8px 0px black">
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
        <!-- Step 2 form fields -->
        <!-- Add form fields for payment type, payment data -->
        <!-- Handle form submission and store data in the session -->
        <form @submit.prevent="saveStep2Data">

            <section
                class="h-screen bg-center bg-no-repeat bg-cover  from-blue-500 via-blue-400 to-green-200 dark:from-white: font-poppins">
                <div class="flex items-center h-screen">
                    <div class="container relative justify-center px-4 mx-auto text-center">

                        <h2 class="mb-8 text-2xl font-semibold text-gray-100 lg:text-4xl dark:text-gray-400">Not extras for this hall
                        </h2>
                        <p class="mb-8 text-xl text-gray-200 dark:text-gray-400">
                            Press next to go to the next step...
                        </p>
                    </div>
                </div>
            </section>

            <!-- Form fields -->
            <div class="w-full h-16 bg-white fixed  bottom-0 flex  justify-between text-white text-md pt-3 pb-20 " style="box-shadow: 3px 3px 8px 0px black">
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
            <StepContentRight>
                <div class=" bg-white w-full mt-20 ">
                    <p class="text-xl font-medium">Payment Details</p>
                    <p class="text-gray-400">Complete your order by providing your payment details.</p>
                    <div class="">
                        <label for="email" class="mt-4 mb-2 block text-sm font-medium">Email</label>
                        <div class="relative">
                            <input type="text" id="email" name="email" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="your.email@gmail.com" />
                            <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                            </div>
                        </div>
                        <div class="mb-1 mt-20">
                            <label class="relative inline-flex mb-5 mr-16   items-center">
                                <input class="relative ml-10 appearance-none" type="checkbox">
                                <span class="ml-2 text-lg text-gray-400 leading-3">Credit card</span>
                            </label>
                            <label class="relative inline-flex mb-5 mr-16 items-center">
                                <input class="relative ml-10 appearance-none" type="checkbox">

                                <span class="ml-2 text-lg text-gray-400 leading-3">Debit card</span>
                            </label>
                            <label class="relative inline-flex mb-5 items-center">
                                <input class="relative ml-10 appearance-none" type="checkbox">

                                <span class="ml-2 text-lg text-gray-400 leading-3">PayPal</span>
                            </label>
                        </div>


                        <label for="card-holder" class="mt-4 mb-2 block text-sm font-medium">Card Holder</label>
                        <div class="relative">
                            <input type="text" id="card-holder" name="card-holder" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm uppercase shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="Your full name here" />
                            <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                                </svg>
                            </div>
                        </div>

                        <label for="card-no" class="mt-4 mb-2 block text-sm font-medium">Card Details</label>
                        <div class="flex">
                            <div class="relative w-7/12 flex-shrink-0">
                                <input type="text" id="card-no" name="card-no" class="w-full rounded-md border border-gray-200 px-2 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="xxxx-xxxx-xxxx-xxxx" />
                                <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                                    <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M11 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1z" />
                                        <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2zm13 2v5H1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm-1 9H2a1 1 0 0 1-1-1v-1h14v1a1 1 0 0 1-1 1z" />
                                    </svg>
                                </div>
                            </div>
                            <input type="text" name="credit-expiry" class="w-full rounded-md border border-gray-200 px-2 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="MM/YY" />
                            <input type="text" name="credit-cvc" class="w-1/6 flex-shrink-0 rounded-md border border-gray-200 px-2 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="CVC" />
                        </div>
                        <label for="billing-address" class="mt-4 mb-2 block text-sm font-medium">Billing Address</label>
                        <div class="flex flex-col sm:flex-row">
                            <div class="relative flex-shrink-0 sm:w-7/12">
                                <input type="text" id="billing-address" name="billing-address" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="Street Address" />
                                <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                                    <img class="h-4 w-4 object-contain" src="https://flagpack.xyz/_nuxt/4c829b6c0131de7162790d2f897a90fd.svg" alt="" />
                                </div>
                            </div>
                            <select type="text" name="billing-state" class="w-full rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500">
                                <option value="State">State</option>
                            </select>
                            <input type="text" name="billing-zip" class="flex-shrink-0 rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none sm:w-1/6 focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="ZIP" />
                        </div>

                    </div>
                </div>

            </StepContentRight>
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
