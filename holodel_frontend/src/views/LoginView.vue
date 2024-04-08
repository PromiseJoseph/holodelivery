<script setup>
import {
    ref,watch
} from 'vue'
import {
    RouterLink
} from 'vue-router'
import GuestLayout from '../components/GuestLayout.vue'
import store from '../store';
import router from '../router';
import axiosClient from '../axios';
import axios from 'axios';


const errMsg = ref('');

const loading = ref(false);

const user = {
    email: '',
    password: '',
    remember: false,
}

const Errors = {
    email:'',
    password:'',
}


 
const login = async()=>{
    
    //   if(empty(user.firstname) || empty(user.lastname) || empty(user.username) || empty(user.email="") || empty(user.password="")){
            
    
    // }
       loading.value= true;
        console.log(user)
        await axios.get('sanctum/csrf-cookie',{
        withCredentials: true ,
         withXSRFToken:true,
         baseURL:`http://localhost:8000`,
        // headers: {'Content-Type': 'application/json'},
             }
         ),
        
    axios.post('api/login', user,{
            withCredentials: true ,
            withXSRFToken:true,
            baseURL:`http://localhost:8000`,
            // headers: {'Content-Type': 'application/json'},
        },)
    
        .then(res=>console.log(res))
        // .then(json=>{
        //     errMsg.value(json)
        // })
        .catch(error =>{
            console.log(error.response.data.errors);
    
        var resError= error.response.data.errors
            resError.email ? Errors.email = resError.email[0] : Errors.email = "";
            resError.password ? Errors.password = resError.password[0] :Errors.password = ""
        
            loading.value = false;
           console.log(Errors)
        
    });
    }
</script>
<template>
<GuestLayout title="Please Sign In Your Acoount" accQst="Do not have an account" accSt="SignUp" @submit.prevent="login">
    <template #item>
        <form method="post" enctype="multipart/form-data">

            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="email" name="email" v-model="user.email">
                <label for="floatingInput">Email</label>
                <p v-if="Errors.email" class="error">{{ Errors.email }}</p>
            </div>
            
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingInput" placeholder="password" name="password" v-model="user.password">
                <button @click.prevent="viewPassword"> view password</button>
                <label for="floatingInput">Password</label>
                <p v-if="Errors.password" class="error">{{ Errors.password }}</p>
            </div>
            

            <input type="checkbox" class="" id="floatingInput" name="remember-me" v-model="user.remember" value="true">
            <label for="floatingInput">Remember me</label>

            <button class="w-100 btn btn-lg btn-secondary mt-4" type="submit" name="submit">
                Login
            </button>

            <p class="mb-3 mt-3 text-muted">Already have an Account
                <router-link :to="{name: 'register'}" class="login-text fs-6 fw-normal">Login</router-link>
            </p>
            <p class="copyright mt-5 mb-3 text-muted"></p>
            <div v-if="errMsg">
                <p>{{ errMsg}}</p>
            </div>

        </form>
    </template>

</GuestLayout>
</template>
<style scoped>
.error{
    color:red;
    font-size: 14px;

}
</style>