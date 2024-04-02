<template>
    <div class="grid">
        <div v-if="questionId" class="col-12">
            <div class="card">
                <h2>TEST Nº1</h2>
                <div class="row">
                    
                    <h2>1. {{ questionId.question }}</h2>
                    <div class="col-2">
                        <img src="/testImages/question1.jpg" alt="" height="200px" width="200px">
                    </div>
                    <div class="col-10">
                        <p v-if="questionId['options']">a. {{ questionId['options'][0]['option_text'] }}</p>
                        <p v-if="questionId['options']">b. {{ questionId['options'][1]['option_text'] }}</p>
                        <p v-if="questionId['options']">c. {{ questionId['options'][2]['option_text'] }} </p>
                    </div>
                    <button @click.prevent="showNextQuestion" class="btn btn-success bg-blue-700">Siguiente</button>
                </div>
                <div class="row mt-5">
                    <div v-for="Question in questions" class="card mr-2 bg-teal-300"
                        style="width: 5px; height: 5px; align-items: center; justify-content: center;">
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
import { routerKey, useRoute } from "vue-router";
import * as yup from 'yup';
import { es } from 'yup-locales';
import { setLocale } from 'yup';
import axios from 'axios';
import { useStore } from 'vuex';

const questions = ref();
const store = useStore();
const user = computed(() => store.state.auth.user)
const role = computed(() => store.state.auth.role)
const route = useRoute()


let contador = 0;


onMounted(() => {
    // getQuestions();
    axios.get('/api/question/' + route.params.level)
        .then(response => {
            questions.value = response.data;

            questionId = questions.value[contador];
        })
        .catch(function (error) {
            console.log(error);
        });
})
let questionId = ref([contador]);

const showNextQuestion = () =>{
    contador = contador + 1;
    questionId = questions.value[contador];
    console.log(questionId);
}
</script>
