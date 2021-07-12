<template>
    <form @submit.prevent="submit">
        <input type="password" name="password" v-model="form.password">
        <input type="password" name="password_confirmation" v-model="form.password_confirmation">
        <input type="submit" value="Reset">
    </form>
</template>

<script>
export default {
    props: {
        token: String,
    },
    data() {
        return {
            form: this.$inertia.form({
                password: '',
                password_confirmation: '',
            })
        }
    },
    methods: {
        submit() {
            this.form.post(this.route('auth.password_reset', this.token));
        }
    }
}
</script>
