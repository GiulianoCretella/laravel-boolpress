<template>
  <section>
    <div class="container" v-if="post">
        <div class="row justify-content-center">
            <div class="col-8 my-3">
                <div class= "card">
                    <div class="title-box p-2 rounded-top text-light text-center">
                        <h4>{{post.title}}</h4>
                    </div>
                    <img  class="img-fluid" :src="'../storage/' + post.image" :alt="post.title">
                    <div class="p-2">
                        <p v-html="post.content"></p>
                        <p>Post del : {{convertData}}</p>
                        <ul>
                            <li v-for="(item,index) in post.tags" :key="index">
                                <span>{{item.name}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8 py-3">
                <h4 class="text-center">Aggiungi un commento</h4>
                <form @submit.prevent="addComment()" class="card p-3">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" aria-describedby="username" placeholder="Enter Username" v-model="formData.username">
                </div>
                 <div class="form-group">
                    <label for="content">Content</label>
                    <input type="text" class="form-control" id="content" aria-describedby="content" placeholder="Enter Content" v-model="formData.comment_content">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
            
        </div>
        <div class="row justify-content-center" v-if="post.comments.length > 0">
            <div class="col-12 my-3">
                <h4 class="text-center">I commenti degli utenti</h4>
            </div>
            <div class="col-8 my-1" v-for="comment in post.comments" :key="comment.id">
                <div class= "card">
                    <div class="title-box p-2 rounded-top text-light text-center">
                        <h4>{{comment.username}}</h4>
                    </div>
                    <div class="p-2">
                        <p>{{comment.comment_content}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
</template>

<script>
export default {
    name:'SinglePostComponent',
    data(){
        return{
            post:null,
            formData:{
                username:'',
                comment_content:'',
                post_id:'',
            },
        }
    },
    methods:{
        addComment(){
            axios.post('/api/comments',this.formData)
            .then((response) => {
                this.post.comments.push(response.data)
            })
            .catch((error) =>{
                console.log(error);
            });
        }
    },
    mounted(){
        const slug= this.$route.params.slug;
        axios.get(`/api/posts/${slug}`).then((res)=>{
            this.post = res.data;  
            this.formData.post_id= this.post.id;
        }).catch((error)=>{
            this.$router.push({name:'page-404'});
        });
    },
    computed:{
        convertData(){
            let data = new Date(this.post.created_at)
            let dataString = data.toString();
            const newDate = dataString.split(' ',4);
            let lastDate = newDate.shift();
            return newDate.join('-');
        }
    }
}
</script>

<style lang="scss">

</style>