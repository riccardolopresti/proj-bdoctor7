<script>
import { store } from "../data/store";

export default {
    name: "Search",
    data() {
        return {
            store,
            rangeValue: "",
            reviewsNumber: "",
            results:""
        };
    },
    methods: {
        getAverage(id){
            for(let i=0; i <= this.store.doc_ratings.length;i++){
                if(i == id){
                    let myAvg= this.store.doc_ratings[i-1].average_rating
                    return myAvg;
                }
            }
        }
    },
};
</script>

<template>
    <div class="top-section">
        <h2>Risultati per la ricerca: <span class="blue">{{store.specType}}</span></h2>
        <label for="ratingRange" class="form-label">Filtro</label>
        <input
            v-model="rangeValue"
            type="range"
            class="form-range"
            min="0"
            max="5"
            id="ratingRange"
        />
        <select
            v-model="reviewsNumber"
            class="form-select"
            aria-label="reviewRange"
        >
            <option selected value="">filtra per numero di recensioni</option>
            <option value="1">almeno 1 recensione</option>
            <option value="2">almeno 2 recensioni</option>
            <option value="3">almeno 3 recensioni</option>
        </select>
    </div>
    <div class="doctor-container">
        <div
            v-for="doctor in store.filteredDoctors"
            :key="doctor.id"
            v-show="doctor.reviews.length >= this.reviewsNumber && getAverage(doctor.id) >= this.rangeValue"
            class="doctor-card"

        >
            <p>{{ doctor.user.name }} {{ doctor.surname }}</p>
            <p>{{ doctor.phone }}</p>
            <p>{{ doctor.address }}</p>
            <p>numero di recensioni: {{ doctor.reviews.length }}</p>
            <div v-for="rating in store.doc_ratings">
                <p v-if="rating.doctor_id == doctor.id">
                    {{ rating.average_rating }}
                </p>

            </div>
            <span>Il mio voto {{getAverage(doctor.id)}}</span>
        </div>
    </div>
</template>

<style lang="scss" scoped>
.top-section {
    display: flex;
    align-items: center;
    #ratingRange {
        width: 300px;
        margin-left: 1rem;
    }
    select {
        width: 300px;
        margin-left: 1rem;
    }
}
.doctor-container {
    display: flex;
    flex-wrap: wrap;
    .doctor-card {
        outline: 1px solid black;
        width: 400px;
        height: 300px;
        margin: 1rem;
        padding: 0.5rem;
        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
    }
}
</style>
