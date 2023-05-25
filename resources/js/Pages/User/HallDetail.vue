<script>
import NavBarLayout from "@/Layouts/User/NavBarLayout.vue";
import {Link, router} from "@inertiajs/vue3";
import Breadcrumb from "@/Components/User/Halls/Breadcrumb.vue";
import FooterLayout from "@/Layouts/User/FooterLayout.vue";
import Description from "@/Components/User/HallDetailParts/Description.vue";
import Reviews from "@/Components/User/HallDetailParts/Reviews.vue";
import {ref} from "vue";
import VueTailwindDatepicker from 'vue-tailwind-datepicker';
import GallaryModal from "@/Components/User/HallDetailParts/GallaryModal.vue";
import {get} from "@inertiajs/inertia";

export default {
    name: "HallDetail",

    components: {
        GallaryModal,
        Reviews,
        Description,
        FooterLayout,
        Breadcrumb,
        NavBarLayout,
        Link,
        ref,
    },


    props: {
        hall: Object,
        user: Object,
        images: Array,
        similarHalls: Object

    } ,

    data() {
        return {
            activeTab: 'description',
            showModal: false,
            currentImageIndex: 0,
            bookingData: {
                date: '',
                startTime: '',
                endTime: '',
            },
            errors: {
                date: '',
                startTime: '',
                endTime: '',
            },
        }
    },
    computed: {
        currentImage() {
            if (this.images && this.images.length > 0) {
                return this.images[this.currentImageIndex];
            }
            return null;
        },
        isInputsFilled() {
            return (
                this.bookingData.date &&
                this.bookingData.startTime &&
                this.bookingData.endTime
            );
        },
    },

    methods: {
        get() {
            return get
        },
        router() {
            return router
        },

        nextImage() {
            if (this.images && this.currentImageIndex < this.images.length - 1) {
                this.currentImageIndex++;
            }
        },
        prevImage() {
            if (this.images && this.currentImageIndex > 0) {
                this.currentImageIndex--;
            }
        },
        openGallery(index) {
            this.currentImageIndex = index;
            this.showModal = true;
        },

        getBookingUrl() {
            if (this.isInputsFilled) {
                // Perform any necessary actions before redirecting to the booking page
                this.$inertia.get(route('booking.book' , {hall: this.$props.hall}) , {
                    date: this.bookingData.date,
                    startTime: this.bookingData.startTime,
                    endTime: this.bookingData.endTime
                });
            } else {
                this.validateInputs();
            }
        },
        validateInputs() {
            this.errors = {
                date: '',
                startTime: '',
                endTime: '',
            };
            if (!this.bookingData.date) {
                this.errors.date = 'Please select a day';
            }
            if (!this.bookingData.startTime) {
                this.errors.startTime = 'Please select a start time';
            }
            if (!this.bookingData.endTime) {
                this.errors.endTime = 'Please select an end time';
            }
        },

    },

}
</script>

<template>
    <NavBarLayout>


        <section class="">
            <div class="container  mx-auto">
                <div class="max-w-xl lg:max-w-7xl mx-auto">
                    <Breadcrumb/>
                    <div class="flex flex-wrap">
                        <div class="w-full   mb-8 md:w-1/2 md:mb-0 left-0 ">
                            <div class="relative mb-6 mt-10">
                                <a
                                    class="absolute left-0   transform lg:ml-2 top-1/3 translate-1/2"
                                    href="#"
                                    @click.prevent="prevImage"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="w-10 h-20 mt-4 text-blue-600 bi bi-chevron-left dark:text-amber-400 hover:text-amber-700"
                                         viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                              d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"></path>
                                    </svg>
                                </a>

                                <img
                                    @click.prevent="openGallery(currentImageIndex)"
                                    v-if="currentImage"
                                    class="object-cover border border-gray-500 rounded-md w-full"
                                    :src="currentImage.img"
                                    alt="">
                                <a
                                    class="absolute  right-0 transform lg:mr-2 top-1/3 translate-1/2"
                                    href="#"
                                    @click.prevent="nextImage"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="w-10 h-20 mb-10 text-amber-500 bi bi-chevron-right dark:text-amber-400 hover:text-amber-700 "
                                         viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                              d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"></path>
                                    </svg>
                                </a>


                                <div class="flex-wrap md:flex mt-4">
                                    <template v-for="(image, index) in images">
                                        <div v-if="index < 3" class="w-1/2 p-2 sm:w-1/4">
                                            <a
                                                class="block border border-transparent"
                                                href="#"
                                                @click.prevent="currentImageIndex = index"
                                            >
                                                <img class="object-cover w-full lg:h-32 border border-gray-500 rounded-md" :src="image.img" alt="">
                                            </a>
                                        </div>
                                        <div v-else-if="index === 3" class="w-1/2 p-2 sm:w-1/4 relative">
                                            <a
                                                @click.prevent="openGallery(index)"
                                                class="block border border-transparent"
                                                href="#"
                                            >
                                                <img class="object-cover w-full lg:h-32 border border-gray-500 rounded-md opacity-50" :src="image.img" alt="">
                                                <div class="absolute inset-0 flex items-center justify-center text-gray-700 font-bold">
                                                    {{ images.length - 3 }} more images
                                                </div>
                                            </a>
                                        </div>
                                    </template>
                                </div>
                            </div>
                            <GallaryModal :show="showModal" :images="images" :currentImageIndex="currentImageIndex" @close="showModal = false" />
                            <div class="px-6 pb-6 mt-6 border-t border-gray-300 dark:border-gray-400 ">
                                <div class="flex items-center justify-center mt-6">
<span class="mr-3">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
     class="w-5 h-5 text-blue-700 dark:text-gray-400 bi bi-chat-left-dots-fill" viewBox="0 0 16 16">
<path
    d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm5 4a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"></path>
</svg>
</span>
                                    <div>
                                        <h2 class="text-sm font-bold text-black lg:text-lg dark:text-black">
                                            Have a question  ? </h2>
                                        <a class="text-xs text-blue-400 lg:text-sm dark:text-blue-400" href="#">
                                            Contact with us
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-full py-14 md:w-1/2 right-0 ">
                            <div class="lg:pl-20">

                                <Link
                                    :href="route('userPortfolio' , {user: user})"
                                    class="flex items-center justify-center mb-5 gap-x-10 bg-gray-200  pr-64 rounded-2xl motion-safe:hover:scale-[1.01]">
                                    <div class="relative w-24 h-24 rounded-full">

                                        <img
                                            class="object-cover w-20 h-20 mt-2 rounded-full"
                                            src="https://i.postimg.cc/KvrSzTxg/alexandru-zdrobau-dj-RG1v-B1pw-unsplash.jpg"
                                            alt="">
                                    </div>
                                    <div class="info">
                                        <h2 class="text-lg font-bold text-black dark:text-black">
                                          {{user.name}}
                                        </h2>
                                        <span class="flex mt-2 text-orange-500 gap-x-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                         class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                         class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                         class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                         class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                         class="bi bi-star" viewBox="0 0 16 16">
                                        <path
                                            d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                    </svg>
                                </span>
                                    </div>
                                </Link>



                                <div class="mt-6">
                                    <div class="-mx-3 flex flex-wrap">
                                        <div class="w-full px-3 sm:w-1/2">
                                            <div class="mb-5">
                                                <label for="date" class="mb-3 block text-base font-medium text-[#07074D]">
                                                    Date
                                                </label>
                                                <input
                                                    v-model="bookingData.date"
                                                    type="date"
                                                    name="date"
                                                    id="date"
                                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                                />
                                                <p v-if="errors.date" class="text-red-500">{{ errors.date }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="-mx-3 flex flex-wrap">
                                        <div class="w-full px-3 sm:w-1/2">
                                            <div class="mb-5">
                                                <label for="time" class="mb-3 block text-base font-medium text-[#07074D]">
                                                    Start time
                                                </label>
                                                <input
                                                    v-model="bookingData.startTime"
                                                    type="time"
                                                    name="startTime"
                                                    id="time"
                                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                                />
                                                <p v-if="errors.startTime" class="text-red-500">{{ errors.startTime }}</p>
                                            </div>
                                        </div>
                                        <div class="w-full px-3 sm:w-1/2">
                                            <div class="mb-5">
                                                <label for="endTime" class="mb-3 block text-base font-medium text-[#07074D]">
                                                    End time
                                                </label>
                                                <input
                                                    v-model="bookingData.endTime"
                                                    type="time"
                                                    name="endTime"
                                                    id="endTime"
                                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                                />
                                                <p v-if="errors.endTime" class="text-red-500">{{ errors.endTime }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-6">
                                        <button

                                            class="w-full px-4 py-2 font-bold text-white bg-amber-600 lg:w-96 hover:bg-amber-600"
                                            @click="getBookingUrl"
                                        >
                                            Start Booking
                                        </button>
                                    </div>
                                </div>

                                <div class="flex items-center mt-6 ">
                                    <div>
                                        <h2 class="mb-2 text-lg font-bold text-gray-700 dark:text-black">
                                            Still deciding?
                                        </h2>
                                        <p class="mb-2 text-sm dark:text-gray-700">
                                            Add this hall to your wishlist and easily come back
                                            to it later </p>
                                    </div>
                                    <span class="ml-6">
<!--                                            <span class="absolute top-0 right-0 inline-flex mt-3 ml-3 px-3 py-2 rounded-lg z-10  text-sm font-medium text-white select-none">-->
                                         <Link class="text-gray-400 hover:text-pink-500 p-1 rounded-full"
                                                 title="Add to Wishlist">
                                            <svg

                                                class="w-8 h-8" viewBox="0 0 24 24">
                                                <path fill="currentColor" d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z" />
                                            </svg>
                                        </Link>
<!--		                                 </span>-->
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div>
                        <div class=" mt-14 mb-10 border-b-2 border-black">
                            <div class="flex flex-col md:flex-row -mb-px">
                                <button
                                    class="inline-block px-2 pb-2 mb-3 md:mb-0 text-lg font-black"
                                    :class="{ 'text-indigo-500 border-b-4 border-indigo-500': activeTab === 'description' }"
                                    @click.prevent="activeTab = 'description'">
                                    Description
                                </button>
                                <button
                                    class="inline-block px-2 pb-2 mb-3 md:mb-0 text-lg font-bold"
                                    :class="{ 'text-indigo-500 border-b-4 border-indigo-500': activeTab === 'reviews' }"
                                    @click.prevent="activeTab = 'reviews'"
                                >
                                    Customer Reviews
                                </button>
                            </div>
                        </div>
                        <div class="mb-20">
                            <div v-if="activeTab === 'description'">
                               <Description/>
                            </div>
                            <div v-if="activeTab === 'reviews'">
                                <Reviews/>
                            </div>
                            <div v-if="activeTab === 'shipping'">
                                <p class="text-lg font-bold">
                                    This is the content of the Shipping &amp; Returns tab
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--        similar halls section -->
        <section class="bg-gray-300 dark:bg-gray-50">
            <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-2">
                <div class="max-w-screen-md  ml-52 justify-items-center items-center text-center">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-black">Similar halls</h2>
                </div>
                <div
                    class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-3   md:gap-8 md:space-y-0">



                    <Link
                        v-for="hall in similarHalls.data"
                        href=""
                        class="relative inline-block duration-300 ease-in-out transition-transform transform hover:-translate-y-2 w-full">
                        <div class="shadow p-4 rounded-lg bg-white">
                            <div class="flex justify-center relative rounded-lg overflow-hidden h-52">
                                <div class="transition-transform duration-500 transform ease-in-out hover:scale-110 w-full">
                                    <div class="absolute inset-0 bg-black ">
                                        <img
                                            v-for="image in hall.images"
                                            :src="image.img"
                                            :key="image.id"
                                            alt="Hall Image"
                                        >
                                    </div>

                                </div>

                                <div class="absolute flex justify-center bottom-0 mb-3">
                                    <div class="flex bg-white px-4 py-1 space-x-5 rounded-lg overflow-hidden shadow">
                                                                   <span class="flex  text-orange-500 gap-x-4 p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-star" viewBox="0 0 16 16">
                                        <path
                                            d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                    </svg>
                                </span>

                                    </div>
                                </div>


                                <div v-if="this.$page.props.auth.user">
                                    <div class="absolute top-0 left-0 inline-flex mt-3 ml-3 px-3 py-2 rounded-lg z-10  text-sm font-medium text-white select-none">
                                        <form >
                                            <button
                                                type="submit"
                                                class="text-gray-500 hover:text-pink-500 p-1 rounded-full"

                                                style="background: white">
                                                <svg
                                                    class="w-6 h-6"
                                                    viewBox="0 0 24 24"

                                                >
                                                    <path fill="currentColor" d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>


                            </div>

                            <div class="mt-4">
                                <h2 class="font-medium text-base md:text-lg text-gray-800 line-clamp-1" title="New York">
                                    {{hall.name}}
                                </h2>

                                <p class="inline-flex flex-col xl:flex-row xl:items-center text-gray-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                         class="bi bi-geo-alt" viewBox="0 0 16 16">
                                        <path
                                            d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    </svg>
                                    <span class="mt-2 xl:mt-0">
			  {{hall.address.street}} , {{hall.address.city}}
			</span>
                                </p>
                            </div>

                            <div class="grid grid-cols-2 grid-rows-2 gap-4 mt-8">
                                <p class="inline-flex flex-col xl:flex-row xl:items-center text-gray-800">
                                    <svg class="inline-block w-5 h-5 xl:w-4 xl:h-4 mr-3 fill-current text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M570.53,242,512,190.75V48a16,16,0,0,0-16-16H400a16,16,0,0,0-16,16V78.75L298.53,4a16,16,0,0,0-21.06,0L5.47,242a16,16,0,0,0,21.07,24.09L64,233.27V464a48.05,48.05,0,0,0,48,48H464a48.05,48.05,0,0,0,48-48V233.27l37.46,32.79A16,16,0,0,0,570.53,242ZM480,464a16,16,0,0,1-16,16H112a16,16,0,0,1-16-16V205.27l192-168,192,168Zm0-301.25-64-56V64h64ZM208,218.67V325.34A26.75,26.75,0,0,0,234.66,352H341.3A26.76,26.76,0,0,0,368,325.34V218.67A26.75,26.75,0,0,0,341.3,192H234.66A26.74,26.74,0,0,0,208,218.67ZM240,224h96v96H240Z"></path></svg>
                                    <span class="mt-2 xl:mt-0">
			  {{hall.type.name}}
			</span>
                                </p>
                                <p class="inline-flex flex-col xl:flex-row xl:items-center text-gray-800">
                                    <svg class="inline-block w-5 h-5 xl:w-4 xl:h-4 mr-3 fill-current text-gray-800" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.5883 7.872H16.4286L16.7097 8.99658H6.74743V10.1211H17.4309C17.5163 10.1211 17.6006 10.1017 17.6774 10.0642C17.7542 10.0267 17.8214 9.97222 17.874 9.90487C17.9266 9.83753 17.9631 9.75908 17.9808 9.6755C17.9986 9.59192 17.997 9.5054 17.9763 9.42251L17.5883 7.872ZM17.5883 4.49829H16.4286L16.7097 5.62286H6.74743V6.74743H17.4309C17.5163 6.74742 17.6006 6.72794 17.6774 6.69046C17.7542 6.65299 17.8214 6.59851 17.874 6.53116C17.9266 6.46381 17.9631 6.38537 17.9808 6.30179C17.9986 6.2182 17.997 6.13168 17.9763 6.04879L17.5883 4.49829ZM17.4309 0H0.562286C0.413158 0 0.270139 0.0592407 0.16469 0.16469C0.0592407 0.270139 0 0.413158 0 0.562286L0 2.81143C0 2.96056 0.0592407 3.10358 0.16469 3.20903C0.270139 3.31448 0.413158 3.37372 0.562286 3.37372H4.49829V5.62286H1.28271L1.56386 4.49829H0.404143L0.0175714 6.04879C-0.00313354 6.13162 -0.00470302 6.21808 0.012982 6.30161C0.0306671 6.38514 0.0671423 6.46355 0.119641 6.53088C0.172139 6.59822 0.239283 6.65271 0.315978 6.69023C0.392673 6.72775 0.476905 6.74731 0.562286 6.74743H4.49829V8.99658H1.28271L1.56386 7.872H0.404143L0.0175714 9.42251C-0.00313354 9.50534 -0.00470302 9.5918 0.012982 9.67533C0.0306671 9.75886 0.0671423 9.83727 0.119641 9.9046C0.172139 9.97193 0.239283 10.0264 0.315978 10.0639C0.392673 10.1015 0.476905 10.121 0.562286 10.1211H4.49829V14.7228C4.12312 14.8554 3.80693 15.1164 3.60559 15.4596C3.40424 15.8028 3.33072 16.2062 3.39801 16.5984C3.4653 16.9906 3.66907 17.3464 3.9733 17.6028C4.27754 17.8593 4.66265 18 5.06057 18C5.4585 18 5.84361 17.8593 6.14784 17.6028C6.45208 17.3464 6.65585 16.9906 6.72314 16.5984C6.79043 16.2062 6.7169 15.8028 6.51556 15.4596C6.31422 15.1164 5.99803 14.8554 5.62286 14.7228V3.37372H17.4309C17.58 3.37372 17.723 3.31448 17.8285 3.20903C17.9339 3.10358 17.9932 2.96056 17.9932 2.81143V0.562286C17.9932 0.413158 17.9339 0.270139 17.8285 0.16469C17.723 0.0592407 17.58 0 17.4309 0V0ZM5.06057 16.8686C4.94936 16.8686 4.84065 16.8356 4.74818 16.7738C4.65572 16.712 4.58365 16.6242 4.54109 16.5215C4.49853 16.4187 4.4874 16.3057 4.50909 16.1966C4.53079 16.0875 4.58434 15.9873 4.66298 15.9087C4.74162 15.8301 4.8418 15.7765 4.95088 15.7548C5.05995 15.7331 5.17301 15.7443 5.27575 15.7868C5.3785 15.8294 5.46631 15.9014 5.5281 15.9939C5.58988 16.0864 5.62286 16.1951 5.62286 16.3063C5.62286 16.4554 5.56362 16.5984 5.45817 16.7039C5.35272 16.8093 5.2097 16.8686 5.06057 16.8686ZM16.8686 2.24914H1.12457V1.12457H16.8686V2.24914Z"></path>
                                    </svg>
                                    <span
                                        v-if="hall.furniture"
                                        class="mt-2 xl:mt-0">
			               Furnished
                        </span>
                                    <span
                                        v-else
                                        class="mt-2 xl:mt-0">
			               Not furnished
                        </span>
                                </p>
                                <p class="inline-flex flex-col xl:flex-row xl:items-center text-gray-800">
                                    <svg class="inline-block w-5 h-5 xl:w-4 xl:h-4 mr-3 fill-current text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M399.959 170.585c-4.686 4.686-4.686 12.284 0 16.971L451.887 239H60.113l51.928-51.444c4.686-4.686 4.686-12.284 0-16.971l-7.071-7.07c-4.686-4.686-12.284-4.686-16.97 0l-84.485 84c-4.686 4.686-4.686 12.284 0 16.971l84.485 84c4.686 4.686 12.284 4.686 16.97 0l7.071-7.07c4.686-4.686 4.686-12.284 0-16.971L60.113 273h391.773l-51.928 51.444c-4.686 4.686-4.686 12.284 0 16.971l7.071 7.07c4.686 4.686 12.284 4.686 16.97 0l84.485-84c4.687-4.686 4.687-12.284 0-16.971l-84.485-84c-4.686-4.686-12.284-4.686-16.97 0l-7.07 7.071z"></path></svg>
                                    <span class="mt-2 xl:mt-0">
			  {{hall.size}} sq. ft.
			</span>
                                </p>
                                <p class="inline-flex flex-col xl:flex-row xl:items-center text-gray-800">
                                    <svg class="inline-block w-5 h-5 xl:w-4 xl:h-4 mr-3 fill-current text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M532.01 386.17C559.48 359.05 576 325.04 576 288c0-80.02-76.45-146.13-176.18-157.94 0 .01.01.02.01.03C368.37 72.47 294.34 32 208 32 93.12 32 0 103.63 0 192c0 37.04 16.52 71.05 43.99 98.17-15.3 30.74-37.34 54.53-37.7 54.89-6.31 6.69-8.05 16.53-4.42 24.99A23.085 23.085 0 0 0 23.06 384c53.54 0 96.67-20.24 125.17-38.78 9.08 2.09 18.45 3.68 28 4.82C207.74 407.59 281.73 448 368 448c20.79 0 40.83-2.41 59.77-6.78C456.27 459.76 499.4 480 552.94 480c9.22 0 17.55-5.5 21.18-13.96 3.64-8.46 1.89-18.3-4.42-24.99-.35-.36-22.39-24.14-37.69-54.88zm-376.59-72.13l-13.24-3.05-11.39 7.41c-20.07 13.06-50.49 28.25-87.68 32.47 8.77-11.3 20.17-27.61 29.54-46.44l10.32-20.75-16.49-16.28C50.75 251.87 32 226.19 32 192c0-70.58 78.95-128 176-128s176 57.42 176 128-78.95 128-176 128c-17.73 0-35.42-2.01-52.58-5.96zm289.8 100.35l-11.39-7.41-13.24 3.05A234.318 234.318 0 0 1 368 416c-65.14 0-122-25.94-152.43-64.29C326.91 348.62 416 278.4 416 192c0-9.45-1.27-18.66-3.32-27.66C488.12 178.78 544 228.67 544 288c0 34.19-18.75 59.87-34.47 75.39l-16.49 16.28 10.32 20.75c9.38 18.86 20.81 35.19 29.53 46.44-37.19-4.22-67.6-19.41-87.67-32.47zM233.38 182.91l-41.56-12.47c-4.22-1.27-7.19-5.62-7.19-10.58 0-6.03 4.34-10.94 9.66-10.94h25.94c3.9 0 7.65 1.08 10.96 3.1 3.17 1.93 7.31 1.15 10-1.4l11.44-10.87c3.53-3.36 3.38-9.22-.54-12.11-8.18-6.03-17.97-9.58-28.08-10.32V104c0-4.42-3.58-8-8-8h-16c-4.42 0-8 3.58-8 8v13.4c-21.85 1.29-39.38 19.62-39.38 42.46 0 18.98 12.34 35.94 30 41.23l41.56 12.47c4.22 1.27 7.19 5.62 7.19 10.58 0 6.03-4.34 10.94-9.66 10.94h-25.94c-3.9 0-7.65-1.08-10.96-3.1-3.17-1.94-7.31-1.15-10 1.4l-11.44 10.87c-3.53 3.36-3.38 9.22.54 12.11 8.18 6.03 17.97 9.58 28.08 10.32V280c0 4.42 3.58 8 8 8h16c4.42 0 8-3.58 8-8v-13.4c21.85-1.29 39.38-19.62 39.38-42.46 0-18.98-12.35-35.94-30-41.23z"></path></svg>
                                    <span class="mt-2 xl:mt-0">
			  {{hall.capacity}} person /max
			</span>
                                </p>
                            </div>

                            <div class="grid grid-cols-2 mt-8">
                                <div class="flex items-center">
                                    <div class="relative">
                                        <img
                                            src=""
                                            class="rounded-full w-6 h-6 md:w-8 md:h-8 bg-gray-200">
                                    </div>

                                    <p class="ml-2 text-gray-800 line-clamp-1">
                                        {{hall.user.name}}
                                    </p>
                                </div>

                                <div class="flex justify-end">
                                    <p class="inline-block font-semibold text-primary whitespace-nowrap leading-tight rounded-xl">
			  <span class="text-sm uppercase">
				$
			  </span>
                                        <span class="text-lg">{{ hall.price }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </Link>


                </div>

                <!--        pagination -->

                <div class="mt-6 flex justify-between space-y-8 md:grid md:grid-cols-10 lg:grid-cols-2 md:gap-96 md:space-y-0 ">

                    <div class="ml-3">
                        <Link
                            v-if="similarHalls.prev_page_url" :href="similarHalls.prev_page_url"
                            preserve-scroll
                            class=" left-0 inline-flex items-start px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>
                            Prev
                        </Link>
                    </div>
                    <div class="ml-80">
                        <Link
                            v-if="similarHalls.next_page_url" :href="similarHalls.next_page_url"
                            preserve-scroll
                            class=" right-0 inline-flex items-start px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">

                            Next
                            <svg aria-hidden="true" class="w-5 h-5 ml-2 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </Link>
                    </div>

                </div>
            </div>
        </section>




    </NavBarLayout>

    <FooterLayout/>
</template>


<style scoped>

</style>
