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
                store.sponsorFilteredDocs =
                    result.data.sponsorFilteredDocs.data;
                store.notSponsorFilteredDocs =
                    result.data.notSponsorFilteredDocs.data;
                store.doc_ratings = result.data.doc_ratings;

                
                console.log('SPONSORED_DOC--->',store.sponsorFilteredDocs);
                console.log('NO_SPONSORED_DOC--->',store.notSponsorFilteredDocs);
                console.log('AVG_STARS--->',store.doc_ratings);
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
        toggleDropdown(e) {
            this.isVisible = !this.isVisible;
        },
        close(e) {
            if (!this.$el.contains(e.target)) {
                this.isVisible = false;
            }
        },
    },
};
</script>

<template>
    <div id="jumbotron" class="text-center bg-image">
        <div class="mask d-flex align-items-center">
            <div class="jumbo-content" @click.prevent="toggleDropdown">
                <h2 class="fw-bold mb-3 mx-4">Cerca ora il tuo specialista</h2>
                <form class="search-form mx-4">
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
                            id="input-box"
                            class="z-10"
                        />

                        <div
                            v-if="this.filteredSpecs && isVisible"
                            class="suggestions z-10"
                        >
                            <ul v-if="store.specType == ''">
                                <li
                                    v-for="spec in this.specs"
                                    :key="spec"
                                    @click="setSpec(spec)"
                                >
                                    {{ spec.type }}
                                </li>
                            </ul>

                            <ul>
                                <li
                                    v-for="filteredSpec in filteredSpecs"
                                    @click="setSpec(filteredSpec)"
                                    :key="filteredSpec"
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
h2 {
    color: #061761;
}
#jumbotron {
    background-image: url("/jumbo.jpg");
    height: 70vh;
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
                                cursor: pointer;
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

@media screen and (max-width: 454px) {
    #jumbotron .jumbo-content[data-v-01608f10] {
        margin-left: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        width: 100%;
    }

    #jumbotron
        .jumbo-content
        .search-form
        .custom-select
        input[data-v-01608f10] {
        min-width: 250px;
    }
}
</style>
