<template>
<div class="form-group col-6">
    <label>Продукты</label>
    <input type="hidden" name="products" :value="JSON.stringify(this.data)">
    <div v-if="choosenId === null">
        <input v-model="searchQuery" class="form-control" type="text" placeholder="Название товара">
    </div>
    <div v-else class="d-flex">
        <input v-model="productCount" class="form-control product-count" type="number" placeholder="В каком количестве">
        <div v-if="productCount !== null" @click="select()" class="add-btn mt-1 ml-2">
            <span>Добавить</span>
        </div>
    </div>
    <div class="products-list col-12 mt-3">
        <template v-if="list !== null">
            <div v-for="productsItem in list"
                 :id="productsItem.id"
                 :class="choosenId === productsItem.id ? 'choosed' : ''"
                 class="product choosed" @click="choose(productsItem.id, productsItem.title, productsItem.price)">
                {{productsItem.title}} - {{productsItem.price}} руб * {{productsItem.count}}
            </div>
        </template>
        <template v-if="products !== null">
            <div v-for="productsItem in products"
                 :id="productsItem.id"
                 :class="choosenId === productsItem.id ? 'choosed' : ''"
                 class="product" @click="choose(productsItem.id, productsItem.title, productsItem.price)">
                {{productsItem.title}} - {{productsItem.price}} руб
            </div>
        </template>
    </div>
</div>
</template>

<script>
export default {
    name: "OrderProducts",
    data() {
        return {
            searchQuery: null,
            product: null,
            products: null,
            choosenId: null,
            productCount: null,
            list: [],
            data: []
        }
    },
    methods: {
        choose(id, title, price) {
            this.choosenId = id
            this.product = {
                'title': title,
                'price': price
            }
        },

        select() {
            this.list.push({title: this.product.title, price: this.product.price, count: this.productCount})
            this.data.push({product_id: this.choosenId, count: this.productCount})
            this.searchQuery = null
            this.choosenId = null
            this.productCount = null
        }
    },
    watch: {
        searchQuery: function (val) {
            if(val) {
                axios.post('/api/products/search', {
                    title: val
                }).then(res => {
                    this.products = res.data.data
                })
            } else{
                this.products = null
            }
        }
    }
}
</script>

<style scoped>
    .products-list {
        background: white;
        border: 1px solid #ced4da;
        height: 200px;
        padding: 20px;
        overflow-y: scroll;
    }

    .product {
        background: #ffc107;
        border-radius: 5px;
        cursor: pointer;
        padding: 10px;
        margin-top: 10px;
        font-weight: bold;
        transition: all 1s ease;
    }

    .product:hover {
        background: #ffa14d;
        border-radius: 5px;
        cursor: pointer;
        padding: 10px;
    }

    .choosed {
        margin: 10px;
        background: #007bff;
    }
    .choosed:hover {
        margin: 10px;
        background: #007bff;
    }

    .add-btn {
        cursor: pointer;
        color: #007bff;
        font-weight: bold;
        transition: all 1s ease;
    }

    .add-btn:hover {
        color: #6040ff;
    }

    .product-count {
        border: 1.5px solid #eb3134;
    }
</style>
