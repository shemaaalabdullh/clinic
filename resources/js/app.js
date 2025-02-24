import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
import { createApp } from 'vue';
import DoctorsList from './components/DoctorsList.vue';

const app = createApp({});
app.component('doctors-list', DoctorsList);
app.mount('#app');
