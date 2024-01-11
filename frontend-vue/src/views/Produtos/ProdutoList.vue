<template>
    <div class="container">
        <RouterLink to="../produtos/novo/" class="btn btn-info">Novo</RouterLink>
        <h2>Lista de produtos</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Produto</th>
                    <th>Valor</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="produtos in result" v-bind:key="produtos.id">
                    <td>{{ produtos.id }}</td>
                    <td>{{ produtos.produto }}</td>
                    <td>{{ produtos.valor }}</td>
                    <td>
                        <RouterLink class="btn btn-info" :to="{path: '/produtos/edit/' + produtos.id}">Alterar</RouterLink>
                        <button class="btn btn-danger" @click="remover(produtos.id)">Remover</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from "axios";
import { RouterLink } from 'vue-router';

export default {
    name: 'produtos',
    data() {
        return {
            result: {
                id: '',
                produto: '',
                valor: ''
            }
        };
    },

    created() {
        this.LoadTable();
    },

    mounted() {
    },

    methods: {
        LoadTable() {
            axios.get('http://127.0.0.1:8000/api/v5/produtos/')
                .then(({data}) => {
                    this.result = data;
                }).catch((err) => {
                    alert("Erro, comunique o suporte:" + err);
                });
        },

        remover(id) {
            axios.delete(`http://127.0.0.1:8000/api/v5/produtos/${id}`)
           .then(({data}) => {
                alert("Removido com sucesso");
                this.LoadTable();
           }).catch((err) => {
                alert("Erro, comunique o suporte:" +err);
           });
        }
    },
}


</script>