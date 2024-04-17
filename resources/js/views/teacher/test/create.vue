<template>
    <div class="card">
        <div class="d-flex justify-content-end col-12">
            <div class="d-flex justify-content-end col-6">
                <div class="col-4">
                    <button class="btn btn-secondary col-11 border">Añadir pregunta</button>
                </div>
                <div class="col-4">
                    <button class="btn btn-secondary col-11 border">Consultar los tests</button>
                </div>
            </div>
                
        </div>


        <div class="card-body">
            <div class="d-flex justify-content-between pb-2 mb-2">
                <h5 class="card-title">Añadir pregunta test</h5>
            </div>
            <div v-if="strSuccess" class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>{{ strSuccess }}</strong>
            </div>

            <div v-if="strError" class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>{{ strError }}</strong>
            </div>

            <form @submit.prevent="createQuestion">
                <div class="form-group mb-2">
                    <label>Pregunta</label>
                    <textarea name="question" v-model="Questiones.question" class="col-12" ></textarea>
                </div>
                <div v-for="respuesta in respuestas" class="form-group mb-2  col-12">
                    <label for="first_option">Respuesta 1</label>
                    <div class="d-flex">
                        <input v-model="respuesta.is_correct" type="checkbox" name="checkedOption" class="form-control col-1" placeholder="Primera respuesta"/>
                        <input v-model="respuesta.option_text" type="text" class="form-control col-11" id="first_option" placeholder="Primera respuesta" name="first_option" required/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                    </div>
                    <!-- Seleccionar nivel dificultad y opción correcta -->
                    <div class="d-flex">
                        <div class="row m-2">
                            <Dropdown v-model="Questiones.difficulty" :options="levels" optionLabel="name"
                            name="difficulty"
                            placeholder="Dificultad" checkmark :highlightOnSelect="false"
                            class="w-full md:w-14rem" required/>
                            <Dropdown v-model="Questiones.carnet" :options="type" optionLabel="name"
                            name="carnet"
                            placeholder="Tipo Carnet" checkmark :highlightOnSelect="false"
                            class="w-full md:w-14rem" required/>
                            <Dropdown v-model="Questiones.test_id" :options="test" optionLabel="id" placeholder="Seleccione un test" class="w-full md:w-14rem" />
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <DropZone v-model="Questiones.thumbnail" name="thumbnail"/>
                </div>
                <button class="btn btn-success">Crear pregunta</button>
            </form>
        </div>

    </div>

</template>

<script setup>
//Importar all the library
import { ref, onMounted, reactive, computed } from "vue";
import { useForm, useField } from "vee-validate"; 
import { useRoute } from "vue-router";
import * as yup from 'yup';
import { es } from 'yup-locales';
import { setLocale } from 'yup';
import useQuestion from "@/composables/question";
const { createQuestionSend,getQuestions,getTest,test,questions } = useQuestion();
import axios from 'axios';
import DropZone from "@/components/DropZone.vue";
setLocale(es);


// Define the default 
const levels = ref([
    { name: 'Baja', code: 'low', value: 'low' },
    { name: 'Media', code: 'medium', value: 'medium' },
    { name: 'Alta', code: 'high', value: 'high' },
]);

const type = ref([
    { name: 'coche', code: '1', value: '1'},
    { name: 'moto', code: '2', value: '2'},
])

// use for check the value of the define input not null
const schema = yup.object({
    question: yup.string().required().label("Pregunta")
})

// use for active the validation
const { validate, errors } = useForm({ validationSchema: schema })

// use for get the params in the url
const route = useRoute()


// These file is defined to get value that return from the form
const { value: question } = useField('question', null, { initialValue: '' });
const { value: difficulty } = useField('difficulty', null, { initialValue: '' });
const { value: is_correct } = useField('is_correct', null, { initialValue: '' });
const { value: carnet } = useField('carnet', null, { initialValue: '' });
const { value: respuestas } = useField('respuesta', null, { initialValue: [{},{},{}] });
const { value: test_id } = useField('test_id', null, { initialValue: '' });
const { value: thumbnail } = useField('thumbnail',null, { initialValue: '' });

// variable to store the value writted in those input of the form
const Questiones = reactive({
    carnet,
    question,
    difficulty,
    respuestas,
    carnet,
    is_correct,
    test_id,
    thumbnail: ''
})

// When the page is loaded call the functions
onMounted(() => {
        //get all the questions we have in bbdd
        getQuestions();

        getTest();
})

// Use for create the new question for test
function createQuestion() {
    validate().then(form => {
        if (form.valid) createQuestionSend(Questiones,form);
    })

    
}
</script>
