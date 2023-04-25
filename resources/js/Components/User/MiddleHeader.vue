<script setup>
import {ref, onMounted, onUnmounted, computed} from 'vue'
import { usePage } from '@inertiajs/inertia-vue3'
import {Link, router} from '@inertiajs/vue3';
import Header from "@/Components/User/Header.vue";
import ProfileDropdown from "@/Components/User/ProfileDropdown.vue";
import CartDropdown from "@/Components/User/CartDropdown.vue";
import FilterModalComponent from "@/Components/User/FilterModalComponent.vue";

const props = defineProps({
    cartItems: Array ,
    cartItemCount: Number,
    totalAmount: Number
})



const { $page } = usePage()
const showCartDropdown = ref(false)
const showCart = ref(false)



onMounted(() => {
    console.log('mounted')
})

onUnmounted(() => {
    console.log('unmounted')
})





</script>

<template>

    <!-- header -->
    <header class=" bg-white" style="direction: rtl">
        <div class="container flex items-center justify-between">
            <a href="">
                <img src="" alt="Logo" class="w-32">
            </a>

            <div class="w-full max-w-xl relative flex">
                <span class="absolute left-4 top-3 text-lg text-gray-400">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </span>
                <input type="text" name="search" id="search"
                       class="w-full border border-primary border-l-0 pl-12 py-3 pr-3 rounded-r-md "
                       placeholder="ابحث">
                <button
                    class="bg-blue-800 border border-primary text-white px-8 rounded-l-md transition">Search</button>
            </div>



            <div
                class="flex items-center space-x-4  py-3 ml-20">
                <CartDropdown/>
                <ProfileDropdown/>







            </div>


        </div>

    <!-- ./header -->




    <!-- navbar -->
    <nav class="bg-gray-800 mt-1" style="direction: rtl">
        <div class="container flex">
            <div class="px-8 py-4  flex items-center cursor-pointer relative group">

            </div>

            <div class="flex items-center justify-between flex-grow pl-12">
                <div class="flex items-center space-x-6 capitalize mr-16">
                    <a href="index.html" class="text-white hover:text-blue-600 transition"> الصفحة الرئيسية</a>
                    <a href="index.html" class="text-white hover:text-blue-600 transition"></a>
                    <a href="pages/shop.html" class="text-white hover:text-blue-600 transition ">تسوق</a>
                    <a href="#" class="text-white hover:text-blue-600 transition">معلومات عنا </a>
                    <a href="#" class="text-white hover:text-blue-600 transition mr-10">تواصل معنا</a>
                </div>


                <div class="flex items-center space-x-6 capitalize mr-16">
                    <a href="index.html" class="text-gray-200 hover:text-white transition"></a>

                    <Link :href="route('becomePartner')" class="text-white hover:text-blue-600 transition ">Become Partner</Link>
                    <Link :href="route('register')" class="text-white hover:text-blue-600 transition">Register</Link>
                    <Link :href="route('login')" class="text-white hover:text-blue-600 transition mr-10">Login</Link>
                </div>
            </div>
        </div>
    </nav>

    </header>
    <!-- ./navbar -->
</template>

<style scoped>


/*.profile-dropdown:hover .profile-dropdown-menu {*/
/*    opacity:1;*/
/*    transform: translate(1px , 1px) scale(1);*/
/*    visibility: visible;*/
/*}*/





.container {
    width: 10%;
    margin-right: auto;
    margin-left: auto;
    padding-right: 1rem;
    padding-left: 1rem;
}




.ml-2 {
    margin-left: 0.5rem;
}

.ml-6 {
    margin-left: 1.5rem;
}


.flex {
    display: flex;
}

.h-5 {
    height: 1.25rem;
}

.w-32 {
    width: 8rem;
}

.w-full {
    width: 100%;
}

.w-5 {
    width: 1.25rem;
}

.max-w-xl {
    max-width: 36rem;
}

.flex-grow {
    flex-grow: 1;
}


.cursor-pointer {
    cursor: pointer;
}


.items-center {
    align-items: center;
}


.justify-center {
    justify-content: center;
}

.justify-between {
    justify-content: space-between;
}


.space-x-4 > :not([hidden]) ~ :not([hidden]) {
    --tw-space-x-reverse: 0;
    margin-right: calc(1rem * var(--tw-space-x-reverse));
    margin-left: calc(1rem * calc(1 - var(--tw-space-x-reverse)));
}

.space-x-6 > :not([hidden]) ~ :not([hidden]) {
    --tw-space-x-reverse: 0;
    margin-right: calc(1.5rem * var(--tw-space-x-reverse));
    margin-left: calc(1.5rem * calc(1 - var(--tw-space-x-reverse)));
}

.space-x-2 > :not([hidden]) ~ :not([hidden]) {
    --tw-space-x-reverse: 0;
    margin-right: calc(0.5rem * var(--tw-space-x-reverse));
    margin-left: calc(0.5rem * calc(1 - var(--tw-space-x-reverse)));
}

.space-y-8 > :not([hidden]) ~ :not([hidden]) {
    --tw-space-y-reverse: 0;
    margin-top: calc(2rem * calc(1 - var(--tw-space-y-reverse)));
    margin-bottom: calc(2rem * var(--tw-space-y-reverse));
}

.space-y-4 > :not([hidden]) ~ :not([hidden]) {
    --tw-space-y-reverse: 0;
    margin-top: calc(1rem * calc(1 - var(--tw-space-y-reverse)));
    margin-bottom: calc(1rem * var(--tw-space-y-reverse));
}

.space-y-1 > :not([hidden]) ~ :not([hidden]) {
    --tw-space-y-reverse: 0;
    margin-top: calc(0.25rem * calc(1 - var(--tw-space-y-reverse)));
    margin-bottom: calc(0.25rem * var(--tw-space-y-reverse));
}

.space-y-2 > :not([hidden]) ~ :not([hidden]) {
    --tw-space-y-reverse: 0;
    margin-top: calc(0.5rem * calc(1 - var(--tw-space-y-reverse)));
    margin-bottom: calc(0.5rem * var(--tw-space-y-reverse));
}

.space-y-5 > :not([hidden]) ~ :not([hidden]) {
    --tw-space-y-reverse: 0;
    margin-top: calc(1.25rem * calc(1 - var(--tw-space-y-reverse)));
    margin-bottom: calc(1.25rem * var(--tw-space-y-reverse));
}

.divide-y > :not([hidden]) ~ :not([hidden]) {
    --tw-divide-y-reverse: 0;
    border-top-width: calc(1px * calc(1 - var(--tw-divide-y-reverse)));
    border-bottom-width: calc(1px * var(--tw-divide-y-reverse));
}

.divide-x > :not([hidden]) ~ :not([hidden]) {
    --tw-divide-x-reverse: 0;
    border-right-width: calc(1px * var(--tw-divide-x-reverse));
    border-left-width: calc(1px * calc(1 - var(--tw-divide-x-reverse)));
}

.divide-dashed > :not([hidden]) ~ :not([hidden]) {
    border-style: dashed;
}

.divide-gray-300 > :not([hidden]) ~ :not([hidden]) {
    --tw-divide-opacity: 1;
    border-color: rgb(209 213 219 / var(--tw-divide-opacity));
}

.divide-gray-200 > :not([hidden]) ~ :not([hidden]) {
    --tw-divide-opacity: 1;
    border-color: rgb(229 231 235 / var(--tw-divide-opacity));
}

.rounded-l-md {
    border-top-left-radius: 0.375rem;
    border-bottom-left-radius: 0.375rem;
}

.rounded-r-md {
    border-top-right-radius: 0.375rem;
    border-bottom-right-radius: 0.375rem;
}



.border {
    border-width: 1px;
}

.border-r-0 {
    border-right-width: 0px;
}


.bg-white {
    --tw-bg-opacity: 1;
}

.bg-primary {
    --tw-bg-opacity: 1;
}

.bg-gray-800 {
    --tw-bg-opacity: 1;
}


.object-contain {
    -o-object-fit: contain;
    object-fit: contain;
}

.py-4 {
    padding-top: 1rem;
    padding-bottom: 1rem;
}

.py-3 {
    padding-top: 0.75rem;
    padding-bottom: 0.75rem;
}

.px-8 {
    padding-left: 2rem;
    padding-right: 2rem;
}

.px-6 {
    padding-left: 1.5rem;
    padding-right: 1.5rem;
}

.pl-12 {
    padding-left: 3rem;
}

.pr-3 {
    padding-right: 0.75rem;
}


.text-lg {
    font-size: 1.125rem;
    line-height: 1.75rem;
}

.text-2xl {
    font-size: 1.5rem;
    line-height: 2rem;
}

.text-xs {
    font-size: 0.75rem;
    line-height: 1rem;
}

.text-sm {
    font-size: 0.875rem;
    line-height: 1.25rem;
}


.capitalize {
    text-transform: capitalize;
}

.leading-3 {
    line-height: .75rem;
}

.tracking-wider {
    letter-spacing: 0.05em;
}

.text-gray-400 {
    --tw-text-opacity: 1;
    color: rgb(156 163 175 / var(--tw-text-opacity));
}

.text-white {
    --tw-text-opacity: 1;
    color: rgb(255 255 255 / var(--tw-text-opacity));
}

.text-gray-700 {
    --tw-text-opacity: 1;
    color: rgb(55 65 81 / var(--tw-text-opacity));
}

.text-gray-600 {
    --tw-text-opacity: 1;
    color: rgb(75 85 99 / var(--tw-text-opacity));
}

.text-gray-200 {
    --tw-text-opacity: 1;
    color: rgb(229 231 235 / var(--tw-text-opacity));
}

.opacity-0 {
    opacity: 0;
}

.shadow-sm {
    --tw-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05);
    --tw-shadow-colored: 0 1px 2px 0 var(--tw-shadow-color);
}

.shadow-md {
    --tw-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
    --tw-shadow-colored: 0 4px 6px -1px var(--tw-shadow-color), 0 2px 4px -2px var(--tw-shadow-color);
}



.duration-300 {
    transition-duration: 300ms;
}

.hover\:bg-transparent:hover {
    background-color: transparent;
}

.hover\:bg-gray-100:hover {
    --tw-bg-opacity: 1;
    background-color: rgb(243 244 246 / var(--tw-bg-opacity));
}

.hover\:text-primary:hover {
    --tw-text-opacity: 1;
    color: rgb(253 61 87 / var(--tw-text-opacity));
}

.hover\:text-white:hover {
    --tw-text-opacity: 1;
    color: rgb(255 255 255 / var(--tw-text-opacity));
}


.focus\:outline-none:focus {
    outline: 2px solid transparent;
    outline-offset: 2px;
}


.group:hover .group-hover\:visible {
    visibility: visible;
}

.group:hover .group-hover\:bg-opacity-60 {
    --tw-bg-opacity: 0.6;
}

.group:hover .group-hover\:opacity-100 {
    opacity: 1;
}


.cart-dropdown:hover .cart-dropdown-menu {
    opacity:1;
    transform: translate(1px , 1px) scale(1);
    visibility: visible;
    box-shadow: 10px 50px 10px black;
}
</style>
