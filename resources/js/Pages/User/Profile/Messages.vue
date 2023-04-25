<template>
    <TopHeader></TopHeader>
    <MiddleHeader></MiddleHeader>
<Prof>
    messages goes here
</Prof>
</template>

<script>
import Prof from "@/Pages/User/Prof.vue";
import TopHeader from "@/Components/User/TopHeader.vue";
import MiddleHeader from "@/Components/User/MiddleHeader.vue";

export default {
    name: "Orders",
    components: {MiddleHeader, TopHeader, Prof}
}
</script>

<style scoped>

</style>
