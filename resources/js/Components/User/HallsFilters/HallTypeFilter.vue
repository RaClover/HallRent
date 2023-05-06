<script setup>
import { ref, watch } from 'vue';

const emits = defineEmits(['setType']);

const props = defineProps({
    types: Array,
    type: String,
});

const selectedType = ref(props.type)

const selectType = (typeSlug) => {

    if (!selectedType.value) {
        selectedType.value = typeSlug;
    } else if (!selectedType.value.includes(typeSlug)) {
        selectedType.value += ',' + typeSlug;
    } else {
        // the url and laravel expect a string (of one or more types separated by a comma)
        // To remove a type already present in the list,
        // I first turn the string into an array, then remove the type, and finally turn it back into a string
        selectedType.value = !Array.isArray(selectedType.value) ? selectedType.value.split(',') : selectedType.value;

        let index = selectedType.value.indexOf(typeSlug);

        selectedType.value.splice(index, 1);

        selectedType.value = selectedType.value.join(',')
    }
};

watch(() => props.type, () => {
    selectedType.value = props.type
})

watch(() => selectedType.value, () => {
    emits('setType', selectedType.value)
})
</script>

<template>
    <section class="p-6 pb-0">
        <span class="block font-medium text-xs uppercase mb-4">Type</span>

        <ul class="">
            <li
                v-for="type in types.data"
                :key="type.id"
                @click="selectType(type.slug)"
                class="text-xs text-zinc-800 flex items-start space-x-2 cursor-pointer px-2 py-1 rounded"
                :class="{ 'font-medium text-zinc-900 bg-zinc-100': selectedType && selectedType.includes(type.slug) }"
            >

                <div
                    class="w-4 h-4 flex justify-center items-center cursor-pointer rounded flex-none"
                    :class="[ selectedType && selectedType.includes(type.slug) ? 'bg-amber-600' : 'bg-zinc-300' ]"
                >

                    <!-- Check svg -->
                    <svg
                        v-if="selectedType && selectedType.includes(type.slug)"
                        class=" w-3 h-3 text-white bg-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <div class="flex items-center justify-between w-full">
                    <span class="block">{{ type.name }}</span>
                    <span class="text-xxs block font-semibold bg-zinc-200 px-1.5 py-0.5 text-zinc-500 rounded">
                        {{ type.halls_count }}
                    </span>
                </div>
            </li>
        </ul>
    </section>

</template>

<style scoped>

</style>
