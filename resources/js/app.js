import './bootstrap';

import Alpine from 'alpinejs'

import {createApp} from "vue"
import ProductsCategory from "./components/Admin/ProductsCategory/ProductsCategory.vue"
import Product from "./components/Admin/Product/Product.vue"
import User from "./components/Admin/User/User.vue"
import OrderMap from "./components/Admin/Order/Map.vue"
import OrderProducts from "./components/Admin/Order/Products.vue"

const app = createApp({})

app.component('products_category', ProductsCategory)
app.component('products', Product)
app.component('users', User)
app.component('order_map', OrderMap)
app.component('order_products', OrderProducts)
app.mount('#app')

window.Alpine = Alpine;

Alpine.start();
