import './bootstrap';

import Alpine from 'alpinejs';

import {createApp} from "vue";
import CategoryIndex from "./components/Admin/ProductsCategory/ProductsCategoryIndex.vue";
import Product from "./components/Admin/Product/Product.vue";

const app = createApp({});

app.component('products_category', CategoryIndex)
app.component('product', Product)
app.mount('#app')

window.Alpine = Alpine;

Alpine.start();
