<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import AdminLayout from "@/Layouts/Admin/AdminLayout.vue";

export default {
    components : {
        AuthenticatedLayout,
        Head ,
        AdminLayout
    } ,

    props : {

    } ,

    methods: {

    }
}
</script>

<template>
    <Head title="Dashboard" />

    <AdminLayout />
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">Admin Dashboard</div>
                </div>
            </div>
        </div>
</template>
