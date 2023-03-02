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
        getAverage(ratingArray) {
            let average;

            if(ratingArray.length == 0){
                return average = 0;
            }

            let array = [];

            ratingArray.forEach(element => {
                array.push(parseFloat(element.rating))
            });

            average = array.reduce((a, b) => a + b, 0) / array.length;

            return Math.round(average * 2) / 2;
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
            <div class="top-section row d-flex flex-wrap">
                <div class="left col-xl-4">
                    <h2>
                        Risultati per:
                        <span style="color:#dd5f24;"
                            ><strong>{{
                                capitalizeFirstLetter(store.specType)
                            }}</strong></span
                        >
                    </h2>
                </div>
                <div
                    class="right col-xl-8 d-flex flex-wrap justify-content-xl-end p-0"
                >
                    <div
                        class="rating-filter d-flex align-items-center mt-3 me-sm-3"
                    >
                        <span>Filtro per Voto:</span>
                        <fieldset class="rating-wrapper">
                            <input
                                v-model.trim="rangeValue"
                                type="radio"
                                id="star5"
                                name="rating"
                                value="5"
                            /><label
                                class="full"
                                for="star5"
                                title="5 stelle"
                            ></label>
                            <input
                                v-model.trim="rangeValue"
                                type="radio"
                                id="star4half"
                                name="rating"
                                value="4.5"
                            /><label
                                class="half"
                                for="star4half"
                                title="4.5 stelle"
                            ></label>
                            <input
                                v-model.trim="rangeValue"
                                type="radio"
                                id="star4"
                                name="rating"
                                value="4"
                            /><label
                                class="full"
                                for="star4"
                                title="4 stelle"
                            ></label>
                            <input
                                v-model.trim="rangeValue"
                                type="radio"
                                id="star3half"
                                name="rating"
                                value="3.5"
                            /><label
                                class="half"
                                for="star3half"
                                title="3.5 stelle"
                            ></label>
                            <input
                                v-model.trim="rangeValue"
                                type="radio"
                                id="star3"
                                name="rating"
                                value="3"
                            /><label
                                class="full"
                                for="star3"
                                title="3 stelle"
                            ></label>
                            <input
                                v-model.trim="rangeValue"
                                type="radio"
                                id="star2half"
                                name="rating"
                                value="2.5"
                            /><label
                                class="half"
                                for="star2half"
                                title="2.5 stelle"
                            ></label>
                            <input
                                v-model.trim="rangeValue"
                                type="radio"
                                id="star2"
                                name="rating"
                                value="2"
                            /><label
                                class="full"
                                for="star2"
                                title="2 stelle"
                            ></label>
                            <input
                                v-model.trim="rangeValue"
                                type="radio"
                                id="star1half"
                                name="rating"
                                value="1.5"
                            /><label
                                class="half"
                                for="star1half"
                                title="1.5 stelle"
                            ></label>
                            <input
                                v-model.trim="rangeValue"
                                type="radio"
                                id="star1"
                                name="rating"
                                value="1"
                            /><label
                                class="full"
                                for="star1"
                                title="1 stella"
                            ></label>
                            <input
                                v-model.trim="rangeValue"
                                type="radio"
                                id="starhalf"
                                name="rating"
                                value="0.5"
                            /><label
                                class="half"
                                for="starhalf"
                                title="0.5 stelle"
                            ></label>
                        </fieldset>
                    </div>

                    <div class="review-filter mt-3">
                        <select
                            v-model="reviewsNumber"
                            class="form-select m-0"
                            aria-label="reviewRange"
                        >
                            <option selected value="">
                                Filtra per numero di recensioni
                            </option>
                            <option value="1">Almeno 1 recensione</option>
                            <option value="5">Almeno 5 recensioni</option>
                            <option value="10">Almeno 10 recensioni</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="doctor-container">
                <div
                    v-if="store.sponsorFilteredDocs.length > 0"
                    class="sponsored mb-5"
                >
                    <div class="title w-100 text-center p-3">
                        <h3 style="color: #3782e8;font-size: 3rem;font-weight: bold;">Medici in evidenza</h3>
                    </div>
                    <SearchCard
                        v-for="doctor in store.sponsorFilteredDocs"
                        :key="doctor.id"
                        v-show="
                            doctor.reviews.length >= this.reviewsNumber  &&
                            getAverage(doctor.ratings) >= this.rangeValue
                        "
                        :doctor="doctor"
                    />
                </div>
                <div class="not-sponsored">
                    <SearchCard
                        v-for="doctor in store.notSponsorFilteredDocs"
                        :key="doctor.id"

                        v-show="
                            doctor.reviews.length >= this.reviewsNumber &&
                            getAverage(doctor.ratings) >= this.rangeValue
                        "
                        :doctor="doctor"
                    />
                </div>
            </div>
        </div>
    </div>
    <Footer />
</template>

<style lang="scss" scoped>
.wrapper {
    background-color: rgb(244, 244, 244);
    padding: 2rem;
    min-height: 100vh;
    // color: white;
}
.container-fluid {
    padding: 0;

    .top-section {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 30px 10px;
        //border-bottom: 1px solid rgb(121, 121, 121);
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
    .sponsored,
    .not-sponsored {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        padding-top: 50px;
        padding-bottom: 50px;
    }

    .sponsored {
        border: 2px solid rgb(255, 255, 255);
        background-color: #daf0ee;
        border-radius: 15px;
    }
}

fieldset,
label {
    margin: 0;
    padding: 0;
}
body {
    margin: 20px;
}
h1 {
    font-size: 1.5em;
    margin: 10px;
}

/****** Style Star Rating Widget *****/

.rating-wrapper {
    background-color: white;
    border: none;
    border-radius: 50px;
    padding: 1.5px;
    // float: left;
    margin-left: 5px;
}

.rating-wrapper > input {
    display: none;
}
.rating-wrapper > label:before {
    margin: 5px;
    font-size: 1.25em;
    font-family: FontAwesome;
    display: inline-block;
    content: "\f005";
}

.rating-wrapper > .half:before {
    content: "\f089";
    position: absolute;
}

.rating-wrapper > label {
    color: #ddd;
    float: right;
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating-wrapper > input:checked ~ label, /* show gold star when clicked */
.rating-wrapper:not(:checked) > label:hover, /* hover current star */
.rating-wrapper:not(:checked) > label:hover ~ label {
    color: #ffd700;
} /* hover previous stars in list */

.rarating-wrapperting > input:checked + label:hover, /* hover current star when changing rating */
.rating-wrapper > input:checked ~ label:hover,
.rating-wrapper > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating-wrapper > input:checked ~ label:hover ~ label {
    color: #ffed85;
}

@media screen and (max-width: 768px) {
    .rating-wrapper{
        padding: 0px;
    }
}
</style>
