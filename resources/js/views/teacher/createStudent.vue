<template>
    <div class="grid">
        <h1 class="ms-3">Panel de Creación</h1>
        <!-- Exist Student Panel (Edit Student or Delete Student)-->
        <div class="col-12 row justify-content-center">
            <div class="principalEdit card col-11">
                <h2>Editar Estudiantes</h2>
                <div class="muestraEstudiantes col-12 mt-5">
                    <div class="d-flex justify-content-end col-12">
                        <div class="col-4 d-flex justify-content-around">   
                            <button class="btn btn-dark col-5 border">Nueva Estudiante</button>
                            <button class="btn btn-dark col-5 border">Editar Estudiante</button>
                        </div>
                    </div>
                    
                    <table class="col-12 d-flex justify-content-around">
                        <tbody class="col-12 row justify-content-around">
                            <tr class="col-12 d-flex justify-content-around border-top border-bottom">
                                <th class="col-2">Full Name</th>
                                <th class="col-2">Email</th>
                                <th class="col-2">Password</th>
                                <th class="col-2">License</th>
                                <th class="col-2">Teacher</th>
                                <th class="col-2">Edit</th>
                            </tr>
                            <tr v-for="student in students" class="col-12 d-flex justify-content-around">
                                <td class="col-2">{{ student.name }}  {{ student.surname }}</td>
                                <td class="col-2">{{ student.email }}</td>
                                <td class="col-2">{{ student.password }}</td>
                                <td class="col-2" v-if="student.license_id === 1">Coche</td>
                                <td class="col-2" v-else="student.license_id === 2">Moto</td>
                                <td class="col-2">{{ student.teacher_id }}</td>
                                <td class="col-2 d-flex justify-content-between">
                                    <router-link  :to="{name: 'EditStudent', params: { id: student.id }}" class="editButton btn btn-primary">Editar</router-link>
                                    <form @submit.prevent="createStudent">
                                        <button type="submit" class="editButton btn btn-primary">Eliminar</button>
                                    </form>
                                    
                                </td>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- {{ users.data[0]}} -->
        <div class="col-12 d-flex justify-content-center">
            <div class="row col-11">
                <div class="card col-12 ">
                    <div class="formularioCrearStudent">
                        <div class="contenidoStudent">
                            <h2>Nuevas Estudiantes</h2>   
                            <div class="d-flex">
                                <div class="col-12 row">
                                    <form @submit.prevent="createStudent" class="col-12 row">
                                        <input placeholder="Nombre" v-model="student.name" name="name" required>
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
                                            <button type="submit" class="col-3 mt-3 btn btn-dark">Crear</button>
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
// Import all the library 
import { ref, onMounted, reactive } from "vue";
import { useForm, useField } from "vee-validate";
import { useRoute } from "vue-router";
import * as yup from 'yup';
import { es } from 'yup-locales';
import { setLocale } from 'yup';
// import useUsers from "../../composables/users";
// const {users, getUsers, deleteUser} = useUsers()

// Get all the student we have in bbdd
const students = ref();

onMounted(() => {

    // getUsers();
    axios.get('/api/student')
        .then(response => {
            students.value = response.data;

        })
        .catch(function (error) {
            console.log(error);
        });
})



// asigment of the required validation fields
const schema = yup.object({
    name: yup.string().required().label('Nombre'),
})

// Define the validate using form fields
const { validate, errors } = useForm({ validationSchema: schema })
const route = useRoute()

// Set the Success and Error message
const strSuccess = ref();
const strError = ref();

setLocale(es);


// Get the value from the form Inputs
const { value: name } = useField('name', null, { initialValue: '' });
const { value: surname } = useField('surname', null, { initialValue: '' });
const { value: image } = useField('image', null, { initialValue: '' });
const { value: email } = useField('email', null, { initialValue: '' });
const { value: password } = useField('password', null, { initialValue: '' });
const { value: license_id } = useField('license_id', null, { initialValue: '' });
const { value: teacher_id } = useField('teacher_id', null, { initialValue: '' });

// Create an array with all the value send by form
const student = reactive({
    name,
    surname,
    image,
    email,
    password,
    license_id,
    teacher_id
})


// Send to create one Student calling the function we defined in API
function createStudent() {
// if validate 
validate().then(form => {
    console.log('validate');
    //If the content of the form is validate
    if (form.valid) {
        // Call the funtion with all the content we saved (Sending as $request)
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

    .editButton{
        width: 92px;
        height: 32px;
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



    /* Principal box for Edit User Panel */
    .principalEdit{
        padding: 20px;
    }
</style>