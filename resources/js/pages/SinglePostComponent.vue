<template>
  <section>
     <div class="container" v-if="post">
        <div class="row justify-content-center">
            <div class="col-8 my-3">
                <div class= "card">
                    <div class="bg-dark p-2 rounded-top text-light text-center">
                        <h4>{{post.title}}</h4>
                    </div>
                    <img  class="img-fluid" :src="'../storage/' + post.image" :alt="post.title">
                    <div class="p-2">
                        <p v-html="post.content"></p>
                        <p>{{post.created_at}}</p>
                        <ul>
                            <li v-for="(item,index) in post.tags" :key="index">
                                <span>{{item.name}}</span>
                            </li>
                        </ul>
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
            post:null
        }
    },
    mounted(){
        const slug= this.$route.params.slug;
        axios.get(`/api/posts/${slug}`).then((res)=>{
            this.post = res.data;
            
        })
    }
}
</script>

<style lang="scss">

</style>