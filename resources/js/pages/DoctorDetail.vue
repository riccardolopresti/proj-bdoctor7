<script>
import axios from 'axios';
import Header from "../partials/Header.vue";

import FormContact from '../components/FormContact.vue'
import ReviewsRatings from '../components/ReviewsRatings.vue'

export default {
    name: 'DoctorDetail',

    components: {
        Header,
        FormContact,
        ReviewsRatings
    },

    data(){
        return{
            baseUrl: 'http://127.0.0.1:8000/api/',
            doctor: {}
        }
    },

    methods:{
        getApi(){
            axios.get(this.baseUrl + this.$route.params.slug)
            .then(result => {
                this.doctor = result.data;
                console.log(result.data);

            })
        }
    },

    mounted(){
        this.getApi();
    }
}
</script>

<template>
    <Header/>
    <section>

    <div class="container">
        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div class="row container d-flex justify-content-center">
                    <div class="col-xl-12 col-md-12">
                        <div class="card user-card-full">
                            <div class="row m-l-0 m-r-0">
                                <div class="col-sm-4 bg-c-lite-green user-profile">
                                    <div class="card-block text-center text-white">
                                        <div class="m-b-25">
                                            <img :src="doctor.image" class="img-radius" :alt="doctor.surname">
                                        </div>
                                        <span class="text-center fs-5">Dott.</span>
                                        <h3 class="fw-bold m-3 text-uppercase" v-if="doctor.user">{{ doctor.user.name }} {{ doctor.surname }}</h3>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="card-block">
                                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Contatti</h6>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <p class="m-b-10 f-w-600"><i class="fa-solid fa-envelope"></i> Email</p>
                                                <h6 class="text-muted f-w-400" v-if="doctor.user" >{{ doctor.user.email }}</h6>
                                            </div>
                                            <div class="col-sm-4">
                                                <p class="m-b-10 f-w-600"><i class="fa-solid fa-phone"></i> Telefono</p>
                                                <h6 class="text-muted f-w-400">{{ doctor.phone }}</h6>
                                            </div>
                                            <div class="col-sm-4">
                                                <p class="m-b-10 f-w-600"><i class="fa-solid fa-location-dot"></i> Indirizzo</p>
                                                <h6 class="text-muted f-w-400">{{ doctor.address }}</h6>
                                            </div>
                                        </div>
                                        <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Carriera</h6>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600"><i class="fa-solid fa-stethoscope"></i> Specializzazioni</p>
                                                <h6 v-for="spec in doctor.specs" :key="spec.id" class="text-muted f-w-400">{{spec.type}}</h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600"><i class="fa-solid fa-file-invoice"></i> Curriculum</p>
                                                <h6 v-if="doctor.cv" class="text-muted f-w-400"><a href="#">{{ doctor.cv_original_name }}</a></h6>
                                                <h6 v-else class="text-muted f-w-400"><i>Nessun allegato</i></h6>
                                            </div>
                                        </div>
                                        <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Dettagli</h6>
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <p class="m-b-10 f-w-600"><i class="fa-solid fa-user-doctor"></i> Prestazioni mediche</p>
                                                <h6 v-html="doctor.health_care" class="text-muted f-w-400"> </h6>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </section>

    <FormContact :doctorId="doctor.id"/>
    <ReviewsRatings :doctor="doctor"/>



</template>


<style scoped>
section {
    background-color: #f9f9fa;
}

.page-container{
    min-height: 100vh;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.padding {
    display: flex;
    justify-content: center;
}

.user-card-full {
    overflow: hidden;
}

.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 20px 0 rgba(69,90,100,0.08);
    box-shadow: 0 1px 20px 0 rgba(69,90,100,0.08);
    border: none;
    margin-bottom: 30px;
}

.m-r-0 {
    margin-right: 0px;
}

.m-l-0 {
    margin-left: 0px;
}

.user-card-full .user-profile {
    border-radius: 5px 0 0 5px;
}

.bg-c-lite-green {
        background: -webkit-gradient(linear, left top, right top, from(#7FCEF0), to(#1583B4));
    background: linear-gradient(to right, #1583B4, #7FCEF0);
}

.user-profile {
    padding: 20px 0;
}

.card-block {
    padding: 1.25rem;
}

.m-b-25 {
    margin-bottom: 25px;
    margin-top: 35px;

}

.img-radius {
    border-radius: 15px;
    max-width: 100%;
}



h6 {
    font-size: 14px;
}

.card .card-block p {
    line-height: 25px;
}

@media only screen and (min-width: 1400px){
p {
    font-size: 14px;
}
}

.card-block {
    padding: 1.25rem;
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0;
}

.m-b-20 {
    margin-bottom: 20px;
    color: #1583B4;
}

.p-b-5 {
    padding-bottom: 5px !important;
}

.card .card-block p {
    line-height: 25px;
}

.m-b-10 {
    margin-bottom: 10px;
    color: #1583B4;
}

.text-muted {
    color: #919aa3 !important;
    font-size: 1rem;
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0;
}

.f-w-600 {
    font-weight: 600;
}

.m-b-20 {
    margin-bottom: 20px;
}

.m-t-40 {
    margin-top: 20px;
}

.p-b-5 {
    padding-bottom: 5px !important;
}

.m-b-10 {
    margin-bottom: 10px;
}

.m-t-40 {
    margin-top: 20px;
}

.user-card-full .social-link li {
    display: inline-block;
}

.user-card-full .social-link li a {
    font-size: 20px;
    margin: 0 10px 0 0;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

@media only screen and (max-width: 576px){
    .padding {
        padding: 100px 0;
    }
}
</style>
