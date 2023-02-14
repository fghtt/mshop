<template>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Имя</th>
            <th scope="col">Почта</th>
            <th scope="col">Подтверждение почты</th>
            <th scope="col">Роль</th>
            <th scope="col" colspan="2">Действия</th>
        </tr>
        </thead>
        <tbody>
        <template v-for="user in users">
            <tr id="{{user.id}}" @mouseover="onInput = true" @mouseout="onInput = false">
                <th scope="row">{{ user.id }}</th>
                <td @dblclick="changeEditableCell(`name${user.id}`, user)"
                    v-if="editableСell !== `name${user.id}`">
                    {{ user.name }}
                </td>
                <td v-else>
                    <input type="text" v-model="this.data.name" class="form-control">
                </td>
                <td @dblclick="changeEditableCell(`email${user.id}`, user)"
                    v-if="editableСell !== `email${user.id}`">
                    {{ user.email }}
                </td>
                <td v-else>
                    <input class="form-control" v-model="this.data.email">
                </td>
                <td @dblclick="changeEditableCell(`email_verified_at${user.id}`, user)"
                    v-if="editableСell !== `email_verified_at${user.id}`">
                    {{ user.email_verified_at }}
                </td>
                <td v-else>
                    <input class="form-control" v-model="this.data.email_verified_at">
                </td>
                <td @dblclick="changeEditableCell(`role${user.id}`, user)"
                    v-if="editableСell !== `role${user.id}`">
                    {{ user.role }}
                </td>
                <td v-else>
                    <input class="form-control" v-model="this.data.role">
                </td>
                <td>
                    <a :href="`products-category/edit/${user.id}`">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                </td>
                <td>
                    <a href="#" @click.prevent="this.delete(user.id)">
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
    name: "User",
    data() {
        return {
            users: null,
            user: null,
            editableСell: null,
            data: {
                id: null,
                name: null,
                email: null,
                email_verified_at: null,
            },
            onInput: false
        }
    },
    methods: {
        getUsers() {
            axios.get('/api/users')
                .then(res => {
                    this.users = res.data.data
                })
        },
        changeEditableCell(id, user) {
            this.user = user
            this.editableСell = id
            this.data.id = user.id
            this.data.name = user.name
            this.data.email = user.email
            this.data.email_verified_at = user.email_verified_at
            let body = document.querySelector('body')

            body.addEventListener('dblclick', () => {
                if (this.editableСell !== null
                    && this.onInput === false
                    && !is_equivalence(this.data, this.user)) {
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
                this.user = null
                this.getUsers()
            })
        },
        delete(id) {
            axios.delete(`/api/products-category/${id}`)
                .then(res => {
                    this.getUsers()
                })
        }
    },
    mounted() {
        this.getUsers()
    }
}
</script>

<style scoped>

</style>
