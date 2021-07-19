<template>
    <organism-header-nav :user="user"></organism-header-nav>

    <div class="flex flex-col md:flex-row">
        <organism-category-nav :categories="categories"></organism-category-nav>

        <organism-items-section :title="title" :items="items"></organism-items-section>
    </div>
</template>

<script>
import OrganismHeaderNav from "../Organisms/OrganismHeaderNav";
import OrganismCategoryNav from "../Organisms/OrganismCategoryNav";
import OrganismItemsSection from "../Organisms/OrganismItemsSection";

export default {
    components: {
        OrganismHeaderNav,
        OrganismCategoryNav,
        OrganismItemsSection,
    },
    props: {
        user: Object,
        categories: Object,
        items: Object,
    },
    data() {
        return {
            title: 'Top sellers',
        }
    },
}
</script>
