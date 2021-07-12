<template>
    <form @submit.prevent="submit">
        <input type="text" name="email" v-model="form.email">
        <input type="password" name="password" v-model="form.password">
        <input type="password" name="password_confirmation" v-model="form.password_confirmation">
        <input type="submit" value="Register">
    </form>
</template>

<script>
export default {
    data() {
        return {
            form: this.$inertia.form({
                email: '',
                password: '',
                password_confirmation: '',
            })
        }
    },
    methods: {
        submit() {
            this.form.post(this.route('auth.registration'), {
                onFinish: () => this.form.reset('password', 'password_confirmation'),
            })
        }
    }
}
</script>
