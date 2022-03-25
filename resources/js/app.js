
require('./bootstrap');
import {createApp} from "vue";
import router from "./router";
import App from './App.vue'
import axios from "axios";
import mitt from 'mitt'
const emitter = mitt();
const app = createApp(App)
app.config.globalProperties.$axios =axios;
app.config.globalProperties.emitter = emitter
app.use(router)
app.mount('#app')
