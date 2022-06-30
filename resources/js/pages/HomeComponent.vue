<template>
  <section class="container my-5">
    <div class="row">
      <div class="col-2">
        <nav>
          <ul class="p-0 my-2">
            <li class="my-2" v-for="(category,index) in categories" :key="index">
              <router-link :to="{ name:'category', params:{slug: category.slug} }" >{{category.name}}</router-link>
            </li>
          </ul>
        </nav>
      </div>

      <div class="col-10">
        <div class="slider-wrapper" tabindex="0"
          @mouseover="stopScroll"
          @mouseleave="scroll"
          @keydown.up="slidePrev"
          @keydown.down="slideNext"
        >

          <div class="item" >
              <img :src="`/storage/${posts[indexActive].image}`" :alt="posts[indexActive].title" />
              <div class="text">
                  <h3>{{posts[indexActive].title}}</h3>
                  <router-link class="text-light" :to="{ name:'single-post', params:{slug: posts[indexActive].slug} }" v-html="posts[indexActive].content"></router-link>
              </div>
          </div>

          <div class="thumbs">
              <div @click="slidePrev" class="prev"></div>
              <div @click="slideNext" class="next"></div>
              <div @click="select(index)" class="thumb" :class="{'active': index === indexActive}" v-for="(post,index) in posts" :key="index">
                  <img :src="`/storage/${post.image}`" :alt="post.title"/>
              </div>
          </div>

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
        posts:[],
        indexActive:0,
        intervallo:null
      }
    },
    methods:{
       slidePrev(){
            if(this.indexActive === 0){
                this.indexActive = this.posts.length -1;
            }else{
                this.indexActive -= 1
            }
        },
        slideNext(){
            if(this.indexActive === this.posts.length -1){
               this.indexActive = 0;
            }else{
                this.indexActive += 1
            }
        },
        scroll(){
            this.intervallo= setInterval(() => {
                this.slideNext()
            },2000)
        },
        stopScroll(){
            clearInterval(this.intervallo);
            this.intervallo = null;
        },
        select(index){
            console.log(index)
            this.indexActive = index
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
       this.scroll();

    }

}
</script>

<style lang="scss" scoped>
  li{
    background-color: #021832;
    list-style-type:none;
    padding: 10px;
    a{
      color: white;
    }  
  }

  .item {
    float: left;
    width: 700px;
    height: 400px;
    position: relative;
    img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    .text {
      position: absolute;
      right: 20px;
      bottom: 20px;
      text-align: right;
      font-weight: 700;
      color: #ffffff;;
    }
  }
  .thumbs {
    float: left;
    height: 400px;
    background: #000;
    position: relative;
    .thumb {
      height: calc(400px / 3);
      opacity: 0.5;
      img {
        width: 100%;
        height: 100%;
        object-fit: cover;
      }
    }
  }
  .thumb.active {
      border: 2px solid #ccc;
      opacity: 1;
  }

  .prev, .next {
      width: 20px;
      height: 20px;
      margin: 10px 0;
      border-radius: 50%;
      background: #ccc;
      position: absolute;
      left: 50%;
      transform: translate(-50%);
      cursor: pointer;
      z-index: 999;
  }

  .next {
      bottom: 0;
  }
  .prev::after {
      content: '';
      width: 10px;
      height: 10px;
      border-top: 1px solid black;
      border-right: 1px solid black;
      display: block;
      position: absolute;
      top: 35%;
      left: 50%;
      transform: translate(-50%) rotate(-45deg);
  }

  .next::before {
      content: '';
      width: 10px;
      height: 10px;
      border-top: 1px solid black;
      border-right: 1px solid black;
      display: block;
      position: absolute;
      bottom: 35%;
      left: 50%;
      transform: translate(-50%) rotate(135deg);
  }
</style>