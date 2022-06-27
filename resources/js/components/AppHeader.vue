<template>
<header>
    <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
    <a class="navbar-brand" href="/">
      <img :src="logo">
    </a>
    <a class="navbar-brand" href="/">Boolpress</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link" href="/">Home</a>
        <a class="nav-link" href="/admin">Area Riservata</a>
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
            'titolo':'Header',
            'logo':'/img/logo.png'
        }
    }
}
</script>
<style lang="scss">
header{
    nav{
    background-color: #021832;
    a{
        color:white;
    }
    }
    
}

</style>