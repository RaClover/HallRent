<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';
import '../../../css/app.css'; // for importing tailwindcss
import PartnerAuthenticatedLayout from "@/Layouts/Partner/PartnerAuthenticatedLayout.vue";

</script>

<template>
    <Head title="Dashboard"/>

    <PartnerAuthenticatedLayout />
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">Partner Dashboard</div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
