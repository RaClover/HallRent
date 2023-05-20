<script setup>

import Breadcrumb from "@/Components/User/Halls/Breadcrumb.vue";
</script>

<template>



    <div class="flex flex-col items-center border-b bg-white py-4 sm:flex-row sm:px-10 lg:px-20 xl:px-32">
        <Breadcrumb/>
        <div class="mt-4 py-2 text-xs sm:mt-0 sm:ml-auto sm:text-base">
            <div class="relative">
                <ul class="relative flex w-full items-center justify-between space-x-2 sm:space-x-4">
                    <li class="flex items-center space-x-3 text-left sm:space-x-4">
                        <a class="flex h-6 w-6 items-center justify-center rounded-full bg-amber-600 ring-amber-600 text-xs font-semibold text-black ring  ring-offset-2" href="#">1</a>
                        <span class="font-semibold text-gray-900">Step 1</span>
                    </li>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                    <li class="flex items-center space-x-3 text-left sm:space-x-4">
                        <a class="flex h-6 w-6 items-center justify-center rounded-full bg-gray-300 text-xs font-semibold text-black ring ring-gray-300 ring-offset-2" href="#">2</a>
                        <span class="font-semibold text-gray-500">Step 2</span>
                    </li>

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                    <li class="flex items-center space-x-3 text-left sm:space-x-4">
                        <a class="flex h-6 w-6 items-center justify-center rounded-full bg-gray-300 text-xs font-semibold text-black ring ring-gray-300 ring-offset-2" href="#">3</a>
                        <span class="font-semibold text-gray-500">Step 3</span>
                    </li>


                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                    <li class="flex items-center space-x-3 text-left sm:space-x-4">
                        <a class="flex h-6 w-6 items-center justify-center rounded-full bg-gray-300 text-xs font-semibold text-black ring ring-gray-300 ring-offset-2" href="#">4</a>
                        <span class="font-semibold text-gray-500">Step 4</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="grid sm:px-10 lg:grid-cols-2 lg:px-20 xl:px-32">

        <div class="py-8 lg:py-12 px-1 mx-auto max-w-screen-md mr-10">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-black dark:text-black">Introduce yourself to the Owner</h2>
            <p class="mb-8 lg:mb-16 font-light text-center text-gray-500 dark:text-gray-800 sm:text-xl">You can write your purpose to rent this hall. and you can explain more about your self</p>
            <form action="#" class="space-y-8">
                <!--                        <div>-->
                <!--                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Your email</label>-->
                <!--                            <input type="email" id="email" class="shadow-sm  border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500  block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="name@flowbite.com" required>-->
                <!--                        </div>-->
                <!--                        <div>-->
                <!--                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Your email</label>-->
                <!--                            <input type="email" id="email" class="shadow-sm  border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500  block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="name@flowbite.com" required>-->
                <!--                        </div>-->
                <div class="sm:col-span-2">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900">Your message*</label>
                    <textarea id="message" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500  dark:border-gray-600 dark:placeholder-gray-900 dark:text-black dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Leave a comment..."></textarea>
                </div>
                <button type="submit" class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-primary-700 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-amber-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Send</button>
            </form>
        </div>

        <div class="bg-gray-50 px-1 pt-1 lg:mt-0 mb-10">

            <!--               here is the image -->
            <div class="mx-auto rounded overflow-hidden ">
                <img class="w-full" src="https://pyramida.ru/upload/resize_cache/uf/948/633_473_2/948f924731cc2d550e004f76464cff79.jpg" alt="Sunset in the mountains">
                <div class="px-6 pt-2">
                    <div class="font-bold text-xl mb-2">Hall Type or name</div>
                </div>
                <div class="pt-1 pb-2">
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">$543</span>
                </div>
            </div>
            <!-- Total -->
            <div class="mt-6 border-t border-b py-2">
                <div class="flex items-center justify-between">
                    <p class="text-sm font-medium text-gray-900">Subtotal</p>
                    <p class="font-semibold text-gray-900">$399.00</p>
                </div>
                <div class="flex items-center justify-between">
                    <p class="text-sm font-medium text-gray-900">Shipping</p>
                    <p class="font-semibold text-gray-900">$8.00</p>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-between">
                <p class="text-sm font-medium text-gray-900">Total</p>
                <p class="text-2xl font-semibold text-gray-900">$408.00</p>
            </div>
        </div>

    </div>

</template>

<style scoped>

</style>
