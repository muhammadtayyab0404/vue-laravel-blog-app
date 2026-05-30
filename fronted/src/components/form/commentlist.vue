<template>

            <div v-for="comment in receiveformcmt" :key="comment.id" class="single-comment">

                <h4>{{comment.name}}</h4>

                <p>
                    {{comment.content}}
                </p>
                </div>

    </template>


<script>   
export default {

    props: {
        receiveformcmt: Array
    }

}

</script>

<style scoped>
.comments-section h3{
    margin-bottom:20px;
}

.single-comment{
    background:#f9f9f9;
    padding:15px;
    border-radius:6px;
    margin-bottom:15px;
    border-left:4px solid #3498db;
}

.single-comment h4{
    margin-bottom:8px;
    color:#222;
}

.single-comment p{
    margin:0;
    color:#555;
}</style>