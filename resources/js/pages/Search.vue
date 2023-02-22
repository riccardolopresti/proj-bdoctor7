<script>
import { store } from "../data/store";

export default {
    name: "Search",
    data() {
        return {
            store,
        };
    },
    methods: {
        getAverage(array, number) {
            let somma = 0;
            for (let i = 0; i < array.length; i++) {
                somma += array[i];
            }
            return somma / array.length;
            console.log(array);
        },
    },
};
</script>

<template>
    <h2>Risultati: {{ store.filteredDoctors.length }}</h2>
    <div class="doctor-container">
        <div
            v-for="doctor in store.filteredDoctors"
            :key="doctor.id"
            class="doctor-card"
        >
            <p>{{ doctor.user.name }} {{ doctor.surname }}</p>
            <p>{{ doctor.phone }}</p>
            <p>{{ doctor.address }}</p>
            <div v-for="rating in store.doc_ratings">
                <p v-if="rating.doctor_id == doctor.id">
                    {{ rating.average_rating }}
                </p>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
.doctor-container {
    display: flex;
    flex-wrap: wrap;
    .doctor-card {
        outline: 1px solid black;
        width: 200px;
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
