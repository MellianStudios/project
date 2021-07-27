<template>
    <li class="mr-3 flex-1">
        <template v-if="category.sub_categories.length > 0">
            <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500" @click="emitClick">
                <i class="fas fa-tasks pr-0 md:pr-3"></i>
                <span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">{{ category.name }}</span>
            </a>
            <ul class="list-reset flex flex-row md:flex-col py-0 md:py-3 px-1 md:px-2 text-center md:text-left" :class="{ hidden: !(Object.values(opened).includes(category.id)) }">
                <template v-for="sub_category in category.sub_categories">
                    <molecule-category-menu-item :category="sub_category" :opened="opened"></molecule-category-menu-item>
                </template>
            </ul>
        </template>
        <template v-else>
            <Link :href="route('admin.categories.edit', category.id)" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500">
                <i class="fas fa-tasks pr-0 md:pr-3"></i>
                <span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">{{ category.name }}</span>
            </Link>
        </template>
    </li>
</template>

<script>
import {Link} from '@inertiajs/inertia-vue3';

export default {
    components: {
        Link,
    },
    props: {
        category: Object,
        opened: Array,
    },
    methods: {
        emitClick() {
            this.emitter.emit('clickedCategory', {
                layer: this.category.layer,
                id: this.category.id,
            });
        }
    },
}
</script>
