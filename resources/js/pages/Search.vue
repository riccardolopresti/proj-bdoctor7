<script>

import axios from 'axios';

export default {
    name: 'Search',
    data(){
        return{
            baseUrl: 'http://127.0.0.1:8000/api/',
            doctors: [],
            specs: []
        }
    },
    methods:{
        getDoctors(){
            axios.get(this.baseUrl + 'doctors')
                .then(result => {
                    this.doctors = result.data.doctors.data;
                    console.log(this.doctors);
                })
        },
        getSpecs(){
            axios.get(this.baseUrl + 'specs')
                .then(result => {
                    this.specs = result.data.specs;
                })
        }
    },
    mounted(){
        this.getDoctors();
        this.getSpecs();
    }
}
</script>


<template>

  <h2>Ricerca dottori</h2>
    <select>
        <option selected>Seleziona una specializzazione</option>
        <option v-for="spec in specs" :key="spec.id" value="1">{{ spec.type }}</option>
    </select>


    <div class="doctor-container">
        <div v-for="doctor in doctors" :key="doctor.id" class="doctor-card">
        <p>{{ doctor.user.name }} {{ doctor.surname }}</p>
        <p>{{ doctor.phone }}</p>
        <p>{{ doctor.address }}</p>
        <ul>
            <li v-for="spec in doctor.specs" :key="spec.id">
                <p>{{ spec.type }}</p>
            </li>
        </ul>
    </div>
    </div>
</template>



<style lang="scss" scoped>
.doctor-container{
    display: flex;
    flex-wrap: wrap;
    .doctor-card{
        outline: 1px solid black;
        width: 200px;
        height: 300px;
        margin: 1rem;
        padding: .5rem;
        ul{
            list-style: none;
            padding: 0;
            margin: 0;
        }
    }
}
</style>
