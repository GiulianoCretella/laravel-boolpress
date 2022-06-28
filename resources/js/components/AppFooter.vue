<template>
<footer>
    <div class="container h-100">
        <div class="row align-content-center h-100">
            <div class="col">
                <a  href="/">Boolpress</a>
            </div>
            <div class="col text-right">
                <a href="/">Home</a>
                <a href="/admin">Area Riservata</a>
            </div>
        </div>
        
    </div>
</footer>
</template>

<script>
export default {
    name:'AppFooter',
    data(){
        return{
            'titolo':'Footer',
        }
    }
}
</script>
<style lang="scss">
footer{
    height: 60px;
    color:#6DD663 ;
    background-color: #000d1d;
    a{
        color:#6DD663 ;
        padding: 3px;
    }
}
</style>