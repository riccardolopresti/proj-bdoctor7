<script>

import Header from "../partials/Header.vue";
import Jumbotron from "../partials/Jumbotron.vue";
import SponsorSection from './SponsorSection.vue'
import FormContact from '../components/FormContact.vue'
import ReviewsRatings from '../components/ReviewsRatings.vue'

import axios from "axios";



export default {
    name: "Home",

    components: {
        Header,
        Jumbotron,
        SponsorSection,
        FormContact,
        ReviewsRatings
    },
    data() {
        return {
            baseUrl: "http://127.0.0.1:8000/api/",
            doctors: [],
            specs: [],
            specType: "",
            filteredDoctors: [],
        };
    },
    methods: {
        getSpecs() {
            axios.get(this.baseUrl + "specs").then((result) => {
                this.specs = result.data.specs;
                console.log(this.specs);
            });
        },
    },
    mounted() {
        this.getSpecs();
    },
};
</script>

<template>

    <!-- <Header />
    <Jumbotron :specs="specs" />
    <SponsorSection/> -->
    <FormContact/>
    <ReviewsRatings/>

</template>

<style lang="scss">
* {
    margin: 0;
    padding: 0;
    font-family: sans-serif;
}

body{
    overflow-x: hidden;
}

</style>
