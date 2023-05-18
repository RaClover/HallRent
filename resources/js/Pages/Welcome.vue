<script>
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavBarLayout from "@/Layouts/User/NavBarLayout.vue";
import {Link, usePage} from "@inertiajs/vue3";
import pickBy from 'lodash/pickBy'
import throttle from 'lodash/throttle'
import mapValues from 'lodash/mapValues'
import {reactive, watchEffect} from "vue";
import { router } from '@inertiajs/vue3'
import {InertiaLink} from "@inertiajs/inertia-vue3";
import {get, Inertia, replace} from '@inertiajs/inertia';
import CityCards from "@/Components/User/WelcomePage/CityCards.vue";
import Halls from "@/Pages/User/Halls.vue";
import Cities from "@/Pages/User/Cities.vue";
import CityDropdownList from "@/Components/User/WelcomePage/CityDropdownList.vue";
import FooterLayout from "@/Layouts/User/FooterLayout.vue";


export default {
    components: {
        FooterLayout,
        CityDropdownList,
        Cities,
        Dropdown,
        DropdownLink,
        NavBarLayout,
        Link,
        router,
        CityCards,
        Halls
    } ,

    props: {
        address: {
            type: Object,
            required: true
        },
        cities: {
            type: Array,
            required: true
        },
        cityImages: {
            type : Array ,
            required : true
        },
    },
    setup() {
        const { route } = usePage();

        const state = reactive({
            selectedCity: '',
        });

        return {
            state,
        };
    },
}
</script>


<template>
<NavBarLayout>
    <section class="banner_main bg-no-repeat flex justify-center content-center items-center">
        <div class="container mx-auto sm:px-4">
            <div class="flex flex-wrap ">
                <div class="md:w-full pr-4 pl-4">
                    <div class="text-bg text-center pb-12">
                        <div class="padding_lert">
                            <h1 class="text-white text-5xl pb-8 mb-10 font-bold uppercase">WELCOME TO HALLS RENTING </h1>
                            <p v-if="$page.props.flash.message">{{$page.props.flash.message}}</p>
                            <div class=" rounded-xl">
                                <div class="grid xl:grid-cols-4 gap-4">
                                    <CityDropdownList v-model="state.selectedCity" :value="address.city" :cities="cities"/>





                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


   <CityCards :address="address" :cityImages="cityImages"/>

<!--    Why us section -->
    <section>
        <div class="max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8 lg:py-16">
            <div
                class="grid grid-cols-1 gap-y-8 lg:grid-cols-2 lg:items-center lg:gap-x-16"
            >
                <div
                    class="mx-auto max-w-lg text-center lg:mx-0 ltr:lg:text-left rtl:lg:text-right"
                >
                    <h2 class="text-3xl font-bold sm:text-4xl">What makes us special</h2>

                    <p class="mt-4 text-gray-600">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut vero
                        aliquid sint distinctio iure ipsum cupiditate? Quis, odit assumenda?
                        Deleniti quasi inventore, libero reiciendis minima aliquid tempora.
                        Obcaecati, autem.
                    </p>

                    <a
                        href="#"
                        class="mt-8 inline-block rounded bg-amber-600 px-12 py-3 text-sm font-medium text-white focus:outline-none focus:ring focus:ring-yellow-400"
                    >
                        See More About Us
                    </a>
                </div>

                <div class="grid grid-cols-2 gap-4 sm:grid-cols-3">
                    <a
                        class="block rounded-xl border border-gray-100 p-4 shadow-sm hover:border-gray-200 hover:ring-1 hover:ring-gray-200 focus:outline-none focus:ring"
                        href="/accountant"
                    >
          <span class="inline-block rounded-lg bg-gray-50 p-3">
            <svg
                class="h-6 w-6"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
            >
              <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
              <path
                  d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"
              ></path>
              <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"
              ></path>
            </svg>
          </span>

                        <h2 class="mt-2 font-bold">Accountant</h2>

                        <p class="hidden sm:mt-1 sm:block sm:text-sm sm:text-gray-600">
                            Lorem ipsum dolor sit amet consectetur.
                        </p>
                    </a>

                    <a
                        class="block rounded-xl border border-gray-100 p-4 shadow-sm hover:border-gray-200 hover:ring-1 hover:ring-gray-200 focus:outline-none focus:ring"
                        href="/accountant"
                    >
          <span class="inline-block rounded-lg bg-gray-50 p-3">
            <svg
                class="h-6 w-6"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
            >
              <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
              <path
                  d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"
              ></path>
              <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"
              ></path>
            </svg>
          </span>

                        <h2 class="mt-2 font-bold">Accountant</h2>

                        <p class="hidden sm:mt-1 sm:block sm:text-sm sm:text-gray-600">
                            Lorem ipsum dolor sit amet consectetur.
                        </p>
                    </a>

                    <a
                        class="block rounded-xl border border-gray-100 p-4 shadow-sm hover:border-gray-200 hover:ring-1 hover:ring-gray-200 focus:outline-none focus:ring"
                        href="/accountant"
                    >
          <span class="inline-block rounded-lg bg-gray-50 p-3">
            <svg
                class="h-6 w-6"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
            >
              <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
              <path
                  d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"
              ></path>
              <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"
              ></path>
            </svg>
          </span>

                        <h2 class="mt-2 font-bold">Accountant</h2>

                        <p class="hidden sm:mt-1 sm:block sm:text-sm sm:text-gray-600">
                            Lorem ipsum dolor sit amet consectetur.
                        </p>
                    </a>

                    <a
                        class="block rounded-xl border border-gray-100 p-4 shadow-sm hover:border-gray-200 hover:ring-1 hover:ring-gray-200 focus:outline-none focus:ring"
                        href="/accountant"
                    >
          <span class="inline-block rounded-lg bg-gray-50 p-3">
            <svg
                class="h-6 w-6"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
            >
              <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
              <path
                  d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"
              ></path>
              <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"
              ></path>
            </svg>
          </span>

                        <h2 class="mt-2 font-bold">Accountant</h2>

                        <p class="hidden sm:mt-1 sm:block sm:text-sm sm:text-gray-600">
                            Lorem ipsum dolor sit amet consectetur.
                        </p>
                    </a>

                    <a
                        class="block rounded-xl border border-gray-100 p-4 shadow-sm hover:border-gray-200 hover:ring-1 hover:ring-gray-200 focus:outline-none focus:ring"
                        href="/accountant"
                    >
          <span class="inline-block rounded-lg bg-gray-50 p-3">
            <svg
                class="h-6 w-6"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
            >
              <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
              <path
                  d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"
              ></path>
              <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"
              ></path>
            </svg>
          </span>

                        <h2 class="mt-2 font-bold">Accountant</h2>

                        <p class="hidden sm:mt-1 sm:block sm:text-sm sm:text-gray-600">
                            Lorem ipsum dolor sit amet consectetur.
                        </p>
                    </a>

                    <a
                        class="block rounded-xl border border-gray-100 p-4 shadow-sm hover:border-gray-200 hover:ring-1 hover:ring-gray-200 focus:outline-none focus:ring"
                        href="/accountant"
                    >
          <span class="inline-block rounded-lg bg-gray-50 p-3">
            <svg
                class="h-6 w-6"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
            >
              <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
              <path
                  d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"
              ></path>
              <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"
              ></path>
            </svg>
          </span>

                        <h2 class="mt-2 font-bold">Accountant</h2>

                        <p class="hidden sm:mt-1 sm:block sm:text-sm sm:text-gray-600">
                            Lorem ipsum dolor sit amet consectetur.
                        </p>
                    </a>
                </div>
            </div>
        </div>
    </section>
 <!--    end Why us section -->


    <!--  What customers say ? section  -->





    <section class="flex items-center bg-stone-50 xl:h-screen font-poppins ">
        <div class="justify-center flex-1 px-4 py-6 mx-auto max-w-7xl lg:py-4 md:px-6">
            <div class=" text-center">
                <h2 class="text-3xl font-bold mb-12">See What Customers Say about Us</h2>
            </div>
            <div class="flex items-center justify-around">
                <button
                    class="flex-shrink-0 hidden w-16 h-16 p-5 mr-2 bg-blue-500 rounded-full text-gray-50 lg:block hover:bg-blue-800">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="w-5 h-5 bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                    </svg>
                </button>
                <div id="carouselExampleCaptions" class="carousel slide relative carousel-dark" data-bs-ride="carousel">
                    <div class="carousel-inner relative w-full overflow-hidden">
                        <div class="carousel-item relative float-left w-full">
                            <img class="rounded-full shadow-lg mb-6 mx-auto"
                                 src="https://mdbootstrap.com/img/Photos/Avatars/img%20(32).jpg" alt="avatar" style="width: 150px" />
                            <div class="flex flex-wrap justify-center">
                                <div class="grow-0 shrink-0 basis-auto w-full lg:w-8/12 px-3">
                                    <h5 class="text-lg font-bold mb-3">John Doe</h5>
                                    <p class="text-gray-500 mb-6">
                                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="quote-left"
                                             class="w-6 pr-2 inline-block" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="currentColor"
                                                  d="M464 256h-80v-64c0-35.3 28.7-64 64-64h8c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24h-8c-88.4 0-160 71.6-160 160v240c0 26.5 21.5 48 48 48h128c26.5 0 48-21.5 48-48V304c0-26.5-21.5-48-48-48zm-288 0H96v-64c0-35.3 28.7-64 64-64h8c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24h-8C71.6 32 0 103.6 0 192v240c0 26.5 21.5 48 48 48h128c26.5 0 48-21.5 48-48V304c0-26.5-21.5-48-48-48z">
                                            </path>
                                        </svg>
                                        Maecenas auctor, quam eget tincidunt pretium, felis diam semper turpis, sed
                                        scelerisque diam libero facilisis libero. Quisque vitae semper metus. Aliquam eu
                                        dui aliquam, faucibus metus quis, elementum nunc.
                                    </p>
                                    <ul class="flex justify-center mb-0">
                                        <li>
                                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star"
                                                 class="w-4 text-yellow-500" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                <path fill="currentColor"
                                                      d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                                                </path>
                                            </svg>
                                        </li>
                                        <li>
                                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star"
                                                 class="w-4 text-yellow-500" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                <path fill="currentColor"
                                                      d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                                                </path>
                                            </svg>
                                        </li>
                                        <li>
                                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star"
                                                 class="w-4 text-yellow-500" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                <path fill="currentColor"
                                                      d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                                                </path>
                                            </svg>
                                        </li>
                                        <li>
                                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star"
                                                 class="w-4 text-yellow-500" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                <path fill="currentColor"
                                                      d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                                                </path>
                                            </svg>
                                        </li>
                                        <li>
                                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star-half-alt"
                                                 class="w-4 text-yellow-500" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 536 512">
                                                <path fill="currentColor"
                                                      d="M508.55 171.51L362.18 150.2 296.77 17.81C290.89 5.98 279.42 0 267.95 0c-11.4 0-22.79 5.9-28.69 17.81l-65.43 132.38-146.38 21.29c-26.25 3.8-36.77 36.09-17.74 54.59l105.89 103-25.06 145.48C86.98 495.33 103.57 512 122.15 512c4.93 0 10-1.17 14.87-3.75l130.95-68.68 130.94 68.7c4.86 2.55 9.92 3.71 14.83 3.71 18.6 0 35.22-16.61 31.66-37.4l-25.03-145.49 105.91-102.98c19.04-18.5 8.52-50.8-17.73-54.6zm-121.74 123.2l-18.12 17.62 4.28 24.88 19.52 113.45-102.13-53.59-22.38-11.74.03-317.19 51.03 103.29 11.18 22.63 25.01 3.64 114.23 16.63-82.65 80.38z">
                                                </path>
                                            </svg>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>







                <button
                    class="flex-shrink-0 hidden w-16 h-16 p-5 mr-2 bg-blue-500 rounded-full text-gray-50 lg:block hover:bg-blue-800">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="w-5 h-5 bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                    </svg>
                </button>
            </div>
        </div>
    </section>
    <!--  end  customers say ? section  -->



</NavBarLayout>

    <FooterLayout/>
</template>

<style scoped>

/** banner section **/

.banner_main {
    background: url('https://static.vecteezy.com/system/resources/previews/011/651/324/original/newyork-city-highrise-skyline-simplicity-flat-design-free-png.png');
    min-height: 300px;
    display: flex;
    justify-content: center;
    align-content: center;
    align-items: center;
    background-size: 100% 100%;
}

.text-bg {
    text-align: center;
    padding-bottom: 80px;
}

.text-bg h1 {
    color: rgba(255, 0, 0, 0.63);
    line-height: 1px;
    font: italic 3em "Fira Sans", serif;
}
.text-bg a {
    font-size: 17px;
    background-color: #e8ce7c;
    color: #000;
    font-weight: 500;
    padding: 9px 0px;
    width: 100%;
    max-width: 190px;
    text-align: center;
    display: inline-block;
    transition: ease-in all 0.2s;
    border-radius: 10px
}

.text-bg a:hover {
    background-color: #eec237;
}

.titlepage {
    text-align: center;
    padding-bottom: 60px;
}

.titlepage h2 {
    font-size: 55px;
    color: #313131;
    line-height: 60px;
    font-weight: bold;
    padding: 0;
}

.form_book .date {
    color: #7e7e7e;
    font-weight: bold;
    font-size: 15px;
    text-transform: uppercase;
    padding-left: 17px;
}
.choose {
    margin-top: 90px;
}

.choose_box {
    padding-top: 76px;
}

.choose_box .titlepage {
    text-align: left;
    padding-bottom: 35px;
}

.text_norlam {
    font-weight: normal;
}

.choose_box p {
    font-size: 17px;
    line-height: 36px;
    color: #313131;
    padding: 0px 0px 45px 0px;
}

.img_box {
    margin-bottom: 30px;
}

.img_box figure {
    margin: 0;
}

.img_box figure img {
    width: 100%;
}


/** end Choose  section **/

</style>
