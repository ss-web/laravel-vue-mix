import './bootstrap';

import { createApp } from 'vue';
import ElementPlus from 'element-plus';
import 'element-plus/theme-chalk/dark/css-vars.css';
import App from './App.vue';

const app = createApp(App);

app.use(ElementPlus);

app.mount('#app');
