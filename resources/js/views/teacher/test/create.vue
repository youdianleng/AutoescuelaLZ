 <template>
    <div class="card">
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

            <form @submit.prevent="saveTest">
                <div class="form-group mb-2">
                    <label for="question">Pregunta del test</label>
                    <textarea class="form-control" rows="2" v-model="question.question"  placeholder="Escribe aquí la pregunta" name="question" required>a</textarea>
                    <small id="questionHelp" class="form-text text-muted">Recuerda que no debe contener pistas.</small>
                </div>
                <div class="form-group mb-2">
                    <label for="first_option">Respuesta 1</label>
                    <input type="text" class="form-control" id="first_option"  placeholder="Primera respuesta" name="first_option" required>
                </div>
                <div class="form-group mb-2">
                    <label for="second_option">Respuesta 2</label>
                    <input type="text" class="form-control" id="second_option"  placeholder="Segunda respuesta" name="second_option" required>
                </div>
                <div class="form-group mb-2">
                    <label for="third_option">Respuesta 3</label>
                    <input type="text" class="form-control" id="third_option"  placeholder="Tercera respuesta" name="third_option" required>
                </div>
              

                <div class="dropdown mb-3">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Nivel dificultad
                    </button>
                    <select class="dropdown-menu" v-model="test.difficulty" aria-labelledby="dropdownMenuButton" name="difficulty" required>
                        <a class="dropdown-item" href="#">Bajo</a>
                        <a class="dropdown-item" href="#">Medio</a>
                        <a class="dropdown-item" href="#">Alto</a>
                    </select>
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

const schema = yup.object({
    name: yup.string().required().label('Nombre'),
})


const { validate, errors } = useForm({ validationSchema: schema })
const route = useRoute()


setLocale(es);

const { value: question } = useField('question', null, { initialValue: ''});
const { value: first_option } = useField('first_option', null, { initialValue: ''});
const { value: second_option } = useField('second_option', null, { initialValue: ''});
const { value: third_option } = useField('third_option', null, { initialValue: ''});
const { value: difficulty } = useField('difficulty', null, { initialValue: ''});



const task = reactive({
    question,
    first_option,
    second_option,
    third_option,
    difficulty
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
        console.log('validate');
        if (form.valid) {
            axios.post('/api/test/store/' + route.params.id, test)
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





setLocale(es);

</script>

