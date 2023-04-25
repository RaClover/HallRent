<script setup>
import { ref, onMounted } from 'vue'
import { usePage } from '@inertiajs/inertia-vue3'
import {Link, router} from '@inertiajs/vue3';
import Header from "@/Components/User/Header.vue";



const headerClass = ref('py-1 shadow-sm bg-white')
const isFixedHeader = ref(false)

onMounted(() => {
    window.addEventListener('scroll', handleScroll)
})

const handleScroll = () => {
    if (window.pageYOffset > 0) {
        isFixedHeader.value = true
        headerClass.value = 'py-1 shadow-sm bg-white fixed top-0 left-0 w-full'
    } else {
        isFixedHeader.value = false
        headerClass.value = 'py-1 shadow-sm bg-white'
    }
}

// To remove the event listener when the component is unmounted
onBeforeUnmount(() => {
    window.removeEventListener('scroll', handleScroll)
})

</script>


<template>



</template>


<style>




</style>
