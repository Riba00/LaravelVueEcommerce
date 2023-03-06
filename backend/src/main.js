import { createApp } from 'vue';
import store from "./store";
import router from "./router";
import './index.css';
import App from './App.vue'

// import './assets/main.css'

createApp(App)
    .use(router)
    .use(store)
    .mount('#app')
