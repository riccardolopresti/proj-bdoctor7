<script>

export default {
    name: 'RaviewsRatings',
}
</script>

<template>

<section class="mt-5">
    <div class="container ">
        <div class="row custom-row justify-content-center mx-1">
            <div class="col-10 reviews-wrapper">
                <div class="content ">
                    <div class="container">
                        <div class="row align-items-stretch justify-content-center no-gutters">
                            <div class="col-12 w-75">
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
                                        <div class="row justify-content-center">
                                            <div class="form-group text-center">
                                                <input type="submit" value="Manda la recensione" class="btn btn-block btn-primary rounded-0 p-2 px-4">
                                                <span class="submitting"></span>
                                            </div>
                                        </div>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-12 col-lg-5  debug">
                <P>BDFSBDFSBFDSBDSF</P>

            </div> -->
        </div>
    </div>
</section>

</template>

<style scoped lang="scss">

.debug{
    background-color: bisque;
    border: 1px solid navy;
}
.reviews-wrapper{
    margin: 0px 20px;
    background-color: whitesmoke;
    border-radius: 15px;
}

.rating{
    margin-top: 50px;
    height: 300px;
    background: rgb(15, 109, 233);
}
</style>
