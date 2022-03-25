<template>
    <div class="container">
        <div class="text-center" style="margin: 20px 0px 20px 0px;">
            <span class="text-secondary">Vue-Sanctum-Auth by huynhduc</span>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <!-- for non-logged user-->
                <div class="navbar-nav"  v-if="isLoggedIn==true">
                    <router-link to="/dashboard" class="nav-item nav-link">Dashboard</router-link>
                    <router-link to="/book" class="nav-item nav-link">Book</router-link>
                    <router-link to="/category" class="nav-item nav-link">Category</router-link>
                    <button class="nav-item nav-link" @click="logout" style="position: absolute;right: 15px;border: none;">Logout</button>
                </div>
                <div class="navbar-nav" v-if="isLoggedIn==false">
                    <router-link to="/" class="nav-item nav-link">Home</router-link>
                    <router-link to="/login" class="nav-item nav-link">Login</router-link>
                    <router-link to="/register" class="nav-item nav-link">Register
                    </router-link>
                </div>
            </div>
        </nav>
        <br/>
        <router-view/>
    </div>
</template>

<script>
export default {
    name: "App",
    data() {
        return {
            isLoggedIn: false
        }
    },
    created() {
        if(auth.isLoggedin)
        {
            this.isLoggedIn=true;
        }
    },
    methods: {
        logout()
        {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('api/logout').then(response => {
                    window.location.href = "/"
                })
            });

        }
    },
}
</script>
