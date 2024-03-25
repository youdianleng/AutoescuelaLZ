<template>
    <div class="grid">
            <div class="col-12 d-flex justify-content-center mt-5">
            <div class="row col-11">
                <div class="card col-12 ">
                    <div class="formularioCrearStudent">
                        <div class="contenidoStudent">
                            <h2>Editar Estudiante</h2>   
                            <div class="d-flex">
                                <div class="col-12 row">
                                    <form @submit.prevent="createStudent" class="col-12 row">
                                        <input placeholder="Nombre" v-model="student.name" name="name" required>
                                        {{ errors.name }}
                                        {{ name }}
                                        <input class="mt-4" name="surname" v-model="student.surname" placeholder="Apellido">
                                        <input class="mt-4" name="image" v-model="student.image" placeholder="Imagen">
                                        <input type="mail" name="email" v-model="student.email" class="mt-4" placeholder="Email" required>
                                        {{ errors.email }}
                                        <input class="mt-4" name="password" v-model="student.password" placeholder="Contraseña" required>
                                        {{ errors.password }}
                                        <select class="mt-4" name="license_id" v-model="student.license_id" required>
                                            <option v-for="license in licenses" :value="license.id">{{ license.type }}</option>
                                        </select>
                                        {{ errors.licencia_id }}
                                        <select class="mt-4" name="teacher_id" v-model="student.teacher_id" required>
                                            <option v-for="teacher in teachers" :value="teacher.id">{{ teacher.name }}</option>
                                        </select>
                                        {{ errors.teacher_id }}
                                        <div class="col-12 d-flex justify-content-end">
                                            <form @submit.prevent="saveTask" class="col-4">
                                                <button type="submit" class="col-12 mt-3 btn btn-dark">Editar</button>
                                            </form>
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
import { ref, onMounted, reactive, inject } from "vue";
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

const strSuccess = ref();
const strError = ref();
const licenses = ref();
const teachers = ref();
const swal = inject('$swal');


onMounted(() => {
    axios.get('/api/student/' + route.params.id)
    .then(response => {
        student.name = response.data.data.name;
        student.surname = response.data.data.surname;
        student.image = response.data.data.image;
        student.email = response.data.data.email;
        student.password = response.data.data.password;
        student.license_id = response.data.data.license_id;
        student.teacher_id = response.data.data.teacher_id;
    })
    .catch(function(error) {
        console.log(error);
    });
})

onMounted(() => {
// getLicencia();
axios.get('/api/license')
    .then(response => {
        licenses.value = response.data;

    })
    .catch(function (error) {
        console.log(error);
    });
})

onMounted(() => {
// getTeacher();
axios.get('/api/teacher')
    .then(response => {
        teachers.value = response.data;

    })
    .catch(function (error) {
        console.log(error);
    });
})





function saveTask() {
    validate().then(form => {
        console.log('validate');
        if (form.valid) {
            axios.post('/api/student/update/'+route.params.id, student)
                .then(response => {
                    strError.value = ""
                    strSuccess.value = response.data.success
                    swal({
                        icon: "success",
                        title: "Datos Cambiados"
                    })
                    location.reload(); 
                })
                .catch(function (error) {
                    strSuccess.value = ""
                    strError.value = error.response.data.message
                    swal({
                        icon: "error",
                        title: "Datos Incorrectos"
                    })
                    location.reload(); 
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