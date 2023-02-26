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
        checkInput() {
            const searchWrapper = document.querySelector(".search-input");
            const input = document.querySelector("#input");
            const suggList = document.querySelector(".autocomplete-box");

            input.onkeyup = (e) => {
                store.specType = e.target.value;
                console.log(store.specType);
            };
        },
        check() {
            const listItem = document.getElementById("list-item");
            console.log(listItem);
            // listItem.classList.remove("d-none");
        },
        // assignValue() {
        //     const listItem = document.getElementById("list-item");

        //     listItem.addEventListener("click", function () {});
        // },
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
                            placeholder="cerca"
                            id="input"
                            @click="checkInput()"
                            autocomplete="off"
                            @beforeinput="check()"
                        />
                        <ul class="autocomplete-box">
                            <li
                                v-for="spec in specs"
                                class="d-none"
                                id="list-item"
                            >
                                {{ spec.type }}
                            </li>
                        </ul>

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
                        <!-- <input
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
                            ></option>
                        </datalist> -->
                    </div>
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
            justify-content: center;
            width: 55vw;
            .custom-select {
                background-color: #f4f7fc;
                border-radius: 30px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
                width: 500px;
                //

                input {
                    height: 50px;
                    width: 100%;
                    outline: none;
                    border: none;
                    background-color: transparent;
                    padding: 1em 0.5em;
                    font-size: 1.2rem;
                    // outline: 3px solid lime;
                    // border-radius: 0px 30px 30px 0px;
                }

                // outline: 3px solid lime;
                // select {
                //     background-color: transparent;
                //     outline: 0;
                //     border: 0;
                //     margin-right: 20px;
                //     padding: 1rem 0;
                // }

                // custom dropdown

                // input[type="text"] {
                //     border: none;
                //     padding: 10px;
                //     font-size: 16px;
                //     border-radius: 30px;
                //     background-color: #f4f7fc;
                //     &:focus {
                //         outline: none;
                //     }
                // }

                // datalist {
                //     list-style-type: none;
                //     margin: 0;
                //     padding: 0;
                //     border: none;
                // }

                // datalist option {
                //     padding: 8px;
                //     font-size: 16px;
                //     cursor: pointer;
                // }

                // datalist option:checked {
                //     background-color: #ccc;
                // }
                .search-btn {
                    background-color: transparent;
                    border: none;
                    padding: 10px 20px;
                    font-size: 16px;
                    color: gray;
                    // border-radius: 30px 0px 0px 30px;
                    cursor: pointer;
                }
            }
        }
    }
}

// custom dropdown
ul {
    list-style: none;
}
.search-input {
    background-color: transparent;
    border-radius: 5px;

    .autocomplete-box {
        max-height: 100px;
        overflow-y: auto;
        margin: 0;
        padding: 0;
        // opacity: 0;
        pointer-events: none;
        li {
            padding: 5px 0;
            &:hover {
                background-color: #cacaca;
            }
        }
    }
}
</style>
