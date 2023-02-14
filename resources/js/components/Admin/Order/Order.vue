<template>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Дата</th>
            <th scope="col">Телефон</th>
            <th scope="col">Почта</th>
            <th scope="col">Сумма</th>
            <th scope="col" colspan="2">Действия</th>
        </tr>
        </thead>
        <tbody>
        <template v-for="order in orders">
            <tr id="{{order.id}}" @mouseover="onInput = true" @mouseout="onInput = false">
                <th scope="row">{{ order.id }}</th>
                <td @dblclick="changeEditableCell(`date${order.id}`, order)"
                    v-if="editableСell !== `date${order.id}`">
                    {{ order.date }}
                </td>
                <td v-else>
                    <input type="text" v-model="this.data.date" class="form-control">
                </td>
                <td @dblclick="changeEditableCell(`phone${order.id}`, order)"
                    v-if="editableСell !== `phone${order.id}`">
                    {{ order.phone }}
                </td>
                <td v-else>
                    <input class="form-control" v-model="this.data.phone">
                </td>
                <td @dblclick="changeEditableCell(`email${order.id}`, order)"
                    v-if="editableСell !== `email${order.id}`">
                    {{ order.email }}
                </td>
                <td v-else>
                    <input class="form-control" v-model="this.data.email">
                </td>
                <td v-if="editableСell !== `sum${order.id}`">
                    {{ order.sum }}
                </td>
                <td v-if="editableСell !== `created_at${order.id}`">
                    {{ order.created_at }}
                </td>
                <td>
                    <a :href="`orders/show/${order.id}`">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                </td>
                <td>
                    <a href="#" @click.prevent="this.delete(order.id)">
                        <i class="text-danger fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        </template>
        </tbody>
    </table>
</template>

<script>
import {is_equivalence, setNull} from "../../../functions";

export default {
    name: "Order",
    data() {
        return {
            orders: null,
            order: null,
            editableСell: null,
            data: {
                id: null,
                date: null,
                email: null,
                phone: null,
                sum: null,
                created_at: null,
            },
            onInput: false
        }
    },
    methods: {
        getOrders() {
            axios.get('/api/orders')
                .then(res => {
                    this.orders = res.data.data
                })
        },
        changeEditableCell(id, order) {
            this.order = order
            this.editableСell = id
            this.data.id = order.id
            this.data.phone = order.phone
            this.data.date = order.date
            this.data.email = order.email
            this.data.sum = order.sum
            let body = document.querySelector('body')

            body.addEventListener('dblclick', () => {
                if (this.editableСell !== null
                    && this.onInput === false
                    && !is_equivalence(this.data, this.order)) {
                    this.update()
                }
            })
        },
        update() {
            axios.patch(`/api/products-category/${this.data.id}`, {
                name: this.data.name,
                email: this.data.email,
                email_verified_at: this.data.email_verified_at
            }).then(res => {
                this.editableСell = null
                this.data = setNull(this.data)
                this.order = null
                this.getOrders()
            })
        },
        delete(id) {
            axios.delete(`/api/orders/${id}`)
                .then(res => {
                    this.getOrders()
                })
        }
    },
    mounted() {
        this.getOrders()
    }
}
</script>

<style scoped>

</style>
