import {createRouter, createWebHistory} from "vue-router";
import Login from "../Component/Login";
import Register from "../Component/Register";
import Dashboard from "../Component/Dashboard";
import Home from "../Component/Home";
import Book from "../Component/Book/Book";
import BookEdit from "../Component/Book/BookEdit";
import Category from "../Component/Category/Category";

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
    },
    {
        path: '/book',
        name: 'book',
        component: Book
    },
    {
        path: '/book/edit',
        name: 'bookedit',
        component: BookEdit
    },
    {
        path: '/category',
        name: 'category',
        component: Category
    }

]
export default createRouter({
    history: createWebHistory(),
    routes
})
