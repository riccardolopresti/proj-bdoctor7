<script>
import Header from '../partials/Header.vue'
import Jumbotron from '../partials/Jumbotron.vue'
import SponsorSection from './SponsorSection.vue'

export default {
    name: 'Home',

    components:{
        Header,
        Jumbotron,
        SponsorSection
    },
}
</script>

<template>
    <Header/>
    <Jumbotron/>
    <SponsorSection/>>

</template>


<style lang="scss">
*{
    margin:0; padding:0;
    font-family: sans-serif;
}

body{
    overflow-x: hidden;
}

</style>
