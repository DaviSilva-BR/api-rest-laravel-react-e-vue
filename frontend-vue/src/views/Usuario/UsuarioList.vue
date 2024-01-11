<template>
    <div class="container">
        <center><h1>Lista</h1></center>
        <RouterLink class="btn btn-success" to="./novo">Novo</RouterLink>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Nome</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <tr v-for="usuario in result" v-bind:key="usuario.id">
                    <td>{{ usuario.id }}</td>
                    <td>{{ usuario.nome }}</td>
                    <td>
                        <RouterLink class="btn btn-info" :to="{path: '/usuario/update/' + usuario.id}">Detalhes</RouterLink>
                        <button class="btn btn-danger" @click="remover(usuario)">Remover</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'usuarios',
    data() {
        return {
            result: {},
            usuario: {
                id: '',
                nome: ''
            }
        };
    },
    created() {
        this.loadTable();
    },
    mounted() {
    },
    methods: {
        loadTable() {
            axios.get('http://127.0.0.1:8000/api/v3/usuario')
                .then(({ data }) => {
                    this.result = data;
                });
        },
        remover(usuario) {
            axios.delete(`http://127.0.0.1:8000/api/v3/usuario/${usuario.id}`)
            alert("Removido");
            this.loadTable();
        }
    }
}
</script>