<template>
    <div>
        Welcome {{ name }}
    </div>
</template>

<script>
export default {
    name: "Dashboard",
    data() {
        return {
            name: null,
        }
    },
    created() {
        this.name = auth.user.name;

    },
    beforeRouteEnter(to, from, next) {
        if (!auth.isLoggedin) {
            window.location.href = "/home";
        }
        next();
    }
}
</script>
