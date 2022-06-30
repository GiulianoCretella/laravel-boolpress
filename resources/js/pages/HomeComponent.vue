<template>
  <section class="container">
    <div class="row">
      <div class="col-2">
        <nav>
          <ul class="p-0 my-2">
            <li class="my-2 bg-dark" v-for="(category,index) in categories" :key="index">
              <router-link :to="{ name:'category', params:{slug: category.slug} }" >{{category.name}}</router-link>
            </li>
          </ul>
        </nav>
      </div>
      <div class="col-10">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active" v-for="post in posts" :key="post.id">
              <img class="d-block w-100" :src="`/storage/${post.image}`" alt="First slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
    name:'HomeComponent',
    data(){
      return{
        categories:[],
        posts:[]
      }
    },
    mounted(){
      axios.get('/api/categories').then((res)=>{
        this.categories = res.data;
      }).catch((error) =>{
        console.log(error);
      });

       axios.get('/api/posts/').then((res)=>{
        this.posts = res.data.slice(0,3);
      }).catch((error) =>{
        console.log(error);
      });
    }

}
</script>

<style lang="scss">
li{
  list-style-type:none;
}
</style>