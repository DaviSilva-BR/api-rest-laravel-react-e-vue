<template>
    <div class="container">
        <RouterLink class="btn btn-success btn-sm" to="./">Voltar</RouterLink>
        <h2>Novo</h2>
        <form @submit.prevent="save">
            <input type="text" v-model="usuario.nome" class="form-control" placeholder="Nome:">
            <button type="submit" class="btn btn-info">Salvar</button>
        </form>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "usuario",
    data() {
        return {
            result: {},
            usuario: {},
        }
    },
    methods: {
        save() {
            this.saveForm();
        },

        saveForm() {
            axios.post('http://127.0.0.1:8000/api/v3/usuario', this.usuario)
                .then(
                    ({ data }) => {
                        alert("sucesso");
                        window.location.href = "./";
                    })
        }
    },
}

</script>