<template>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
            <th scope="col">Алиас</th>
            <th scope="col">Скидка</th>
            <th scope="col" colspan="2">Действия</th>
        </tr>
        </thead>
        <tbody>
        <template v-for="products_category in products_categories">
            <tr id="{{products_category.id}}" @mouseover="onInput = true" @mouseout="onInput = false">
                <th scope="row">{{ products_category.id }}</th>
                <td @dblclick="changeEditableCell(`title${products_category.id}`, products_category)"
                    v-if="editableСell !== `title${products_category.id}`">
                    {{ products_category.title }}
                </td>
                <td v-else>
                    <input type="text" v-model="this.data.title" class="form-control">
                </td>
                <td @dblclick="changeEditableCell(`alias${products_category.id}`, products_category)"
                    v-if="editableСell !== `alias${products_category.id}`">
                    {{ products_category.alias }}
                </td>
                <td v-else>
                    <input class="form-control" v-model="this.data.alias">
                </td>
                <td @dblclick="changeEditableCell(`discount${products_category.id}`, products_category)"
                    v-if="editableСell !== `discount${products_category.id}`">
                    {{ products_category.discount }}
                </td>
                <td v-else>
                    <input class="form-control" v-model="this.data.discount">
                </td>
                <td>
                    <a :href="`products-category/edit/${products_category.id}`">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                </td>
                <td>
                    <a href="#" @click.prevent="this.delete(products_category.id)">
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
    name: "ProductsCategory",
    data() {
        return {
            products_categories: null,
            products_category: null,
            editableСell: null,
            data: {
                id: null,
                title: null,
                alias: null,
                discount: null,
            },
            onInput: false
        }
    },
    methods: {
        getProductsCategories() {
            axios.get('/api/products-category')
                .then(res => {
                    this.products_categories = res.data.data
                })
        },
        changeEditableCell(id, products_category) {
            this.products_category = products_category
            this.editableСell = id
            this.data.id = products_category.id
            this.data.title = products_category.title
            this.data.alias = products_category.alias
            this.data.discount = products_category.discount
            let body = document.querySelector('body')

            body.addEventListener('dblclick',  () =>  {
                if (this.editableСell !== null
                    && this.onInput === false
                    && !is_equivalence(this.data, this.products_category)) {
                    this.update()
                }
            })
        },
        update() {
            axios.patch(`/api/products-category/${this.data.id}`, {
                title: this.data.title,
                alias: this.data.alias,
                discount: this.data.discount
            }).then(res => {
                this.editableСell = null
                this.data = setNull(this.data)
                this.products_category = null
                this.getProductsCategories()
            })
        },
        delete(id) {
            axios.delete(`/api/products-category/${id}`)
            .then( res => {
                this.getProductsCategories()
            })
        }
    },
    mounted() {
        this.getProductsCategories()
    }
}
</script>

<style scoped>

</style>
