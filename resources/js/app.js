import './bootstrap';
import { createApp } from 'vue';
import { createRouter, createWebHistory } from "vue-router";
import { routes } from "./routes";
import "@fortawesome/fontawesome-free/css/all.css";
import 'bootstrap/dist/css/bootstrap.min.css'
import App from './App.vue'
import PrimeVue from 'primevue/config';
import 'primevue/resources/themes/lara-light-green/theme.css'
//import store from "./store"
let app = createApp(App)
const router = createRouter({
history: createWebHistory(),
routes: routes,
//const app = createApp(App);

})
app.use(router).use(PrimeVue);
//app.use(router);
//app.use(store)
app.mount("#app")
