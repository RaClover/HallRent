<script setup>
import {ref, onMounted, onUnmounted, computed} from 'vue'
import { usePage } from '@inertiajs/inertia-vue3'
import {Link, router} from '@inertiajs/vue3';

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
    <div
        @mouseover="showCart = true" @mouseleave="showCart = false"
        class="profile-dropdown relative ml-20">
        <Link :href="route('cart.index')" class=" flex items-center p-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart w-7 h-7 transform transition duration-500 ease-in-out" width="25" height="20" viewBox="1 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <circle cx="6" cy="19" r="2" />
                <circle cx="17" cy="19" r="2" />
                <path d="M17 17h-11v-14h-2" />
                <path d="M6 5l14 1l-1 7h-13" />
            </svg>
            <span v-if="this.$page.props.cartItemCount > 0" class="bg-red-500 text-white  px-1.5 rounded-sm ">{{this.$page.props.cartItemCount}}</span>
        </Link>
        <div

            v-if="showCart && this.$page.props.cartItemCount > 0"
            class="opacity-0 invisible profile-dropdown-menu absolute left-1 -scroll-mt-1.5 w-64 bg-white rounded-lg  z-10">
            <div

                class="w-screen max-w-sm border border-gray-600 bg-gray-100 p-8 pt-4"
                aria-modal="true"
                role="dialog"
                tabindex="-1"
            >
                <div class="mt-6 space-y-6">
                    <ul class="space-y-4">
                        <li v-for="cart in this.$page.props.cartItems" class="flex items-center gap-4">
                            <img
                                :src="cart.item.itemImg"
                                alt=""
                                class="h-16 w-16 rounded object-cover"
                            />

                            <div>
                                <h3 class="text-sm text-gray-900">{{cart.item.itemName}}</h3>

                                <dl class="mt-0.5 space-y-px text-[10px] text-gray-600">
                                    <div>
                                        <dt class="inline">الكمية: </dt>
                                        <dd class="inline">{{cart.quantity}}</dd>

                                    </div>

                                    <div>
                                        <dt class="inline">السعر: </dt>
                                        <dd class="inline">{{cart.item.price * cart.quantity}}</dd>
                                    </div>
                                </dl>
                            </div>

                            <div class="flex flex-1 items-center justify-end gap-2">

                                <Link
                                    preserve-scroll
                                    method="delete" as="button" type="button"
                                    :href="route('cart.remove' , cart.id)"
                                    class="text-gray-600 transition hover:text-red-600">
                                    <span class="sr-only">Remove item</span>

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="h-4 w-4"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                                        />
                                    </svg>
                                </Link>
                            </div>
                        </li>
                    </ul>

                    <div class="space-y-4 text-center">
                        <Link
                            :href="route('cart.index')"
                            class="block rounded border border-gray-600 px-5 py-3 text-sm text-gray-600 transition hover:ring-1 hover:ring-gray-400"
                        >
                            عرض سلة التسوق ({{this.$page.props.cartItemCount}})
                        </Link>

                        <a
                            href="#"
                            class="block rounded bg-blue-500 px-5 py-3 text-sm text-gray-100 transition hover:bg-blue-600"
                        >
                            شراء
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<style>

.profile-dropdown:hover .profile-dropdown-menu {
    opacity:1;
    transform: translate(1px , 1px) scale(1);
    visibility: visible;
}
</style>
