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

    // Search in bbdd is this student already did the test or not.
    const searchExistTestQuestion = async($user_id,$id) =>{
        axios.delete('/api/test/existTestQuestion/' + $user_id + "/" + $id)
        .then(response => {
        })
        .catch(function (error) {
            console.log(error);
            
        });
    }

    const finalizarValue = async($user_id, $id, $passado, $dificuldad) =>{
        axios.post('/api/test/finalizar/' + $user_id + "/" + $id + "/" + $passado + "/" + $dificuldad)
        .then(response => {
            
            console.log(response);
        })
        .catch(function (error) {
            console.log(error);
        });
    }

    // This is gonna insert the test id with current question and answer 
    const singleTestQuestionCompleteSave = async($user_id,$id,$questionId,$correct) => {
        axios.post('/api/test/sendActualQuestion/' + $user_id + "/" + $id + "/" + $questionId + "/" + $correct)
        .then(response => {
            console.log("insetado");
        })
        .catch(function (error) {
            console.log(error);
        });
    }



    return{
        test,
        getFacilTest,
        searchExistTestQuestion,
        finalizarValue,
        singleTestQuestionCompleteSave
    }
}