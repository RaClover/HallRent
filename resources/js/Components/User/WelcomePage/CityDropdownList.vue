<template>
    <div class="flex flex-col p-1 w-full sm:w-1/2 md:w-1/4 lg:w-1/4 xl:w-auto  ">
        <div class="rounded-lg px-1 mb-0">
    <div class="relative">
        <input type="text" id="city" placeholder="City" class="mt-2 block w-full rounded-md border-gray-300 focus:border-orange-300 focus:ring focus:ring-orange-200 focus:ring-opacity-50" v-model="state.searchTerm" @input="searchCities">
        <div class="absolute z-10 top-11 left-0 right-0 bg-white shadow-md rounded-md" v-show="dropdownVisible" ref="dropdown">
            <div v-for="(city, index) in filteredCities" :key="index" class="flex flex-wrap justify-start cursor-pointer text-gray-700 hover:text-blue-400 hover:bg-blue-100 rounded-md px-2 py-2 my-2" @click="selectCity(city)">
                <div class="flex-grow font-medium px-2 text-left">{{ city }}</div>
            </div>
        </div>
    </div>
        </div>
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
    <div v-if="showSearchLink" class="flex flex-col ">
        <Link

            type="submit"
            class="mt-2  pt-2 py-2  w-1/2 rounded-lg text-stone-50 bg-amber-600 font-bold  transition ease-in-out duration-200 translate-10"
            :href="route('halls.index' , { city: state.selectedCity || state.searchTerm })"
        >
           Search
        </Link>
    </div>
    <div v-else class="flex flex-col ">
        <Link

            type="submit"
            class="mt-2  pt-2 py-2  w-1/2 rounded-lg text-stone-50 bg-amber-600  font-bold  transition ease-in-out duration-200 translate-10"
        >
            Search
        </Link>
    </div>









</template>

<script>
import { reactive, computed, onMounted } from 'vue';
import {Link, usePage} from "@inertiajs/vue3";

export default {
    components: {Link},
    props: {
        cities: {
            type: Array,
            required: true
        },
        value: {
            type: String,
            required: true
        }
    },
    emits: ['update:value'],
    setup(props, { emit }) {
        const { route } = usePage();

        const state = reactive({
            dropdownVisible: false,
            selectedCity: props.value || '',
            searchTerm: '',
        });

        const showDropdown = () => {
            state.dropdownVisible = true;
        };

        const hideDropdown = () => {
            state.dropdownVisible = false;
        };

        const selectCity = (city) => {
            state.selectedCity = city;
            emit('update:value', city);
            state.dropdownVisible = false;
            state.searchTerm = city;
        };

        const dropdownIsVisible = computed(() => {
            return state.dropdownVisible;
        });

        const filteredCities = computed(() => {
            return state.searchTerm ? props.cities.filter(city => city.toLowerCase().includes(state.searchTerm.toLowerCase())) : [];
        });

        const searchCities = () => {
            state.dropdownVisible = true;
        };

        const showSearchLink = computed(() => {
            return state.selectedCity !== '' || state.searchTerm !== '';
        });

        onMounted(() => {
            document.addEventListener('click', (event) => {
                if (!event.target.closest('.relative')) {
                    hideDropdown();
                }
            });
        });

        return {
            state,
            showDropdown,
            hideDropdown,
            selectCity,
            dropdownVisible: dropdownIsVisible,
            filteredCities,
            searchCities,
            showSearchLink,
        };
    },



}
</script>
