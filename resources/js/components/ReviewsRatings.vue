<script>
import {Swiper, SwiperSlide } from "swiper/vue";

import "swiper/css";

import "swiper/css/pagination";
import "swiper/css/navigation";


import {Autoplay, Pagination, Navigation } from "swiper";


export default {
    name: 'RaviewsRatings',
    components: {
    Swiper,
    SwiperSlide,
    },
    setup() {
        return {
        modules: [Autoplay, Pagination, Navigation],
        };
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
                    class="mySwiper"
                >
                    <swiper-slide>
                        <div class="prova">
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
                        <div class="prova">
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
                        <div class="prova">
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

                                    <h3 class="text-center pb-4">Lascia una recesione!</h3>

                                    <form class="mb-5" method="post" id="contactForm" name="contactForm">
                                        <div class="row">
                                            <div class="form-group mb-3">
                                                <label for="" class="col-form-label">Nome e Cognome*</label>
                                                <input type="text" class="form-control" name="name" id="name" placeholder="Inserisci nome e cognome">

                                                <input type="text" class="form-control d-none" name="name-rating" id="name2" placeholder="Inserisci nome e cognome">
                                            </div>

                                        </div>

                                        <div class="row mb-5">
                                            <div class="col-md-12 form-group mb-3">
                                                <label for="message" class="col-form-label">Recensione*</label>
                                                <textarea class="form-control" name="message" id="message" cols="30" rows="4" placeholder="Scrivi la Recensione"></textarea>
                                            </div>
                                        </div>
                                        <div class="row mb-5">
                                            <div class="col-md-12 form-group mb-3">
                                                <label for="message" class="col-form-label">Recensione*</label>
                                                <input type="range">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
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
    margin: 0px 20px;
/* From https://css.glass */
background: rgba(255, 255, 255, 0.31);
border-radius: 16px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(6px);
-webkit-backdrop-filter: blur(6px);
border: 1px solid rgba(255, 255, 255, 0.21);
    border-radius: 15px;
}

.rating{
    margin-top: 50px;

    background: rgb(15, 109, 233);
}

.snip1533 {
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
  color: #9e9e9e;
  display: inline-block;
  font-family: 'Roboto', Arial, sans-serif;
  font-size: 16px;
  margin: 35px 10px 10px;
  max-width: 310px;
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
  border-top: 5px solid #d2652d;
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
  color: #d2652d;
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

</style>
