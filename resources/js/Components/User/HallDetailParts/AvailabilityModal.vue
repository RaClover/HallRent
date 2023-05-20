<script setup>
import DangerButton from '@/Components/DangerButton.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { nextTick, ref } from 'vue';

const confirmingUserDeletion = ref(false);
const passwordInput = ref(null);

const form = useForm({
    password: '',
});

const confirmUserDeletion = () => {
    confirmingUserDeletion.value = true;

    nextTick(() => passwordInput.value.focus());
};

const deleteUser = () => {
    form.delete(route('profile.destroy'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingUserDeletion.value = false;

    form.reset();
};
</script>

<template>
    <section class="space-y-6" >
        <button
            class="mb-2 text-sm text-blue-400 dark:text-blue-400"
            @click="confirmUserDeletion">Check Availability</button>
        <Modal :show="confirmingUserDeletion" @close="closeModal">
            <div class="p-6">
                <div class="mt-6 flex justify-end">

<!--                    <SecondaryButton @click="closeModal"> Cancel </SecondaryButton>-->

<!--                    <DangerButton-->
<!--                        class="ml-3"-->
<!--                        :class="{ 'opacity-25': form.processing }"-->
<!--                        :disabled="form.processing"-->
<!--                        @click="deleteUser"-->
<!--                    >-->
<!--                        Delete Account-->
<!--                    </DangerButton>-->
                </div>
            </div>
        </Modal>
    </section>
</template>

<style scoped>

</style>
