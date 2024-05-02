<template>
    <div class="col-12">
        <div v-if="questionId" class="card col-12">
            <div class=" col-12">
                    <h1 class="d-flex justify-content-center fw-bold mt-5">TEST Nº {{ route.params.id }}</h1>
                <div class="d-flex mt-5">
                    <div class="col-xl-4">
                        <div v-if="questionId['media'] && questionId['media'].length > 0" class="col-11 border d-flex justify-content-center ms-3">
                            <img :src="`${questionId['media'][0]['original_url'] }`" alt="" height="350px" width="300px">
                        </div>
                        <div v-if="questionId['media'] && questionId['media'].length <= 0" class="col-11 border d-flex justify-content-center ms-3">
                            <div width="100px" height="400px" class="CajaImagen d-flex justify-content-center">{{ contador+1 }}</div>
                        </div>
                    </div>

                    <div class="col-xl-8">
                        <h2 class="fw-semibold">Prueba Numero {{ contador+1 }}:  {{ questionId.question }}</h2>
                        <div v-if="questionId['options']" class="col-10">
                            <div  class="d-flex">
                                <RadioButton v-model="respuestas.respuesta"  :value=" questionId['options'][0]['id'] " class="form-control col-1 switchColor1" @click="changeColorButton(0)" />
                                <p class="ms-3 d-flex align-items-center fs-5">A.   {{ questionId['options'][0]['option_text'] }}</p>
                            </div>
                            <div class="d-flex mt-3">
                                <RadioButton v-model="respuestas.respuesta"  :value=" questionId['options'][1]['id'] " class="form-control col-1 switchColor1" @click="changeColorButton(1)"/>
                                <p class="ms-3 d-flex align-items-center fs-5">B.   {{ questionId['options'][1]['option_text'] }}</p>
                            </div>
                        
                            <div class="d-flex mt-3">
                                <RadioButton v-model="respuestas.respuesta"  :value=" questionId['options'][2]['id'] " class="form-control col-1 switchColor1" @click="changeColorButton(2)" />
                                <p class="ms-3 d-flex align-items-center fs-5">C.   {{ questionId['options'][2]['option_text'] }} </p>
                            </div>
                        </div>
                        <button v-if="contador != 0" @click.prevent="previousQuestion" class="btn btn-success bg-black col-1"><</button>
                        <button @click.prevent="compruebaDatos" class="btn btn-success bg-black col-4 ms-2">Siguiente ></button>
                    </div>
                </div>
                <div class="row col-12 bg-line ps-3 mt-5 border-top border-bottom pb-5">
                    <button @click.prevent="enviarButton(index) " v-for=" Question,index  in questions" class="card mr-2 mt-4 ms-2 cardButton"
                        style="width: 10px; height: 10px; align-items: center; justify-content: center;">
                        
                        {{ index+1 }}
                    </button>
                </div>
                <div  class="col-12 card d-flex">
                    <div class="col-12 d-flex mt-2 ms-3 mb-2">
                        <p class="fw-bold">Precauciones: <span class="fw-normal">Si ve algún error o problema que no tiene sentido, utilice el formulario en la página de TEST para enviarnos sus comentarios.</span></p>
                        
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</template>

<script setup>

// Import all the library 
import { ref, onMounted, reactive, createElementBlock, computed } from "vue";
import { useForm, useField } from "vee-validate";
import { routerKey, useRoute } from "vue-router";
import * as yup from 'yup';
import { es } from 'yup-locales';
import { setLocale } from 'yup';
import axios from 'axios';
import { useStore } from 'vuex';
import useTest from "@/composables/test";

const { searchExistTestQuestion,finalizarValue,singleTestQuestionCompleteSave,singleTestQuestionCompleteEdit } = useTest();

const store = useStore();
const user = computed(() => store.state.auth.user)
const role = computed(() => store.state.auth.role)
const route = useRoute()

// Set contador to jump between the questions
let contador = 0;

// Store all the questions have in this test
const questions = ref([]);

// There gonna store the question where the position of question is that indicated with contador
const questionId = ref({});

// Take the value of the input that have name as respuesta
const { value: respuesta } = useField('respuesta', null, { initialValue: '' });

// Set the reactive value that is gonna change with the input that have model as respuestas.respuesta
const respuestas = reactive({
    respuesta
})


// When the page is mounted
onMounted(() => {
    // call the function to check the student is already did this test or half of test
    searchExistTestQuestion(user.value['user_id'],route.params.id);

    // Find the question have in this test
    axios.get('/api/question/' + route.params.level + '/' + route.params.id)
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
})

// This array use for check the student pass the test or not
let respuestasValidar = [];

const compruebaDatos = () =>{
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
const showNextQuestion = () =>{
    // If the checkbox is not checked is gonna appear this alert
    if(respuestas.respuesta == ""){
        alert("Debes elegir por menos 1 option");
    }else{ 
        // set the counter + 1 to jump to next question
        contador = contador + 1;

        // do an for with the option of this question
        for(let i in questionId.value['options']){
            
            // if the student have choice the correct answer 
            if(respuestas.respuesta == questionId.value['options'][i].id && questionId.value['options'][i].is_correct == 1){
                // push in the respuetaValidar array 1 as correct
                console.log(questionId.value['options'][i].id);
                console.log(questionId.value['options'][i].is_correct);
                if(respuestasValidar[contador-1] !== undefined){
                    respuestasValidar[contador-1] = 1;
                    singleTestQuestionCompleteEdit(user.value['user_id'],route.params.id,questionId.value['id'],1);
                }else{
                    respuestasValidar.push(1);
                    singleTestQuestionCompleteSave(user.value['user_id'],route.params.id,questionId.value['id'],1);
                    changeResultArray();
                }

                // insert into the bdd the answer of this question
                
                break;
            }else{
                // push in the respuestaValidar array 0 as incorrect
                if(respuestasValidar[contador-1] !== undefined){
                    respuestasValidar[contador-1] = 0;
                    singleTestQuestionCompleteEdit(user.value['user_id'],route.params.id,questionId.value['id'],0);
                }else{
                    respuestasValidar.push(0);
                    singleTestQuestionCompleteSave(user.value['user_id'],route.params.id,questionId.value['id'],0);
                    changeResultArray();
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

const enviarButton = (testId) =>{
    if(respuestasValidar.length < testId){
        alert("Realizar los preguntas anteriores");
    }else{
        questionId.value = questions.value[testId];
        contador = testId;
    }
   
}

const previousQuestion = () =>{
    
    questionId.value = questions.value[contador-1];
    contador = contador - 1;
}

// Search in bbdd, did the user already have one test with this id.
const searchExist = () =>{
    // if existe delete it
    axios.delete('/api/test/exist/' + user.value['user_id'] + "/" + route.params.id)
    .then(response => {
        // after delete call the finalizar function to regist this time of record into the bbdd
        finalizar();
    })
    .catch(function (error) {
        console.log(error);
        
    });
}



// check at final that student have passed the test or not
const finalizar = () =>{

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
    finalizarValue(user.value['user_id'],route.params.id,passed,questionId.value['difficulty']);
    if(respuestasValidar.length > 1){
        let respuestasUno = respuestasValidar.filter(function(respuesta) {
            return respuesta === 0;
        });
        let cantidadDeZeros = respuestasUno.length;

        let arrayCodificado = btoa(JSON.stringify(respuestasValidar));
        window.location.href = '/Final/'+ user.value['user_id'] + '/' + route.params.id + '/' + cantidadDeZeros + '/' + arrayCodificado;
    }
    
}

const changeColorButton = (event) => {
    const radios = document.querySelectorAll('.switchColor1');
    // Remover la clase 'switchColor2' de todos los radios

    radios.forEach(radio => {
        radio.parentNode.classList.remove('switchColor2');
    });
    // Agregar la clase 'switchColor2' al radio clicado
    radios[event].parentNode.classList.add('switchColor2');
};


const changeResultArray = () =>{
    if(respuestasValidar[contador-1] != undefined){
        // Obtener el botón con la clase 'buttonCard'
        const button = document.querySelector('.cardButton');

        // Reemplazar la clase 'buttonCard' con 'buttonCard1'
        button.classList.replace('cardButton', 'cardButton2');
    }
}

</script>
<style>
@import '/resources/css/testIndex.css';
</style>