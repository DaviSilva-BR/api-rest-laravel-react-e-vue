<template>
    <div class="container">
        <h2>Alterar</h2>
        <form @submit.prevent="update">
            <input type="text" v-model="model.usuario.nome" class="form-control">
            <button type="submit" class="btn btn-success">Atualizar</button>
        </form>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: 'usuario',
    data() {
        return {
            result: {},
            model: {
                usuario: {
                    id: '',
                    nome: ''
                }
            }
        }
    },
    mounted() {
        this.getData(this.$route.params.id);
    },
    methods: {
        getData(id) {
            axios.get(`http://127.0.0.1:8000/api/v3/usuario/${id}`)
                .then(res => {
                    this.model.usuario = res.data;
                   // console.log(res.data);
            })
        },

         update() {
            axios.put(`http://127.0.0.1:8000/api/v3/usuario/${id}`, this.model.usuario)
                .then(
                    ({ data }) => {
                        alert("Updated!!!");
                        window.location.href = '../';
                    }
                );
        },

    }

   
}

</script>