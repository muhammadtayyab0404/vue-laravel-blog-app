<template>
  <div class="container">
    <div class="page-header">
      <h1 class="page-title">Add New Post</h1>
    </div>

    <div class="post">
      <form @submit.prevent="addPost">
        <div class="form-group">
          <label for="title">Title</label>
          <input id="title" v-model="form.title" type="text" placeholder="Enter title" class="form-control" />
          <p v-if="errors.title" class="error-text">{{ errors.title }}</p>
        </div>

        <div class="form-group">
          <label for="content">Comment</label>
          <textarea id="content" v-model="form.content" placeholder="Enter comment" class="form-control"></textarea>
          <p v-if="errors.content" class="error-text">{{ errors.content }}</p>
        </div>

        <div class="form-actions">
          <button type="submit" class="btn btn-primary">Add Post</button>
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
            form :{
            title: '',
            content: '',
            },
            errors: {
                title: '',
                content: '',
            }

        }
    },

    methods: {

        addPost() {
          
            if (this.form.title== '')
          {           this.errors.title = "Please fill title fields.";
             
         }
             
            if (this.form.content== ''){
                 this.errors.title = "Please fill content fields.";
             }
            
            else {
                axios.post('http://localhost:8000/api/posts', this.form)
                    .then(response => {
                        console.log("success");
                        router.push('/home');
                    })
                    .catch(error => {
                        console.log(error);
                    });

                }

            }
        }
    }





</script>