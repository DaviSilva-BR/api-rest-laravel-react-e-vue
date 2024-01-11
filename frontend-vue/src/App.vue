<script setup>
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <RouterLink class="navbar-brand" to="/">Navbar</RouterLink>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <RouterLink class="nav-link active" aria-current="page" to="/about">Sobre</RouterLink>
          </li>
          <li class="nav-item">
            <RouterLink class="nav-link" to="/usuario">Usuário</RouterLink>
          </li>
           <li class="nav-item">
              <RouterLink class="nav-link" to="/fornecedor">Fornecedores</RouterLink>
          </li>
          <li class="nav-item">
                <RouterLink class="nav-link" to="/produtos">Produtos</RouterLink>
          </li>
          <li class="nav-item">
                  <RouterLink class="nav-link" to="/email/">Emails</RouterLink>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <RouterView />
</template>
