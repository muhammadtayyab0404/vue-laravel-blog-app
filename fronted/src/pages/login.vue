<template>
  <div class="login-page">
    <div class="auth-card">
      <h2>Login</h2>
          <p v-if="errorreturn" class="error-text">{{errorreturn}}</p>

      <form class="auth-form" @submit.prevent="submitform">
        <div class="form-group">
          <label for="email">Email</label>
          <input @blur="touched.email = true" v-model="formdata.email" id="email" type="email" placeholder="Email" class="form-control" />
    
    <p v-if="touched.email==true && formdata.email.length < 1" class="error-text">Please Enter email</p>
  
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <input @blur="touched.pass = true" v-model="formdata.pass" id="password" type="password" placeholder="Password" class="form-control" />
          <p v-if="touched.pass==true && formdata.pass.length < 1" class="error-text">Full name is incomplete — must be at least 3 characters.</p>
        </div>

        <button type="submit" class="btn btn-primary btn-full">Login</button>
      </form>

      <div class="link">
        <router-link to="/register">Create new account</router-link>
      </div>
    </div>
  </div>
</template>


<script setup>

import Axios  from 'axios';
import { reactive, ref } from 'vue';
import { useRouter } from 'vue-router';
import { loggedin } from '@/auth';

const router = useRouter()

const formdata = reactive ({
    email: '',
    pass: '',
    
})

const touched =reactive ({
    email: false,
    pass: false,
    
})

const errorreturn = ref();



function submitform(){
 
 Axios.post('http://localhost:8000/api/login', formdata)
                    .then(response => {
                        console.log("success");
                        localStorage.setItem('token', response.data.token);
                        localStorage.setItem('role',response.data.role);
                        loggedin.value = true
                        router.push('/home');
                        

                    })
                    .catch(error => {
                        errorreturn.value = error.response.data.message
                        console.log(errorreturn.value);
                    });

                }

</script>







<style scoped>
.login-page {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 24px;
  background: linear-gradient(135deg, #667eea, #764ba2);
}

.auth-card {
  width: min(420px, 100%);
  background: white;
  border-radius: 24px;
  padding: 32px;
  box-shadow: 0 24px 70px rgba(0, 0, 0, 0.16);
}

.auth-card h2 {
  margin-top: 0;
  margin-bottom: 22px;
  color: #202b45;
}

.auth-form {
  display: grid;
  gap: 16px;
}

.form-group {
  display: grid;
  gap: 10px;
}

input {
  width: 100%;
  padding: 14px 16px;
  border: 1px solid #d9dbe5;
  border-radius: 14px;
  font-size: 1rem;
}

button {
  width: 100%;
  padding: 14px 16px;
  border: none;
  border-radius: 999px;
  cursor: pointer;
  background: #3498db;
  color: white;
  font-weight: 700;
}

button:hover {
  background: #2b7ad1;
}

.link {
  text-align: center;
  margin-top: 14px;
}

.link a {
  color: #3498db;
  text-decoration: none;
  font-weight: 600;
}
</style>