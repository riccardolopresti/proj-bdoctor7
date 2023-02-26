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
            store,
        };
    },
    methods: {
        filterDoctors() {
            axios.get(store.apiUrl + store.specType).then((result) => {
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
                    Cerca ora il tuo specialista
                </h2>
                <form class="search-form ms-4">
                    <div class="custom-select">
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
                        <!-- <select v-model="store.specType">
                            <option selected>
                                Seleziona una specializzazione
                            </option>
                            <option
                                v-for="spec in specs"
                                :key="spec.id"
                                :value="spec.type"
                            >
                                {{ spec.type }}
                            </option>
                        </select> -->

                        <!-- custom dropdown -->

                        <input
                            type="text"
                            id="specSearch"
                            name="specSearch"
                            list="spec-list"
                            placeholder="Cerca una specializzazione"
                            autocomplete="off"
                            v-model="store.specType"
                        />
                        <datalist id="spec-list">
                            <option
                                v-for="spec in specs"
                                :key="spec.id"
                                :value="spec.type"
                                style="{{backgroundColor:red}}"
                            ></option>
                        </datalist>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
h2{
    color: #061761;
}
#jumbotron {
    background-image: url('/jumbo.jpg');
    height: 70vh;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    font-family: "Montserrat", sans-serif;

    .mask {
        height: 100%;
        width: 100vw;
    }

    .jumbo-content {
        background: rgba(255, 255, 255, 0.51);
        border-radius: 16px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(6px);
        -webkit-backdrop-filter: blur(6px);
        border: 1px solid rgba(255, 255, 255, 0.21);

        padding: 70px 0;
        margin-left: 60px;

        .search-form {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 55vw;
            // outline: 3px solid lime;
            .custom-select {
                background-color: #f4f7fc;
                border-radius: 10px 0 0 10px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
                // outline: 3px solid lime;
                // select {
                //     background-color: transparent;
                //     outline: 0;
                //     border: 0;
                //     margin-right: 20px;
                //     padding: 1rem 0;
                // }

                // custom dropdown

                input[type="text"] {
                    border: none;
                    padding: 10px;
                    font-size: 16px;
                    border-radius: 30px;
                    background-color: #f4f7fc;
                    &:focus {
                        outline: none;
                    }
                }

                datalist {
                    list-style-type: none;
                    margin: 0;
                    padding: 0;
                    border: none;
                }

                datalist option {
                    padding: 8px;
                    font-size: 16px;
                    cursor: pointer;
                }

                datalist option:checked {
                    background-color: #ccc;
                }
                .search-btn {
                    background-color: transparent;
                    border: none;
                    padding: 10px 20px;
                    font-size: 16px;
                    color: gray;
                    border-radius: 30px 0px 0px 30px;
                    cursor: pointer;
                }
            }
        }
    }
}
</style>
