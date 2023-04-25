<script setup>
import {Link, router} from "@inertiajs/vue3";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavBarLayout from "@/Layouts/User/NavBarLayout.vue";
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
                            <h1 class="text-white text-5xl pb-4 font-bold uppercase">WELCOME TO HALLS RENTING </h1>
                            <span class="text-white text-5xl font-bold pb-5 block">LANDING PAGE</span>
                            <p class="text-white text-base leading-7 pb-16">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</p>
                            <a
                                class="text-base bg-white text-black font-medium w-full text-center inline-block bg-yellow-500 text-white"
                                href="#">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end banner -->
    <!-- form_lebal -->
    <section>
        <div class="container mx-auto sm:px-40 mx-auto sm:px-1">
            <div class="flex flex-wrap ">
                <div class="md:w-full pr-4 pl-4">
                    <form class="form_book">
                        <div class="flex flex-wrap ">
                            <div class="md:w-1/4 pr-4 pl-4">
                                <label class="date">ARRIVAL DATE</label>
                                <input class="book_n"  type="date" >
                            </div>
                            <div class="md:w-1/4 pr-4 pl-4">
                                <label class="date">DEPARTURE DATE</label>
                                <input class="book_n"  type="date" >
                            </div>
                            <div class="md:w-1/4 pr-4 pl-4">
                                <label class="date">PERSON</label>
                                <input class="book_n" placeholder="2" type="type" name="2">
                            </div>
                            <div class="md:w-1/4 pr-4 pl-4">
                                <button class="book_btn">Book Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


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
    background: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3s5Xlft62YXNeIsDKfZE10z91JcGRzAWMQPOxbe46U5nIVXGH-0U53Afqy4WGiakkKy0&usqp=CAU');
    min-height: 700px;
    display: flex;
    justify-content: center;
    align-content: center;
    align-items: center;
    background-size: 100% 100%;
}

.text-bg {
    text-align: center;
    padding-bottom: 50px;
}

.text-bg h1 {
    color: #fff;
    font-size: 50px;
    line-height: 50px;
    padding-bottom: 15px;
    font-weight: bold;
    text-transform: uppercase;
}

.text-bg span {
    color: #fff;
    font-size: 45px;
    line-height: 50px;
    font-weight: bold;
    padding-bottom: 20px;
    display: block;
}

.text-bg p {
    color: #fff;
    font-size: 17px;
    line-height: 28px;
    padding-bottom: 60px;
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

.d_flex {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
}


/** banner section **/

.form_book {
    background: white;
    margin-top: -104px;
    padding: 30px 8px 8px 60px;
    border-radius: 40px 40px 0px 0px;
}

.form_book .date {
    color: #7e7e7e;
    font-weight: bold;
    font-size: 15px;
    text-transform: uppercase;
    padding-left: 17px;
}

.book_n {
    border: inherit;
    border-radius: 20px;
    background-color: #eeeeee;
    width: 100%;
    font-size: 16px;
    height: auto;
    line-height: normal;
    padding: 10px 20px;
    -webkit-appearance: none !important;
}


.book_btn {
    font-size: 17px;
    background-color: #000;
    color: #fff;
    font-weight: 500;
    padding: 5px 0px;
    width: 100%;
    max-width: 161px;
    text-align: center;
    display: inline-block;
    transition: ease-in all 0.5s;
    border-radius: 10px;
    margin-top: 33px;
}

.book_btn:hover {
    background-color: #eec237;
    color: #fff;
    transition: ease-in all 0.5s;
    border-radius: 25px
}


/** banner section **/



/** Choose  section **/


/** Choose  section **/

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
