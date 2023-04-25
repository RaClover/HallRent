<template>

</template>

<script>
export default {
    data() {
        return {
            subcategories: [],
        };
    },
    methods: {
        showSubcategories(category) {
            // Here, you can make an API call to your Laravel backend to fetch the subcategories
            // for the selected category using InertiaJS.
            // Once you have the subcategories, you can update the 'subcategories' array in the
            // component's data object to display them in the modal.
        },
    },
};
</script>

<style scoped>
.modal {
    display: flex;
    justify-content: space-between;
}
.sidebar {
    width: 30%;
}
.sidebar ul {
    list-style: none;
    padding: 0;
}
.sidebar li {
    cursor: pointer;
}
.content {
    width: 70%;
}
</style>
