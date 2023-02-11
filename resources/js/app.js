import './bootstrap';

import Alpine from 'alpinejs';

import {createApp} from "vue";
import ProductsCategory from "./components/Admin/ProductsCategory/ProductsCategory.vue";
import Product from "./components/Admin/Product/Product.vue";
import User from "./components/Admin/User/User.vue";

const app = createApp({});

app.component('products_category', ProductsCategory)
app.component('products', Product)
app.component('users', User)
app.mount('#app')

window.Alpine = Alpine;

Alpine.start();
