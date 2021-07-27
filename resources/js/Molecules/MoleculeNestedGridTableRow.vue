<template>
    <div class="p-4">
        <div class="grid grid-cols-3">
            <span>{{ item.name }}</span>
            <span>{{ item.layer }}</span>
            <div>
                <Link :href="route('admin.categories.edit', item.id)" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-purple-500 hover:bg-purple-600 hover:shadow-lg mr-4">Edit</Link>
                <button type="button" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-red-500 hover:bg-red-600 hover:shadow-lg mr-4" @click="confirmDelete(item)">Delete</button>
            </div>
        </div>
        <template v-if="item[nestedKey].length > 0">
            <div class="grid grid-cols-1 ml-8 mt-4">
                <template v-for="sub_item in item[nestedKey]">
                    <molecule-nested-grid-table-row :item="sub_item" :nested-key="nestedKey"></molecule-nested-grid-table-row>
                </template>
            </div>
        </template>
        <molecule-popup-confirmation :open="openDeletePupUp" type="warning" :label="categoryToDelete.label" content="This action cannot be undone" :targetId="categoryToDelete.id"></molecule-popup-confirmation>
    </div>
</template>

<script>
import {Link} from '@inertiajs/inertia-vue3';
import MoleculePopupConfirmation from "./MoleculePopupConfirmation";
import {Inertia} from '@inertiajs/inertia';

export default {
    components: {
        Link,
        MoleculePopupConfirmation,
    },
    props: {
        item: Object,
        nestedKey: String,
    },
    data() {
        return {
            openDeletePupUp: false,
            categoryToDelete: {
                label: 'Are you sure you want to delete ',
                id: null,
            },
        }
    },
    methods: {
        confirmDelete(category) {
            this.categoryToDelete.id = category.id;
            this.categoryToDelete.label = this.categoryToDelete.label + category.name;
            this.openDeletePupUp = !this.openDeletePupUp;
        }
    },
    mounted() {
        this.emitter.on('deleteConfirmed', id => Inertia.delete(route('admin.categories.destroy', id)));
    },
}
</script>
