<template>
    <div class="container mx-auto">
        <organism-basic-table :structure="tableStructure" :items="items"></organism-basic-table>
    </div>
</template>

<script>
import OrganismBasicTable from "../../../Organisms/OrganismBasicTable";

export default {
    components: {
        OrganismBasicTable,
    },
    props: {
        tableStructure: Object,
        items: Object,
    },
}
</script>
