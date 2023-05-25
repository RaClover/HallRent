<script>

import {defineComponent} from "vue";
import Dropdown from "@/Components/Dropdown.vue";
import {Link} from "@inertiajs/vue3";
import DropdownLink from "@/Components/DropdownLink.vue";

export default defineComponent({
    components: {
        DropdownLink,
        Link,
        Dropdown
    }
})
</script>
<template>
    <div class="flex flex-col  mt-20">
        <!-- Navbar -->
        <nav class="flex justify-around py-1 bg-white/80
            backdrop-blur-md shadow-md w-full
            fixed top-0 left-0 right-0 z-10">

            <!-- Logo Container -->
            <div class="flex items-center">
                <!-- Logo -->
                <Link
                    :href="route('homePage')"
                    class="cursor-pointer">
                    <h3 class="text-2xl font-medium text-blue-500">
                        <img class="max-h-16 object-cover rounded-full"
                             src="https://cdn.dribbble.com/userupload/3158902/file/original-7c71bfa677e61dea61bc2acd59158d32.jpg?resize=400x0" alt="Store Logo">
                    </h3>
                </Link>
            </div>

            <!-- Links Section -->
            <div class="items-center hidden space-x-32 lg:flex">
                <Link
                    :href="route('homePage')"
                    class="flex text-gray-600 hover:text-blue-500
                    cursor-pointer transition-colors duration-300">
                    Home
                </Link>



                <Link
                    :href="route('aboutUs')"
                    class="flex text-gray-600 hover:text-blue-500
                    cursor-pointer transition-colors duration-300">
                    About Us
                </Link>

                <Link
                    :href="route('contactUs.create')"
                    class="flex text-gray-600 hover:text-blue-500
                    cursor-pointer transition-colors duration-300">
                    Contact Us
                </Link>
            </div>



            <!-- Icon Menu Section -->
            <div v-if="!this.$page.props.auth.user" class="flex items-center space-x-5">



                <Link
                    class="inline-flex items-center gap-2 rounded-md border border-white bg-gray-200 px-4 py-3  motion-safe:hover:scale-[1.02]  hover:bg-gray-300  active:bg-white/90"
                    :href="route('becomePartner')"
                    preserve-scroll
                    scroll-region
                >
                    <span class="text-sm font-medium">Become Partner</span>

                    <svg
                        class="h-5 w-5 rtl:rotate-180"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3"
                        />
                    </svg>
                </Link>

                <!-- Register -->
                <Link
                    :href="route('register')"
                    class="flex text-gray-600 hover:text-blue-500
                    cursor-pointer transition-colors duration-300">

                    <svg class="fill-current h-5 w-5 mr-2 mt-0.5" xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24"
                         viewBox="0 0 24 24">
                        <path
                            d="M12 0L11.34 .03L15.15 3.84L16.5 2.5C19.75 4.07 22.09 7.24 22.45 11H23.95C23.44 4.84 18.29 0 12 0M12 4C10.07 4 8.5 5.57 8.5 7.5C8.5 9.43 10.07 11 12 11C13.93 11 15.5 9.43 15.5 7.5C15.5 5.57 13.93 4 12 4M12 6C12.83 6 13.5 6.67 13.5 7.5C13.5 8.33 12.83 9 12 9C11.17 9 10.5 8.33 10.5 7.5C10.5 6.67 11.17 6 12 6M.05 13C.56 19.16 5.71 24 12 24L12.66 23.97L8.85 20.16L7.5 21.5C4.25 19.94 1.91 16.76 1.55 13H.05M12 13C8.13 13 5 14.57 5 16.5V18H19V16.5C19 14.57 15.87 13 12 13M12 15C14.11 15 15.61 15.53 16.39 16H7.61C8.39 15.53 9.89 15 12 15Z" />
                    </svg>

                    Register
                </Link>

                <!-- Login -->
                <Link
                    :href="route('login')"
                    class="flex text-gray-600
                    cursor-pointer transition-colors duration-300
                    font-semibold text-blue-600">

                    <svg class="fill-current h-5 w-5 mr-2 mt-0.5" xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24"
                         viewBox="0 0 24 24">
                        <path
                            d="M10,17V14H3V10H10V7L15,12L10,17M10,2H19A2,2 0 0,1 21,4V20A2,2 0 0,1 19,22H10A2,2 0 0,1 8,20V18H10V20H19V4H10V6H8V4A2,2 0 0,1 10,2Z" />
                    </svg>

                    Login
                </Link>
            </div>

            <div v-if="this.$page.props.auth.user" class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <Dropdown align="right" width="48">
                        <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button
                                                type="button"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                            >
                                                {{ $page.props.auth.user.name }}

                                                <svg
                                                    class="ml-2 -mr-0.5 h-4 w-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>
                                            </button>
                                        </span>
                        </template>

                        <template #content>
                            <DropdownLink
                                v-if="$page.props.auth.user.role === 'user'"
                                :href="route('my.profile.edit')">
                                Profile
                            </DropdownLink>
                            <DropdownLink
                                v-if="$page.props.auth.user.role === 'partner'"
                                :href="route('partner.dashboard')">
                                Profile
                            </DropdownLink>

                            <DropdownLink
                                v-if="$page.props.auth.user.role === 'admin'"
                                :href="route('admin.dashboard')">
                                Profile
                            </DropdownLink>

                            <DropdownLink :href="route('logout')" method="post" as="button">
                                Log Out
                            </DropdownLink>
                        </template>
                    </Dropdown>
                </div>
            </div>
        </nav>

        <slot/>
    </div>
</template>

<style>

</style>
