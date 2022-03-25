<template>
    <div>
        <form class="was bg-light" style="padding: 20px; border-radius: 10px" @submit.prevent="registersubmit">
            <div class="form-group">
                <label >Username:</label>
                <input type="text" class="form-control" placeholder="Enter username" v-model="name">
            </div>
            <div class="form-group">
                <label >Email:</label>
                <input type="text" class="form-control" placeholder="Enter Email" v-model="email">
            </div>
            <div class="form-group">
                <label >Password:</label>
                <input type="password" class="form-control" placeholder="Enter password" v-model="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script>
export default {
    name: "Register",
    data(){
        return {
            name: "",
            email: "",
            password: "",
            error: ''
        }
    },
    methods: {
        registersubmit(){
            if(this.password.length>0)
            {
                axios.get('/sanctum/csrf-cookie').then(response=>{
                    axios.post('api/register',{
                        name: this.name,
                        email: this.email,
                        password: this.password
                    }).then(response=>{
                        if(response.data.access_token)
                        {
                            window.location.href="/login";
                        }
                    })
                })
            }
        },
        beforeRouteEnter(to, from, next) {
            if (auth.isLoggedin) {
                return next('dashboard');
            }
            next();
        }
    }
}
</script>

<style scoped>

</style>
