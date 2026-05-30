<script>
import axios from 'axios';
import Showrepeat from '@/components/showrepeat.vue';
import Comment from '@/components/comment.vue';

export default {
  components: {
    Showrepeat,
    Comment
  },
  data() {
    return {
      post: [],
      comment: [],
      id: this.$route.params.id
    }
  },
  mounted() {
    this.requestdata();
    this.showcomment();
  },
  computed: {
    pageId() {
      return Number(this.$route.params.id);
    }
  },
  methods: {
    requestdata() {
      const id = this.$route.params.id;
      const token = localStorage.getItem('token');

      console.log("token " + token);
      axios.get(`http://localhost:8000/api/posts/${id}`, {

      })
        .then(response => {
          this.post = [response.data];
        })
        .catch(error => {
          console.log(error);
        });
    },
    showcomment() {
      const id = this.$route.params.id;
      axios.get(`http://localhost:8000/api/posts/${id}/comments`)
        .then(response => {
          this.comment = response.data;
        })
        .catch(error => {
          console.log(error);
        });
    }
  }
}
</script>
<template>
  <div class="container">

    <div class="page-header">
      <h1 class="page-title">Post Details</h1>
    </div>

    <Showrepeat :postsdataa="post" />

    <Comment :pageid="pageId" :receivecomment="comment" />

    <div class="form-actions">
      <button @click="$router.push('/home')" class="btn btn-secondary">
        Back
      </button>
    </div>

  </div>
</template>

<style scoped>

.container{
  max-width: 900px;
  margin: 40px auto;
  padding: 20px;
}

.page-header{
  margin-bottom: 20px;
}

.page-title{
  font-size: 32px;
  font-weight: 700;
  color: #222;
}

.form-actions{
  margin-top: 25px;
  text-align: center;
}

.btn{
  padding: 10px 18px;
  border: none;
  border-radius: 10px;
  cursor: pointer;
  font-weight: 600;
}

.btn-secondary{
  background: #7f8c8d;
  color: white;
}

.btn-secondary:hover{
  background: #636e72;
}

</style>

