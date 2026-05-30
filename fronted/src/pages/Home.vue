
<template>
  <div class="container">
    <div class="page-header">
      <h1 class="page-title">Blog Posts</h1>
      <button @click="$router.push('/addpost')" class="btn btn-primary">Add Post</button>
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
    console.log(this.posts);
 }).catch(error => {
            console.log(error);
        });

}
}
</script>