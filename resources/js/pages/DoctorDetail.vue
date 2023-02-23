<script>
import axios from 'axios';

export default {
    name: 'DoctorDetail',

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
    ciao
    <h1>dottor: {{ doctor.surname }}</h1>
</template>


<style>

</style>
