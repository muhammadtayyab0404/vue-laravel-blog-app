<template>
    
  <div v-for="(postsdata, index) in postsdataa" :key="postsdata.id" class="post">

    <h2>{{ postsdata.title }}</h2>

    <p>{{ postsdata.content }}</p>

    <div class="btn-group">
      
      <router-link  
        v-if="$route.name !== 'showpost'" 
        :to="'/showpost/' + postsdata.id" 
        class="btn btn-show"
      >
        Show
      </router-link>

      <router-link 
        v-if="$route.name !== 'showpost' && postsdata.can_edit" 
        :to="'/editpost/' + postsdata.id" 
        class="btn btn-edit"
      >
        Edit
      </router-link>

      <router-link 
        v-if="$route.name !== 'showpost' && postsdata.can_delete" 
        :to="'/deletepost/' + postsdata.id" 
        class="btn btn-delete"
      >
        Delete
      </router-link>
    </div>

     <p class="username"  >
    {{postsdata.users.name}}
  </p>

  </div>

</template>

<script>   
export default {

 props: {
     postsdataa: Array
 },

 mounted() {
    console.log(this.postsdataa);
 }

}
</script>

<style scoped>

.post{
    background: #ffffff;
    padding: 24px;
    margin-bottom: 24px;
    border-radius: 18px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    transition: 0.3s ease;
}

.post:hover{
    transform: translateY(-4px);
}

.post h2{
    margin-bottom: 12px;
    color: #222;
    font-size: 28px;
}

.post p{
    color: #666;
    line-height: 1.7;
    margin-bottom: 22px;
}

.btn-group{
    display: flex;
    gap: 14px;
    flex-wrap: wrap;
}

.btn{
    text-decoration: none;
    padding: 10px 22px;
    border-radius: 10px;
    color: white;
    font-weight: 600;
    transition: 0.3s ease;
}

.btn-show{
    background: #3498db;
}

.btn-show:hover{
    background: #2980b9;
}

.btn-edit{
    background: #2ecc71;
}

.btn-edit:hover{
    background: #27ae60;
}

.btn-delete{
    background: #e74c3c;
}

.btn-delete:hover{
    background: #c0392b;
}
.username{
    text-align: right;
    margin-top: 10px;
    font-size: 14px;
    color: #999;
    font-weight: 600;
}

</style>