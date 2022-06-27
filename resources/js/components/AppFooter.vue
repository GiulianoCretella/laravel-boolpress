<template>
<footer>
    <div class="container">
        <div class="row align-items-center">
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
    color:#6DD663 ;
    background-color: #000d1d;
    a{
        color:#6DD663 ;
        padding: 3px;
    }
}
</style>