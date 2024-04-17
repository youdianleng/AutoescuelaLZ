import { ref, inject } from 'vue'
import { useRouter } from 'vue-router'

export default function useQuestion() {
    //Swal
    const swal = inject('$swal');
    // Set the Success and Error message
    const strSuccess = ref();
    const strError = ref();

    // save question data
    const questions = ref();

    // save test data
    const test = ref();

    const createQuestionSend = async($Questiones,$form) => {
        let serializedPost = new FormData()
        
        serializedPost.append('carnet', JSON.stringify($Questiones.carnet));
        serializedPost.append('question', $Questiones.question);
        serializedPost.append('difficulty', JSON.stringify($Questiones.difficulty));
        serializedPost.append('is_correct', $Questiones.is_correct);
        serializedPost.append('test_id', JSON.stringify($Questiones.test_id));
        serializedPost.append('thumbnail', $Questiones.thumbnail);

        // Serializar el array de respuestas
        $Questiones.respuestas.forEach((respuesta, index) => {
            serializedPost.append(`respuestas[${index}]`, JSON.stringify(respuesta));
        });

        if ($form.valid) {
            console.log("Validate");
            axios.post('/api/question', serializedPost, {
                headers: {
                 "content-type": "multipart/form-data"
                }
              })
                .then(response => {
                    strError.value = ""
                    strSuccess.value = response.data.success
                })
                .catch(function (error) {
                    strSuccess.value = ""
                    strError.value = error.response.data.message
                });
        }
    }

    const getQuestions = async() => {
        axios.get('/api/question')
        .then(response => {
            questions.value = response.data;
        })
        .catch(function (error) {
            console.log(error);
        });
    }

    const getTest = async() =>{
        axios.get('/api/test')
        .then(response => {
            test.value = response.data;
        })
        .catch(function (error) {
            console.log(error);
        });
    }

    return{
        createQuestionSend,
        getQuestions,
        getTest,
        questions,
        test
    }
}