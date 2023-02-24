<script>
import axios from 'axios';

export default {
    name: 'FormContact',
    data(){
        return{
            name:'',
            email:'',
            object:'',
            text:'',
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
                email : this.email,
                object : this.object,
                text : this.text,
                doctor_id : 11, //da sistemare con id dinamico
            }

            axios.post('http://127.0.0.1:8000/api/contacts', data)
            .then(result=>{
                this.isLoading=false;
                if(!result.data.success){
                    this.errors = result.data.errors;
                }else{
                    this.formShow=false;
                    this.name='';
                    this.email='';
                    this.message='';
                    this.errors={};
                }
            });

        }
    }
}
</script>

<template>

<section>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-11">
                <div class="wrapper img rounded-4">
                    <div class="row">
                        <div class="col-md-9 col-lg-7">
                            <div class="contact-wrap w-100 p-md-5 p-4">

                                <h3 class="mb-4">Contatta il medico</h3>

                                <h4 v-if="!formShow">
                                    Il messaggio è stato inviato correttamente, riceverai una risposta al più presto. <br>
                                    <p class="mt-3">Grazie per aver scelto BDoctors7!</p>
                                </h4>

                                <form method="POST" id="contactForm" name="contactForm" class="contactForm"  @submit.prevent="sendForm()" v-if="formShow">

                                    <div class="row">

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="label" for="name">Nome e Cognome*</label>
                                                <input v-model.trim="name" type="text" class="form-control my-3" :class="{'is-invalid' : errors.name}" name="name" id="name" placeholder="Inserisci nome e cognome">
                                                <p class="invalid-feedback" v-for="error in errors.name" :key="error">{{ error }}</p>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="label" for="email">Indirizzo Email*</label>
                                                <input v-model.trim="email" type="email" class="form-control my-3" :class="{'is-invalid' : errors.email}" name="email" id="email" placeholder="Inserisci l'email">
                                                <p class="invalid-feedback" v-for="error in errors.email" :key="error">{{ error }}</p>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label" for="object">Oggetto</label>
                                                <input  v-model.trim="object" type="text" class="form-control my-3" :class="{'is-invalid' : errors.object}" name="object" id="object" placeholder="Oggetto">
                                                <p class="invalid-feedback" v-for="error in errors.object" :key="error">{{ error }}</p>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label" for="#">Messaggio*</label>
                                                <textarea  v-model.trim="text" name="text" class="form-control my-3" :class="{'is-invalid' : errors.text}" id="text" cols="30" rows="4" placeholder="Scrivi il messaggio"></textarea>
                                                <p class="invalid-feedback" v-for="error in errors.text" :key="error">{{ error }}</p>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button  type="submit" class="bn632-hover bn26 ms-0" :disabled="isLoading">{{ isLoading ? 'Invio in corso...' : 'Invia'}}</button>
                                            </div>
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
</section>

</template>

<style scoped lang="scss">
@use '../../scss/appVue.scss';
h3{
    color: #061761;
    font-weight: bold;
}
h4{
    color: #3782e8;
}
.debug{
    background-color: bisque;
    border: 1px solid navy;
}
.wrapper{
    box-shadow: 0 7px 20px 7px rgba(0, 0, 0, 0.321);
    background-image: url('/prova.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    min-height: 698.6px;
}

.custom-row{
    height: 600px;
}
</style>
