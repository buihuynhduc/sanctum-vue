<template>
    <div class="container">
        <div class="text-center" style="margin: 20px 0px 20px 0px;">
            <span class="text-secondary">Vue-Sanctum-Auth by huynhduc</span>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <!-- for non-logged user-->
                <div class="navbar-nav">
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

        }
    },
    created() {

    },
    methods: {

    },
}
</script>
