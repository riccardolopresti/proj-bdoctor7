<script>
import Header from '../partials/Header.vue'
import Jumbotron from '../partials/Jumbotron.vue'

export default {
    name: 'Home',

    components:{
        Header,
        Jumbotron
    },
}
</script>

<template>
    <Header/>
    <Jumbotron/>

</template>


<style lang="scss">
*{
    margin:0; padding:0;
    font-family: sans-serif;
}

</style>
