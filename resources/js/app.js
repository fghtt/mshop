import './bootstrap';

import Alpine from 'alpinejs';

import {createApp} from "vue";
import CategoryIndex from "./components/Admin/Category/CategoryIndex.vue";

const app = createApp({});

app.component('products_categories', CategoryIndex)
app.mount('#app')

window.Alpine = Alpine;

Alpine.start();
