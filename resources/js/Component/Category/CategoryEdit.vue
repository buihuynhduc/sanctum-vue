<template>
    <div style="margin-bottom:10px">
        <button class="btn btn-primary" style="margin-bottom: 10px">Edit Category</button>
        <form id="form" ref="form" @submit.prevent="updatecate(dataedit.id)">
            <div class="form-row">
                <div class="col-2">
                    <input type="text" class="form-control" placeholder="Category" v-model="dataedit.name">
                </div>
            </div>
            <button type="submit" class="btn btn-primary" style="margin-top: 10px">Edit Category</button>
            <button type="button" class="btn btn-warning" style="margin-top: 10px" v-on:click="cancelform">Cancel
            </button>
        </form>
    </div>
</template>

<script>


export default {
    name: "CategoryEdit",
    data() {
        return {
            dataedit: []
        }
    },
    created() {
        this.emitter.on('editcate', this.getdataedit)
    },
    methods: {
        getdataedit(id) {
           this.$axios.get('category/' + id).then(response => {
                this.dataedit = response.data
            })
        },
        cancelform() {
            this.emitter.emit('closeedit')
        },

        updatecate(id) {
            var data = {
                name: this.dataedit.name
            }
            this.$axios.put(`category/`+id, data).then(response => {
                this.emitter.emit('updatemenu',response.data)
                this.dataedit=''
                this.cancelform()
            })
        }

    }
}
</script>

<style scoped>

</style>
