<template>
    <div class="grid col-12 justify-content-center">
        <div class=" col-11">

            <div class="card col-12 d-flex">
                <Breadcrumb :home="home" :model="items">
                    <template #item="{ item, props }">
                        <router-link v-if="item.route" v-slot="{ href, navigate }" :to="item.route" custom>
                            <a :href="href" v-bind="props.action" @click="navigate">
                                <span :class="[item.icon, 'text-color']" />
                                <span class="text-primary font-semibold">{{ item.label }}</span>
                            </a>
                        </router-link>
                        <a v-else :href="item.url" :target="item.target" v-bind="props.action">
                            <span class="text-color">{{ item.label }}</span>
                        </a>
                    </template>
                </Breadcrumb>
                <div v-if="students" class="col-12 d-flex justify-content-center">
                    <div  class="col-3 d-flex justify-content-center">
                        <img :src="`${students.data[0].media[0].original_url}`" width="150">
                    </div>
                    
                    <div  class="col-5">
                        <h3>Nombre: {{ user.name }}</h3>
                        <h3>Apellido: {{ user.surname }}</h3>
                        <h3>Email: {{ user.email }}</h3>
                        <h3 v-if="role === 'student'">Profesor Asignado: {{ students.data[0].teachers[0].name}} </h3>
                    </div>
                    <div class="col-4 d-flex align-items-center">
                        <div class="col-12 d-flex justify-content-around">
                            <Button class="col-5 pt-3 pb-3" label="Solicitar Cambio" @click="visible = true" />
                            <Button class="col-5 pt-3 pb-3" label="Dejar Resenya" @click="reseña = true" />
                        </div>
                        
                    </div>
                    
                </div>
               
            </div>

            <div v-if="role === 'student'" class="col-12 p-0">
                <div class="card col-12 d-flex">
                   <div style="padding: 0.5rem;">
                        <h3>Test Realizados:</h3>
                   </div>
                   <div class="col-12 d-flex justify-content-end">
                    <div class="card col-6">
                        <DataTable :value="testRealized" tableStyle="min-width: 40rem">
                            <Column field="student_id" header="student_id"></Column>
                            <Column field="test_id" header="test_id"></Column>
                            <Column field="level" header="Level"></Column>
                            <Column :exportable="false" style="min-width: 8rem" header="Ver">
                            <template #body="slotProps">
                                <Button  outlined rounded class="mr-2" @click="getTestQuantityAndCheck(slotProps.data.test_id)" >Ver Porcentaje</Button> 
                            </template>
                            </Column>
                        </DataTable>
                    </div>
                        <div ref="main" style="width: 50%; height: 400px"></div>
                   </div>
                   
                </div>
            </div>
        </div>
        <div v-if="role === 'student'" class="col-12 row justify-content-center mb-5">
            <div class="card col-11 d-flex">
                <div style="padding: 0.5rem;">
                    <h3>Preguntas Fallados</h3>
                </div>
                <div class="d-flex">
                    <div class="card col-12" style="margin: 0px;">
                        <DataTable v-if="incompleteTestQuestionQuantiry" :value="incompleteTestQuestionQuantiry" tableStyle="min-width: 50rem">
                            <Column field="question_question.question" header="Pregunta"></Column>
                            <Column field="question_option.option_text" header="Tu Opcion"></Column>
                            <Column field="option.is_correct" header="Certado">
                            <template #body="rowData">
                                {{ rowData.data.is_correct === 1 ? 'Sí' : 'NO' }}
                            </template>
                        </Column>
                        </DataTable>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <Dialog v-model:visible="visible" modal header="Editar Perfil" :style="{ width: '45rem' }">
        <span class="p-text-secondary block mb-5">Solicitar para realizar cambios de informacion.</span>
        <div class="flex align-items-center gap-3 mb-3">
            <label for="username" class="font-semibold w-6rem">Username</label>
            <InputText id="username" class="flex-auto" autocomplete="off" />
        </div>
        <div class="flex align-items-center gap-3 mb-3">
            <label for="email" class="font-semibold w-6rem">Email</label>
            <InputText id="email" class="flex-auto" autocomplete="off" />
        </div>
        <div class="flex align-items-center gap-3 mb-3">
            <label for="password" class="font-semibold w-6rem">Contraseña</label>
            <InputText id="password" class="flex-auto" autocomplete="off" />
        </div>
        <div class="flex align-items-center gap-3 mb-5">
            <label for="concepto" class="font-semibold w-6rem">Concepto</label>
            <InputText id="concepto" class="flex-auto" autocomplete="off" />
        </div>
        <div class="flex justify-content-end gap-2">
            <Button type="button" label="Cancelar" severity="secondary" @click="visible = false"></Button>
            <Button type="button" label="Solicitar" @click="visible = false"></Button>
        </div>
    </Dialog>


    <Dialog v-model:visible="reseña" modal header="Reseña" :style="{ width: '45rem' }">
        {{ console.log(usuarioReview) }}
        <div v-if="reviewCount <= 0">
            <span class="p-text-secondary block mb-5">Dejar tu Reseña para mejorar nuestro autoescuela</span>
            <div class="flex align-items-center gap-3 mb-5">
                <label  for="comentario" class="font-semibold w-6rem">Comentario</label>
                <InputText v-model="reviews.comentario" id="comentario" name="comentario" class="flex-auto" autocomplete="off" />
            </div>
            {{ errors.comentario }}
            <div class="flex justify-content-end gap-2">
                <Button type="button" label="Cancelar" severity="secondary" @click="reseña = false"></Button>
                <Button type="button" label="Solicitar" @click="commitReview"></Button>
            </div>
        </div>
        <div v-if="reviewCount > 0">
            <span class="p-text-secondary block mb-5">Ya has dejado tu comentario</span>
            <p>Tu Reseña: {{ usuarioReview.data[0]['review'] }}</p>
        </div>
    </Dialog>
</template>

<script setup>
// Import all the library 
import { ref, onMounted, reactive, createElementBlock, computed } from "vue";
import { useForm, useField } from "vee-validate";
import { es } from 'yup-locales';
import { setLocale } from 'yup';
import axios from 'axios';
import { useStore } from 'vuex';
import * as echarts from "echarts"; 
import Dialog from "primevue/dialog";
import { useRoute } from "vue-router";
import * as yup from 'yup';
import useStudent from "@/composables/student";
const { submitReview } = useStudent();
// import useUsers from "../../composables/users";
// const {users, getUsers, deleteUser} = useUsers()

// Mostrar el panel de Editar o no
const visible = ref(false);
const reseña = ref(false);
// Show the Information in DataTable
const testRealized = ref([]);
const usuarioReview = ref();
// Get all the student we have in bbdd
const students = ref();
const store = useStore();
const user = computed(() => store.state.auth.user)
const role = computed(() => store.state.auth.role)
let reviewCount = 0;

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


        // Busca todos los reviews que hay de este usaurio
        axios.get('/api/student/review/find/' + user.value['user_id'])
        .then(response => {
            usuarioReview.value = response.data;
            reviewCount = usuarioReview.value.data.length;
        })
        .catch(function (error) {
            strSuccess.value = ""
            strError.value = error.response.data.message
            swal({
                icon: "error",
                title: "No ha añadir tu comentario"
            })
        });

        init();
})


const testQuestionQuantity = ref([]);
const incompleteTestQuestionQuantiry = ref([]);



let valueMaked = 0;
let valueNoMaked = 0;

/** 
 *  Get the quantity of the question have in every test that the student
 *  maked and calculate the perventage of cert and error questions
 * */ 
const getTestQuantityAndCheck = ($idTest) =>{
    axios.get('/api/test/' + $idTest)
        .then(response => {
            testQuestionQuantity.value = response.data.data;
            getStudentTestQuestionQuantity($idTest); 
        })
        .catch(function (error) {
            console.log(error);
        });
}

const getStudentTestQuestionQuantity = ($idTest) =>{
    axios.get('/api/student/test' + '/' + user.value['user_id'] + '/' + $idTest)
        .then(response => {
            incompleteTestQuestionQuantiry.value = response.data.data;
            valueMaked = incompleteTestQuestionQuantiry.value.length / testQuestionQuantity.value.length * 100;
            valueNoMaked = 100 - valueMaked;

            init();

        })
        .catch(function (error) {
            console.log(error);
        });
}




// Create the circle graphic
const main = ref(); 
let myChart;

function init() {
    if(myChart){
        myChart.dispose();
    }
    myChart = echarts.init(main.value);
  var datas = [
    [
      { name: "Realizado", value: Math.floor(valueMaked) },
      { name: "Falta", value: Math.floor(valueNoMaked)},
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
        width: 400,
        label: {
          alignTo: "edge",
          formatter: "{name|{b}}\n{time|{c} %}",
          minMargin: 5,
          edgeDistance: 0,
          lineHeight: 40,
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

const home = ref({
    icon: 'pi pi-home',
    route: '/'
});
const items = ref([
    { label: 'Perfile', route: '/Profile' }
]);

const schema = yup.object({
    comentario: yup.string().required().label('Comentario'),
})


// Define the validate using form fields
const { validate, errors } = useForm({ validationSchema: schema })
const route = useRoute()
const { value: comentario } = useField('comentario', null, { initialValue: '' });
const reviews = reactive({
    comentario
})

function commitReview(){

    validate().then(form => {
        if (form.valid) submitReview(user.value['user_id'],reviews);
    })
   
}



</script>

<style scoped>
h3{
    margin: 0px;
}

.p-breadcrumb{
    border: none;
}
</style>
