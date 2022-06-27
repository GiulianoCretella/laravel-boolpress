<template>
<div>
    <app-header/>
    <app-main/>
    <app-footer/>
</div>
</template>

<script>
import AppHeader from '../components/AppHeader'
import AppMain from '../components/AppMain'
import AppFooter from '../components/AppFooter'

export default({
    name:"App",
    components:{
        AppHeader,
        AppMain,
        AppFooter
    }
})
</script>

<style lang="scss">

</style>
