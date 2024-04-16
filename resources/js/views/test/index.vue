<template>
    <div class="grid">
        <div v-if="questionId" class="col-12">
            <div class="card">
                <h2>TEST Nº1</h2>
                <div class="row">
                    <h2>1. {{ questionId.question }}</h2>
                    <div v-if="questionId['media'] && questionId['media'].length > 0" class="col-2">
                        <img :src="`${questionId['media'][0]['original_url'] }`" alt="" height="100px" width="100px">
                    </div>
                    <div v-if="questionId['options']" class="col-10">
                        <div  class="d-flex">
                            <RadioButton v-model="respuestas.respuesta"  :value=" questionId['options'][0]['id'] " class="form-control col-1"/>
                            <p class="ms-3">a. {{ questionId['options'][0]['option_text'] }}</p>
                        </div>
                        <div class="d-flex mt-3">
                            <RadioButton v-model="respuestas.respuesta"  :value=" questionId['options'][1]['id'] " class="form-control col-1"/>
                            <p class="ms-3">b. {{ questionId['options'][1]['option_text'] }}</p>
                        </div>
                       
                        <div class="d-flex mt-3">
                            <RadioButton v-model="respuestas.respuesta"  :value=" questionId['options'][2]['id'] " class="form-control col-1"/>
                            <p class="ms-3">c. {{ questionId['options'][2]['option_text'] }} </p>
                        </div>
                    </div>
                    <button @click.prevent="showNextQuestion" class="btn btn-success bg-blue-700">Siguiente</button>
                </div>
                <div class="row mt-5">
                    <router-link to="" v-for=" Question,index  in questions" class="card mr-2 bg-teal-300"
                        style="width: 5px; height: 5px; align-items: center; justify-content: center;">
                        
                        {{ index+1 }}

                    </router-link>
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


const store = useStore();
const user = computed(() => store.state.auth.user)
const role = computed(() => store.state.auth.role)
const route = useRoute()


const questions = ref([]);
let contador = 0;
const questionId = ref({});

const { value: respuesta } = useField('respuesta', null, { initialValue: '' });

const respuestas = reactive({
    respuesta
})

onMounted(() => {
    // getQuestions();
    searchExistTestQuestion();
    console.log("hola");
    axios.get('/api/question/' + route.params.level + '/' + route.params.id)
        .then(response => {
            questions.value = response.data;

            questionId.value = questions.value[contador];
            searchExist();
        })
        .catch(function (error) {
            console.log(error);
        });
})

let respuestasValidar = [];

const showNextQuestion = () =>{

    if(respuestas.respuesta == ""){
        alert("Debes elegir por menos 1 option");
    }else{
        console.log(respuestas.respuesta);
        //Compara si los preguntas estan correcta o no  
        contador = contador + 1;

        for(let i in questionId.value['options']){
            if(respuestas.respuesta == questionId.value['options'][i].id && questionId.value['options'][i].is_correct == 1){
                respuestasValidar.push(1);
                console.log(respuestasValidar);

                singleTestQuestionComplete(1);
                break;
            }else{
                respuestasValidar.push(0);
                console.log(respuestasValidar);
                singleTestQuestionComplete(0);
                break;
            }
        }
        


        //Comprueba si existe un siguiente pregunta o no
        if(questions.value[contador] == null){
            console.log("Ya no hay preguntas");
            searchExist();
        }else{
            questionId.value = questions.value[contador];

        }
        
    }


    
    
}

const searchExist = () =>{
    axios.delete('/api/test/exist/' + user.value['user_id'] + "/" + route.params.id)
    .then(response => {
        finalizar();
    })
    .catch(function (error) {
        console.log(error);
        
    });
}

const searchExistTestQuestion = () =>{
    axios.delete('/api/test/existTestQuestion/' + user.value['user_id'] + "/" + route.params.id)
    .then(response => {
    })
    .catch(function (error) {
        console.log(error);
        
    });
}


const finalizar = () =>{

    let pass = 0;
    let passed = 0;
    for(let count in respuestasValidar){
        if(respuestasValidar[count] == 1){
            pass = pass + 1;
        }
    }

    if(pass >= 3){
        passed = 1;
    }

    axios.post('/api/test/finalizar/' + user.value['user_id'] + "/" + route.params.id + "/" + passed + "/" + questionId.value['difficulty'])
        .then(response => {
            
            console.log(response);
        })
        .catch(function (error) {
            console.log(error);
        });
}


const singleTestQuestionComplete = ($is_correct) =>{
    axios.post('/api/test/sendActualQuestion/' + user.value['user_id'] + "/" + route.params.id + "/" + questionId.value['id'] + "/" + $is_correct)
        .then(response => {
            
            console.log("insetado");
        })
        .catch(function (error) {
            console.log(error);
        });
}


</script>
<style>

.p-radiobutton{
    padding-top: 20px;
    padding-bottom: 20px;
    padding-left: 100px;
    padding-right: 100px;
}

.p-radiobutton .p-radiobutton-box {
    background-color:transparent;
    border: 0cap;
    
}

.btn{
    margin-top: 100px;
    padding: 10px;
}

.router-link-active{
    padding: 35px;
}

.col-12{
    padding: 0px;
}

</style>