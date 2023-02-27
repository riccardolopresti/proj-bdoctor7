<script>
import { store } from "../data/store";
import SearchCard from "../components/SearchCard.vue";
import Footer from "../partials/Footer.vue";
import Header from "../partials/Header.vue";

export default {
    name: "Search",
    components: {
        SearchCard,
        Header,
        Footer,
    },
    data() {
        return {
            store,
            rangeValue: 0,
            reviewsNumber: "",
            results: "",
        };
    },
    methods: {
        getAverage(id) {
            for (let i = 0; i <= this.store.doc_ratings.length; i++) {
                if (i == id) {
                    let myAvg = this.store.doc_ratings[i - 1].average_rating;
                    return myAvg;
                }
            }
        },
        capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        },
    },
};
</script>

<template>
    <Header />
    <div class="wrapper">
        <div class="container-fluid">
            <div class="top-section">
                <div class="left ps-3">
                    <h2>
                        Risultati per:
                        <span class="blue"
                            ><strong>{{
                                capitalizeFirstLetter(store.specType)
                            }}</strong></span
                        >
                    </h2>
                </div>
                <div class="right pe-3">
                    <span>Filtro per Rating:</span>
                    <input
                        v-model="rangeValue"
                        type="range"
                        class="form-range ms-3"
                        min="0"
                        max="5"
                        id="ratingRange"
                    />
                    <select
                        v-model="reviewsNumber"
                        class="form-select"
                        aria-label="reviewRange"
                    >
                        <option selected value="">
                            filtra per numero di recensioni
                        </option>
                        <option value="1">almeno 1 recensione</option>
                        <option value="2">almeno 2 recensioni</option>
                        <option value="3">almeno 3 recensioni</option>
                    </select>
                </div>
            </div>
            <div class="doctor-container">
                <SearchCard
                    v-for="doctor in store.filteredDoctors"
                    :key="doctor.id"
                    v-show="
                        doctor.reviews.length >= this.reviewsNumber &&
                        getAverage(doctor.id) >= this.rangeValue
                    "
                    :doctor="doctor"
                />
                <!-- <div
            v-for="doctor in store.filteredDoctors"
            :key="doctor.id"
            v-show="
                doctor.reviews.length >= this.reviewsNumber &&
                getAverage(doctor.id) >= this.rangeValue
            "
            class="doctor-card"
        >
            <p><router-link :to="{name:'detail', params:{slug: doctor.slug}}">{{ doctor.user.name }} {{ doctor.surname }}</router-link></p>
            <p>{{ doctor.phone }}</p>
            <p>{{ doctor.address }}</p>
            <p>numero di recensioni: {{ doctor.reviews.length }}</p>
            <div v-for="rating in store.doc_ratings">
                <p v-if="rating.doctor_id == doctor.id">
                    {{ rating.average_rating }}
                </p>
            </div>
            <span>Il mio voto {{ getAverage(doctor.id) }}</span>
        </div> -->
            </div>
        </div>
    </div>
    <Footer />
</template>

<style lang="scss" scoped>
.wrapper {
    background-color: rgb(218, 217, 217);
    padding: 2rem;
    min-height: 100vh;
    // color: white;
}
.container-fluid {
    padding: 0;
    // glass
    // background: rgba(255, 255, 255, 0.2);
    // border-radius: 16px;
    // box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    // backdrop-filter: blur(5px);
    // -webkit-backdrop-filter: blur(5px);
    // border: 1px solid rgba(255, 255, 255, 0.3);
    .top-section {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 30px 10px;
        border-bottom: 1px solid black;
        .left {
            padding: 0;
            h2 {
                font-size: 1.3rem;
            }
        }
        .right {
            display: flex;
            align-items: center;
            select {
                width: 300px;
                margin-left: 1rem;
            }
            #ratingRange {
                width: 150px;
            }
        }
    }
}

.doctor-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    padding-top: 50px;
}
</style>
