require('./bootstrap');

import {
    createApp
} from "vue";

import App from "./components/App.vue";
import VueRouter from 'vue-router'




createApp(App).mount("#app");
///add router
Vue.use(VueRouter)
