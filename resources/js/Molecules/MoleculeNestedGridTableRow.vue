<template>
    <div class="p-4">
        <div class="grid grid-cols-3">
            <span>{{ item.name }}</span>
            <span>{{ item.layer }}</span>
            <div>
                <Link :href="route('admin.categories.edit', item.id)" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-purple-500 hover:bg-purple-600 hover:shadow-lg mr-4">Edit</Link>
                <Link href="" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-red-500 hover:bg-red-600 hover:shadow-lg mr-4">Delete</Link>
            </div>
        </div>
        <template v-if="item[nestedKey].length > 0">
            <div class="grid grid-cols-1 ml-8 mt-4">
                <template v-for="sub_item in item[nestedKey]">
                    <molecule-nested-grid-table-row :item="sub_item" :nested-key="nestedKey"></molecule-nested-grid-table-row>
                </template>
            </div>
        </template>
    </div>
</template>

<script>
import {Link} from '@inertiajs/inertia-vue3';

export default {
    components: {
        Link,
    },
    props: {
        item: Object,
        nestedKey: String,
    },
}
</script>
