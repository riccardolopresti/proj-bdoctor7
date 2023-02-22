<script>
import { store } from "../data/store";

export default {
    name: "Search",
    data() {
        return {
            store,
        };
    },
};
</script>

<template>
    <h2>Risultato: {{ store.filteredDoctors.length }}</h2>
    <div class="doctor-container">
        <div
            v-for="doctor in store.filteredDoctors"
            :key="doctor.id"
            class="doctor-card"
        >
            <p>{{ doctor.slug }}</p>
            <p>{{ doctor.phone }}</p>
            <p>{{ doctor.address }}</p>
            <!-- <ul>
                <li v-for="spec in doctor.specs" :key="spec.id">
                    <p>{{ spec.type }}</p>
                </li>
            </ul> -->
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
