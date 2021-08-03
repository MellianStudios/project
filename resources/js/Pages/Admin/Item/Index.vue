<template>
    <div class="container mx-auto">
        <organism-basic-table :structure="table.structure" :items="table.items"></organism-basic-table>
    </div>
</template>

<script>
import OrganismBasicTable from "../../../Organisms/OrganismBasicTable";

export default {
    components: {
        OrganismBasicTable,
    },
    props: {
        table: Object,
    },
}
</script>
