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
    beforeRouteEnter(to, from, next) {
        if (!auth.isLoggedin) {
            window.location.href = "/";
        }
        next();
    }
}
</script>
