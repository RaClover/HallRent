<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';
import '../../../css/app.css'; // for importing tailwindcss
import PartnerAuthenticatedLayout from "@/Layouts/Partner/PartnerAuthenticatedLayout.vue";
import NavBarLayout from "@/Layouts/User/NavBarLayout.vue";
import {Link} from "@inertiajs/vue3";

</script>

<template>


   <PartnerAuthenticatedLayout>
       <section class="flex items-center bg-gray-100 py-11 font-poppins dark:bg-white">
           <div class="max-w-6xl px-4 mx-auto">
               <div class="max-w-4xl mx-auto text-center">
                   <h2
                       class="mb-6 text-4xl font-bold leading-tight tracking-tighter text-gray-700 dark:text-gray-700 md:text-5xl">
                       Welocome
                   </h2>
                   <p class="mb-24 text-lg font-medium text-gray-500 dark:text-gray-400">
                      Now you can read the following steps to list your halls
                   </p>
               </div>
               <div class="flex flex-wrap -mx-4">
                   <div class="w-full px-4 mb-16 md:w-1/2 lg:w-1/3">
                       <div
                           class="relative h-full px-8 pt-16 pb-8 transition duration-200 rounded-md shadow-md bg-gray-50 dark:bg-gray-400 ">
                           <div
                               class="absolute top-0 inline-flex items-center justify-center w-16 h-16 transition duration-200 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-full dark:bg-gray-800 left-1/2">
                               <div
                                   class="inline-flex items-center justify-center w-12 h-12 text-black bg-amber-200 rounded-full">
                                 1
                               </div>
                           </div>
                           <h2 class="max-w-xs mb-4 text-xl font-bold leading-7 text-gray-700 dark:text-gray-700">
                               Fill out The Account
                           </h2>
                           <p class="font-medium text-gray-500 transition duration-200 dark:text-gray-500">
                               Now you can go to your account and fill
                               out your information , like phone , age ,
                               photo , etc
                           </p>
                           <Link
                               as="button"
                               :href="route('partner.profile.edit')"
                               class="mt-2 mb-2 float-right bg-gray-100 hover:bg-amber-200 text-gray-600 font-bold py-2 px-8 rounded">
                              Go to my account page
                           </Link>
                       </div>

                   </div>
                   <div class="w-full px-4 mb-16 md:w-1/2 lg:w-1/3">
                       <div
                           class="relative h-full px-8 pt-16 pb-8 transition duration-200 rounded-md shadow-md bg-gray-50 dark:bg-gray-400 ">
                           <div
                               class="absolute top-0 inline-flex items-center justify-center w-16 h-16 transition duration-200 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-full dark:bg-gray-800 left-1/2">
                               <div
                                   class="inline-flex items-center justify-center w-12 h-12 text-black bg-amber-200 rounded-full">
                                   2
                               </div>
                           </div>
                           <h2 class="max-w-xs mb-4 text-xl font-bold leading-7 text-gray-700 dark:text-gray-700">
                               Add Your Hall
                           </h2>
                           <p class="font-medium text-gray-500 transition duration-200 dark:text-gray-500">
                               After filling out you account , you can list your first hall.
                               just go to hall list page and list your first hall
                           </p>
                           <Link class="mt-2 mb-2 float-right bg-gray-100 hover:bg-amber-200 text-gray-600 font-bold py-2 px-8 rounded">
                               Go to my Hall list page
                           </Link>
                       </div>

                   </div>
                   <div class="w-full px-4 mb-16 md:w-1/2 lg:w-1/3">
                       <div
                           class="relative h-full px-8 pt-16 pb-8 transition duration-200 rounded-md shadow-md bg-gray-50 dark:bg-gray-400 ">
                           <div
                               class="absolute top-0 inline-flex items-center justify-center w-16 h-16 transition duration-200 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-full dark:bg-gray-800 left-1/2">
                               <div
                                   class="inline-flex items-center justify-center w-12 h-12 text-black bg-amber-200 rounded-full">
                                   3
                               </div>
                           </div>
                           <h2 class="max-w-xs mb-4 text-xl font-bold leading-7 text-gray-700 dark:text-gray-700">
                               Wait for booking requests
                           </h2>
                           <p class="font-medium text-gray-500 transition duration-200 dark:text-gray-500">
                               After listing your first hall.you can wait for  your hall to rent by any user.
                               you can see all your bookings in Bookings page
                           </p>
                           <Link class="mt-2 mb-2 float-right bg-gray-100 hover:bg-amber-200 text-gray-600 font-bold py-2 px-8 rounded">
                               Go to my Bookings page
                           </Link>
                       </div>

                   </div>







               </div>
           </div>
       </section>
   </PartnerAuthenticatedLayout>
</template>

<style scoped>

</style>
