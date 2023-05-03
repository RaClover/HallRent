<template>
    <ul>
        <li v-for="city in cities" :key="city">{{ city }}</li>
    </ul>
</template>

<script>
export default {
    props: {
        cities: {
            type: Array,
            required: true,
        },
    },
};
</script>

<style scoped>

</style>
