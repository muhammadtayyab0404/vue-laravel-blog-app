<template>
  <header>
<h1>My Blog</h1>
  <nav>
    <router-link to="/">Home</router-link>
    <a v-if="loggedin" href="#" @click.prevent="logout">Logout</a>
  </nav>
</header>

</template>


<script setup>
import { useRouter } from 'vue-router'
import axios from 'axios';
import { onMounted, ref } from 'vue';
import { computed } from 'vue';
import { loggedin } from '@/auth';

const router = useRouter()
const loginState = ref(localStorage.getItem('token'))

function logout() {
  
axios.post('http://localhost:8000/api/logout')
.then(() =>{
console.log("doneee");
console.log(localStorage.getItem('token'));
localStorage.removeItem('token')
localStorage.removeItem('role')
loggedin.value = false
  router.push('/');
  
  
})
.catch(error=>{
  console.log(error);
})

}


</script>
