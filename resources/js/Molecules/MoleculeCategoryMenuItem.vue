<template>
    <li class="mr-3 flex-1">
        <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500" :ref="'category_' + category.id" @click="categoryTrigger($event)">
            <i class="fas fa-tasks pr-0 md:pr-3"></i>
            <span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">{{ category.name }}</span>
        </a>
        <template v-if="category.sub_categories.length > 0">
            <ul class="list-reset flex flex-row md:flex-col py-0 md:py-3 px-1 md:px-2 text-center md:text-left hidden" :ref="'sub_category_' + category.id">
                <template v-for="sub_category in category.sub_categories">
                    <molecule-category-menu-item :category="sub_category"></molecule-category-menu-item>
                </template>
            </ul>
        </template>
    </li>
</template>

<script>
export default {
    props: {
        category: Object,
    },
    data() {
        return {
            activeCategory: null,
        }
    },
    methods: {
        categoryTrigger(event) {
            /*const clickedItem = event.currentTarget.id;

            if (this.activeCategory !== null) {
                this.$refs['sub_' + this.activeCategory].classList.value = this.$refs['sub_' + this.activeCategory].classList.value + ' hidden';
            }

            if (this.activeCategory !== clickedItem || this.activeCategory === null) {
                this.$refs['sub_' + clickedItem].classList.value = this.$refs['sub_' + clickedItem].classList.value.replace('hidden', '');
                this.activeCategory = clickedItem;
                this.isAnyCategoryActive = true;
            }*/
        },
    },
}
</script>
