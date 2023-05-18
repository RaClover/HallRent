
<script>
import {Link} from "@inertiajs/vue3";

export default {
    components: {
        Link
    },
    props: {
        address: {
            type: Array,
            required: true
        },
        cityImages: {
            type: Array,
            required: true
        },
    },


    methods: {
        getCityImage(city) {
            // Logic to get the city image based on the city name
            // You can access the cityImages array passed from the Welcome.vue component
            // and retrieve the image URL based on the city name

            // Assuming cityImages is an array of objects with city names as keys and image URLs as values
            const cityImages = this.$props.cityImages;
            return cityImages[city] || "https://tecdn.b-cdn.net/img/new/standard/nature/184.jpg"; // Default image URL if city image is not available
        },
    },
}
</script>

<template>
    <section class="bg-gray-300 dark:bg-gray-100">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
            <div class="max-w-screen-md mb-8 lg:mb-16 ml-52 justify-items-center items-center text-center">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-black">Explore our most popular cities</h2>
                <p>See what these cities have to offer and rent the perfect place</p>
            </div>
            <div
                class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-4 md:gap-8 md:space-y-0">



                <Link

                    v-for="addr in address.data"
                    :href="route('halls.index' , {city: addr.city})"
                    class="block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-50 transform transition duration-300 hover:scale-105"
                >
                        <img
                            class="rounded-t-lg h-60 w-full"
                            :src="getCityImage(addr.city)"
                            alt=""
                        />
                    <div class="p-6">
                        <h5
                            class="mb-2 text-xl font-medium leading-tight text-black text-center dark:text-black"
                        >
                            {{ addr.city }}
                        </h5>
                        <h1 class="text-center text-gray-600 p-2">{{ addr.halls_count }} halls</h1>
                        <p class="mb-4 text-base text-black dark:text-black">
                            Some quick example text to build on the card title and make up the bulk of the card's content.
                        </p>

                    </div>
                </Link>

            </div>

<!--        pagination -->

            <div class="mt-6 flex justify-between space-y-8 md:grid md:grid-cols-10 lg:grid-cols-2 md:gap-96 md:space-y-0 ">

                <div class="ml-3">
                    <Link
                        v-if="address.prev_page_url" :href="address.prev_page_url"
                        preserve-scroll
                        class=" left-0 inline-flex items-start px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>
                        Prev
                    </Link>
                </div>
                <div class="ml-80">
                    <Link
                        v-if="address.next_page_url" :href="address.next_page_url"
                        preserve-scroll
                        class=" right-0 inline-flex items-start px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">

                        Next
                        <svg aria-hidden="true" class="w-5 h-5 ml-2 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </Link>
                </div>

            </div>
        </div>
    </section>
</template>


<style scoped>

</style>
