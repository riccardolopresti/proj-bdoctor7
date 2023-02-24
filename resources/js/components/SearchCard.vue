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
            console.log(Math.round(number));
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
    <div id="container">
        <div class="doctor-details">
            <h1>{{ doctor.user.name }} {{ doctor.surname }}</h1>
            <br />
            <div class="hint-star star mt-2 mb-2">
                <!-- <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i> -->
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

            <div v-for="rating in store.doc_ratings">
                <p v-if="rating.doctor_id == doctor.id">
                    Rating: {{ roundNumber(rating.average_rating) }}
                </p>
            </div>
        </div>

        <div class="doctor-image">
            <img :src="doctor.image" :alt="doctor.slug" />
        </div>
    </div>
</template>

<style lang="scss" scoped>
@import url("https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Bree+Serif&family=EB+Garamond:ital,wght@0,500;1,800&display=swap");

ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

#container {
    // box-shadow: 0 5px 10px rgb(160, 160, 160);
    background: rgba(255, 255, 255, 0.9);
    text-align: center;
    border-radius: 15px;
    overflow: hidden;
    margin: 5em auto;
    width: 500px;
    // outline: 3px solid lime;
    margin: 1rem;
    height: 250px;
}
.doctor-details {
    position: relative;
    text-align: left;
    overflow: hidden;
    padding: 30px;
    height: 100%;
    float: left;
    width: 70%;
    // outline: 3px solid blue;
}

#container .doctor-details h1 {
    font-family: "Bebas Neue", cursive;
    display: inline-block;
    position: relative;
    font-size: 30px;
    color: #344055;
    margin: 0;
}

#container .doctor-details h1:before {
    position: absolute;
    content: "";
    right: 0%;
    top: 0%;
    transform: translate(25px, -15px);
    font-family: "Bree Serif", serif;
    display: inline-block;
    background: #ffe6e6;
    border-radius: 5px;
    font-size: 14px;
    padding: 5px;
    color: white;
    margin: 0;
    animation: chan-sh 6s ease infinite;
}

.hint-star {
    display: inline-block;
    margin-left: 0.5em;
    color: gold;
    width: 50%;
}

#container .doctor-details > p {
    font-family: "EB Garamond", serif;
    text-align: center;
    font-size: 18px;
    color: #7d7d7d;
}

.doctor-image {
    // transition: all 0.3s ease-out;
    display: inline-block;
    position: relative;
    overflow: hidden;
    height: 100%;
    // float: right;
    width: 30%;
    display: inline-block;
    // outline: 2px solid red;
}

#container img {
    width: 100%;
}

// .info {
//     background: rgba(27, 26, 26, 0.9);
//     font-family: "Bree Serif", serif;
//     transition: all 0.3s ease-out;
//     transform: translateX(-100%);
//     position: absolute;
//     line-height: 1.8;
//     text-align: left;
//     font-size: 105%;
//     color: #fff;
//     height: 100%;
//     width: 100%;
//     left: 0;
//     top: 0;
// }

// .info h2 {
//     text-align: center;
// }
// .product-image:hover .info {
//     transform: translateX(0);
// }

// .info ul li {
//     transition: 0.3s ease;
// }
// .info ul li:hover {
//     transform: translateX(50px) scale(1.3);
// }

// .product-image:hover img {
//     transition: all 0.3s ease-out;
// }
// .product-image:hover img {
//     transform: scale(1.2, 1.2);
// }
</style>
