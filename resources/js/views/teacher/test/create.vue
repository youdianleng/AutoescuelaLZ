<template>
    <div class="card">
        <div class="d-flex justify-content-end col-12">
            <div class="col-4">
                <button class="btn btn-secondary col-5 border">Añadir pregunta</button>
            </div>
            <div class="col-4">
                <button class="btn btn-secondary col-5 border">Consultar preguntas</button>
            </div>
            <div class="col-4">
                <button class="btn btn-secondary col-5 border">Consultar los tests</button>
            </div>
        </div>


        <div class="card-body">

            {{ Questiones }}
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
                    {{ question }}
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
                        </div>
                    </div>
                </div>

                <button class="btn btn-success">Crear pregunta</button>
            </form>
        </div>
    </div>

</template>

<script setup>
import { ref, onMounted, reactive } from "vue";
import { useForm, useField } from "vee-validate"; 
import { useRoute } from "vue-router";
import * as yup from 'yup';
import { es } from 'yup-locales';
import { setLocale } from 'yup';
import axios from 'axios';



// Selects
const selectedOption = ref();
const options = ref([
    { name: 'Option 1', code: '1', value: 'first_option' },
    { name: 'Option 2', code: '2', value: 'second_option' },
    { name: 'Option 3', code: '3', value: 'third_option' },
]);

const selectedLevel = ref();
const levels = ref([
    { name: 'Baja', code: 'low', value: 'low' },
    { name: 'Media', code: 'medium', value: 'medium' },
    { name: 'Alta', code: 'high', value: 'high' },
]);

const selectedType = ref();
const type = ref([
    { name: 'coche', code: '1', value: '1'},
    { name: 'moto', code: '2', value: '2'},
])

const schema = yup.object({
    question: yup.string().required().label("Pregunta")
})


const { validate, errors } = useForm({ validationSchema: schema })
const route = useRoute()


setLocale(es);

const { value: question } = useField('question', null, { initialValue: '' });
const { value: difficulty } = useField('difficulty', null, { initialValue: '' });
const { value: is_correct } = useField('is_correct', null, { initialValue: '' });
const { value: carnet } = useField('carnet', null, { initialValue: '' });
const { value: respuestas } = useField('respuesta', null, { initialValue: [{},{},{}] });

const Questiones = reactive({
    carnet,
    question,
    difficulty,
    respuestas,
    carnet,
    is_correct
})


const strSuccess = ref();
const strError = ref();
const questions = ref();

onMounted(() => {
    axios.get('/api/tests')
        .then(response => {
            questions.value = response.data;
        })
        .catch(function (error) {
            console.log(error);
        });
})

function createQuestion() {


    validate().then(form => {
        if (form.valid) {
            console.log("Validate");
            axios.post('/api/question', Questiones)
                .then(response => {
                    strError.value = ""
                    strSuccess.value = response.data.success
                })
                .catch(function (error) {
                    strSuccess.value = ""
                    strError.value = error.response.data.message
                });
        }
    })

    
}
</script>
