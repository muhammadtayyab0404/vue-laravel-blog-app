<template>
  <header>
<h1>My Blog</h1>
  <nav>
    <router-link to="/">Home</router-link>
    <a href="#" @click.prevent="logout">Logout</a>
  </nav>
</header>

</template>


<script setup>
import { useRouter } from 'vue-router'
import axios from 'axios';

const router = useRouter()

function logout() {
  
axios.post('http://localhost:8000/api/logout')
.then(() =>{
console.log("doneee");
console.log(localStorage.getItem('token'));
localStorage.removeItem('token')
  router.push('/');
  
})
.catch(error=>{
  console.log(error);
})

}

</script>
