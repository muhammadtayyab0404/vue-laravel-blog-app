<template>
  <div class="login-page">
    <div class="auth-card">
      <h2>Create Account</h2>
      <form class="auth-form" @submit.prevent="submitform">
        <div class="form-group">
          <label for="name">Full Name</label>
          <input @blur="touched.FullName = true" v-model="formdata.FullName" id="name" type="text" placeholder="Enter your name" class="form-control" />
          <p v-if="touched.FullName==true && formdata.FullName.length < 1" class="error-text">Full name is incomplete — must be at least 3 characters.</p>
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input id="email" @blur="touched.email = true" v-model="formdata.email" type="email" placeholder="Enter your email" class="form-control" />
        <p v-if="touched.email==true && formdata.email.length < 1" class="error-text">email name is incomplete</p>

        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <input id="password" @blur="touched.pass = true" v-model="formdata.pass" type="password" placeholder="Create a password" class="form-control" />
        <p v-if="touched.pass==true && formdata.pass.length < 1" class="error-text">Please write password</p>

        </div>
        <button type="submit" class="btn btn-primary btn-full">Register</button>
      </form>

      <div class="link">
        <router-link to="/">Already have an account? Login</router-link>
      </div>
    </div>
  </div>
</template>


<script setup>

import Axios  from 'axios';
import { reactive, ref } from 'vue';
import { useRouter } from 'vue-router';

const router = useRouter()

const formdata = reactive ({
    FullName: '',
    email: '',
    pass: '',
    
})

const touched =reactive ({
    FullName: false,
    email: false,
    pass: false,
    
})

const fullnameeror = ref();
const emailerror = ref();
const password = ref();


function submitform(){
 
 Axios.post('http://localhost:8000/api/reqister', formdata)
                    .then(response => {
                        console.log("success");
                        router.push('/');
                    })
                    .catch(error => {
                        console.log(error);
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
  width: min(460px, 100%);
  background: white;
  border-radius: 24px;
  padding: 36px;
  box-shadow: 0 24px 70px rgba(0, 0, 0, 0.16);
}

.auth-card h2 {
  margin-top: 0;
  margin-bottom: 24px;
  color: #202b45;
}

.auth-form {
  display: grid;
  gap: 18px;
}

.form-group {
  display: grid;
  gap: 10px;
}

.form-control {
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
  color: white;
  font-weight: 700;
  background: #3498db;
}

button:hover {
  background: #2b7ad1;
}

.link {
  text-align: center;
  margin-top: 18px;
}

.link a {
  color: #3498db;
  text-decoration: none;
  font-weight: 600;
}
</style>