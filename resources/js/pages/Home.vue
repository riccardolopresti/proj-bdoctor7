<script>
import Header from "../partials/Header.vue";
import Jumbotron from "../partials/Jumbotron.vue";

import axios from "axios";

export default {
    name: "Home",

    components: {
        Header,
        Jumbotron,
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
        filterDoctors() {
            axios
                .get("http://127.0.0.1:8000/api/doctors/" + this.specType)
                .then((result) => {
                    this.filteredDoctors =
                        result.data.filteredDoctors[0].doctors;
                    console.log(result.data.filteredDoctors[0].doctors);
                });
        },
    },
    mounted() {
        this.getSpecs();
    },
};
</script>

<template>
    <Header />
    <Jumbotron :specs="specs" />
</template>

<style lang="scss">
* {
    margin: 0;
    padding: 0;
    font-family: sans-serif;
}
</style>
