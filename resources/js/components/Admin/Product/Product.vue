<template>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
            <th scope="col">Цена</th>
            <th scope="col">Скидка</th>
            <th scope="col">Категория</th>
            <th scope="col" colspan="2">Действия</th>
        </tr>
        </thead>
        <tbody>
        <template v-for="product in products">
            <tr id="{{product.id}}" @mouseover="onInput = true" @mouseout="onInput = false">
                <th scope="row">{{ product.id }}</th>
                <td @dblclick="changeEditableCell(`title${product.id}`, product)"
                    v-if="editableСell !== `title${product.id}`">
                    {{ product.title }}
                </td>
                <td v-else>
                    <input type="text" v-model="this.data.title" class="form-control">
                </td>
                <td @dblclick="changeEditableCell(`price${product.id}`, product)"
                    v-if="editableСell !== `price${product.id}`">
                    {{ product.price }}
                </td>
                <td v-else>
                    <input class="form-control" v-model="this.data.price">
                </td>
                <td @dblclick="changeEditableCell(`discount${product.id}`, product)"
                    v-if="editableСell !== `discount${product.id}`">
                    {{ product.discount }}
                </td>
                <td v-else>
                    <input class="form-control" v-model="this.data.discount">
                </td>
                <td>
                    {{ product.category }}
                </td>
                <td>
                    <a :href="`products/edit/${product.id}`">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                </td>
                <td>
                    <a href="#" @click.prevent="this.delete(product.id)">
                        <i class="text-danger fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        </template>
        </tbody>
    </table>
</template>

<script>
import {setNull} from "../../../functions";
import {is_equivalence} from "../../../functions";
export default {
    name: "Products",
    data() {
        return {
            products: null,
            product: null,
            editableСell: null,
            data: {
                id: null,
                title: null,
                price: null,
                discount: null,
                description: null,
                category_id: null
            },
            onInput: false
        }
    },
    methods: {
        getProduct() {
            axios.get('/api/products')
                .then(res => {
                    this.products = res.data.data
                })
        },
        changeEditableCell(id, product) {
            this.product = product
            this.editableСell = id
            this.data.id = product.id
            this.data.title = product.title
            this.data.price = product.price
            this.data.discount = product.discount
            this.data.description = product.description
            this.data.category_id = product.category_id

            let body = document.querySelector('body')
            body.addEventListener('dblclick',  () =>  {
                if (this.editableСell !== null
                    && this.onInput === false
                    && !is_equivalence(this.data, this.product)) {
                    this.update()
                }
            })
        },
        update() {
            axios.patch(`/api/products/${this.data.id}`, {
                title: this.data.title,
                price: this.data.price,
                discount: this.data.discount,
                description: this.data.description,
                category_id: this.data.category_id
            }).then(res => {
                this.editableСell = null
                this.data = setNull(this.data)
                this.product = null
                this.getProduct()
            })
        },
        delete(id) {
            axios.delete(`/api/products/${id}`)
                .then( res => {
                    this.getProduct()
                })
        }
    },
    mounted() {
        this.getProduct()
    }
}
</script>

<style scoped>

</style>
