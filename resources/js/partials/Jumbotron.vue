<script>
import axios from "axios";
import { store } from "../data/store";

export default {
    name: "Jumbotron",
    props: {
        specs: Array,
    },
    data() {
        return {
            specType: "",
            store,
        };
    },
    methods: {
        filterDoctors() {
            axios.get(store.apiUrl + this.specType).then((result) => {
                store.filteredDoctors = result.data.filteredDoctors;
                store.doc_ratings = result.data.doc_ratings;
                console.log(result.data.doc_ratings);
            });
        },
    },
};
</script>

<template>
    <div id="jumbotron" class="text-center bg-image">
        <div class="mask d-flex align-items-center">
            <div class="jumbo-content">
                <h2 class="fw-bold mb-3 ms-4">
                    Prenota subito il tuo appuntamento daxx xxxx
                </h2>
                <form class="search-form ms-4">
                    <button
                        @click="
                            $router.push({ name: 'search' });
                            filterDoctors();
                        "
                        class="search-btn"
                        type="submit"
                    >
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                    <select v-model="specType">
                        <option selected>Seleziona una specializzazione</option>
                        <option
                            v-for="spec in specs"
                            :key="spec.id"
                            :value="spec.type"
                        >
                            {{ spec.type }}
                        </option>
                    </select>
                </form>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
#jumbotron {
    background-image: url("https://media.discordapp.net/attachments/1073532304082862080/1077515321075843092/poliambulatorio-fiano-romano-1.jpg?width=840&height=473");
    height: 500px;
    background-repeat: no-repeat;
    background-size: cover;

    .mask {
        background-color: rgba(0, 0, 0, 0.2);
        height: 100%;
        width: 100vw;
    }

    .jumbo-content {
        .search-form {
            display: flex;
            align-items: center;
            width: 55vw;

            input,
            .search-btn {
                background-color: #f4f7fc;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
                padding: 10px 20px;
                font-size: 16px;
                border: none;
            }

            input {
                width: 20vw;
                border-radius: 0px 30px 30px 0px;
                flex: 1;
            }

            .search-btn {
                color: gray;
                border-radius: 30px 0px 0px 30px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
                font-size: 16px;
                cursor: pointer;
            }
        }
    }
}
</style>
