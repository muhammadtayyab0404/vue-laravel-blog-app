import { createApp } from 'vue'
import App from './App.vue'
import axios from 'axios'

import './style.css'
import router from './router'

axios.interceptors.request.use((config) =>{
    const token = localStorage.getItem('token');

    if(token){
        config.headers.Authorization = `Bearer ${token}`;
    }
    return config;
})

createApp(App).use(router).mount('#app')