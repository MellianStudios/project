<template>
    <div class="bg-gray-800 shadow-xl h-16 fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-48">
        <div class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
            <ul class="list-reset flex flex-row md:flex-col py-0 md:py-3 px-1 md:px-2 text-center md:text-left">
                <template v-for="category in categories">
                    <molecule-category-menu-item :category="category" @clicked-category="categoryTrigger"></molecule-category-menu-item>
                </template>
            </ul>
        </div>
    </div>
</template>

<script>
import MoleculeCategoryMenuItem from "../Molecules/MoleculeCategoryMenuItem";

export default {
    components: {
        MoleculeCategoryMenuItem,
    },
    props: {
        categories: Object,
    },
    data () {
        return {

        }
    },
    methods: {
        categoryTrigger(category) {
            console.log(this.$refs);
            //this.$refs['sub_' + category.id].classList.value = this.$refs['sub_' + this.activeCategory].classList.value + ' hidden';
        },
    },
}
</script>
