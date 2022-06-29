<template>
  <section>
    <h1 class="text-center">Posts</h1>
    <div class="container" v-if="posts.length > 0">
        <div class="row justify-content-center" v-for="(post,index) in posts" :key="index">
            <div class="col-8 my-3">
                <div class= "card">
                    <div class="title-box p-2 rounded-top text-light text-center">
                        <h4>{{post.title}}</h4>
                    </div>
                    <div class="p-2">
                        <p v-html="post.content"></p>
                        <router-link :to="{ name:'single-post', params:{slug: post.slug} }" >Visualizza post</router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
</template>

<script>
export default {
    name:'PostsComponent',
    data(){
        return{
            posts:[]
        }
    },
    created(){
        axios.get('/api/posts').then((res) =>{
            this.posts = res.data
        })
    }
}
</script>

<style lang="scss">
.title-box{
    background-color: #000f21
}
</style>