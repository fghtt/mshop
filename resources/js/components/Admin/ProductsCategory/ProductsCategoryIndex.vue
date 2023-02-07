<template>
    <table @click="editableСell !== null && onInput === false? update(): ''" class="table table-striped table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
            <th scope="col">Алиас</th>
            <th scope="col">Скидка</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        <template v-for="products_category in products_categories">
            <tr id="{{products_category.id}}">
                <th scope="row">{{ products_category.id }}</th>
                <td @dblclick="changeEditableCell(`title${products_category.id}`, products_category)"
                    v-if="editableСell !== `title${products_category.id}`">
                    {{ products_category.title }}
                </td>
                <td v-else>
                    <input @mouseover="onInput = true" @mouseout="onInput = false" type="text" v-model="this.title" class="form-control">
                </td>
                <td @dblclick="changeEditableCell(`alias${products_category.id}`, products_category)"
                    v-if="editableСell !== `alias${products_category.id}`">
                    {{ products_category.alias }}
                </td>
                <td v-else>
                    <input @mouseover="onInput = true" @mouseout="onInput = false" class="form-control" v-model="this.alias">
                </td>
                <td @dblclick="changeEditableCell(`discount${products_category.id}`, products_category)"
                    v-if="editableСell !== `discount${products_category.id}`">
                    {{ products_category.discount }}
                </td>
                <td v-else>
                    <input @mouseover="onInput = true" @mouseout="onInput = false" class="form-control" v-model="this.discount">
                </td>
                <td>
                    <a :href="`products-category/edit/${products_category.id}`">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                </td>
            </tr>
        </template>
        </tbody>
    </table>
</template>

<script>
export default {
    name: "CategoryIndex",
    data() {
        return {
            products_categories: null,
            editableСell: null,
            id: null,
            title: null,
            alias: null,
            discount: null,
            onInput: false
        }
    },
    methods: {
        getProductsCategories() {
            axios.get('/api/admin/products-category')
                .then(res => {
                    this.products_categories = res.data.data
                })
        },
        changeEditableCell(id, products_category) {
            this.editableСell = id
            this.id = products_category.id
            this.title = products_category.title
            this.alias = products_category.alias
            this.discount = products_category.discount
        },
        update() {
            axios.patch(`/api/admin/products-category/${this.id}`, {
                title: this.title,
                alias: this.alias,
                discount: this.discount
            }).then(res => {
                this.editableСell = null
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
