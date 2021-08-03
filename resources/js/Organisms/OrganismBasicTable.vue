<template>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <template v-if="'actions' in structure && 'create' in structure.actions">
                    <Link :href="route(structure.actions.create.route)" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-blue-500 hover:bg-blue-600 hover:shadow-lg">Create</Link>
                </template>
                <template v-if="'filters' in structure">
                    <molecule-basic-table-filter :filters="structure.filters"></molecule-basic-table-filter>
                </template>
                <div class="mt-4 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <template v-for="column in structure.columns">
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ column.label }}
                                    </th>
                                </template>
                                <template v-if="'actions' in structure">
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </template>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <template v-for="item in items.data">
                                <molecule-basic-table-row :structure="structure" :item="item"></molecule-basic-table-row>
                            </template>
                        </tbody>
                    </table>
                    <molecule-pagination :links="items.links"></molecule-pagination>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import MoleculeBasicTableFilter from '../Molecules/MoleculeBasicTableFilter';
import MoleculeBasicTableRow from '../Molecules/MoleculeBasicTableRow';
import MoleculePagination from '../Molecules/MoleculePagination';
import {Link} from '@inertiajs/inertia-vue3';

export default {
    components: {
        MoleculeBasicTableFilter,
        MoleculeBasicTableRow,
        MoleculePagination,
        Link,
    },
    props: {
        structure: Object,
        items: Object,
    }
}
</script>
