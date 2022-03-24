import {createRouter, createWebHistory} from "vue-router";
import Login from "../Component/Login";
import Register from "../Component/Register";
import Dashboard from "../Component/Dashboard";
import Home from "../Component/Home";


const routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/dashboard',
        name: 'dashboard',
        component: Dashboard
    },
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
