<template>
    <div class="container">
        <RouterLink to="../" class="btn btn-info">Novo</RouterLink>

        <h2>Novo produto</h2>
        <form @submit.prevent="save">
            <input 
            type="text" 
            class="form-control" 
            v-model="produtos.produto"
            />
            <input 
                type="text" 
                class="form-control" 
                v-model="produtos.valor"
                />
            <button type="submit" class="btn btn-info">Salvar</button>
        </form>
    </div>
</template>
<script>
import { RouterLink } from 'vue-router'
import axios from 'axios'
export default {
    name: "produtos",
    data() {
        return {
            result: {},
            produtos: {}
        }
    },
    methods: {
        save() {
            this.saveForm();
        },
        saveForm() {
            axios.post('http://127.0.0.1:8000/api/v5/produtos/', this.produtos)
                .then(({data}) => {
                    alert("Sucesso");
                    window.location.href = "../";
                }).catch((err) => {
                     alert("Erro - comunique ao suporte" + err);
                });
        }
    }
}
</script>

