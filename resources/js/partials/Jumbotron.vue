<script>
import axios from "axios";
import { store } from "../data/store";
import { toRaw } from "vue";

export default {
    name: "Jumbotron",
    props: {
        specs: Array,
    },
    data() {
        return {
            store,
            filteredSpecs: [],
            isVisible: false,
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
        getRawArray(proxy) {
            return toRaw(proxy);
        },
        filterSpecs() {
            const input = document.getElementById("input-box");
            input.onkeyup = (e) => {
                store.specType = e.target.value;
                this.filteredSpecs = this.getRawArray(this.specs).filter(
                    (spec) => spec.type.toLowerCase().startsWith(store.specType)
                );
                console.log(toRaw(this.filteredSpecs));
            };
        },
        setSpec(string) {
            store.specType = toRaw(string).type;
            this.isVisible = false;
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
                    <div class="custom-select d-flex">
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

                        <input
                            type="text"
                            v-model="store.specType"
                            autocomplete="off"
                            @input="filterSpecs()"
                            @focus="this.isVisible = true"
                            id="input-box"
                            class="z-10"
                        />

                        <div
                            v-if="this.filteredSpecs && isVisible"
                            class="suggestions z-10"
                        >
                            <ul>
                                <li
                                    v-for="filteredSpec in filteredSpecs"
                                    @click="setSpec(filteredSpec)"
                                >
                                    {{ filteredSpec.type }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
#jumbotron {
    background-image: url('/jumbo.jpg');
    height: 500px;
    background-repeat: no-repeat;
    background-size: cover;
    z-index: 0;
    background-position: center;
    font-family: "Montserrat", sans-serif;

    .mask {
        height: 100%;
        width: 100vw;
    }

    .jumbo-content {
        .search-form {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 55vw;
            .custom-select {
                background-color: #f4f7fc;
                border-radius: 30px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
                width: 500px;
                position: relative;
                input {
                    height: 50px;
                    width: 100%;
                    outline: none;
                    border: none;
                    background-color: transparent;
                    padding: 1em 0.5em;
                    font-size: 1.2rem;
                }
                .suggestions {
                    position: absolute;
                    top: 55px;
                    left: 45px;
                    max-height: 150px;
                    overflow-y: auto;
                    background-color: #f4f7fc;
                    width: 85%;
                    border-radius: 0 0 10px 10px;
                    ul {
                        list-style: none;
                        margin: 0;
                        padding: 0;

                        li {
                            padding: 0.5rem 0;
                            &:hover {
                                background-color: #74a6df;
                            }
                        }
                    }
                }

                .search-btn {
                    background-color: transparent;
                    border: none;
                    padding: 10px 20px;
                    font-size: 16px;
                    color: gray;
                    cursor: pointer;
                }
            }
        }
    }
}
</style>
