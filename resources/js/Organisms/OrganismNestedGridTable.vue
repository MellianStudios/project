<template>
    <div class="grid grid-cols-1 text-white">
        <div class="p-4 border-b-2">
            <div class="grid grid-cols-3">
                <div>name</div>
                <div>layer</div>
                <div>actions</div>
            </div>
        </div>
        <template v-for="item in data">
            <molecule-nested-grid-table-row :item="item" :nested-key="nestedKey"></molecule-nested-grid-table-row>
        </template>
    </div>
</template>

<script>
import {Link} from '@inertiajs/inertia-vue3';
import MoleculeNestedGridTableRow from '../Molecules/MoleculeNestedGridTableRow';

export default {
    components: {
        Link,
        MoleculeNestedGridTableRow,
    },
    props: {
        data: Object,
        nestedKey: String,
    },
}
</script>
