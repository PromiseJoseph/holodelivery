<script setup>
import {
    ref
} from 'vue'
import Nav from './Nav.vue'
const appName = ref('HOLODEL'); //app name is beign set using laravel
</script>
<template>
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="../assets/img/logo.png" alt=""> -->
            <h1>{{appName}}</h1>
        </a>
        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

<!-- navbar -->
        <slot name="Nav"></slot>
    </div>
</header><!-- End Header -->

</template>
<style scoped>
/*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/

a {
  color: #debeb4;
  text-decoration: none;
}

/*--------------------------------------------------------------
# Desktop Navigation
--------------------------------------------------------------*/

@media (min-width: 1280px) {
.header {
  transition: all 0.5s;
  z-index: 997;
  padding: 30px 0;
}

.header.sticked {
  background: #4d3028ea;
  padding: 15px 0;
  box-shadow: 0px 2px 20px rgba(14, 29, 52, 0.1);
}

.header .logo img {
  max-height: 40px;
  margin-right: 6px;
}

.header .logo h1 {
  font-size: 30px;
  margin: 0;
  font-weight: 700;
  color: #fff;
  font-family: var(--font-primary);
} 
}

</style>