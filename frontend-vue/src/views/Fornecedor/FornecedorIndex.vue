<template>
    <div class="container">
        <RouterLink to="../fornecedor/novo/" class="btn btn-info">Novo</RouterLink> 
        <h2>Fornecedores</h2>
        <table class="table table-sm table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Empresa</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="fornecedor in result" v-bind:key="fornecedor.id">
                    <td>{{ fornecedor.id }}</td>
                    <td>{{ fornecedor.empresa }}</td>
                    <td>
                        <RouterLink class="btn btn-info" :to="{path:'/fornecedor/update/'+fornecedor.id}">Editar</RouterLink>
                        <button class="btn btn-danger" @click="remover(fornecedor)">Remover</button>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>

</template>

<script>
import axios from 'axios';
import { RouterLink } from 'vue-router';

export default {
    name: 'fornecedores',
    data() {
        return {
            result: {},
            fornecedor: {
                id: '',
                empresa: ''
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
            axios.get('http://127.0.0.1:8000/api/v4/fornecedor/')
                .then(({ data }) => {
                this.result = data;
            });
        },

        remover(fornecedor) {
            axios.delete(`http://127.0.0.1:8000/api/v4/fornecedor/${fornecedor.id}`)
            alert("Removido com sucesso");
            this.LoadTable();
        }
    },
    components: { RouterLink }
}

</script>