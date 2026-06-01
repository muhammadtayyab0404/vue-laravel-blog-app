
<template>
  <div class="container">
    <div class="page-header">
        <h1 class="page-title">Blog Posts</h1>
        <div class="actions">
          <button  @click="$router.push('/addpost')" class="btn btn-primary">Add Post</button>
          <button v-if="role == 'admin'" @click="$router.push('/users')" class="btn btn-primary">Users</button>
        </div>
      </div>

    <showrepeat :postsdataa="posts" />
  </div>
</template>

<script>
import axios from 'axios';
import showrepeat from '@/components/showrepeat.vue';

export default {

components: {
    showrepeat
},

 data() {
  return {
    role: '',
    posts: []  
  }
},
mounted() {
    const token = localStorage.getItem('token');
 axios.get('http://localhost:8000/api/posts',{
  
  headers: {
    Authorization: `Bearer ${token}`
  }
})
  .then(response => {
   this.posts = response.data; 
   this.role = localStorage.getItem('role')
 }).catch(error => {
            console.log(error);
        });

}
}
</script>

<style scoped>
.page-header {
  display: flex;
  align-items: center;
  justify-content: space-between; /* title left, actions right */
  gap: 12px;
}
.actions {
  display: flex;
  gap: 8px; /* space between buttons */
}
.page-title {
  margin: 0; /* ensure title doesn't add extra vertical spacing */
}
</style>