<script setup>
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavBarLayout from "@/Layouts/User/NavBarLayout.vue";
import {Link} from "@inertiajs/vue3";
import pickBy from 'lodash/pickBy'
import throttle from 'lodash/throttle'
import mapValues from 'lodash/mapValues'
import {watchEffect} from "vue";
import { router } from '@inertiajs/vue3'
import {InertiaLink} from "@inertiajs/inertia-vue3";
import { get, replace } from '@inertiajs/inertia';
import CityCards from "@/Components/User/WelcomePage/CityCards.vue";



defineProps({
   address:{
       type: Array ,
       required: true
   }
})
</script>


<template>
<NavBarLayout>
    <section
        class="banner_main bg-no-repeat flex justify-center content-center items-center">
        <div class="container mx-auto sm:px-4 mx-auto sm:px-4">
            <div class="flex flex-wrap ">
                <div class="md:w-full pr-4 pl-4">
                    <div class="text-bg text-center pb-12">
                        <div class="padding_lert">
                            <h1 class="text-white text-5xl pb-8 mb-10 font-bold uppercase">WELCOME TO HALLS RENTING </h1>
                            <div class=" rounded-xl">
                                <div class="grid  xl:grid-cols-4 gap-4 ">
                                    <div class="flex flex-col p-1">
                                        <input
                                            type="text"
                                            id="name"
                                            placeholder="City"
                                            class="mt-2 block w-full rounded-md border-gray-300 focus:border-orange-300 focus:ring focus:ring-orange-200 focus:ring-opacity-50"
                                        >
                                    </div>

                                    <div class="flex flex-col">
                                        <input
                                            type="date"
                                            id="date"
                                            placeholder="johndoe@example.com"
                                            class="mt-2 block w-full rounded-md border-gray-300  focus:border-orange-300 focus:ring focus:ring-orange-200 focus:ring-opacity-50"
                                        >
                                    </div>

                                    <div class="flex flex-col">
                                        <input
                                            type="date"
                                            id="date"
                                            class="mt-2 block w-full rounded-md border-gray-300  focus:border-orange-300 focus:ring focus:ring-orange-200 focus:ring-opacity-50"
                                        >
                                    </div>




                                    <div class="flex flex-col ">
                                        <input
                                            type="submit"
                                            id="date"
                                            class="mt-2  pt-2 py-2  w-1/2 rounded-lg text-stone-50 bg-orange-300 hover:bg-orange-400 font-bold  transition ease-in-out duration-200 translate-10"
                                        >
                                    </div>



                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>


        </div>
    </section>







   <CityCards :address="address"/>

    <!-- choose  section -->
    <div class="choose">
        <div class="container mx-auto sm:px-4">
            <div class="flex flex-wrap ">
                <div class="md:w-1/2 pr-4 pl-4">
                    <div class="choose_box">
                        <div class="titlepage">
                            <h2><span class="text_norlam">Choose The Perfect</span> <br>Accommodation</h2>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit </p>
                        <a class="read_more" href="#">See More</a>
                    </div>
                </div>
                <div class="md:w-1/2 pr-4 pl-4">
                    <div class="flex flex-wrap ">
                        <div class="md:w-full pr-4 pl-4">
                            <div class="img_box">
                                <figure><img src="images/img1.jpg" alt="#"/></figure>
                            </div>
                        </div>
                        <div class="md:w-1/2 pr-4 pl-4">
                            <div class="img_box">
                                <figure><img src="images/img2.jpg" alt="#"/></figure>
                            </div>
                        </div>
                        <div class="md:w-1/2 pr-4 pl-4">
                            <div class="img_box">
                                <figure><img src="images/img3.jpg" alt="#"/></figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end choose  section -->

</NavBarLayout>
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
    background-color: #fff;
    color: #000;
    font-weight: 500;
    padding: 13px 0px;
    width: 100%;
    max-width: 190px;
    text-align: center;
    display: inline-block;
    transition: ease-in all 0.5s;
    border-radius: 10px
}

.text-bg a:hover {
    background-color: #eec237;
    color: #fff;
    transition: ease-in all 0.5s;
    border-radius: 25px
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
