<template>

<div class="container">

    <div class="post">

        <!-- COMMENT FORM -->
        <div class="comment-form">

            <h3>Add Comment</h3>

            <form @submit.prevent="submitdata">

                <input 
                    type="text"
                    v-model="formdata.title"
                    placeholder="Enter your name"
                    class="input-field"
                >

                <!-- Title error template -->
                <p v-if="titleerror" class="error">
                    Title is empty
                </p>

                <textarea
                    v-model="formdata.content"
                    placeholder="Write your comment"
                    class="textarea-field">
                </textarea>

                <!-- Content error template -->
                <p v-if="conterror" class="error">
                    Please enter a comment.
                </p>

                <button class="btn btn-comment">
                    Add Comment
                </button>

            </form>

        </div>

        <!-- COMMENTS -->
        <div class="comments-section">

            <div v-if="receivecomment.length > 0">

                <h3>All Comments</h3>

                <commentlist></commentlist>

            </div>

            <commentlist :receiveformcmt="receivecomment"></commentlist>

        </div>

    </div>

</div>

</template>

<script>   
import axios from 'axios'
import commentform from './form/commentform.vue'
import commentlist from './form/commentlist.vue'

export default {

    data(){
        return{

            titleerror: false,
            conterror: false,

            formdata:{
                title:'',
                content:''
            }

        }
    },

    props: {
        receivecomment: Array,

        pageid: {
            type: Number
        }
    },

    components: {
        commentlist
    },

    mounted() {
        console.log(this.receivecomment)   
    },      

    methods:{

        submitdata(){

            if (this.formdata.title == ''){
                this.titleerror = true  
            }

            if (this.formdata.content == ''){
                this.conterror = true  
            }

            else{

                axios.post(
                    `http://localhost:8000/api/posts/${this.pageid}/comments`,
                    this.formdata
                )

                .then(response => {

                    console.log("success")
                    window.location.reload()

                })

                .catch(error => {

                    console.log(error)

                })

            }

        }

    }

}
</script>

<style scoped>

.container{
    margin-top: 30px;
}

.post{
    background: #ffffff;
    padding: 28px;
    border-radius: 20px;
    box-shadow: 0 10px 35px rgba(0,0,0,0.08);
}

.comment-form{
    margin-top: 10px;
    margin-bottom: 40px;
}

.comment-form h3{
    margin-bottom: 20px;
    color: #222;
    font-size: 28px;
    font-weight: 700;
}

.input-field,
.textarea-field{
    width: 100%;
    padding: 14px 16px;
    border: 1px solid #d9dbe5;
    border-radius: 14px;
    margin-bottom: 14px;
    font-size: 1rem;
    transition: 0.3s ease;
}

.input-field:focus,
.textarea-field:focus{
    outline: none;
    border-color: #3498db;
    box-shadow: 0 0 0 4px rgba(52,152,219,0.12);
}

.textarea-field{
    min-height: 150px;
    resize: vertical;
}

.error{
    color: #e74c3c;
    font-size: 0.95rem;
    margin-top: -6px;
    margin-bottom: 14px;
}

.btn{
    border: none;
    padding: 12px 22px;
    border-radius: 12px;
    cursor: pointer;
    font-weight: 700;
    transition: 0.3s ease;
}

.btn-comment{
    background: #3498db;
    color: white;
}

.btn-comment:hover{
    background: #2980b9;
}

.comments-section{
    margin-top: 20px;
}

.comments-section h3{
    margin-bottom: 22px;
    color: #222;
    font-size: 26px;
}

</style>