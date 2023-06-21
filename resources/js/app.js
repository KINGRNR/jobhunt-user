import './bootstrap';
import { createApp } from 'vue';
import 'mdb-vue-ui-kit/css/mdb.min.css';

const app = createApp({});

import Navbar from './components/Navbar.vue';
app.component('navbar-vue', Navbar);

app.mount('#app');
