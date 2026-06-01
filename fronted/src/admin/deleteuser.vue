

<template>
  <div class="container">
    <div class="page-header">
      <h1 class="page-title">Delete Post</h1>
    </div>

    <div class="post">
      <h2>{{user.name}} </h2>
      <p>email: {{user.email}}</p>
    </div>

    <p class="message">Are you sure you want to delete this post?</p>

    <div class="form-actions">
      <button @click="deletePost" class="btn btn-danger">Yes</button>
      <button @click="$router.back()" class="btn btn-secondary">No</button>
    </div>
  </div>
</template>

<script>
import router from '@/router';
import axios from 'axios';

export default {
  data() {
    return {
      id: '',
      user: {}
    }
  },
  mounted() {
    this.requestdata();
  },
  methods: {
    requestdata() {
      this.id = this.$route.params.id;
      axios.get(`http://localhost:8000/api/user/${this.id}`)
        .then(res => {
          this.user = res.data.msg;
         
        })
        .catch(err => {
          console.log(err);
        });
    },
    deletePost() {
      axios.delete(`http://localhost:8000/api/user/${this.id}`)
        .then(() => {
          router.back();
        })
        .catch(err => {
          console.log(err);
        });
    }
  }
}
</script>