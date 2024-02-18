import './bootstrap';
/* 以下追記 */
import { createApp } from 'vue';
import App from './components/App.vue';

const app = createApp(App);
app.mount('#app');