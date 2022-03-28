<template>
    <div>
        <button class="btn btn-primary" style="margin-bottom: 10px">Edit Book</button>
        <form id="form" ref="form" style="margin-bottom: 10px" @submit.prevent="updatebook(databook.id)">
            <input type="text" class="form-control" placeholder="bookname" style="margin-bottom: 10px"
                   v-model="databook.bookname">
            <div class="form-col" style="margin-bottom: 10px">
                <label>Select Category</label>
                <select class="form-control" v-model="databook.category_id">
                    <option v-for="category in categories" :value="category.id"
                            :selected="category.id == databook.category_id">{{ category.name }}
                    </option>
                </select>
            </div>
            <input type="text" class="form-control" placeholder="description" style="margin-bottom: 10px"
                   v-model="databook.description">
            <button type="submit" class="btn btn-primary" style="margin-right: 10px">Edit Book</button>
            <button type="button" class="btn btn-warning" @click="canceleditbook">Cancel</button>
        </form>
    </div>
</template>

<script>
export default {
    name: "BookEdit",
    data() {
        return {
            databook: [],
            categories: []
        }
    },
    created() {
        this.emitter.on('editbook', this.editbook)
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/category').then(response => {
                this.categories = response.data
            });
        })
    },
    methods: {
        editbook(id) {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.get('/api/book/' + id).then(response => {
                    this.databook = response.data
                })
            })
        },
        updatebook(id) {
            let data = {
                bookname: this.databook.bookname,
                description: this.databook.description,
                category_id: this.databook.category_id
            }
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.put(`/api/book/` + id, data).then(response => {
                    this.emitter.emit('updatelistbook', response.data)
                    this.databook = ''
                    this.canceleditbook()
                })
            })
        },
        canceleditbook() {
            this.emitter.emit('canceleditbook')
        }
    },

}
</script>

<style scoped>

</style>
