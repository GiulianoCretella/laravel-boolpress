<template>
<main>
    <div class="container">
        <div class="row">
            <div class="col-6" v-for="(post,index) in posts" :key="index">
                <div class="card p-4">
                    <h4>{{post.title}}</h4>
                    <p>{{post.content}}</p>
                    <a href="#" @click="getDetail(post.slug, index)">Vedi Dettaglio</a>
                    <span v-if="post.detail">{{post[index].detail.slug}}</span>
                </div>
            </div>
        </div>
    </div>
    <!-- <h1>{{titolo}}</h1>
    <ul>
        <li v-for="(post,index) in posts" :key="index">
            {{post.title}}
            <a href="#" @click="getDetail(post.slug, index)">Vedi Dettaglio</a>
            <span v-if="post.detail">{{post[index].detail.slug}}</span>
        </li>
    </ul> -->
</main>
</template>

<script>
export default {
    name:'AppMain',
    data(){
        return{
            'titolo':'Work in Progress',
            'sottotitolo':'Sito in Costruzione',
            posts:[],
            
        }
    },
    methods:{
       getDetail(slug,index){
        axios.get('/api/posts/'+slug).then((res)=>{
            this.posts[index].detail= res.data;
            console.log(this.posts[index]);


        }).catch((error)=>{
            console.log(error)
        })
       }
    },
    created(){
        axios.get('/api/posts').then((res)=>{
            console.log(res);
            this.posts= res.data;
        }).catch((error)=>{
            console.log(error)
        })

    }
}
</script>
<style lang="scss">

</style>