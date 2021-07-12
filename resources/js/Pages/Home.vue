<template>
    <form @submit.prevent="submit">
        <input type="submit" value="Logout">
    </form>
</template>

<script>
export default {
    methods: {
        submit() {
            this.$inertia.form({}).post(this.route('auth.logout'));
        }
    }
}
</script>
