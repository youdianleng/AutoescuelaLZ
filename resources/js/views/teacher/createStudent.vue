<template>
    <div class="grid mt-5">
        <!-- Exist Student Panel (Edit Student or Delete Student)-->
        <div class="col-12 row justify-content-center">
            <div class="principalEdit card col-11">
                <h2>Editar Estudiantes</h2>
                <div class="muestraEstudiantes col-12 mt-5 ">
                    <div class="d-flex justify-content-end col-12">
                        <div class="col-4 d-flex justify-content-around" >   
                            <button  @click="mostrarDiv = 1" class="btn btn-dark col-5 border">Nueva Estudiante</button>
                            <button  @click="mostrarDiv = 2" class="btn btn-dark col-5 border">Edit Student</button>
                        </div>
                    </div>
                    <!-- v-if="mostrarDiv == 1" -->
                    <div  class="divDinamica col-lg-12" id="divDinamica">
                       <table class="col-12 d-flex justify-content-around" id="divPrincipalCreate">
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
                                        <router-link :to="{ name: 'EditStudent', params: { id: student.id } }">
                                            <button type="submit" class="editButton btn btn-primary">Editar</button>
                                        </router-link>
                                        <button @click.prevent="deleteStudent(student.id)" class="editButton btn btn-primary">Eliminar</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- v-if="mostrarDiv == 2" -->
                    <div  class="col-12 d-flex justify-content-center">
                        <div class="row col-11">
                            <div class="card col-12 ">
                                <div class="formularioCrearStudent">
                                    <div class="contenidoStudent">
                                        <h2>Nuevas Estudiantes</h2>   
                                        <div class="d-flex">
                                            <div class="col-8">
                                                <form @submit.prevent="createStudent" class="col-12 row">
                                                    <input placeholder="Nombre" v-model="student.name" name="name" required>
                                                    {{ errors.name }}
                                                    {{ name }}
                                                    <input class="mt-4" name="surname" v-model="student.surname" placeholder="Apellido">
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
                                                        <button type="submit" class="col-3 mt-3 btn btn-dark">Crear</button>
                                                    </div>
                                                    
                                                </form>
                                            
                                            </div>
                                            <div class="col-4">
                                                <div class="mb-3">
                                                    <DropZone />
                                                    <div class="text-danger mt-1">
                                                        <div >
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        </div>
                                    
                                    </div>
                                    

                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>


         



        <!-- {{ users.data[0]}} -->
        
    </div>
</template>
  

<script setup>
// Import all the library 
import { ref, onMounted, reactive, createElementBlock } from "vue";
import { useForm, useField } from "vee-validate";
import { useRoute } from "vue-router";
import * as yup from 'yup';
import { es } from 'yup-locales';
import { setLocale } from 'yup';
import DropZone from "@/components/DropZone.vue";
// import useUsers from "../../composables/users";
// const {users, getUsers, deleteUser} = useUsers()

// Get all the student we have in bbdd
const students = ref();
const licenses = ref();
const teachers = ref();

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




// asigment of the required validation fields
const schema = yup.object({
    name: yup.string().required().max(5).label('Nombre'),
    password: yup.string().required().label('password'),
    email: yup.string().required().label('email'),
    license_id: yup.string().required().label('license_id'),
    teacher_id: yup.string().required().label('teacher_id'),

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


// Delete the user
function deleteStudent($id) {
// if validate 
validate().then(form => {
    console.log('validate');
    //If the content of the form is validate
    if (form.valid) {
        // Call the funtion with all the content we saved (Sending as $request)
        axios.delete('/api/student/'+$id)
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

// let mostrarDiv = 1;


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


    .dropzone-container {
        height: 400px;
        display: flex;
        align-items: center;
    }

    .file-label{
        display: flex!important;
        align-items: center;
        height: 400px;
    }
</style>