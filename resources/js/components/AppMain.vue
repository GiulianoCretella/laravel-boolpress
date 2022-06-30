<template>
<main>
    <router-view> </router-view>
</main>
</template>

<script>
export default {
    name:'AppMain',
    data(){
        return{
            posts:[],
            
        }
    },
    // methods:{
    //    getDetail(slug,index){
    //     axios.get('/api/posts/'+slug).then((res)=>{
    //         this.posts[index].detail= res.data;
    //         console.log(this.posts[index]);


    //     }).catch((error)=>{
    //         console.log(error)
    //     })
    //    }
    // },
    // created(){
    //     axios.get('/api/posts').then((res)=>{
    //         console.log(res);
    //         this.posts= res.data;
    //     }).catch((error)=>{
    //         console.log(error)
    //     })

    // }
}
</script>
<style lang="scss">
main{
    background-image: url('/storage/uploads/sfondo.jpg');
    height: calc(100vh - 120px);
    overflow: auto;
}

</style>