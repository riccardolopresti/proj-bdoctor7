<script>
import DocCard from '../components/DocCard.vue';
import docs from '../assets/data/sponsored-docs'

export default {
    name: 'SponsorSection',

    components:{
        DocCard
    },

    data(){
    return{
      docs
    }
  }
}
</script>

<template>
<section>
       <h1 class="fw-bold text-center mt-4 text-primary">Medici in evidenza</h1>
    <div class="container-fluid">
        <DocCard v-for="(doc, index) in docs" :key="index" :docName="doc.name" :docImg="doc.image" :docSpec="doc.specialization" :docMail="doc.email" :docCare="doc.description" />
    </div>
</section>

</template>


<style scoped>
</style>
