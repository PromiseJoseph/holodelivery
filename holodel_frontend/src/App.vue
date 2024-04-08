<script setup>
import { RouterLink, RouterView } from 'vue-router';
import Header from './components/Header.vue'
import Nav from './components/Nav.vue'
import Footer from './components/Footer.vue'
</script>
<template>
  <Header>
    <template #Nav>
        <Nav/>
        <!-- ***search button*** -->
    </template>
  </Header>
  <RouterView/>
  <Footer/>
</template>

<style scoped>
</style>
