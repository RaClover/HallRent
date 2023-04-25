<script setup>
import Modal from "@/Components/Modal.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import {useForm} from '@inertiajs/vue3';
import '../../../css/app.css'; // for importing tailwindcss
import 'vue2-daterange-picker/dist/vue2-daterange-picker.css'
import {ref} from 'vue';


const form = useForm({
    licenseName: '',
    licenseNum: '',
    taxNum: '',
    identityNum: '',
    releaseDate: '',
    expirationDate: '',
    licenseImg: '',
    terms: false,
});

function submitForm() {
    form.post(route('partner.addLicense'), {
        forceFormData: true,

    });

}

const modalOpened = ref(false);
const newLicense = () => {
    modalOpened.value = true;
};
const closeModal = () => {
    modalOpened.value = false;
    form.reset();
};


</script>

<template>


    <button class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-r"
            @click="newLicense">اضف الرخصة
    </button>

    <Modal :show="modalOpened" @close="closeModal">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" style="direction: rtl">

            <form v-on:submit.prevent="submitForm" enctype="multipart/form-data">

                <div class="mb-4">
                    <InputLabel class="block text-gray-700 text-sm font-bold mb-2" for="licenseName">
                        اسم صاحب الرخصة
                    </InputLabel>
                    <TextInput class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                    leading-tight focus:outline-none focus:shadow-outline"
                               type="text" id="licenseName" required v-model="form.licenseName"/>
                </div>

                <div class="mb-4">
                    <InputLabel class="block text-gray-700 text-sm font-bold mb-2" for="licenseNum">
                        رقم الرخصة
                    </InputLabel>
                    <TextInput class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                    leading-tight focus:outline-none focus:shadow-outline"
                               type="text" id="licenseNum" required v-model="form.licenseNum"/>
                </div>

                <div class="mb-4">
                    <InputLabel class="block text-gray-700 text-sm font-bold mb-2" for="taxNum">
                        الرقم الضريبي
                    </InputLabel>
                    <TextInput class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                    leading-tight focus:outline-none focus:shadow-outline"
                               type="number" id="taxNum" required v-model="form.taxNum"/>
                </div>

                <div class="mb-4">
                    <InputLabel class="block text-gray-700 text-sm font-bold mb-2" for="identityNum">
                        رقم البطاقة الشخصية
                    </InputLabel>
                    <TextInput class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                    leading-tight focus:outline-none focus:shadow-outline"
                               type="text" id="identityNum" required v-model="form.identityNum"/>
                </div>


                <div date-rangepicker class="flex items-center">
                    <div class="relative">
                        <InputLabel class="block text-gray-700 text-sm font-bold mb-2" for="releaseDate">
                            تاريخ الإصدار
                        </InputLabel>

                        <TextInput name="releaseDate" type="date"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   placeholder="تاريخ الإصدار " required v-model="form.releaseDate"/>
                    </div>
                    <span class="mx-4 text-gray-500">to</span>
                    <div class="relative">
                        <InputLabel class="block text-gray-700 text-sm font-bold mb-2" for="expirationDate">
                            تاريخ الإنتهاء
                        </InputLabel>
                        <TextInput name="expirationDate" type="date"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   placeholder="تاريخ الإنتهاء" required v-model="form.expirationDate"/>
                    </div>
                </div>


                <div class="mt-4">
                    <InputLabel class="block text-gray-700 text-sm font-bold mb-2" for="licenseImg"
                                value="صورة الرخصة "/>
                    <TextInput
                        id="marketLogo"
                        type="file"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400
                        focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        v-model="form.licenseImg"
                        required
                        autocomplete="licenseImg"
                        @input="form.licenseImg = $event.target.files[0]"
                    />

                    <InputError class="mt-2" :message="form.errors.licenseImg"/>
                </div>


                <div class="mt-4">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        اضافة رخصة
                    </button>
                </div>
            </form>
        </div>
    </Modal>


</template>

