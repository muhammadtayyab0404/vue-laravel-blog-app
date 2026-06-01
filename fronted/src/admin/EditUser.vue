<template>

<body>
<div class="container">
    <div class="header">
        <h1>Edit User</h1>
       
    </div>

    <div class="card form-card">
        <form @submit.prevent="editdata">
            <div class="form-group">
                <label for="userId">User ID</label>
                <input   id="userId" name="userId" :value="user.id" readonly>
            </div>

            <div class="form-group">
                <label for="name">Full Name</label>
                <input @blur="validateName" type="text" id="name" name="name" v-model="user.name">
            <p v-if="errors.name" class="error-text">{{ errors.name }}</p>

            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input @blur="validateEmail" type="email" id="email" name="email" v-model="user.email">
            <p v-if="errors.email" class="error-text">{{ errors.email }}</p>

            </div>

            <div class="form-group">
                <label for="role">Role</label>
                <select id="role" name="role" v-model="user.role">
                    <option value="1" >Admin</option>
                    <option value="2">Manager</option>
                    <option value="3">User</option>
                </select>
            </div>

    

            <div class="form-actions">
                <button type="submit" class="btn btncolor ">Update User</button>
                <button type="reset" @click="$router.back()" class="btn btncolor">Back</button>
            </div>
        </form>
    </div>
</div>
</body>

    </template>


<script>
import axios from 'axios';
import router from '@/router';

export default {
  data() {
    return {
      user: {
        id: '',
        name: '',
        email: '',
        role: ''
      },
      errors: {
        name: '',
        email: ''
      }
    }
  },
  mounted() {
    this.requestdata();
  },
  methods: {
    requestdata() {
      const id = this.$route.params.id;

      axios.get(`http://localhost:8000/api/user/${id}`)
        .then(response => {
          this.user = response.data.msg;
          console.log(this.user)
        })
        .catch(error => {
          console.log(error);
        });
    },
    editdata() {
      this.errors.name = '';
      this.errors.email = '';

      if (!this.user.name.trim()) {
        this.errors.name = 'Please fill name fields.';
      }

      if (!this.user.email.trim()) {
        this.errors.email = 'Please fill email fields.';
      }

      if (this.errors.name || this.errors.email) {
        return;
      }

      const id = this.$route.params.id;
      axios.put(`http://localhost:8000/api/user/${id}`, this.user)
        .then(() => {
          router.back();
        })
        .catch(error => {
          console.log(error);
        });
    },
   validateName() {
    if (!this.user.name.trim()) {
      this.errors.name = 'Name is required';
    } else {
      this.errors.name = '';
    }
  },
 validateEmail() {
    if (!this.user.email.trim()) {
        console.log("ss");
      this.errors.email = 'Email is required';
    } else {
      this.errors.email = '';
    }
  }

  }}
</script>

<style scoped>
.btncolor{
    color: var(--primary);
}
</style>