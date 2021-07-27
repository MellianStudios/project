<template>
    <div class="container mx-auto">
        <Link :href="route('admin.categories.create')" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-purple-500 hover:bg-purple-600 hover:shadow-lg">New</Link>
        <organism-nested-grid-table :data="categories" nested-key="sub_categories"></organism-nested-grid-table>
    </div>
</template>

<script>
import {Link} from '@inertiajs/inertia-vue3';
import OrganismNestedGridTable from '../../../Organisms/OrganismNestedGridTable';

export default {
    components: {
        Link,
        OrganismNestedGridTable,
    },
    props: {
        categories: Object,
    },
}
</script>
