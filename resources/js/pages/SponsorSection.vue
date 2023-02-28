<script>
import { store } from "../data/store";
import axios from "axios";
import HomeCard from "../components/HomeCard.vue";

import docs from "../assets/data/sponsored-docs";

export default {
    name: "SponsorSection",

    components: {
        HomeCard,
    },

    data() {
        return {
            store,
        };
    },
    methods: {
        getSponsoredDoctors() {
            axios.get(store.apiUrl).then((result) => {
                store.sponsorFilteredDocs = result.data.sponsorDocs.data;
                store.doc_ratings = result.data.doc_ratings;
                console.log(store.sponsorFilteredDocs);
            });
        },
    },
    mounted() {
        this.getSponsoredDoctors();
    },
};
</script>

<template>
    <section class="pb-5">
        <h1 class="fw-bold text-center pt-4 mb-4 text-primary" id="spons-doc">
            Medici in evidenza
        </h1>
        <div
            class="container-custom m-auto debug d-flex justify-content-center flex-wrap"
        >
            <HomeCard
                v-for="doctor in store.sponsorFilteredDocs"
                :key="doctor.id"
                :doctor="doctor"
                class="m-1"
            />
        </div>
    </section>
</template>

<style lang="scss" scoped>
#spons-doc{
    scroll-margin-top: 96px;
}

* {
    background-color: #daf0ee;
    .container-custom {
        width: 90%;
    }
}
</style>
