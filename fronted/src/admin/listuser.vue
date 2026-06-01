<template>
    <h1>list user</h1>

<head>
<title>User Management</title>
</head>
<body>
<div class="container">
<div class="card">
<div class="header">
<h2>User Management</h2>

<router-link to="/admin/adduser">
<button class="btn btn-add">+ New User</button>
</router-link>
</div>
<table v-if="user">
<thead>
<tr><th>ID</th><th>Name</th><th>Email</th><th>Role</th><th>Actions</th></tr>
</thead>
<tbody >
<tr v-for="(users, index) in user" :key="users.id">
    <td>{{index +1}}</td>
    <td>{{users.name}}</td>
    <td>{{users.email}}</td>
    <td>{{users.roles.slug}}</td><td>
        <div class="actions">
    <router-link :to="`/edituser/${users.id}`">
          <button class="btn btn-edit">Edit</button>
    </router-link>
   <router-link :to="`/deleteuser/${users.id}`">
    <button class="btn btn-delete">Delete</button>
    </router-link>
</div>
</td>
</tr>

</tbody>
</table>
<div class="back-section">
  <button @click="$router.back()" class="btn btn-edit">
    Back
  </button>
</div>
</div>
</div>
</body>


</template>

<script setup>
import axios from 'axios';
import { onMounted, ref } from 'vue';
import { useRouter } from 'vue-router';

const user = ref()

onMounted(()=>
{
      axios.get(`http://localhost:8000/api/alluser`)
        .then(res => {
          user.value = res.data;
        })
        .catch(err => {
          console.log(err);
        });
})
</script>


<style scoped>
*{margin:0;padding:0;box-sizing:border-box;}
body{background:#f4f4f4;font-family:Arial,Helvetica,sans-serif;}
.container{width:90%;max-width:1000px;margin:40px auto;}
.card{background:#fff;padding:25px;border-radius:10px;box-shadow:0 2px 10px rgba(0,0,0,.1);}
.header{display:flex;justify-content:space-between;align-items:center;margin-bottom:25px;}
.btn{border:none;padding:10px 18px;border-radius:5px;cursor:pointer;color:#fff;}
.btn-add{background:#2ecc71;}
.btn-edit{background:#f39c12;}
.btn-delete{background:#e74c3c;}
table{width:100%;border-collapse:collapse;}
thead{background:#3498db;color:#fff;}
th,td{padding:14px;text-align:left;border-bottom:1px solid #ddd;}
.actions{display:flex;gap:10px;}
.back-section {
  margin-top: 20px;
}

.back-section .btn {
  background: #6c757d;
}
</style>