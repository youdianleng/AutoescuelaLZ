<template>
    <div class="grid">
        <h1 class="ms-3">Panel de Editación</h1>
        <div class="col-12 d-flex">
            <div class="col-4">
                <div class="menuSelect">
                    <div class="borderCreacion">
                        <h3>Menu de Editación</h3>
                        <div class="row col-12 justify-content-center mb-5">
                            <div class="d-flex botoneCreacionAlumno justify-content-center">
                                <img src="/public/images/ImagenCrear/crearUsuario.png">
                                <button class="btn btn-white">Editar Estudiante</button>
                            </div>                            
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="row col-8">
                <div class="card col-11 ms-5 ">
                    <div class="formularioCrearStudent">
                        <div class="contenidoStudent">
                            <h2>Editar Estudiante</h2>   
                            <div class="d-flex">
                                <div class="col-12 row">
                                    <form class="col-12 row">
                                        <input v-model="student.name" name="name" required>
                                        <input class="mt-4" name="surname" placeholder="Apellido">
                                        <input class="mt-4" name="image" placeholder="Imagen">
                                        <input type="mail" name="email" class="mt-4" placeholder="Email" required>
                                        <input class="mt-4" name="password" placeholder="Contraseña" required>
                                        <select class="mt-4" name="license_id" required>
                                            <option>1</option>
                                            <option>2</option>
                                        </select>
                                        <select class="mt-4" name="teacher_id" required>
                                            <option>1</option>
                                            <option>2</option>
                                        </select>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="col-5 mt-3 btn btn-dark">Editar</button>
                                        </div>
                                        
                                    </form> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted, reactive } from "vue";
import { useForm, useField} from "vee-validate";
import { useRoute } from "vue-router";
import * as yup from 'yup';
import { es } from 'yup-locales';
import { setLocale } from 'yup';


const schema =  yup.object({
    name: yup.string().required().label('Nombre'),
})


const { validate, errors } = useForm({ validationSchema: schema })
const route = useRoute()


setLocale(es);




const { value: name } = useField('name', null, { initialValue: '' });
const { value: description } = useField('description', null, { initialValue: '' });
const { value: date_open } = useField('date_open', null, { initialValue: '' });
const { value: date_close } = useField('date_close', null, { initialValue: '' });


const student = reactive({
    name,
})

const strSuccess = ref();
const strError = ref();


onMounted(() => {
    axios.get('/api/student/' + route.params.id)
    .then(response => {
        console.log(response);
        student.name = response.data.data.name;
    })
    .catch(function(error) {
        console.log(error);
    });
})




function saveTask() {
    validate().then(form => {
        console.log('validate');
        if (form.valid) {
            axios.post('/api/student/update/', task)
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

<style>

    .menuSelect{
        padding: 30px;
        background-color: white;
        border-radius: 12px;
        border: 1px solid var(--surface-border);
    }

    .row > *{
        padding: 0px;
    }

    .botoneCreacion{
        border: 1px black solid;
    }

    .botoneCreacionAlumno:hover{
        border: 1px #D5D8DC solid;
    }

    .botoneCreacionPregunta:hover{
        border: 1px #D5D8DC solid;
    }



    .borderCreacion{
        padding: 20px;
        border-radius: 10px;
    }

    .botoneCreacionAlumno{
        padding: 20px;
        margin-top: 30px;
        border-radius: 10px;
        border: 1px black solid;
    }

    .botoneCreacionPregunta{
        padding: 20px;
        margin-top: 30px;
        border-radius: 10px;
        border: 1px black solid;
    }


    /* Formulario de estudiante */
    .formularioCrearStudent{
        padding: 20px;
    }

    .formularioCrearStudent form{
        padding: 20px;
    }

    .contenidoStudent input{
        padding: 5px;
        border-radius: 5px;
        border: 1px black solid;
    }

    .contenidoStudent select{
        padding: 5px;
        border-radius: 5px;
        border: 1px black solid;
    }

    .textoDeRecuerdo{
        padding-left: 20px;
        padding-top: 30px;
        text-align: justify;
    }

    .contenidoStudent button{
        padding-top: 10px;
        padding-bottom: 10px;
        padding-left: 35px;
        padding-right: 35px;
    }
</style>