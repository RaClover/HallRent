<script setup>
import Modal from "@/Components/Modal.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import {useForm} from '@inertiajs/vue3';
import '../../../css/app.css'; // for importing tailwindcss
import {ref} from 'vue';

const form = useForm({
    marketName: '',
    marketEmail: '',
    marketPhone: '',
    marketCity: '',
    marketAddress: '',
    marketLogo: '',
    selectedWeekdays: ref([]),
    weekdayOptions: [
        "الأحد",
        "الاثنين",
        "الثلاثاء",
        "الأربعاء",
        "الخميس",
        "الجمعة",
        "السبت",
    ],
    terms: false,
});

function submitForm() {
    form.post(route('partner.addMarket'), {
        forceFormData: true,
    });
}

const modalOpened = ref(false);
const newMarket = () => {
    modalOpened.value = true;
};
const closeModal = () => {
    modalOpened.value = false;
    form.reset();
};


</script>

<template>

    <button class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-r"
            @click="newMarket">متجر جديد +
    </button>

    <Modal :show="modalOpened" @close="closeModal"  >
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">

            <form v-on:submit.prevent="submitForm" enctype="multipart/form-data" style="direction: rtl">

                <div class="mb-4">
                    <InputLabel class="block text-gray-700 text-sm font-bold mb-2" for="username">
                        اسم المتجر
                    </InputLabel>
                    <TextInput class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                    leading-tight focus:outline-none focus:shadow-outline"
                               type="text" id="marketName" v-model="form.marketName"/>
                </div>

                <div class="mb-4">
                    <InputLabel for="email" class="block text-gray-700 text-sm font-bold mb-2">البريد الالكتروني الخاص
                        بالمتجر
                    </InputLabel>
                    <TextInput type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                    leading-tight focus:outline-none focus:shadow-outline" id="email"
                               v-model="form.marketEmail"/>
                </div>

                <div class="mb-3">
                    <InputLabel for="phone" class="block text-gray-700 text-sm font-bold mb-2">الهاتف الخاص بالمتجر
                    </InputLabel>
                    <TextInput type="tel" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                    leading-tight focus:outline-none focus:shadow-outline" id="phone"
                               v-model="form.marketPhone"/>
                </div>

                <div class="mb-3">
                    <InputLabel for="marketCity" class="block text-gray-700 text-sm font-bold mb-2">المدينة</InputLabel>
                    <TextInput type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                    leading-tight focus:outline-none focus:shadow-outline" id="marketCity"
                               v-model="form.marketCity"/>
                </div>

                <div class="mb-3">
                    <InputLabel for="marketAddress" class="block text-gray-700 text-sm font-bold mb-2">عنوان المتجر
                    </InputLabel>
                    <TextInput style="text-align: right" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                    leading-tight focus:outline-none focus:shadow-outline" id="marketAddress"
                               v-model="form.marketAddress"/>
                </div>

                <label> ايام العمل </label>
                <div class="flex">
                    <div class="flex items-center mr-4" v-for="(day, index) in form.weekdayOptions " :key="index">
                        <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500
                        dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                               type="checkbox" :id="`weekday-${day}`"
                               :value="day"
                               v-model="form.selectedWeekdays">
                        <label class="ml-1 text-sm font-medium text-gray-200 dark:text-gray-800"
                               :for="`weekday-${day}`">{{ day }}</label>
                    </div>
                </div>


                <div class="mt-4">
                    <InputLabel class="block text-gray-700 text-sm font-bold mb-2" for="marketLogo"
                                value="شعار المتجر "/>

                    <TextInput
                        id="marketLogo"
                        type="file"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400
                        focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        v-model="form.marketLogo"
                        required
                        autocomplete="marketLogo"
                        @input="form.marketLogo = $event.target.files[0]"
                    />

                    <InputError class="mt-2" :message="form.errors.marketLogo"/>
                </div>


                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    تسجيل متجر
                </button>

            </form>
        </div>
    </Modal>


</template>

