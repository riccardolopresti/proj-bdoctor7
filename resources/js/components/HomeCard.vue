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
        starsRating(number) {
            let newRating = Math.ceil(number * 2) / 2;
            let stars = [];
            const diff = 5 - newRating;
            //console.log(newRating, diff);
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
    <div class="box my-4">
        <div class="box-top">
            <div class="img-container">
                <img class="box-image" :src="doctor.image" :alt="doctor.slug" />
            </div>
            <div class="title-flex d-flex flex-column">
                <h3 class="box-title">
                    {{ doctor.user.name }}
                    {{ doctor.surname }}
                </h3>
                <div class="user-follow-info d-flex flex-column">
                    <p>{{ doctor.address }}</p>
                    <p>{{ doctor.phone }}</p>
                </div>
            </div>
            <div class="information">
                <div v-for="rating in store.doc_ratings" :key="rating">
                    <div
                        v-if="rating.doctor_id == doctor.id"
                        v-html="starsRating(rating.average_rating)"
                    ></div>
                </div>
                <span>Recensioni: {{ doctor.reviews.length }}</span>
            </div>
        </div>
        <router-link
            :to="{ name: 'detail', params: { slug: doctor.slug } }"
            class="button"
            >Contatta
            <strong
                >{{ doctor.user.name }} {{ doctor.surname }}</strong
            ></router-link
        >
    </div>
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

.img-container {
    display: flex;
    justify-content: center;
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
