import {createRouter, createWebHistory} from "vue-router";
import Login from "../Component/Login";
import Register from "../Component/Register";


const routes = [
    {
        path: '/login',
        name: 'login',
        component: Login
    },
    {
        path: '/register',
        name: 'register',
        component: Register
    }
]
export default createRouter({
    history: createWebHistory(),
    routes
})
