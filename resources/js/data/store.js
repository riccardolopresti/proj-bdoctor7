import {reactive} from 'vue'

export const store =reactive({
    filteredDoctors:[],
    apiUrl: 'http://127.0.0.1:8000/api/doctors/'
})
