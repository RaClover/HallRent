<script setup>

</script>

<template>
    <div class="grid sm:px-10 lg:grid-cols-2 lg:px-20 xl:px-32">
        <slot/>
        <div class="bg-gray-50 px-1 pt-1 lg:mt-0 mb-10 ml-40">

            <!--               here is the image -->
            <div class="p-4 bg-white rounded dark:bg-white">
                <div class="relative  w-full h-60 mb-2">
                    <img src="https://i.postimg.cc/RF9h9qzx/pexels-jaime-reimer-2695232.jpg" alt=""
                         class="object-cover w-full h-full rounded">
                    <span class="absolute top-0 right-0 px-2 py-1 mt-2 mr-2 text-xs text-white bg-blue-700">
                            10 trips</span>
                </div>
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h2 class="text-lg font-semibold dark:text-gray-300">Manaslu Trekking</h2>
                    </div>
                    <div class="text-base font-semibold text-green-600">$223/hr</div>
                </div>

                <div class="flex items-center  mb-4">
                    <a href="" class="mr-1 text-blue-600 dark:text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                             class="bi bi-geo-alt" viewBox="0 0 16 16">
                            <path
                                d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        </svg>
                    </a>
                    <span class="text-sm text-gray-600 dark:text-gray-400">Gorkha,Nepal</span>
                </div>

                <div class="flex items-center justify-between mb-2">
                    <h2 class="text-xs font-medium dark:text-gray-400">Travel Date</h2>
                    <span
                        class="inline-block px-2 py-1 text-xs text-blue-500 rounded-full dark:bg-gray-700 dark:text-blue-400 bg-blue-50">
                            1st march 2022
                        </span>
                </div>
                <div class="flex items-center justify-between mb-2">
                    <h2 class="text-xs font-medium dark:text-gray-400">Day</h2>
                    <span class="inline-block px-2 py-1 text-xs text-gray-600 dark:text-gray-400">6 night 7 days
                        </span>
                </div>
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xs font-medium dark:text-gray-400">Arrived Date</h2>
                    <span
                        class="inline-block px-2 py-1 text-xs text-blue-500 rounded-full bg-blue-50 dark:bg-gray-700 dark:text-blue-400">
                            7th march 2022</span>
                </div>



                <div class="mt-6 border-t py-2">
                    <div class="flex items-center justify-between mb-2">
                        <h2 class="text-xs font-medium dark:text-gray-400">Travel Date</h2>
                        <span
                            class="inline-block px-2 py-1 text-xs text-blue-500 rounded-full dark:bg-gray-700 dark:text-blue-400 bg-blue-50">
                            1st march 2022
                        </span>
                    </div>
                    <div class="flex items-center justify-between mb-2">
                        <h2 class="text-xs font-medium dark:text-gray-400">Day</h2>
                        <span class="inline-block px-2 py-1 text-xs text-gray-600 dark:text-gray-400">6 night 7 days
                        </span>
                    </div>
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-xs font-medium dark:text-gray-400">Arrived Date</h2>
                        <span
                            class="inline-block px-2 py-1 text-xs text-blue-500 rounded-full bg-blue-50 dark:bg-gray-700 dark:text-blue-400">
                            7th march 2022</span>
                    </div>
                </div>

                <!-- Total -->
                <div class="mt-6 border-t py-2">
                    <div class="flex items-center justify-between py-4 px-10 mb-14 leading-8 bg-white font-heading font-medium rounded-3xl">
                        <span>Total</span>
                        <span class="flex items-center text-xl text-blue-500">
                        <span class="mr-2 text-base">$</span>
                        <span>720,70</span>
                    </span>
                    </div>
                </div>
            </div>

        </div>

    </div>
</template>

<style scoped>

</style>
