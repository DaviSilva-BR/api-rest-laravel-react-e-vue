import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import UsuarioList from '../views/Usuario/UsuarioList.vue'
import UsuarioCreated from '../views/Usuario/UsuarioCreated.vue'
import UsuarioUpdate from '../views/Usuario/UsuarioUpdate.vue'

import FornecedorIndex from '../views/Fornecedor/FornecedorIndex.vue';
import FornecedorNovo from '../views/Fornecedor/FornecedorNovo.vue';
import FornecedorUpdate from '../views/Fornecedor/FornecedorUpdate.vue';

import ProdutoList from '../views/Produtos/ProdutoList.vue';
import ProdutosAdd from '../views/Produtos/ProdutoAdd.vue';
import ProdutosEdit from '../views/Produtos/ProdutoEdit.vue';

import EmailIndex from '../views/Email/EmailIndex.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/about',
      name: 'about',
      component: () => import('../views/AboutView.vue')
    },
    {
      path: '/usuario',
      name: 'usuarioList',
      component:UsuarioList
    },
    {
      path: '/usuario/novo',
      name: 'usuarioCreated',
      component: UsuarioCreated
    },
    {
      path: '/usuario/update/:id',
      name: 'usuarioUpdate',
      component: UsuarioUpdate
    },
     {
      path: '/fornecedor/',
      name: 'fornecedorIndex',
      component: FornecedorIndex
    },
    {
      path: '/fornecedor/novo/',
      name: 'fornecedorNovo',
      component: FornecedorNovo
    },
    {
      path: '/fornecedor/update/:id',
      name: 'fornecedorUpdate',
      component: FornecedorUpdate
    },
    {
      path: '/produtos/',
      name: 'ProdutoList',
      component: ProdutoList,
    },
    {
      path: '/produtos/novo/',
      name: 'ProdutosAdd',
      component: ProdutosAdd
    },
    {
      path: '/produtos/edit/:id',
      name: 'ProdutosEdit',
      
      component: ProdutosEdit
    },
    {
      path: '/email/',
      name: 'EmailIndex',
      component: EmailIndex
    }
  ]
})

export default router
