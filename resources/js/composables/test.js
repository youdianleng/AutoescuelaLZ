import { ref, inject } from 'vue'
import { useRouter } from 'vue-router'

export default function useTest() {
    const test = ref([]);
    // Set contador to jump between the questions
    let contador = 0;

    // Store all the questions have in this test
    const questions = ref([]);

    // There gonna store the question where the position of question is that indicated with contador
    const questionId = ref({});

    const getFacilTest = async() =>{

        axios.get('/api/facilTest')
        .then(response => {
            test.value = response.data;
        })
        .catch(function (error) {
            console.log(error);
        });
    }

    const getNormalTest = async() =>{

        axios.get('/api/normalTest')
        .then(response => {
            test.value = response.data;
        })
        .catch(function (error) {
            console.log(error);
        });
    }

    const getDificilTest = async() =>{

        axios.get('/api/dificil')
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
    const singleTestQuestionCompleteSave = async($user_id,$id,$questionId,$option,$correct) => {
        axios.post('/api/test/sendActualQuestion/' + $user_id + "/" + $id + "/" + $questionId + "/" + $option + "/" + $correct)
        .then(response => {
            console.log("insetado");
        })
        .catch(function (error) {
            console.log(error);
        });
    }

    // This is use for when student is doing a test and choice the wrong answer in a question, and when they use question button to reanswer the question
    // this is for replace the value they puted before
    const singleTestQuestionCompleteEdit = async($user_id,$id,$questionId,$option,$correct) => {
        axios.put('/api/test/sendActualQuestionEdit/' + $user_id + "/" + $id + "/" + $questionId + "/" + $option + "/" + $correct)
        .then(response => {
            console.log("Updated");
        })
        .catch(function (error) {
            console.log(error);
        });
    }

    // Guardar los datos para los funciones
    let user_id;
    let route_id;
    let respuesta;

    // Recibir el parametro de un ref de test y guardar como un variable
    const recibirRespuesta = async(Respuesta) =>{
        respuesta = Respuesta;
        console.log(Respuesta);
    }

    const buscarDatosTest = async(level,RouteId,userId) =>{
        
        user_id = userId;
        route_id = RouteId;
        axios.get('/api/question/' + level + '/' + RouteId)
            .then(response => {
                //save que question value
                questions.value = response.data;

                //Save the question in position 0 
                questionId.value = questions.value[contador];

                //call function to delete if this student already finish this test.
                searchExist();
            })
            .catch(function (error) {
                console.log(error);
            });
    }



        // This array use for check the student pass the test or not
    let respuestasValidar = [];

    const compruebaDatos = async() =>{
        if(respuestasValidar.length < questions.value.length){
            showNextQuestion();

            const radios = document.querySelectorAll('.switchColor1');
            // Remover la clase 'switchColor2' de todos los radios

            radios.forEach(radio => {
                radio.parentNode.classList.remove('switchColor2');
            });
        }else{

        }
    }

    // Function use for jump to the next question
    const showNextQuestion = async() =>{
        // If the checkbox is not checked is gonna appear this alert
        if(respuesta == ""){
            alert("Debes elegir por menos 1 option");
        }else{ 
            // set the counter + 1 to jump to next question
            contador = contador + 1;

            // do an for with the option of this question
            for(let i in questionId.value['options']){
                // if the student have choice the correct answer 
                if(respuesta == questionId.value['options'][i].id && questionId.value['options'][i].is_correct == 1){
                    // push in the respuetaValidar array 1 as correct

                    if(respuestasValidar[contador-1] !== undefined){
                        respuestasValidar[contador-1] = 1;
                        
                        singleTestQuestionCompleteEdit(user_id,route_id,questionId.value['id'],respuesta,1);
                        respuesta = "";
                    }else{
                        respuestasValidar.push(1);
                        singleTestQuestionCompleteSave(user_id,route_id,questionId.value['id'],respuesta,1);
                        changeResultArray();
                        respuesta = "";
                    }

                    // insert into the bdd the answer of this question
                    
                    break;
                }else if(respuesta == questionId.value['options'][i].id && questionId.value['options'][i].is_correct == 0){
                    // push in the respuestaValidar array 0 as incorrect
                    if(respuestasValidar[contador-1] !== undefined){
                        respuestasValidar[contador-1] = 0;
                    
                        singleTestQuestionCompleteEdit(user_id,route_id,questionId.value['id'],respuesta,0);
                        respuesta = "";
                    }else{
                        respuestasValidar.push(0);
                        singleTestQuestionCompleteSave(user_id,route_id,questionId.value['id'],respuesta,0);
                        changeResultArray();
                        respuesta = "";
                    }

                    // insert into the bdd the answer of this question
                    
                    break;
                }
            }

            // Check is there any quesiton more or not
            if(questions.value[contador] == null){
                // If this is the final question about this test, call the function
                searchExist();
            }else{
                // If this is not the last question change the content of questionId to show
                questionId.value = questions.value[contador];

            }
        }
    }

    const enviarButton = async(testId) =>{
        if(respuestasValidar.length < testId){
            alert("Realizar los preguntas anteriores");
        }else{
            questionId.value = questions.value[testId];
            contador = testId;
        }
    
    }

    const previousQuestion = async() =>{
        
        questionId.value = questions.value[contador-1];
        contador = contador - 1;
    }

    // Search in bbdd, did the user already have one test with this id.
    const searchExist = async() =>{
        // if existe delete it
        axios.delete('/api/test/exist/' + user_id + "/" + route_id)
        .then(response => {
            // after delete call the finalizar function to regist this time of record into the bbdd
            finalizar();
        })
        .catch(function (error) {
            console.log(error);
            
        });
    }



    // check at final that student have passed the test or not
    const finalizar = async() =>{

        // Variable use for count the correct answer of the student
        let pass = 0;

        // This is use for boolean, if student have more than 3 answer = correct this will be set at 1
        let passed = 1;

        // make a loop with respuetasValidar array
        for(let count in respuestasValidar){
            
            // if there are 1 in the position of array
            if(respuestasValidar[count] == 0){
                // add 1 to the pass
                pass = pass + 1;
            }
        }
    
        // if pass is more or equal 3 set the passed to 1
        if(pass >= 3){
            passed = 0;
        }
        
        // final step of test send the result of the test to bbdd
        finalizarValue(user_id,route_id,passed,questionId.value['difficulty']);
        if(respuestasValidar.length > 1){
            let respuestasUno = respuestasValidar.filter(function(respuesta) {
                return respuesta === 0;
            });
            let cantidadDeZeros = respuestasUno.length;

            let arrayCodificado = btoa(JSON.stringify(respuestasValidar));
            window.location.href = '/Final/'+ user_id + '/' + route_id + '/' + cantidadDeZeros + '/' + arrayCodificado;
        }
        
    }

    const changeResultArray = () =>{
        if(respuestasValidar[contador-1] != undefined){
            // Obtener el botón con la clase 'buttonCard'
            const button = document.querySelector('.cardButton');

            // Reemplazar la clase 'buttonCard' con 'buttonCard1'
            button.classList.replace('cardButton', 'cardButton2');
        }
    }

    return{
        test,
        getFacilTest,
        getNormalTest,
        getDificilTest,
        searchExistTestQuestion,
        finalizarValue,
        singleTestQuestionCompleteSave,
        singleTestQuestionCompleteEdit,
        compruebaDatos,
        enviarButton,
        previousQuestion,
        buscarDatosTest,
        recibirRespuesta,
        changeResultArray,
        respuestasValidar,
        questions,
        questionId,
        contador


    }
}