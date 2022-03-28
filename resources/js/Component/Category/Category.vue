<template>
    <div class="container_category" @updatemenu="updatemenu">
        <CategoryEdit v-if="showedit" @closeedit="closeedit"></CategoryEdit>
        <div v-if="showedit==false">
            <button id="addcategory" ref="addcategory" class="btn btn-primary" v-on:click="popupform"
                    style="margin-bottom: 10px">Add Category
            </button>
            <form id="form" v-show="showformadd" @submit.prevent="addcategory">
                <div class="form-row">
                    <div class="col-2">
                        <input type="text" class="form-control" placeholder="Category" v-model="category.name">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" style="margin-top: 10px;margin-right: 10px">Create
                    Category
                </button>
                <button type="button" class="btn btn-warning" style="margin-top: 10px" v-on:click="cancelform">Cancel
                </button>
            </form>
        </div>

        <table class="table table-striped" style="margin-top: 10px">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Count Book</th>
                <th scope="col">User Create</th>
                <th scope="col">Create</th>
                <th scope="col">Update</th>
                <th scope="col">Action</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(category,index) in categories">
                <td>{{ category.id }}</td>
                <td>{{ category.name }}</td>
                <td>{{ category.books_count }}</td>
                <td>{{ category.user_create }}</td>
                <td>{{ category.created_at }}</td>
                <td>{{ category.updated_at }}</td>
                <td>
                    <button class="btn btn-warning" @click="editcategory(category.id)">Edit</button>
                </td>
                <td>
                    <button class="btn btn-danger" v-on:click="dlcategory(category.id,index)">Delete</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
import CategoryEdit from "./CategoryEdit";

export default {
    components: {
        CategoryEdit,
    },
    data() {
        return {
            categories: [],
            category: [],
            showedit: false,
            showformadd: false
        }
    },
    created() {
        this.emitter.on('updatemenu', this.updatemenu)
        this.emitter.on('closeedit', this.closeedit)
        this.$axios.get(`/api/category`).then(response => {
            this.categories = response.data;
        })
    },
    methods: {
        dlcategory(id, index) {
                this.$axios.delete(`/api/category/` + id)
                    .then(response => {
                        if (index > -1) {
                            this.categories.splice(index, 1); // 2nd parameter means remove one item only
                        }
                    })
        },
        popupform() {
            this.showformadd = true;
        },
        cancelform() {
            this.showformadd = false
            this.category.name = ''
        },
        addcategory() {
            var data = {
                name: this.category.name,
                user_create: auth.user.name
            }
                this.$axios.post(`/api/category`, data).then(response => {
                    this.categories.push(response.data)
                    this.cancelform()
                })
        },
        editcategory(id) {
            this.showedit = true;
            console.log(id);
            this.emitter.emit('editcate', id)
        },
        closeedit() {

            this.showedit = false;
        },
        updatemenu(data) {
            for (const category of this.categories) {
                if (data.id == category.id) {
                    category.name = data.name
                }

            }
        }
    },
    beforeRouteEnter(to, from, next) {
        if (!auth.isLoggedin) {
            window.location.href = "/home";
        }
        next();
    },

}
</script>
<style scoped>
.container_category {
    margin: 20px 20px;
}

#create_category {
    margin-bottom: 10px;
}

#form {
    margin-bottom: 10px;
}
</style>
