<template>
    <div>
        <form class="was bg-light " style="padding: 20px; border-radius: 10px" @submit.prevent="loginsubmit">
            <div class="form-group">
                <label>Email:</label>
                <input type="text" class="form-control" placeholder="Enter email" v-model="email">
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" class="form-control" placeholder="Enter password" v-model="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script>
export default {
    name: "Login",
    data() {
        return {
            email: '',
            password: '',
        }
    },
    methods: {
        loginsubmit() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('api/login', {
                    email: this.email,
                    password: this.password
                }).then(response => {
                    this.$router.go('/dashboard')
                })
            });
        },
    },
    beforeRouteEnter(to, from, next) {
        if (auth.isLoggedin) {
            return next('dashboard');
        }
        next();
    }
}
</script>

<style scoped>

</style>
