<template>
    <div class="col-12">
        <div v-if="questionId" class="card col-12">
            <div class=" col-12">
                    <h1 class="d-flex justify-content-center fw-bold mt-5">TEST Nº {{ route.params.id }}</h1>
                <div class="d-flex mt-5">
                    <div class="col-xl-4">
                        <div v-if="questionId['media'] && questionId['media'].length > 0" class="col-11 border d-flex justify-content-center ms-3">
                            <img :src="`${questionId['media'][0]['original_url'] }`" alt="Foto de question que deberia realizar ahora" height="350px" width="300px">
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
import { watchEffect } from "vue";

const { searchExistTestQuestion,finalizarValue,singleTestQuestionCompleteSave,singleTestQuestionCompleteEdit,compruebaDatos,enviarButton,previousQuestion,buscarDatosTest,respuestasValidar,questions,questionId,contador,recibirRespuesta } = useTest();

const store = useStore();
const user = computed(() => store.state.auth.user)
const role = computed(() => store.state.auth.role)
const route = useRoute()



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
    buscarDatosTest(route.params.level, route.params.id,user.value['user_id'],respuestas.respuesta);
})

watchEffect(() => {
    // Accedemos al valor de 'respuesta.respuesta' dentro de 'respuesta'
    const respuestaValor = respuestas.respuesta;
    // Verificamos si 'respuesta.respuesta' ha cambiado
    if (respuestaValor !== '') {
    // Llamamos a 'recibirRespuesta' con el valor de 'respuesta.respuesta'
        recibirRespuesta(respuestaValor);
    }
});

const changeColorButton = (event) => {
    const radios = document.querySelectorAll('.switchColor1');
    // Remover la clase 'switchColor2' de todos los radios

    radios.forEach(radio => {
        radio.parentNode.classList.remove('switchColor2');
    });
    // Agregar la clase 'switchColor2' al radio clicado
    radios[event].parentNode.classList.add('switchColor2');
};




</script>
<style>
@import '/resources/css/testIndex.css';
</style>