<template>
    <div class="container">
        <h2>Editar Produto</h2>
        <RouterLink to="../" class="btn btn-info">Voltar</RouterLink>
        <form @submit.prevent="update">
            <input 
                type="number"  
                hidden
                v-model="model.produtos.id"
            />
            <input 
                type="text"  
                class="form-control" 
                placeholder="Produto"
                v-model="model.produtos.produto"
                />
                <input 
                type="text"  
                class="form-control" 
                placeholder="Valor"
                v-model="model.produtos.valor"
                />
                <button type="submit" class="btn btn-info">Salvar</button>
        </form>
    </div>
</template>
<script>
import axios from 'axios'
import { RouterLink } from 'vue-router'

export default {
    name: 'produtos',
    data() {
        return {
            result: {},
            model: {
                produtos: {
                    id: '',
                    produto: '',
                    valor: ''
                }
            }
        }
    },
   
    mounted() {
        this.getData(this.$route.params.id);
    },

    methods: {
        getData(id) {
            axios.get(`http://127.0.0.1:8000/api/v5/produtos/${id}`)
            .then(res => {
                this.model.produtos = res.data;
            }).catch((err) => {
                alert("erro, consultar dados:" + err);
            })
        },

        update() {
            var id =this.$route.params.id;
            axios.put(`http://127.0.0.1:8000/api/v5/produtos/${id}`, this.model.produtos)
            .then(({data}) => {
                alert("Atualizado com sucesso");
                window.location.href = "../";
            }).catch((err) => {
                alert("Erro ao atualizar, comunique o suporte: " + err);
            });
        }
    }
}
</script>
