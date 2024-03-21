<template>
    <div class="grid col-12">
        <div class="col-12 mt-5 row justify-content-center">
            <div class="card col-11 d-flex">
                <div class="col-12 d-flex justify-content-center">
                    <div class="col-4 d-flex justify-content-center">
                        <img src="/images/perfil.png"> 
                    </div>
                    
                    <div class="col-8">
                        <h2 class="mb-5" v-if="role === 'teacher'">Profesor de {{ user.license_id }}</h2>
                        <h2 class="mb-5" v-if="role === 'student'">Alumno de {{ user.license_id }}</h2>
                        <h3>{{ user.name }} {{ user.surname }}</h3>
                        <h3>{{ user.address }}</h3> 
                        <h3>{{ user.email }}</h3>
                        <h3>{{ user.license_id }}</h3>
                        <h3 v-if="role === 'student'">Profesor: {{ user.teacher_id}} </h3>
                    </div>
                </div>
               
            </div>

            <div v-if="role === 'teacher'">
                <div class="card col-11 d-flex">
                    <div class="col-12 justify-content-center">
                        <h3 class="col-12 d-flex justify-content-center">Preguntas Creados</h3>
                        <table class="col-12 mt-5">
                            <tbody class="col-12">
                                <tr class="col-12 border-top border-bottom bg-body-tertiary">
                                    <th class="col-3 text-center">Pregunta</th>
                                    <th class="col-3 text-center">Numero Opcion Correcta</th>
                                    <th class="col-3 text-center">Dificuldad</th>
                                    <th class="col-3 text-center">Fecha Creado</th>
                                </tr>
                                <tr v-for="student in students" class="col-12">
                                    <td class="col-3 text-center">{{ student.name }}</td>
                                    <td class="col-3 text-center">{{ student.surname }}</td>
                                    <td class="col-3 text-center">{{ student.email }}</td>
                                    <td class="col-3 text-center">{{ student.license_id }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
                <div class="card col-11 d-flex">
                    <div class="col-12 justify-content-center">
                        <h3 class="col-12 d-flex justify-content-center">Alumnos Asignados</h3>
                        <table class="col-12 mt-5">
                            <tbody class="col-12">
                                <tr class="col-12 border-top border-bottom bg-body-tertiary">
                                    <th class="col-3 text-center">Nombre</th>
                                    <th class="col-3 text-center">Apellido</th>
                                    <th class="col-3 text-center">Email</th>
                                    <th class="col-3 text-center">Licencia</th>
                                </tr>
                                <tr v-for="student in students" class="col-12">
                                    <td class="col-3 text-center">{{ student.name }}</td>
                                    <td class="col-3 text-center">{{ student.surname }}</td>
                                    <td class="col-3 text-center">{{ student.email }}</td>
                                    <td class="col-3 text-center">{{ student.license_id }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div v-if="role === 'student'" class="col-12 row justify-content-center">
                <div class="card col-11 d-flex">
                   <div>
                        <h3></h3>
                   </div>
                </div>
            </div>
            
        </div>
    </div>
</template>

<script setup>
// Import all the library 
import { ref, onMounted, reactive, createElementBlock, computed } from "vue";
import { useForm, useField } from "vee-validate";
import { useRoute } from "vue-router";
import * as yup from 'yup';
import { es } from 'yup-locales';
import { setLocale } from 'yup';
import axios from 'axios';
import { useStore } from 'vuex';
// import useUsers from "../../composables/users";
// const {users, getUsers, deleteUser} = useUsers()

// Get all the student we have in bbdd
const students = ref();
const store = useStore();
const user = computed(() => store.state.auth.user)
const role = computed(() => store.state.auth.role)

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


</script>

<style scoped>
h3{
    margin: 0px;
}
</style>
