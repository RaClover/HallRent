<script setup>
import { Inertia } from "@inertiajs/inertia";
import {usePage} from '@inertiajs/inertia-vue3'

const props = defineProps({
    hall: Object,
});

// const inWhishlist = (id) => {
//     return usePage().props.value.whishlist.find(product => { return product.id === id }) ? true : false;
// }
//
// const toggleWhishlist = () => {
//     Inertia.post(route("whishlist.toggle", { id: props.product.id }));
// };

// const productImage = () => {
//     let preview = props.hall.images.find(image => {
//         return image.is_preview;
//     });
//
//     return '/images/' + preview.url;
// }
</script>

<template>
    <div class="flex flex-col items-center justify-center h-72 relative border">
        <div class="h-2/3 w-full">
            <a href="detail">
                <img src="https://loremflickr.com/400/340/iceream,book" alt="product_image" class="w-full h-full object-cover">
            </a>
        </div>

        <div class="h-1/3 w-full p-2 pt-6">
            <div class="flex items-start justify-between space-x-4">
                <div>
                    <span class="block text-[13px] font-medium leading-4">{{ hall.name }}</span>
<!--                    <span class="block text-xs text-zinc-500">{{ hall.type.name }}</span>-->
                    <span class="block text-xs text-zinc-500">hallType</span>
                </div>
                <span class="whitespace-nowrap text-[13px]"><span class="font-medium text-c-green-600">€</span>{{ hall.price }}</span>
            </div>

            <div class="absolute top-2 left-2">
                <form >
                    <button type="submit">
                        <svg
                            class="w-6 h-6 flex-none" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
