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
                    <textarea class="form-control" rows="2"  placeholder="Escribe aquí la pregunta" name="question"></textarea>
                    <small id="questionHelp" class="form-text text-muted">Recuerda que no debe contener pistas.</small>
                </div>
                <div class="form-group mb-2">
                    <label for="first_answer">Respuesta 1</label>
                    <input type="text" class="form-control" id="first_answer"  placeholder="Primera respuesta" name="first_answer">
                </div>
                <div class="form-group mb-2">
                    <label for="second_answer">Respuesta 2</label>
                    <input type="text" class="form-control" id="second_answer"  placeholder="Segunda respuesta" name="second_answer">
                </div>
                <div class="form-group mb-2">
                    <label for="third_answer">Respuesta 3</label>
                    <input type="text" class="form-control" id="third_answer"  placeholder="Tercera respuesta" name="third_answer">
                </div>
              

                <div class="dropdown mb-3">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Nivel dificultad
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Bajo</a>
                        <a class="dropdown-item" href="#">Medio</a>
                        <a class="dropdown-item" href="#">Alto</a>
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

const schema = yup.object({
    name: yup.string().required().label('Nombre'),
})


const { validate, errors } = useForm({ validationSchema: schema })
const route = useRoute()


setLocale(es);

</script>

