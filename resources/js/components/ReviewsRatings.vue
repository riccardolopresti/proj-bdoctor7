<script>

import {Swiper, SwiperSlide } from "swiper/vue";
import axios from 'axios';

import "swiper/css";

import "swiper/css/pagination";
import "swiper/css/navigation";


import {Autoplay, Navigation } from "swiper";


export default {
    name: 'RaviewsRatings',
    components: {
    Swiper,
    SwiperSlide,
    },
    setup() {
        return {
        modules: [Autoplay, Navigation],
        };
    },
    data(){
        return{
            name:'',
            text:'',
            rating:'',
            errors:{},
            isLoading:false,
            formShow:true
        }
    },
    methods:{
        sendForm(){
            this.isLoading=true;
            const data = {
                name : this.name,
                text : this.text,
                rating : this.rating,
                doctor_id : 11, //da sistemare con id dinamico
            }

            axios.post('http://127.0.0.1:8000/api/feedback', data)
            .then(result=>{
                this.isLoading=false;
                if(!result.data.success){
                    this.errors = result.data.errors;
                    console.log(this.errors);
                }else{
                    this.formShow=false;
                    this.name='';
                    this.text='';
                    this.rating='';
                    this.errors={};
                }
            });

        }
    }
}
</script>

<template>


<section class="">
    <div class="container ">
        <div class="row custom-row justify-content-center">
            <div class="col-12 col-lg-5">

                <swiper
                    :slidesPerView="1"
                    :spaceBetween="30"
                    :autoplay="{
                        delay: 25000000,
                        disableOnInteraction: false,
                        pauseOnMouseEnter: true
                    }"
                    :loop="true"
                    :pagination="{
                        clickable: true,
                    }"
                    :navigation="true"
                    :modules="modules"
                    :rewind="true"
                    class="mySwiper"
                >
                    <swiper-slide>
                        <div class="prova d-flex justify-content-center">
                            <figure class="snip1533">
                                <figcaption>
                                    <blockquote>
                                    <p>If you do the job badly enough, sometimes you don't get asked to do it again.</p>
                                    </blockquote>
                                    <h3>Wisteria Ravenclaw</h3>
                                    <h4>Google Inc.</h4>
                                </figcaption>
                            </figure>
                        </div>
                    </swiper-slide>

                    <swiper-slide>
                        <div class="prova d-flex justify-content-center">
                            <figure class="snip1533">
                                <figcaption>
                                    <blockquote>
                                    <p>If you do the job badly enough, sometimes you don't get asked to do it again.</p>
                                    </blockquote>
                                    <h3>Wisteria Ravenclaw</h3>
                                    <h4>Google Inc.</h4>
                                </figcaption>
                            </figure>
                        </div>
                    </swiper-slide>
                    <swiper-slide>
                        <div class="prova d-flex justify-content-center">
                            <figure class="snip1533">
                                <figcaption>
                                    <blockquote>
                                    <p>If you do the job badly enough, sometimes you don't get asked to do it again.</p>
                                    </blockquote>
                                    <h3>Wisteria Ravenclaw</h3>
                                    <h4>Google Inc.</h4>
                                </figcaption>
                            </figure>
                        </div>
                    </swiper-slide>

                </swiper>

            </div>

            <div class="col-12 col-lg-5 reviews-wrapper">
                <div class="content ">
                    <div class="container">
                        <div class="row align-items-stretch justify-content-center no-gutters">
                            <div class="col-6 w-100">
                                <div class="form h-100 contact-wrap p-4 pt-5">

                                    <h3 class=" pb-4">Lascia una recesione!</h3>

                                    <form class="" method="post" id="contactForm" name="contactForm" @submit.prevent="sendForm()">
                                        <div class="row">
                                            <div class="form-group mb-3">
                                                <label for="" class="col-form-label mb-3">Nome e Cognome*</label>
                                                <input v-model.trim="name" type="text" class="form-control" name="name" id="name" placeholder="Inserisci nome e cognome">

                                                <input type="text" class="form-control d-none" name="name-rating" id="name2" placeholder="Inserisci nome e cognome">
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 form-group mb-3">
                                                <label for="text" class="col-form-label mb-3">Recensione*</label>
                                                <textarea v-model.trim="text" class="form-control" name="text" id="text" cols="30" rows="4" placeholder="Scrivi la Recensione"></textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 form-group mb-3">
                                                <p>Valutazione*</p>

                                                <fieldset class="rating-wrapper">
                                                    <input v-model.trim="rating" type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="5 stelle"></label>
                                                    <input v-model.trim="rating" type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="4.5 stelle"></label>
                                                    <input v-model.trim="rating" type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="4 stelle"></label>
                                                    <input v-model.trim="rating" type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="3.5 stelle"></label>
                                                    <input v-model.trim="rating" type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="3 stelle"></label>
                                                    <input v-model.trim="rating" type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="2.5 stelle"></label>
                                                    <input v-model.trim="rating" type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="2 stelle"></label>
                                                    <input v-model.trim="rating" type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="1.5 stelle"></label>
                                                    <input v-model.trim="rating" type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="1 stella"></label>
                                                    <input v-model.trim="rating" type="radio" id="starhalf" name="rating" value="0.5" /><label class="half" for="starhalf" title="0.5 stelle"></label>
                                                </fieldset>
                                            </div>
                                        </div>

                                        <div class="col-md-12 ">
                                            <div class="form-group" id="btn-wrapper">
                                                <button  type="submit" class="bn632-hover bn26 ms-0 " :disabled="isLoading">{{ isLoading ? 'Invio in corso...' : 'Invia'}}</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</template>

<style scoped lang="scss">
@use '../../scss/appVue.scss';
h3{
    color: #061761;
    font-weight: bold;
}

section{
    background: url('/cool-background.png') no-repeat;
    background-size: cover;
    padding:100px 0px;
    
}
.debug{
    background-color: bisque;
    border: 1px solid navy;
}

.prova{
    height: 100%;
    
}

.reviews-wrapper{
    margin: 34px 20px;
    /* From https://css.glass */
    background: rgba(255, 255, 255, 0.31);
    border-radius: 16px;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(6px);
    -webkit-backdrop-filter: blur(6px);
    border: 1px solid rgba(255, 255, 255, 0.21);
    border-radius: 5px;
    border-top: 5px solid #061761;
}


.snip1533 {
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
    color: #9e9e9e;
    display: inline-block;
    font-family: 'Roboto', Arial, sans-serif;
    font-size: 16px;
    margin: 35px 10px 10px;
    max-width: 370px;
    min-width: 250px;
    position: relative;
    text-align: center;
    width: 100%;
    /* From https://css.glass */
    background: rgba(255, 255, 255, 0.31);
    border-radius: 16px;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(6px);
    -webkit-backdrop-filter: blur(6px);
    border: 1px solid rgba(255, 255, 255, 0.21);
    border-radius: 5px;
    border-top: 5px solid #061761;
}

.snip1533 *,
.snip1533 *:before {
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    -webkit-transition: all 0.1s ease-out;
    transition: all 0.1s ease-out;
}

.snip1533 figcaption {
    padding: 13% 10% 12%;
}

.snip1533 figcaption:before {
    -webkit-transform: translateX(-50%);
    transform: translateX(-50%);
    /* From https://css.glass */
    background: rgba(255, 255, 255, 0.31);
    border-radius: 16px;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(6px);
    -webkit-backdrop-filter: blur(6px);
    border: 1px solid rgba(255, 255, 255, 0.21);
    border-radius: 50%;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.25);
    color: #061761;
    content: "\f10e";
    font-family: 'FontAwesome';
    font-size: 32px;
    font-style: normal;
    left: 50%;
    line-height: 60px;
    position: absolute;
    top: -30px;
    width: 60px;
    }

.snip1533 h3 {
  color: #3c3c3c;
  font-size: 20px;
  font-weight: 300;
  line-height: 24px;
  margin: 10px 0 5px;
}

.snip1533 h4 {
  font-weight: 400;
  margin: 0;
  opacity: 0.5;
}

.snip1533 blockquote {
  font-style: italic;
  font-weight: 300;
  margin: 0 0 20px;
}

fieldset, label { margin: 0; padding: 0; }
body{ margin: 20px; }
h1 { font-size: 1.5em; margin: 10px; }

/****** Style Star Rating Widget *****/

.rating-wrapper {
    background-color: white;
  border: none;
  border-radius: 50px;
  padding: 1.5px 20px;
  float: left;
}

.rating-wrapper > input { display: none; }
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
.rating-wrapper:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rarating-wrapperting > input:checked + label:hover, /* hover current star when changing rating */
.rating-wrapper > input:checked ~ label:hover,
.rating-wrapper > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating-wrapper > input:checked ~ label:hover ~ label { color: #FFED85;  }

</style>
