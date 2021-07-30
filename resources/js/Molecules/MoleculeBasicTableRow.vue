<template>
    <tr :key="item.id">
        <template v-for="column in structure.columns">
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm font-medium text-gray-900">
                    {{
                        column.type === 'own' ? item[column.key] :
                        (column.type === 'relation' ? item[column.relation][column.key] : '')
                    }}
                </div>
            </td>
        </template>
        <template v-if="'actions' in structure">
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <template v-if="'edit' in structure.actions">
                    <Link :href="route(structure.actions.edit, item.id)" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-purple-500 hover:bg-purple-600 hover:shadow-lg mr-4">Edit</Link>
                </template>
                <template v-if="'delete' in structure.actions">
                    <button type="button" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-red-500 hover:bg-red-600 hover:shadow-lg mr-4">Delete</button>
                </template>
            </td>
        </template>
    </tr>
</template>

<script>
import {Link} from '@inertiajs/inertia-vue3';

export default {
    components: {
        Link,
    },
    props: {
        structure: Object,
        item: Object,
    },
}
</script>
