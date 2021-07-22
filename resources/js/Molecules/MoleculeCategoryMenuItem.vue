<template>
    <li class="mr-3 flex-1">
        <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500" @click="emitClick">
            <i class="fas fa-tasks pr-0 md:pr-3"></i>
            <span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">{{ category.name }}</span>
        </a>
        <template v-if="category.sub_categories.length > 0">
            <ul class="list-reset flex flex-row md:flex-col py-0 md:py-3 px-1 md:px-2 text-center md:text-left" :class="{ hidden: !(Object.values(opened).includes(category.id)) }">
                <template v-for="sub_category in category.sub_categories">
                    <molecule-category-menu-item :category="sub_category" :opened="opened"></molecule-category-menu-item>
                </template>
            </ul>
        </template>
    </li>
</template>

<script>
export default {
    props: {
        category: Object,
        opened: Array,
    },
    methods: {
        emitClick() {
            if (this.category.sub_categories.length > 0) {
                this.emitter.emit('clickedCategory', {
                    layer: this.category.layer,
                    id: this.category.id,
                });
            } else {

            }
        }
    }
}
</script>
