<template>
    <form @submit.prevent="submit">
        <input type="text" name="email" v-model="form.email">
        <input type="submit" value="Send">
    </form>
</template>

<script>
export default {
    data() {
        return {
            form: this.$inertia.form({
                email: '',
            })
        }
    },
    methods: {
        submit() {
            this.form
                .transform(data => ({
                    ... data,
                }))
                .post(this.route('auth.resend_account_activation'), {
                    onFinish: () => this.form.reset('email'),
                })
        }
    }
}
</script>
