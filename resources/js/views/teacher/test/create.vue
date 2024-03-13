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
                <Checkbox v-model="checked" :binary="true" />
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

            <form @submit.prevent="createTest">
                <div class="form-group mb-2">
                    <label for="first_option">Respuesta 1</label>
                    <input type="text" class="form-control" id="first_option" v-model="first_option"
                        placeholder="Primera respuesta" name="first_option" required />
                </div>
                <div class="form-group mb-2">
                    <label for="second_option">Respuesta 2</label>
                    <input type="text" class="form-control" id="second_option" v-model="second_option"
                        placeholder="Segunda respuesta" name="second_option" required />
                </div>
                <div class="form-group mb-2">
                    <label for="third_option">Respuesta 3</label>
                    <input type="text" class="form-control" id="third_option" v-model="third_option"
                        placeholder="Tercera respuesta" name="third_option" required />
                </div>

                <div class="row">
                    <div class="col-6">

                    </div>
                    <!-- seleccionar opción correcta -->
                    <!-- <div class="dropdown mb-3">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="correctOptionDropdownButton"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Opción correcta
                        </button>
                        <select class="dropdown-menu" v-model="test.correct_option" placeholder="Opción correcta"
                            aria-labelledby="correctOptionDropdownButton" name="correct_option" required>
                            <option value="first_option">Primera Opción</option>
                            <option value="second_option">Segunda Opción</option>
                            <option value="third_option">Tercera Opción</option>
                        </select>
                    </div> -->
                    <!-- fin seleccionar opcion correcta -->

                    <!-- seleccionar nivel dificultad -->
                    <!-- <div class="dropdown mb-3">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="difficultyDropdownButton"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Nivel de dificultad
                        </button>
                        <select class="dropdown-menu" v-model="test.difficulty"
                            aria-labelledby="difficultyDropdownButton" name="difficulty" required>
                            <option value="bajo">Bajo</option>
                            <option value="medio">Medio</option>
                            <option value="alto">Alto</option>
                        </select>
                    </div> -->
                    <!-- fin seleccionar nivel dificultad -->

                    <!-- Seleccionar nivel dificultad y opción correcta -->
                    <div class="d-flex">
                        <div class="row m-2">
                            <Dropdown v-model="selectedOption" :options="options" optionLabel="name"
                            placeholder="Opción correcta" checkmark :highlightOnSelect="false"
                            class="w-full md:w-14rem mr-2" />
                        <Dropdown v-model="selectedLevel" :options="levels" optionLabel="name"
                            placeholder="Dificultad" checkmark :highlightOnSelect="false"
                            class="w-full md:w-14rem" />
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Crear pregunta</button>
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

const schema = yup.object({
    question: yup.string().required().label('Pregunta'),
    first_option: yup.string().required().label('Respuesta 1'),
    second_option: yup.string().required().label('Respuesta 2'),
    third_option: yup.string().required().label('Respuesta 3'),
})

// const questionModel = yup.object({
//     question: yup.string().required().label('Pregunta'),
//     options: yup.array().of(yup.string().required().label('Opción')).required(),
//     correct_option: yup.string().required().label('Opción Correcta'),
//     difficulty: yup.string().required().label('Nivel de Dificultad')
// });

// const testModel = yup.object({
//     questions: yup.array().of(questionModel).required()
// });

// const test = reactive({
//     questions: [
//         {
//             question: '',
//             options: ['', '', ''], 
//             correct_option: '',
//             difficulty: ''
//         }
//     ]
// });


const { validate, errors } = useForm({ validationSchema: schema })
const route = useRoute()


setLocale(es);

const { value: question } = useField('question', null, { initialValue: '' });
const { value: difficulty } = useField('difficulty', null, { initialValue: '' });
const { value: first_option } = useField('first_option', null, { initialValue: '' });
const { value: second_option } = useField('second_option', null, { initialValue: '' });
const { value: third_option } = useField('third_option', null, { initialValue: '' });
const { value: is_correct } = useField('is_correct', null, { initialValue: '' });


const test = reactive({
    question,
    first_option,
    second_option,
    third_option,
    difficulty,
    is_correct
})


const strSuccess = ref();
const strError = ref();

onMounted(() => {
    axios.get('/api/test/' + route.params.id)
        .then(response => {
            test.question = response.data.question;
            test.difficulty = response.data.difficulty;
        })
        .catch(function (error) {
            console.log(error);
        });
})

function createTest() {
    validate().then(form => {
        if (form.valid) {
            axios.post('/api/tests', test)
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

// function createTest() {
//     validate().then(form => {
//         if (form.valid) {
//             axios.post('/api/tests', { questions: test.questions })
//                 .then(response => {
//                     strError.value = '';
//                     strSuccess.value = response.data.success;
//                 })
//                 .catch(function (error) {
//                     strSuccess.value = '';
//                     strError.value = error.response.data.message;
//                 });
//         }
//     });
// }
</script>
