<template>
    <organism-category-nav :categories="categories"></organism-category-nav>
</template>

<script>
import OrganismCategoryNav from "../../../Organisms/OrganismCategoryNav";

export default {
    components: {
        OrganismCategoryNav,
    },
    props: {
        categories: Object,
    },
}
</script>
