<template>
    <div class="grid">
        <h1 class="ms-3">Panel de Creación</h1>
        <div class="col-12 d-flex">
            
            <div class="col-4">
                <div class="menuSelect">
                    <div class="borderCreacion">
                        <h3>Menu de Creación</h3>
                        <div class="row col-12 justify-content-center mb-5">
                            <div class="d-flex botoneCreacionAlumno justify-content-center">
                                <img src="/public/images/ImagenCrear/crearUsuario.png">
                                <button class="btn btn-white">Alta Alumnnos</button>
                            </div>                            
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="row col-8">
                <div class="card col-11 ms-5 ">
                    <div class="formularioCrearStudent">
                        <div class="contenidoStudent">
                            <h2>Nuevas Estudiantes</h2>   
                            <div class="d-flex">
                                <div class="col-8 row">
                                    <form @submit.prevent="createStudent" class="col-12 row">
                                        <input placeholder="Nombre" v-model="student.name" name="nombre" required>
                                        <input class="mt-4" name="surname" v-model="student.surname" placeholder="Apellido">
                                        <input class="mt-4" name="image" v-model="student.image" placeholder="Imagen">
                                        <input type="mail" name="email" v-model="student.email" class="mt-4" placeholder="Email" required>
                                        <input class="mt-4" name="password" v-model="student.password" placeholder="Contraseña" required>
                                        <select class="mt-4" name="license_id" v-model="student.license_id" required>
                                            <option>1</option>
                                            <option>2</option>
                                        </select>
                                        <select class="mt-4" name="teacher_id" v-model="student.teacher_id" required>
                                            <option>1</option>
                                            <option>2</option>
                                        </select>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="col-5 mt-3 btn btn-dark">Crear</button>
                                        </div>
                                        
                                    </form>
                                
                                </div>
                                <div class="col-4 textoDeRecuerdo">
                                    <h4>Notificaciones</h4>
                                    <p>Para poder crear Estudiante nueva hay que asegurar el estudiante
                                        ha entregado todos los documento de forma correcta y que es obligatorio 
                                        tener los identidad y el tipo de carnet que desea sacar.
                                    </p>
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


const strSuccess = ref();
const strError = ref();

setLocale(es);

    const { value: name } = useField('name', null, { initialValue: '' });
    const { value: surname } = useField('surname', null, { initialValue: '' });
    const { value: image } = useField('image', null, { initialValue: '' });
    const { value: email } = useField('email', null, { initialValue: '' });
    const { value: password } = useField('password', null, { initialValue: '' });
    const { value: license_id } = useField('license_id', null, { initialValue: '' });
    const { value: teacher_id } = useField('teacher_id', null, { initialValue: '' });

    const student = reactive({
        name,
        surname,
        image,
        email,
        password,
        license_id,
        teacher_id
    })


    onMounted(() => {
    axios.get('/api/student/')
        .then(response => {

            student.name = response.data.name;
            student.surname = response.data.surname;
            student.image = response.data.image;
            student.password = response.data.password;
            student.license_id = response.data.license_id;
            student.teacher_id = response.data.teacher_id;
        })
        .catch(function (error) {
            console.log(error);
        });
    })


    function createStudent() {
    validate().then(form => {
        console.log('validate');
        console.log(form);
        if (form.valid) {
            axios.post('/api/student/create', student)
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



    // function saveStudent() {
    //     validate().then(form => {
    //         console.log('validate');
    //         if (form.valid) {
    //             axios.post('/api/tasks/update/' + route.params.id, task)
    //                 .then(response => {
    //                     strError.value = ""
    //                     strSuccess.value = response.data.success
    //                 })
    //                 .catch(function (error) {
    //                     strSuccess.value = ""
    //                     strError.value = error.response.data.message
    //                 });
    //         }
    //     })
    // }

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