import { ref, inject } from 'vue'
import { useRouter } from 'vue-router'

export default function useTest() {
    const test = ref([]);

    const getFacilTest = async() =>{

        axios.get('/api/facilTest')
        .then(response => {
            test.value = response.data;
        })
        .catch(function (error) {
            console.log(error);
        });
    }

    return{
        test,
        getFacilTest,
    }
}