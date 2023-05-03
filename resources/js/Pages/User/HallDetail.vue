<script>
import NavBarLayout from "@/Layouts/User/NavBarLayout.vue";
import {Link} from "@inertiajs/vue3";

export default {
    name: "HallDetail",
    components: {
        NavBarLayout ,
        Link
    }
}
</script>

<template>
    <NavBarLayout>
        <section class="py-20 overflow-hidden bg-white font-poppins white:bg-gray-800">
            <div class="max-w-7xl px-1 py-4 mx-auto lg:py-8 md:px-1">
                <div class="flex flex-wrap -mx-10">
                    <div class="w-full px-4 md:w-1/2 mr">
                        <div class="sticky top-0 z-50 overflow-hidden border border-black white:border-gray-700 ">
                            <div class="relative mb-6 lg:mb-10" >
                                <img
                                    src="https://www.decorchamp.com/wp-content/uploads/2014/12/pop-ceiling-design-for-offi.jpg"
                                     alt="" class="object-contain w-full h-full ">
                            </div>
                            <div  class="flex-wrap hidden md:flex ">
                                <div class="w-1/2 p-2 sm:w-1/4">
                                    <a href="#"
                                       class=" border border-blue-100 white:border-gray-700 white:hover:border-gray-600 hover:border-blue-300 ">
                                        <img src=""
                                             alt="" class="object-cover w-full lg:h-32">
                                    </a>
                                </div>
                                <div class="w-1/2 p-2 sm:w-1/4">
                                    <a href="#"
                                       class="block border border-blue-100 white:border-transparent white:hover:border-gray-600 hover:border-blue-300">
                                        <img src=""
                                             alt="" class="object-cover w-full lg:h-32">
                                    </a>
                                </div>
                                <div class="w-1/2 p-2 sm:w-1/4">
                                    <a href="#"
                                       class="block border border-blue-100 white:border-transparent white:hover:border-gray-600 hover:border-blue-300">
                                        <img src=""
                                             alt="" class="object-cover w-full lg:h-32">
                                    </a>
                                </div>
                                <div class="w-1/2 p-2 sm:w-1/4">
                                    <a href="#"
                                       class="block border border-blue-100 white:border-transparent white:hover:border-gray-600 hover:border-blue-300">
                                        <img src=""
                                             alt="" class="object-cover w-full lg:h-32">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full px-4 md:w-1/2 ">
                        <div class="lg:pl-20">
                            <div class="pb-6 mb-8 border-b border-gray-200 white:border-gray-700">
                                <h2 class="max-w-xl mt-2 mb-6 text-xl font-bold white:text-gray-300 md:text-4xl">
                                   Name
                                </h2>
                                <p class="max-w-md mb-8 text-gray-700 white:text-gray-400">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusamus aliquam asperiores assumenda, commodi enim esse, facilis fugiat fugit harum incidunt ipsa ipsam magnam officia possimus reiciendis reprehenderit saepe vitae?
                                </p>
                                <p class="inline-block text-2xl font-semibold text-gray-700 white:text-gray-400 ">
                                    <span class="text-base font-normal text-gray-500 line-through white:text-gray-400">price </span>
                                    <span class="ml-3">price</span>
                                </p>
                            </div>
                            <!--                        <div class="pb-6 mb-8 border-b border-gray-300 white:border-gray-700">-->
                            <!--                            <h2 class="mb-2 text-xl font-bold white:text-gray-400">-->
                            <!--                                Size</h2>-->
                            <!--                            <div class="flex flex-wrap -mb-2">-->
                            <!--                                <button-->
                            <!--                                    class="py-1 mb-2 mr-1 border w-11 hover:border-blue-400 dark:border-black hover:text-blue-600 dark:hover:border-black dark:text-gray-400">XL-->
                            <!--                                </button>-->
                            <!--                                <button-->
                            <!--                                    class="py-1 mb-2 mr-1 border w-11 hover:border-blue-400 hover:text-blue-600 dark:border-gray-400 dark:hover:border-gray-300 dark:text-gray-400">S-->
                            <!--                                </button>-->
                            <!--                                <button-->
                            <!--                                    class="py-1 mb-2 mr-1 border w-11 hover:border-blue-400 hover:text-blue-600 dark:border-gray-400 dark:hover:border-gray-300 dark:text-gray-400">M-->
                            <!--                                </button>-->
                            <!--                                <button-->
                            <!--                                    class="py-1 mb-2 mr-1 border w-11 hover:border-blue-400 hover:text-blue-600 dark:border-gray-400 dark:hover:border-gray-300 dark:text-gray-400">XS-->
                            <!--                                </button>-->
                            <!--                            </div>-->
                            <!--                        </div>-->
                            <div class="flex flex-wrap items-center ">


                                <div class="mb-4 mr-1 lg:mb-0">
                                    <button
                                        class="w-40 h-12 p-2 mr-4 text-gray-400 border border-blue-600  hover:text-black dark:text-blue-600 rounded-md dark:border-blue-600 hover:bg-white hover:border-black dark:bg-white dark:hover:bg-blue-500 dark:hover:border-blue-500 dark:hover:text-gray-300">
                                        Rent
                                    </button>
                                </div>
                                <div class="mb-4 mr-4 lg:mb-0">
                                    <button
                                        class="flex items-center justify-center w-full h-10 p-2 text-gray-400 border border-black lg:w-11 hover:text-black dark:text-black rounded-md dark:border-gray-300 hover:bg-white hover:border-black dark:bg-white dark:hover:bg-blue-500 dark:hover:border-blue-500 dark:hover:text-gray-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                             class=" bi bi-heart" viewBox="0 0 16 16">
                                            <path
                                                d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="  py-10 2xl:py-44 bg-blueGray-100 rounded-t-10xl overflow-hidden">
            <div class="container px-4 mx-auto">
                <span class="text-xs text-gray-900 uppercase tracking-wide">What people say</span>
                <h1 class="mt-8 mb-14 md:mb-24 text-8xl md:text-10xl xl:text-11xl font-heading font-medium leading-tight">1,218 reviews</h1>
                <div class="mb-2  rounded-t-8xl rounded-b-5xl overflow-hidden">
                    <div class="pt-3 pb-3 md:pb-1 px-4 md:px-16 bg-white bg-opacity-40">
                        <div class="flex flex-wrap items-center">
                            <img class="mr-6" src="uinel-assets/images/ecommerce-reviews/user.png" alt="">
                            <h4 class="w-full md:w-auto text-xl font-heading font-medium">Faustina H. Fawn</h4>
                            <div class="w-full md:w-px h-2 md:h-8 mx-8 bg-transparent md:bg-gray-200"></div>
                            <span class="mr-4 text-xl font-heading font-medium">5.0</span>
                            <div class="inline-flex">
                                <a class="inline-block mr-1" href="#">
                                    <svg width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20 7.91677H12.4167L10 0.416763L7.58333 7.91677H0L6.18335 12.3168L3.81668 19.5834L10 15.0834L16.1834 19.5834L13.8167 12.3168L20 7.91677Z" fill="#FFCB00"></path>
                                    </svg>
                                </a>
                                <a class="inline-block mr-1" href="#">
                                    <svg width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20 7.91677H12.4167L10 0.416763L7.58333 7.91677H0L6.18335 12.3168L3.81668 19.5834L10 15.0834L16.1834 19.5834L13.8167 12.3168L20 7.91677Z" fill="#FFCB00"></path>
                                    </svg>
                                </a>
                                <a class="inline-block mr-1" href="#">
                                    <svg width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20 7.91677H12.4167L10 0.416763L7.58333 7.91677H0L6.18335 12.3168L3.81668 19.5834L10 15.0834L16.1834 19.5834L13.8167 12.3168L20 7.91677Z" fill="#FFCB00"></path>
                                    </svg>
                                </a>
                                <a class="inline-block mr-1" href="#">
                                    <svg width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20 7.91677H12.4167L10 0.416763L7.58333 7.91677H0L6.18335 12.3168L3.81668 19.5834L10 15.0834L16.1834 19.5834L13.8167 12.3168L20 7.91677Z" fill="#FFCB00"></path>
                                    </svg>
                                </a>
                                <a class="inline-block text-gray-200" href="#">
                                    <svg width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20 7.91677H12.4167L10 0.416763L7.58333 7.91677H0L6.18335 12.3168L3.81668 19.5834L10 15.0834L16.1834 19.5834L13.8167 12.3168L20 7.91677Z" fill="#FFCB00"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 overflow-hidden md:px-16 pt-8 pb-12 bg-white">
                        <div class="flex flex-wrap">
                            <div class="w-full md:w-1/3 text-right">
                                <p class="mb-8 text-sm text-gray-900">Added 2 months ago</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-2  rounded-t-8xl rounded-b-5xl overflow-hidden">
                    <div class="pt-3 pb-3 md:pb-1 px-4 md:px-16 bg-white bg-opacity-40">
                        <div class="flex flex-wrap items-center">
                            <img class="mr-6" src="uinel-assets/images/ecommerce-reviews/user2.png" alt="">
                            <h4 class="w-full md:w-auto text-xl font-heading font-medium">Ainsley Stones</h4>
                            <div class="w-full md:w-px h-2 md:h-8 mx-8 bg-transparent md:bg-gray-200"></div>
                            <span class="mr-4 text-xl font-heading font-medium">4.3</span>
                            <div class="flex">
                                <a class="inline-block mr-1" href="#">
                                    <svg width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20 7.91677H12.4167L10 0.416763L7.58333 7.91677H0L6.18335 12.3168L3.81668 19.5834L10 15.0834L16.1834 19.5834L13.8167 12.3168L20 7.91677Z" fill="#FFCB00"></path>
                                    </svg>
                                </a>
                                <a class="inline-block mr-1" href="#">
                                    <svg width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20 7.91677H12.4167L10 0.416763L7.58333 7.91677H0L6.18335 12.3168L3.81668 19.5834L10 15.0834L16.1834 19.5834L13.8167 12.3168L20 7.91677Z" fill="#FFCB00"></path>
                                    </svg>
                                </a>
                                <a class="inline-block mr-1" href="#">
                                    <svg width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20 7.91677H12.4167L10 0.416763L7.58333 7.91677H0L6.18335 12.3168L3.81668 19.5834L10 15.0834L16.1834 19.5834L13.8167 12.3168L20 7.91677Z" fill="#FFCB00"></path>
                                    </svg>
                                </a>
                                <a class="inline-block mr-1" href="#">
                                    <svg width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20 7.91677H12.4167L10 0.416763L7.58333 7.91677H0L6.18335 12.3168L3.81668 19.5834L10 15.0834L16.1834 19.5834L13.8167 12.3168L20 7.91677Z" fill="#FFCB00"></path>
                                    </svg>
                                </a>
                                <a class="inline-block text-gray-200" href="#">
                                    <svg width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20 7.91677H12.4167L10 0.416763L7.58333 7.91677H0L6.18335 12.3168L3.81668 19.5834L10 15.0834L16.1834 19.5834L13.8167 12.3168L20 7.91677Z" fill="currentColor"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 md:px-16 pt-8 pb-12 bg-white">
                        <div class="flex flex-wrap">
                            <div class="w-full md:w-1/3 text-right">
                                <p class="mb-8 text-sm text-gray-900">Added 2 months ago</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center  ">
                    <button class=" inline-block w-1/2 md:w-auto h-full py-4  px-10 leading-8 font-heading font-medium tracking-tighter text-xl text-white bg-blue-500 hover:bg-blue-600 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 rounded-xl">See all</button>
                </div>
            </div>
        </section>
    </NavBarLayout>
</template>



<style scoped>

</style>
