<script setup>
import {
    ref
} from 'vue'

const routes={
    home:'Home',
    about:'About',
    service:'Service',
    placeOrder:'Place Order',
    joinus:'Join Us',
    bookDelivery:'Book a Delivery'
}
</script>
<template>
<nav id="navbar" class="navbar">
    <ul>
        <li><a><router-link to="/"> {{ routes.home }}</router-link></a></li>
        <li><a><router-link to="/about">{{routes.about  }}</router-link></a></li>
        <li><a href="services.html">{{routes.service}}</a></li>
       
        <li class="dropdown"><a href="#"><span>{{ routes.joinus }}</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul id="joinus" class="">
                <!-- <li><a href="#">Join Us</a></li> -->
                <li class="btn btn-secondary m-2">Login</li>
                <li class="btn btn-secondary m-2 ">Register</li>
            </ul>
        </li>
        <li><a href="contact.html">Contact</a></li>
        <li><a class="get-a-quote" href="get-a-quote.html">{{routes.bookDelivery}}</a></li>
    </ul>
</nav>
</template>


<style scoped>

/* Colors */
:root {
  --color-default: #0a0d13;
  --color-primary: #4d3028;
  --color-secondary: #112c33;
}

/*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/

a {
  color: #0d42ff;
  text-decoration: none;
}

/*--------------------------------------------------------------
# Desktop Navigation
--------------------------------------------------------------*/

@media (min-width: 1280px) {
  .navbar {
    padding: 0;
  }

  .navbar ul {
    margin: 0;
    padding: 0;
    display: flex;
    list-style: none;
    align-items: center;
  }

  .navbar li {
    position: relative;
  }
#joinus{
  opacity:0.8;
  background-color:var(--color-primary)
}
  .navbar a,
  .navbar a:focus {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 0 10px 30px;
    font-family: "Inter", sans-serif;
    font-size: 16px;
    font-weight: 400;
    color: rgba(255, 255, 255, 0.6);
    white-space: nowrap;
    transition: 0.3s;
  }

  .navbar a i,
  .navbar a:focus i {
    font-size: 12px;
    line-height: 0;
    margin-left: 5px;
  }

  .navbar a:hover,
  .navbar .active,
  .navbar .active:focus,
  .navbar li:hover>a {
    color: #fff;
  }

  .navbar .get-a-quote,
  .navbar .get-a-quote:focus {
    background:#debeb4;
    padding: 8px 20px;
    margin-left: 30px;
    border-radius: 4px;
    color: #fff;
  }

  .navbar .get-a-quote:hover,
  .navbar .get-a-quote:focus:hover {
    color: #fff;
    background: #f0af9b;
  }

  .navbar .dropdown ul {
    display: block;
    position: absolute;
    left: 14px;
    top: calc(100% + 30px);
    margin: 0;
    padding: 10px 0;
    z-index: 99;
    opacity: 0;
    visibility: hidden;
    background: #fff;
    box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.25);
    transition: 0.3s;
    border-radius: 4px;
  }

  .navbar .dropdown ul li {
    min-width: 200px;
  }

  .navbar .dropdown ul a {
    padding: 10px 20px;
    font-size: 15px;
    text-transform: none;
    font-weight: 400;
    color: var(--color-secondary);
  }

  .navbar .dropdown ul a i {
    font-size: 12px;
  }

  .navbar .dropdown ul a:hover,
  .navbar .dropdown ul .active:hover,
  .navbar .dropdown ul li:hover>a {
    color: #0d42ff;
  }

  .navbar .dropdown:hover>ul {
    opacity: 1;
    top: 100%;
    visibility: visible;
  }

  .navbar .dropdown .dropdown ul {
    top: 0;
    left: calc(100% - 30px);
    visibility: hidden;
  }

  .navbar .dropdown .dropdown:hover>ul {
    opacity: 1;
    top: 0;
    left: 100%;
    visibility: visible;
  }
}
@media (min-width: 1280px) and (max-width: 1366px) {
  .navbar .dropdown .dropdown ul {
    left: -90%;
  }

  .navbar .dropdown .dropdown:hover>ul {
    left: -100%;
  }
}

@media (min-width: 1280px) {

  .mobile-nav-show,
  .mobile-nav-hide {
    display: none;
  }
}
/*--------------------------------------------------------------
# Mobile Navigation
--------------------------------------------------------------*/
@media (max-width: 1279px) {
  .navbar {
    position: fixed;
    top: 0;
    right: -100%;
    width: 100%;
    max-width: 400px;
    bottom: 0;
    transition: 0.3s;
    z-index: 9997;
  }

  .navbar ul {
    position: absolute;
    inset: 0;
    padding: 50px 0 10px 0;
    margin: 0;
    background: rgba(14, 29, 52, 0.9);
    overflow-y: auto;
    transition: 0.3s;
    z-index: 9998;
  }

  .navbar a,
  .navbar a:focus {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px 20px;
    font-family: "Inter", sans-serif;
    font-size: 16px;
    font-weight: 500;
    color: rgba(255, 255, 255, 0.7);
    white-space: nowrap;
    transition: 0.3s;
  }

  .navbar a i,
  .navbar a:focus i {
    font-size: 12px;
    line-height: 0;
    margin-left: 5px;
  }

  .navbar a:hover,
  .navbar .active,
  .navbar .active:focus,
  .navbar li:hover>a {
    color: #fff;
  }

  .navbar .get-a-quote,
  .navbar .get-a-quote:focus {
    background: #0d42ff;
    padding: 8px 20px;
    border-radius: 4px;
    margin: 15px;
    color: #fff;
  }

  .navbar .get-a-quote:hover,
  .navbar .get-a-quote:focus:hover {
    color: #fff;
    background: rgba(13, 66, 255, 0.8);
  }

  .navbar .dropdown ul,
  .navbar .dropdown .dropdown ul {
    position: static;
    display: none;
    padding: 10px 0;
    margin: 10px 20px;
    transition: all 0.5s ease-in-out;
    border: 1px solid #19335c;
  }

  .navbar .dropdown>.dropdown-active,
  .navbar .dropdown .dropdown>.dropdown-active {
    display: block;
  }

  .mobile-nav-show {
    color: #fff;
    font-size: 28px;
    cursor: pointer;
    line-height: 0;
    transition: 0.5s;
    z-index: 9999;
    margin-right: 10px;
  }

  .mobile-nav-hide {
    color: #fff;
    font-size: 32px;
    cursor: pointer;
    line-height: 0;
    transition: 0.5s;
    position: fixed;
    right: 20px;
    top: 20px;
    z-index: 9999;
  }

  .mobile-nav-active {
    overflow: hidden;
  }

  .mobile-nav-active .navbar {
    right: 0;
  }

  .mobile-nav-active .navbar:before {
    content: "";
    position: fixed;
    inset: 0;
    background: rgba(14, 29, 52, 0.8);
    z-index: 9996;
  }
}

</style>
