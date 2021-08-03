<template>
    <organism-basic-form :form="form"></organism-basic-form>
</template>

<script>
import OrganismBasicForm from '../../../Organisms/OrganismBasicForm';

export default {
    components: {
        OrganismBasicForm,
    },
    props: {
        form: Object,
    },
}
</script>
