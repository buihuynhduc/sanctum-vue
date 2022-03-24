require('./bootstrap');

import {createApp} from "vue";
import router from "./router";
import Login from "./Component/Login";
import Register from "./Component/Register";


createApp({
    components: {
        Login,
        Register
    }
}).use(router).mount('#app')
