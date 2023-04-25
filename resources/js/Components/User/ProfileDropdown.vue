<script setup>

import {Link, router} from "@inertiajs/vue3";
defineProps({
    auth: Object
})
</script>
<template>

            <div class=" relative inline-block text-left dropdown right-3" >
    <span class="rounded-full ">
        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class=" w-11 h-11 inline-flex justify-centerw-full px-1 py-2 text-sm font-medium  text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-full hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800">
            <path fill="currentColor" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-3.48 0-6.72 1.66-8.74 4.38-.21.28-.34.62-.34 1.02v2c0 .55.45 1 1 1h16c.55 0 1-.45 1-1v-2c0-.4-.13-.74-.34-1.02-2.02-2.72-5.26-4.38-8.74-4.38z"/>
       </svg>
    </span>
                <div v-if="$page.props.auth.user" class="opacity-0 invisible dropdown-menu transition-all duration-300 transform origin-top-right -translate-y-2 scale-100">
                    <div class="absolute -left-16 w-56 mt-2 origin-top-right bg-white border border-gray-400 divide-y divide-gray-200 rounded-md shadow-2xl outline-8" aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu" >
                        <div class="px-2 py-4 ml-14">
                            <p class="text-md font-semibold" >{{ $page.props.auth.user.name }}</p>
                        </div>
                        <div class="py-5">
                            <Link :href="route('my.profile.edit')" tabindex="0" class="text-black hover:bg-blue-50 flex justify-between w-full px-4 py-3 text-sm leading-5 text-right"  role="menuitem" >الملف الشخصي</Link>
                            <Link :href="route('my.orders')" tabindex="1" class="text-black hover:bg-blue-50 flex justify-between w-full px-4 py-3 text-sm leading-5 text-right"  role="menuitem" >الطلبات</Link>
                            <Link :href="route('my.messages')" tabindex="2" class="text-black  hover:bg-blue-50 flex justify-between w-full px-4 py-3 text-sm leading-5 text-right" role="menuitem" >الرسائل</Link></div>
                        <div class="py-1">
                            <Link
                                method="post" as="button"
                                :href="route('logout')" tabindex="3" class="text-black flex justify-between  hover:bg-blue-50 w-full px-4 py-3 text-sm leading-5 text-right"  role="menuitem" >تسجيل الخروج</Link></div>
                    </div>
                </div>



                <div v-else class="opacity-0 invisible dropdown-menu transition-all duration-300 transform origin-top-right -translate-y-2 scale-100">
                    <div class="absolute -left-16 w-56 mt-2 origin-top-right bg-white border border-gray-400 divide-y divide-gray-200 rounded-md shadow-2xl outline-8" aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu" >
                        <div class="px-2 py-4 ml-14">
                            <p class="text-md font-semibold " >قم بتسجيل الدخول للتسوق وتتبع الطلبات واستمتع بالخصومات.</p>
                        </div>

                        <div class="py-1">
                            <Link :href="route('register')" tabindex="3" class="text-black flex justify-between bg-blue-500 hover:bg-blue-600 rounded-md w-full px-5 py-2 text-sm leading-5 text-right"  role="menuitem" >انشاء حساب</Link>
                        </div>
                    </div>

                </div>




            </div>

</template>



<style scoped>
.dropdown:hover .dropdown-menu {
    opacity:1;
    transform: translate(1px , 1px) scale(1);
    visibility: visible;
    box-shadow: 10px 50px 10px black;
}
</style>
