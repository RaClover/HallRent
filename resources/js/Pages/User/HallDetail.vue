<script>
import NavBarLayout from "@/Layouts/User/NavBarLayout.vue";
import {Link, router} from "@inertiajs/vue3";
import Breadcrumb from "@/Components/User/Halls/Breadcrumb.vue";
import FooterLayout from "@/Layouts/User/FooterLayout.vue";
import Description from "@/Components/User/HallDetailParts/Description.vue";
import Reviews from "@/Components/User/HallDetailParts/Reviews.vue";
import {ref} from "vue";
import VueTailwindDatepicker from 'vue-tailwind-datepicker';
import AvailabilityModal from "@/Components/User/HallDetailParts/AvailabilityModal.vue";
import GallaryModal from "@/Components/User/HallDetailParts/GallaryModal.vue";

export default {
    name: "HallDetail",

    components: {
        GallaryModal,
        AvailabilityModal,
        Reviews,
        Description,
        FooterLayout,
        Breadcrumb,
        NavBarLayout,
        Link,
        ref,
        VueTailwindDatepicker
    },


    props: {
        hall: Object,
        user: Object,
        images: Array,

    } ,

    data() {
        return {
            activeTab: 'description',
            showModal: false,
            currentImageIndex: 0,
        }
    },
    computed: {
        currentImage() {
            if (this.images && this.images.length > 0) {
                return this.images[this.currentImageIndex];
            }
            return null;
        },
    },

    methods: {
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
                                    <p class="mb-4 text-lg font-semibold dark:text-black">Choose a payment option</p>
                                    <div
                                        class="grid grid-cols-2 gap-4 pb-4 mt-2 mb-4 border-b-2 border-gray-300 lg:grid-cols-3 dark:border-gray-600">
                                        <div>
                                            <button
                                                class="flex items-center justify-center w-full h-full px-2 py-6 border-2 border-gray-300 dark:hover:border-amber-400 dark:border-gray-600 hover:border-blue-400">
                                                <div>
                                                    <p class="px-2 text-base font-semibold text-center text-gray-700 dark:text-black">
                                                        Pay With Card
                                                    </p>
                                                </div>
                                            </button>
                                        </div>
                                        <div>
                                            <button
                                                class="flex items-center justify-center w-full h-full px-2 py-6 border-2 border-gray-300 dark:hover:border-amber-400 dark:border-gray-600 hover:border-blue-400">
                                                <div>
                                                    <p class="px-2 text-base font-semibold text-center text-gray-700 dark:text-black">
                                                        Pay Cash
                                                    </p>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-6 ">
                                    <div class="flex flex-wrap items-center">
                                        <span class="mr-2">
                                            <svg class="w-4 h-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M16.25 2.5h-1.88V.63h-1.25v1.87H6.88V.63H5.63v1.87H3.75a1.88 1.88 0 0 0-1.88 1.88v12.5a1.88 1.88 0 0 0 1.88 1.88h12.5a1.88 1.88 0 0 0 1.88-1.88V4.38a1.88 1.88 0 0 0-1.88-1.88zm.63 14.38a.63.63 0 0 1-.63.63H3.75a.63.63 0 0 1-.63-.63V7.5h14.38z"/>
                                            </svg>
                                        </span>
                                        <h2 class="text-lg font-bold text-gray-700 dark:text-black">Availability</h2>
                                    </div>
                                    <div class="px-7">
                                        <AvailabilityModal />
                                    </div>
                                </div>
                                <div class="mt-6 ">
                                    <Link
                                        :href="route('booking.book')"
                                        as="button"
                                        class="w-full px-4 py-2 font-bold text-white bg-amber-600 lg:w-96 hover:bg-amber-600">
                                        Start Booking
                                    </Link>
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
                        <div class="mb-8 border-b-2 border-black">
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
                        <div>


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


    </NavBarLayout>

    <FooterLayout/>
</template>


<style scoped>

</style>
