<template>
<head>
<title>Add User</title>

</head>
<body>
<div class="container">
    <div class="header">
        <h1>Add User</h1>
    </div>

    <div class="card form-card">
        <form @submit.prevent="addPost">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input @blur="checkerrorname" type="text" v-model="form.Fullname" id="name" name="Fullname" placeholder="Enter full name">
                  <p v-if="errors.Fullname" class="error-text">{{ errors.Fullname }}</p>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input @blur="checkerroremail" type="email"  v-model="form.email" name="email" placeholder="Enter email address">
                <p v-if="errors.email" class="error-text">{{ errors.email }}</p>
            </div>

            <div class="form-group">
                <label for="password">Enter the Password</label>
                <input @blur="checkerrorpass" type="password"  v-model="form.pass" name="pass" placeholder="Enter the Password">
                <p v-if="errors.pass" class="error-text">{{ errors.pass }}</p>
            </div>

            <div class="form-group">
                <label for="role">Role</label>
                <select id="role" name="role" v-model="form.role">
                    <option value="1" >Admin</option>
                    <option value="2">Manager</option>
                    <option value="3">User</option>
                </select>
             <p v-if="errors.role" class="error-text">{{ errors.role }}</p>

            </div>


            <div class="form-actions">
                <button  type="submit" class="btn btncolor">Add User</button>
                <button @click="router.back()" type="reset" class="btn secondary-btn btncolor">Back</button>
            </div>
        </form>
    </div>
</div>
</body>


    </template>

<script setup>
import { ref } from 'vue';
import { reactive } from 'vue';
import router from '@/router';
import axios from 'axios';
        
         const  form = reactive({
            Fullname: '',
            email: '',
            role:'3',
            pass:''
            })

          const errors= reactive({
                Fullname: '',
                email: '',
                role:'',
                pass:''
            })


       function addPost() {
          
            if (form.Fullname == '')
          { 
            errors.Fullname = "Please fill Full Name fields.";
             
         }
             
            if (form.email== ''){
                 errors.email = "Please fill Email fields.";
             }

              if (form.role== ''){
                 errors.role = "Please Enter the role.";
             }
        
             if (form.pass== ''){
            errors.pass = "Please Enter the pass";
           
          }   
        if (form.pass.length < 6){
            errors.role = "Password must be of 6 digits";
             }
                
            else {
                axios.post('http://localhost:8000/api/posts/admin/adduser', form)
                    .then(response => {
                        console.log("success");
                        router.back();
                    })
                    .catch(error => {
                        console.log(error);
                    });

                }

            }


    function checkerrorname(){

    if (!form.Fullname.trim()) {
      errors.Fullname = 'Name is required';
    } else {
      errors.Fullname = '';
    }
                
    }
        
   function checkerroremail()
   {
   if (!form.email.trim()) {
      errors.email = 'Email is required';
    } else {
      errors.email = '';
    }
   }

   function checkerrorpass(){
       if (!form.pass.trim()) {
      errors.pass = 'password is required';
    }else if (form.pass.length < 6)
    {
      errors.pass = "Password must be of 6 digits";
    }
    
    else {
      errors.pass = '';
    }
   } 



</script>



<style scoped>
.btncolor{
    color: var(--primary);
}
</style>