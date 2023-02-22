<script>
import axios from "axios";
import { store } from "../data/store";

export default {
    name: "Search",
    data() {
        return {
            baseUrl: "http://127.0.0.1:8000/api/",
            doctors: [],
            specs: [],
            specType: "",
            filteredDoctors: [],
            store,
        };
    },
    methods: {
        getDoctors() {
            axios.get(this.baseUrl + "doctors").then((result) => {
                this.doctors = result.data.doctors.data;
            });
        },
        getSpecs() {
            axios.get(this.baseUrl + "specs").then((result) => {
                this.specs = result.data.specs;
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
        getName(str) {
            const array = str.split("-");
            for (let i = 0; i < array.length; i++) {
                array[i] = array[i].charAt(0).toUpperCase() + array[i].slice(1);
            }
            const name = array.join(" ");
            return name;
        },
    },
    mounted() {
        // this.getDoctors();
        this.getSpecs();
    },
};
</script>

<template>
    <h2>Ricerca dottori</h2>
    <select v-model="specType">
        <option selected>Seleziona una specializzazione</option>
        <option v-for="spec in specs" :key="spec.id" :value="spec.type">
            {{ spec.type }}
        </option>
    </select>
    <button @click="filterDoctors()">cerca</button>

    <div class="doctor-container">
        <div
            v-for="doctor in filteredDoctors"
            :key="doctor.id"
            class="doctor-card"
        >
            <p>{{ getName(doctor.slug) }}</p>
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
