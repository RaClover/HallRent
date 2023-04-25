<script setup>
import { ref, onMounted, onUnmounted } from 'vue'
import { usePage } from '@inertiajs/inertia-vue3'
import {Link, router} from '@inertiajs/vue3';
</script>
<template>
    <nav class="bg-white" style="direction: ltr">
        <div class="mx-auto max-w-7xl px-2 sm:px-2 lg:px-8">
            <div class="relative flex h-11 items-center justify-between">

                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">

                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->

                            <Link href="#" class="text-black  hover:text-blue-600 rounded-md px-3 py-2 text-sm font-medium">Login</Link>

                            <Link href="#" class="text-black  hover:text-blue-600 rounded-md px-3 py-2 text-sm font-medium">Register</Link>

                            <Link href="#" class="text-black  hover:text-blue-600 rounded-md px-3 py-2 text-sm font-medium">Become Partner</Link>
                            <Link href="#" class="text-black  hover:text-blue-600 rounded-md px-3 py-2 text-sm font-medium">About Us</Link>
                            <Link href="#" class="text-black  hover:text-blue-600 rounded-md px-3 py-2 text-sm font-medium">Contact Us</Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

</template>



<style scoped>

</style>
