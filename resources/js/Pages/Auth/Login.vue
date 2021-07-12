<template>
    <form @submit.prevent="submit">
        <input type="text" name="email" v-model="form.email">
        <input type="password" name="password" v-model="form.password">
        <input type="checkbox" name="remember" v-model="form.remember">
        <input type="submit" value="Login">
    </form>
</template>

<script>
export default {
    data() {
        return {
            form: this.$inertia.form({
                email: '',
                password: '',
                remember: false
            })
        }
    },
    methods: {
        submit() {
            this.form
                .transform(data => ({
                    ... data,
                    remember: this.form.remember ? true : false
                }))
                .post(this.route('auth.login'), {
                    onFinish: () => this.form.reset('password'),
                })
        }
    }
}
</script>
