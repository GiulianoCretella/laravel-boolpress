<template>
<header>
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="/">Boolpress</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <div v-for="(item,index) in menuItem" :key="index">
          <router-link :to="{name : item.routeName}" class="navlink mx-2">{{item.label}}</router-link>
          </div>
        </div>
      </div>
    </div>
  </nav>
</header>
</template>
<script>
export default {
    name:'AppHeader',
    data(){
      return{
        menuItem:[
          {
            label:'Home',
            routeName:'home'
          },
          {
            label:'Contact',
            routeName:'contact'
          },
          {
            label:'About',
            routeName:'about'
          },
          {
            label:'Posts',
            routeName:'posts'
          }
        ]
      }
    }
}
</script>
<style lang="scss">
header{
  height: 60px;
    background-color: #021832;

  .navlink{
    color:white;
  }
  .router-link-exact-active{
  background-color: #004497!important;
  padding: 23px;
  }
  
    
}

</style>