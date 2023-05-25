<script setup>

import PartnerAuthenticatedLayout from "@/Layouts/Partner/PartnerAuthenticatedLayout.vue";
import {Link, router} from "@inertiajs/vue3";
</script>

<template>
<PartnerAuthenticatedLayout>
    <section class="bg-white ">
            <div class="flex flex-col pt-32 items-center max-w-sm mx-auto text-center">
                <p class="p-3 text-sm font-medium text-blue-500 rounded-full bg-blue-50 dark:bg-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                    </svg>
                </p>
                <h1 class="mt-3 text-2xl font-semibold text-gray-800 dark:text-white md:text-3xl">Page not found</h1>
                <p class="mt-4 text-gray-500 dark:text-gray-400">You don't have any halls yet</p>

                <div class="flex items-center w-full mt-6 gap-x-3 shrink-0 sm:w-auto">
                    <Link
                        :href="route('partner.hallList.create')"
                        class="relative group inline-block py-3 px-5 text-center text-sm font-semibold text-orange-50 bg-orange-400 rounded-full overflow-hidden" href="#">
                        <div class="absolute top-0 right-full w-full h-full bg-amber-600 transform group-hover:translate-x-full group-hover:scale-102 transition duration-500"></div>
                        <span class="relative">List Hall</span>
                    </Link>

                </div>
            </div>
    </section>
</PartnerAuthenticatedLayout>



</template>

<style scoped>

</style>
