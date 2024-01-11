<template>
    <div class="container">
        <h2>Novo</h2>
        <form @submit.prevent="save">
            <input type="text" v-model="fornecedor.empresa" class="form-control">
            <button type="submit" class="btn btn-info">Cadastrar</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    name: "fornecedor",
    data() {
        return {
            result: {},
            fornecedor: {}
        }
    },
    methods: {
        save() {
            this.saveForm();
        },
        saveForm() {
            axios.post('http://127.0.0.1:8000/api/v4/fornecedor/', this.fornecedor)
            .then(({data}) => {
                alert("sucesso");
                window.location.href = "../";
            }).catch((err) => {
                alert("Erro, comunique o suporte");
            });
        }
    }
}
</script>
