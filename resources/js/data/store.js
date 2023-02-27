import {reactive} from 'vue'

export const store =reactive({
    sponsorFilteredDocs:[],
    notSponsorFilteredDocs:[],
    doc_ratings: [],
    apiUrl: 'http://127.0.0.1:8000/api/doctors/',
    specType:'',
})
