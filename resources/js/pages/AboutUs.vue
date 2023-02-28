<script>
export default {
    name: 'AboutUs'
}
</script>

<template>
    <section>
       <div class="container pb-5" id="about-us">
            <h2 class="text-center text-primary fw-bold mt-5 mb-5" style="font-size: 2.5rem;"> Su BDoctors7 la tua salute viene prima di tutto!</h2>
            <div class="row mt-5 mb-3">
                <div class="col-md-12 col-lg-5">
                    <div class="container-fluid">
                        <div class="text">
                            <p>Su BDoctors7 è possibile trovare e contattare medici iscritti al nostro servizio per prenotare visite e consulenze. Il nostro sito fornisce un'ampia gamma di servizi medici online, tra cui la possibilità di cercare medici in base alla specializzazione, leggere le recensioni dei pazienti e prenotare visite con facilità e comodità.</p>
                        </div>

                    </div>
                </div>
                <div class="col-md-12 col-lg-7 img-container">
                    <img src="/img/doc-about1.jpg" alt="doc-about">
                </div>
            </div>

            <div class="row mt-4 mb-5">
                <div class="col-md-12 col-lg-7">
                    <img id="img-2" src="/img/doc-about3.jpg" alt="doc-about">
                </div>
                <div class="col-md-12 col-lg-5">
                    <div class="text">
                        <p>I medici iscritti al nostro sito sono altamente qualificati e offrono una vasta gamma di servizi, tra cui consulenze online, visite a domicilio e visite in ospedale o in clinica. Grazie alla nostra piattaforma, potrai avere accesso a professionisti medici di alto livello in qualsiasi momento.</p>
                    </div>

                </div>
            </div>
        </div>
    </section>
</template>


<style lang="scss" scoped>

#about-us{
    scroll-margin-top: 140px;
}
section{
    .text{
        background-color: #DAF0EE;
        color: #1583B4 ;
        text-align: center;
        border-radius: 20px;
        padding: 30px;
        line-height: 2rem;
        font-size: 1.2rem;

    }
    .img-container{

        overflow-x: hidden;

        img{
            max-width: 100%;
        }
    }
}

@media screen and (max-width: 768px) {
    #img-2{
        display: none;
    }
}

</style>
