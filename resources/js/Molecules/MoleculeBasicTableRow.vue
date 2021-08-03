<template>
    <tr :key="item.id">
        <template v-for="column in structure.columns">
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm font-medium text-gray-900">
                    {{
                        column.type === 'own' ? item[column.key] :
                        (column.type === 'relation' ? item[column.relation][column.related_key] : '')
                    }}
                </div>
            </td>
        </template>
        <template v-if="'actions' in structure">
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <template v-if="'edit' in structure.actions">
                    <Link :href="route(structure.actions.edit.route, item.id)" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-purple-500 hover:bg-purple-600 hover:shadow-lg mr-4">Edit</Link>
                </template>
                <template v-if="'delete' in structure.actions">
                    <button type="button" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-red-500 hover:bg-red-600 hover:shadow-lg mr-4" @click="confirmDelete(item)">Delete</button>
                    <molecule-popup-confirmation :open="openDeletePupUp" type="warning" :label="categoryToDelete.label" content="This action cannot be undone" :targetId="categoryToDelete.id"></molecule-popup-confirmation>
                </template>
            </td>
        </template>
    </tr>
</template>

<script>
import {Link} from '@inertiajs/inertia-vue3';
import MoleculePopupConfirmation from './MoleculePopupConfirmation';
import {Inertia} from "@inertiajs/inertia";

export default {
    components: {
        Link,
        MoleculePopupConfirmation,
    },
    props: {
        structure: Object,
        item: Object,
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
        confirmDelete(item) {
            this.categoryToDelete.id = item.id;
            this.categoryToDelete.label = this.categoryToDelete.label + ('name' in item ? item.name : item.id);
            this.openDeletePupUp = !this.openDeletePupUp;
        }
    },
    mounted() {
        if ('actions' in this.structure && 'delete' in this.structure.actions) {
            this.emitter.on('deleteConfirmed', (id) => {
                Inertia.delete(route(this.structure.actions.delete.route, id));
                this.openDeletePupUp = false;
            });
        }
    },
}
</script>
