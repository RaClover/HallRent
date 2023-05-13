<script>
import { computed, defineEmits, ref } from 'vue';

export default {
    name: 'GalleryModal',

    props: {
        show: Boolean,
        images: Array,
        currentImageIndex: Number,
    },

    emits: ['close'],

    setup(props, { emit }) {
        const currentImageIndex = ref(props.currentImageIndex);

        const currentImage = computed(() => {
            if (props.images && props.images.length > 0) {
                return props.images[currentImageIndex.value];
            }
            return null;
        });

        const nextImage = () => {
            if (currentImageIndex.value < props.images.length - 1) {
                currentImageIndex.value++;
            }
        };

        const prevImage = () => {
            if (currentImageIndex.value > 0) {
                currentImageIndex.value--;
            }
        };

        const setCurrentImage = (index) => {
            currentImageIndex.value = index;
        };


        const close = () => {
            emit('close');
        };

        return {
            currentImage,
            nextImage,
            prevImage,
            setCurrentImage,
            close,
        };
    },
};
</script>

<template>
    <transition name="modal">
        <div class="modal-mask" v-if="show">
            <div class="modal-wrapper">
                <div class="modal-container" @click.stop @scroll.stop>
                    <div class="modal-header">
                        <a class="modal-close" @click="close">
                            <i class="fas fa-times">x</i>
                        </a>
                    </div>
                    <div class="modal-body" style="height: 100%; overflow-y: scroll;">
                        <div class="relative w-full h-4/5 ">
                            <a class="absolute left-0 transform lg:ml-2 top-1/3 translate-1/2" href="#" @click.prevent="prevImage">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-10 h-20 mt-4 text-blue-600 bi bi-chevron-left dark:text-amber-400 hover:text-amber-700" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"></path>
                                </svg>
                            </a>
                            <img class=" w-full h-1/2  md:h-full" :src="currentImage.img" alt=""/>
                            <a class="absolute right-0 transform lg:mr-2 top-1/3 translate-1/2" href="#" @click.prevent="nextImage">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-10 h-20 mb-10 text-amber-500 bi bi-chevron-right dark:text-amber-400 hover:text-amber-700 " viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 01-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"></path>
                                </svg>
                            </a>
                        </div>
                        <div class="flex flex-wrap mt-4 pb-20">
                            <template v-for="(image, index) in images">
                                <div class="w-1/2 p-2 sm:w-1/5">
                                    <a class="block border border-transparent" href="#" @click.prevent="setCurrentImage(index)">
                                        <img class="object-cover w-full lg:h-32 border border-gray-500 rounded-md" :src="image.img" alt=""/>
                                    </a>
                                </div>
                            </template>
                        </div>





                    </div>


                </div>
            </div>
        </div>
    </transition>
</template>

<style scoped>
.modal-mask {
    position: fixed;
    z-index: 9998;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    transition: opacity 0.3s ease;
}

.modal-wrapper {
    display: flex;
    vertical-align: middle;
}

.modal-container {
    width: 90%;
    margin: 0 auto;
    background-color: #fff;
    border-radius: 4px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
    transition: all 0.3s ease;
    font-family: "Open Sans", sans-serif;
}

.modal-header {
    padding: 4px;
    border-bottom: 1px solid #eee;
    justify-content: space-between;
    align-items: center;
}

.modal-close {
    cursor: pointer;
    font-size: 2rem;
    color: #ad7a1f;
    transition: color 0.3s ease;
}

.modal-close:hover {
    color: #644104;
}

.modal-body {
    padding: 2rem;
    overflow-y: auto; /* Add this line */
}

.modal-footer {
    padding: 1rem;
    border-top: 1px solid #eee;
    display: flex;
    justify-content: flex-end;
}
</style>
