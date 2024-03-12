 <template>
    <div class="card">
        <div class="d-flex justify-content-end col-12">
            <div class="col-4">   
                <button class="btn btn-primary col-5 border">Añadir pregunta</button>
            </div>
            <div class="col-4">
                <button class="btn btn-primary col-5 border">Consultar preguntas</button>
            </div>
            <div class="col-4">
                <button class="btn btn-primary col-5 border">Consultar los tests</button>
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
                    <label for="question">Pregunta del test</label>
                    <textarea class="form-control" rows="2" v-model="question.question" placeholder="Escribe aquí la pregunta" name="question" required>a</textarea>
                    <small id="questionHelp" class="form-text text-muted">Recuerda que no debe contener pistas.</small>
                </div>
                <div class="form-group mb-2">
                    <label for="first_option">Respuesta 1</label>
                    <!-- <input type="text" class="form-control" id="first_option" v-model="test.options[0].option_text" placeholder="Primera respuesta" name="first_option" required> -->
                </div>
                <div class="form-group mb-2">
                    <label for="second_option">Respuesta 2</label>
                    <!-- <input type="text" class="form-control" id="second_option" v-model="test.options[1].option_text" placeholder="Segunda respuesta" name="second_option" required> -->
                </div>
                <div class="form-group mb-2">
                    <label for="third_option">Respuesta 3</label>
                    <!-- <input type="text" class="form-control" id="third_option" v-model="test.options[2].option_text" placeholder="Tercera respuesta" name="third_option" required> -->
                </div>
              
                <div class="row">

                    <div class="dropdown mb-3">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Opción correcta
                        </button>
                        <select class="dropdown-menu" v-model="test.is_correct" aria-labelledby="dropdownMenuButton" name="is_correct" required>
                            <option :value="option.option_text" v-for="option in test.options" :key="option.id">{{ option.option_text }}</option>
                        </select>
                    </div>

                </div>

                <button type="submit" class="btn btn-primary">Crear pregunta</button>
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


const schema = yup.object({
    question: yup.string().required().label('Pregunta'),
    first_option: yup.string().required().label('Respuesta 1'),
    second_option: yup.string().required().label('Respuesta 2'),
    third_option: yup.string().required().label('Respuesta 3'),
    difficulty: yup.string().required().label('Nivel dificultad'),
})


const { validate, errors } = useForm({ validationSchema: schema })
const route = useRoute()


setLocale(es);

const { value: question } = useField('question', null, { initialValue: ''});
const { value: first_option } = useField('first_option', null, { initialValue: ''});
const { value: second_option } = useField('second_option', null, { initialValue: ''});
const { value: third_option } = useField('third_option', null, { initialValue: ''});
const { value: difficulty } = useField('difficulty', null, { initialValue: ''});
const { value: is_correct } = useField( 'is_correct', null, {initialValue: ''})



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



</script>
