<template>
    <div>
        <form class="was bg-light" style="border:1px solid #a0aec0;padding: 20px; border-radius: 10px">
            <div class="form-group">
                <label >Username:</label>
                <input type="text" class="form-control" placeholder="Enter username" >
            </div>
            <div class="form-group">
                <label >Email:</label>
                <input type="text" class="form-control" placeholder="Enter username" >
            </div>
            <div class="form-group">
                <label >Password:</label>
                <input type="password" class="form-control" placeholder="Enter password" >
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script>
export default {
    name: "Register"
}
</script>

<style scoped>

</style>
