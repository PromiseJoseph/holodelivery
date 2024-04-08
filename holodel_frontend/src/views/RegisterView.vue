<script setup>
import {
    ref,watch,onMounted
} from 'vue';

import GuestLayout from '../components/GuestLayout.vue';
import router from '../router';
import store from '../store';
import axiosClient from '../axios';
import axios from 'axios';
import Heroes from '../components/Heroes.vue';


const errMsg = ref('');


const Success={
    firstname: false,
    lastname:false,
    username:false,
    email:false,
    password:false,
    
}

const Errors = {
    firstname:'',
    lastname:'',
    username:'',
    email:'',
    password:'',
}
const loading = ref(false);

let user = {
    firstname:ref(''),
    lastname:'',
    username:'',
    email:'',
    password:'',
}

const viewPassword = (e)=>{
  var passIpt= document.getElementsByName("password")
  var passIptAttr = passIpt[0].getAttribute("type")
    passIptAttr === "password" ? passIpt[0].setAttribute("type","text"): passIpt[0].setAttribute("type","password")
}


const register = async()=>{
    

   loading.value= true;
    console.log(user)
    await axios.get('sanctum/csrf-cookie',{
    withCredentials: true ,
     withXSRFToken:true,
     baseURL:`http://localhost:8000`,
    // headers: {'Content-Type': 'application/json'},
         }
     ),
    
axios.post('api/register', user,{
        withCredentials: true ,
        withXSRFToken:true,
        baseURL:`http://localhost:8000`,
        // headers: {'Content-Type': 'application/json'},
    },)

    .then(res=>res.json())
    .then(json=>{
        errMsg.value(json)
    })
    .catch(error =>{
        console.log(error.response.data.errors);

    var resError= error.response.data.errors
    
        resError.firstname ? Errors.firstname.value = resError.firstname[0] : resError.firstname.value= "";
        resError.lastname  ? Errors.lastname = resError.lastname[0] : resError.lastname= "";
        resError.username ? Errors.username = resError.username[0] : resError.username= "";
        resError.email ? Errors.email = resError.email[0] : resError.email= "";
        resError.password ? Errors.password = resError.password[0] : resError.password= "";
    
        loading.value = false;
       console.log(Errors)
    
});
watch(Errors, (newErrors) => {

localStorage.setItem('Errors', JSON.stringify(newErrors));
}, {
deep: true
})

onMounted(() => {
    Errors =JSON.parse(localStorage.getItem('name') || {
    firstname:'',
    lastname:'',
    username:'',
    email:'',
    password:'',
});
})
}
</script>
<template>
<Heroes>
  <template #sub-headings>
    <h1>Please Register Your Account</h1>
  </template>
  <template #sub-heading-text>
   <p> This is a Registration Page</p>
  </template>
</Heroes>
<main id="main" class="mt-5">
<GuestLayout title="Please Sign Up Your Acoount"  >
<template #item>
    <form >

        <div class="form-floating">
            <input type="text" class="form-control" id="floatingInput" placeholder="firstname" name="firstname" v-model="user.firstname">
            <label for="floatingInput">FirstName</label>
            <div v-if="Errors.firstname">
                <p  class="error" >{{ Errors.firstname }}</p>
            </div>
          
        </div>

        <div class="form-floating">
            <input type="text" class="form-control" id="floatingInput" placeholder="lastname" name="lastname" v-model="user.lastname">
            <label for="floatingInput">LastName</label>
            <div v-if="Errors.lastname">
                <p  class="error" >{{ Errors.lastname }}</p>
            </div>
        </div>

        <div class="form-floating">
           <input type="text" class="form-control" id="floatingInput" placeholder="username" name="username" v-model="user.username">
            <label for="floatingInput">UserName</label>
            <div v-if="Errors.username">
                <p  class="error" >{{ Errors.username }}</p>
            </div>
        </div>

        <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" placeholder="email" name="email" v-model="user.email">
            <label for="floatingInput">Email</label>
            <div v-if="Errors.email">
                <p  class="error" >{{ Errors.email }}</p>
            </div>       
         </div>
        
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingInput" placeholder="password" name="password" v-model="user.password">
            <button @click.prevent="viewPassword"> view password</button>
            <label for="floatingInput">Password</label>
            <div v-if="Errors.password">
                <p  class="error" >{{ Errors.password }}</p>
            </div>
        </div>
        
        <button class="w-100 btn btn-lg btn-secondary mt-4" type="submit" name="submit" @click.prevent="register">
            Sign up
        </button>
    
        <p class="mb-3 mt-3 text-muted">Already have an Account
            <router-link :to="{name: 'login'}" class="login-text fs-6 fw-normal">Login</router-link>
        </p>
        <p class="copyright mt-5 mb-3 text-muted"></p>

        <div v-if="errMsg">
            <div v-for="(singleError,i) in errMsg" :key="i">
                <li>{{singleError.firstname}}</li>
            </div>
        </div>
    </form>

    
</template>
</GuestLayout>
</main>
</template>

<style scoped>
.error{
    color:red;
    font-size: 14px;

}
</style>
