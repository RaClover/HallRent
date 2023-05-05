<script setup>
import {Link} from "@inertiajs/vue3";

const props = defineProps({
    links: Array,
    meta: Object
});
</script>

<template>
    <div class="flex items-center justify-center mb-80">
        <span
            v-for="(link, i) in links"
            :key="i">
                <Link
                    v-if="link.url"
                    :href="link.url"
                    v-html="link.label"
                    class="px-3 py-2 text-xs rounded mr-2"
                    :class="link.active ? 'bg-green-600 text-white' : 'bg-zinc-200 text-zinc-500'"
                    :disabled="link.active"
                ></Link>
        </span>

        <p>dsvvvvvvvvvvvvvvvvvvvvvvvvvvv</p>
    </div>
</template>

<style scoped>

</style>
