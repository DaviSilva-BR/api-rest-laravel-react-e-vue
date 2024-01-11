<template>
    <div class="container">
        <h2>Atualizar</h2>
        <form @submit.prevent="update">
            <input type="text" v-model="model.fornecedor.empresa" class="form-control">
            <button type="submit" class="btn btn-info">Atualizar</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    name: 'fornecedor',
    data() {
        return {
            result: {},
            model: {
                fornecedor: {
                    id: '',
                    empresa: ''
                }
            }
        }
    },
    mounted() {
        this.getData(this.$route.params.id);
    },
    methods: {
        getData(id) {
            axios.get(`http://127.0.0.1:8000/api/v4/fornecedor/${id}`)
                .then(res => {
                //console.log(res.data);
                this.model.fornecedor = res.data;
            }).catch((err) => {
                    alert("Erro, comunique ao suporte:" + err);
            })
        },

        update() {
            var id = this.$route.params.id;
            axios.put(`http://127.0.0.1:8000/api/v4/fornecedor/${id}`, this.model.fornecedor)
            .then(({ data }) => {
                alert("Atualizado");
                window.location.href = "../";
            }).catch((err) => {
                alert("Erro, comunique ao suporte:" + err);
            });
        }
    }
}
</script>