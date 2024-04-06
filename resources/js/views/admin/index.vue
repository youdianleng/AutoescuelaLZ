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

            <div v-if="role === 'teacher'" class="col-12 row justify-content-center">
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
                   <div class="col-12 d-flex justify-content-end">
                    <div class="card col-6">
                        
                        <DataTable :value="testRealized" tableStyle="min-width: 50rem">
                            <Column field="id" header="id"></Column>
                            <Column field="student_id" header="student_id"></Column>
                            <Column field="test_id" header="test_id"></Column>
                            <Column field="is_correct" header="Level"></Column>
                        </DataTable>
                    </div>
                        <div ref="main" style="width: 50%; height: 400px"></div>
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
import * as echarts from "echarts"; 
// import useUsers from "../../composables/users";
// const {users, getUsers, deleteUser} = useUsers()


const testRealized = ref();

// Get all the student we have in bbdd
const students = ref();
const store = useStore();
const user = computed(() => store.state.auth.user)
const role = computed(() => store.state.auth.role)

onMounted(() => {

    // getUsers();
    axios.get('/api/student/' + user.value['user_id'])
        .then(response => {
            students.value = response.data;
            testRealized.value = response.data.data[0]['student_test'];
            getTestQuantityAndCheck(response.data.data[0]['student_test'][0]['test_id']);

        })
        .catch(function (error) {
            console.log(error);
        });

        init();

})

const testQuestionQuantity = ref([]);
const incompleteTestQuestionQuantiry = ref([]);

/** 
 *  Get the quantity of the question have in every test that the student
 *  maked and calculate the perventage of cert and error questions
 * */ 
const getTestQuantityAndCheck = ($idTest) =>{
    axios.get('/api/test/' + $idTest)
        .then(response => {
            console.log(response.data.data);
            getStudentTestQuestionQuantity($idTest);
        })
        .catch(function (error) {
            console.log(error);
        });
}

const getStudentTestQuestionQuantity = ($idTest) =>{
    axios.get('/api/student/test' + '/' + user.value['user_id'] + '/' + $idTest)
        .then(response => {
            console.log(response.data.data);
        })
        .catch(function (error) {
            console.log(error);
        });
}




// Create the circle graphic
const main = ref(); 
function init() {
    var myChart = echarts.init(main.value);
  var datas = [
    [
      { name: "Test1", value: 85 },
      { name: "Falta", value: 15},
    ],
  ];
  var option = {
    series: datas.map(function (data) {
      return {
        type: "pie",
        radius: [0, 90],
        height: "33.33%",
        left: "center",
        top: "center",
        width: 300,
        label: {
          alignTo: "edge",
          formatter: "{name|{b}}\n{time|{c} %}",
          minMargin: 5,
          edgeDistance: 50,
          lineHeight: 15,
          rich: {
            time: {
              fontSize: 10,
              color: "#999",
            },
          },
        },

        data: data,
      };
    }),
  };

  myChart.setOption(option);
}
</script>

<style scoped>
h3{
    margin: 0px;
}
</style>
