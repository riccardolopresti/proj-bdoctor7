<script>
import { store } from "../data/store";

export default {
    name: "SearchCard",
    data() {
        return {
            store,
        };
    },
    props: {
        doctor: Object,
    },
    methods: {
        roundNumber(number) {
            return Math.round(number * 2) / 2;
        },
        // printStars() {
        //     for (let i = 0; i <= 2; i++) {
        //         return `<i class="fa fa-star-o" aria-hidden="true"></i>`;
        //     }
        // },
        starsRating(number) {
            let newRating = Math.ceil(number * 2) / 2;
            let stars = [];
            const diff = 5 - newRating;
            console.log(newRating, diff);
            for (let i = newRating; i >= 1; i--) {
                stars.push(
                    `<i class="fa-solid fa-star" style="color:gold;"></i>`
                );
            }
            if (diff % 1) {
                stars.push(
                    `<i class="fa-solid fa-star-half-stroke" style="color:gold;"></i>`
                );
            }
            for (let j = 5 - newRating; j >= 1; j--) {
                stars.push(
                    `<i class="fa-regular fa-star" style="color:gold"></i>`
                );
            }
            return stars.join("");
        },
    },
};
</script>

<template>
    <!-- <div id="container">
        <div class="doctor-details">
            <h1>
                <router-link
                    :to="{ name: 'detail', params: { slug: doctor.slug } }"
                    >{{ doctor.user.name }} {{ doctor.surname }}</router-link
                >
            </h1>
            <br />
            <div class="hint-star star mt-2 mb-2">
                 <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
                {{}}
            </div>

            <ul class="information">
                <li class="d-flex align-items-center my-1">
                    <i class="fa-solid fa-envelope"></i>
                    <span class="ms-2">{{ doctor.user.email }}</span>
                </li>
                <li class="d-flex align-items-center my-1">
                    <i class="fa-solid fa-phone"></i>
                    <span class="ms-2">{{ doctor.phone }}</span>
                </li>
                <li class="d-flex align-items-center my-1">
                    <i class="fa-solid fa-location-dot"></i>
                    <span class="ms-2">{{ doctor.address }}</span>
                </li>
            </ul>

            <div class="d-flex">
                <div v-for="rating in store.doc_ratings">
                    <p v-if="rating.doctor_id == doctor.id">
                        Rating: {{ roundNumber(rating.average_rating) }} / 5
                    </p>
                </div>
                <span class="ms-3"
                    >Recensioni: {{ doctor.reviews.length }}</span
                >
            </div>
        </div>

        <div class="doctor-image">
            <img :src="doctor.image" :alt="doctor.slug" />
        </div>
    </div> -->

    <!-- <div class="wrap"> -->
    <div class="box">
        <div class="box-top">
            <img class="box-image" :src="doctor.image" :alt="doctor.slug" />
            <div class="title-flex">
                <h3 class="box-title">
                    {{ doctor.user.name }}
                    {{ doctor.surname }}
                </h3>
                <div class="user-follow-info">
                    <p>{{ doctor.address }}</p>
                    <p>{{ doctor.phone }}</p>
                </div>
            </div>
            <div class="information">
                <div v-for="rating in store.doc_ratings" :key="rating">
                    <div v-if="rating.doctor_id == doctor.id" v-html="starsRating(rating.average_rating)"></div>
                </div>
                <span>Recensioni: {{ doctor.reviews.length }}</span>
            </div>
        </div>
        <a href="#" class="button"
            ><router-link
                :to="{ name: 'detail', params: { slug: doctor.slug } }"
                >Contatta
                <strong
                    >{{ doctor.user.name }} {{ doctor.surname }}</strong
                ></router-link
            ></a
        >
    </div>
    <!-- </div> -->
</template>

<style lang="scss" scoped>
@import url("https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Bree+Serif&family=EB+Garamond:ital,wght@0,500;1,800&display=swap");

* {
    box-sizing: border-box;
    padding: 0;
    margin: 0;
}

:root {
    --purple: hsl(240, 80%, 89%);
    --pink: hsl(0, 59%, 94%);
    --light-bg: hsl(204, 37%, 92%);
    --light-gray-bg: hsl(0, 0%, 94%);
    --white: hsl(0, 0%, 100%);
    --dark: hsl(0, 0%, 7%);
    --text-gray: hsl(0, 0%, 30%);
}

// body {
//     background: var(--light-bg);
//     font-family: "Space Grotesk", sans-serif;
//     color: var(--dark);
// }

h3 {
    font-size: 1.5em;
    font-weight: 700;
}

p {
    font-size: 1em;
    line-height: 1.7;
    font-weight: 300;
    color: var(--text-gray);
}

.information {
    white-space: wrap;
}

a {
    text-decoration: none;
    color: inherit;
}

// .wrap {
//     display: flex;
//     justify-content: space-between;
//     align-items: stretch;
//     width: 100%;
//     gap: 24px;
//     padding: 24px;
//     flex-wrap: wrap;
// }

.box {
    display: flex;
    flex-direction: column;
    flex-basis: 100%;
    position: relative;
    padding: 24px;
    background: #fff;
    margin: 0.5rem;
    border-radius: 5px;
}

.box-top {
    display: flex;
    flex-direction: column;
    position: relative;
    gap: 12px;
    margin-bottom: 36px;
}

.box-image {
    width: 150px;
    height: 150px;
    object-fit: cover;
    object-position: 50% 20%;
    margin-bottom: 1rem;
    border-radius: 50%;
}

.title-flex {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.box-title {
    border-left: 3px solid var(--purple);
    // padding-left: 12px;
}

.user-follow-info {
    color: hsl(0, 0%, 60%);
}

.button {
    display: block;
    justify-content: center;
    align-items: center;
    text-align: center;
    margin-top: auto;
    padding: 16px;
    color: #000;
    background: transparent;
    box-shadow: 0px 0px 0px 1px black inset;
    transition: background 0.4s ease;
}

.button:hover {
    background: rgba(105, 153, 207, 0.493);
}

// .fill-one {
//     background: var(--light-bg);
// }

// .fill-two {
//     background: var(--pink);
// }

/* RESPONSIVE QUERIES */

@media (min-width: 320px) {
    .title-flex {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: start;
    }
    .user-follow-info {
        margin-top: 6px;
    }
}

@media (min-width: 460px) {
    .title-flex {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: start;
    }
    .user-follow-info {
        margin-top: 6px;
    }
}

@media (min-width: 640px) {
    .box {
        flex-basis: calc(50% - 12px);
    }
    .title-flex {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: start;
    }
    .user-follow-info {
        margin-top: 6px;
    }
}

@media (min-width: 840px) {
    .title-flex {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: start;
    }
    .user-follow-info {
        margin-top: 6px;
    }
}

@media (min-width: 1024px) {
    .box {
        flex-basis: calc(33.3% - 16px);
    }
    .title-flex {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: start;
    }
    .user-follow-info {
        margin-top: 6px;
    }
}

@media (min-width: 1100px) {
    .box {
        flex-basis: calc(25% - 18px);
    }
}
</style>
