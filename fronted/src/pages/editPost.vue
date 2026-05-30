<template>
  <div class="container">
    <div class="page-header">
      <h1 class="page-title">Edit Post</h1>
    </div>

    <div class="post">
      <form @submit.prevent="editdata">
        <div class="form-group">
          <label for="title">Title</label>
          <input id="title" type="text" v-model="post.title" class="form-control" />
          <p v-if="errors.title" class="error-text">{{ errors.title }}</p>
        </div>

        <div class="form-group">
          <label for="content">Content</label>
          <textarea id="content" v-model="post.content" class="form-control"></textarea>
          <p v-if="errors.content" class="error-text">{{ errors.content }}</p>
        </div>

        <div class="form-actions">
          <button type="submit" class="btn btn-primary">Update</button>
          <button type="button" @click="$router.push('/home')" class="btn btn-secondary">Back</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import router from '@/router';

export default {
  data() {
    return {
      post: {
        title: '',
        content: ''
      },
      errors: {
        title: '',
        content: ''
      }
    }
  },
  mounted() {
    this.requestdata();
  },
  methods: {
    requestdata() {
      const id = this.$route.params.id;

      axios.get(`http://localhost:8000/api/posts/${id}`)
        .then(response => {
          this.post = response.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
    editdata() {
      this.errors.title = '';
      this.errors.content = '';

      if (!this.post.title.trim()) {
        this.errors.title = 'Please fill title fields.';
      }

      if (!this.post.content.trim()) {
        this.errors.content = 'Please fill content fields.';
      }

      if (this.errors.title || this.errors.content) {
        return;
      }

      const id = this.$route.params.id;
      axios.put(`http://localhost:8000/api/posts/${id}`, this.post)
        .then(() => {
          router.push('/home');
        })
        .catch(error => {
          console.log(error);
        });
    }
  }
}
</script>