import './bootstrap';

import Alpine from 'alpinejs';

import {createApp} from "vue";
import CategoryIndex from "./components/Admin/ProductsCategory/ProductsCategoryIndex.vue";

const app = createApp({});

app.component('products_category', CategoryIndex)
app.mount('#app')

window.Alpine = Alpine;

Alpine.start();
