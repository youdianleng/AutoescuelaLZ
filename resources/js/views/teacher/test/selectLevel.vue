<template>
    <div class="card col-12">
        <div class="padding30 col-12 ">
            <h1>TEST</h1>
            <div class="d-flex justify-content-between col-12">
                <div class="col-4 card padding30">
       
                    <h3>{{ students.name }}</h3>
                    <div class="col-12">
                        <h4 class="mt-2">Has realizado: Test Facil</h4>
                        <h4 class="mt-3">Has realizado: Test Normal</h4>
                        <h4 class="mt-3">Has realizado: Test Dificil</h4>
                    </div>
                </div>
                <div class="col-7 card padding30">
                    <h3>Selecciona el nivel de Test</h3>
                    <div class="d-flex col-12 justify-content-around">
                        <router-link class="card col-3 padding60 text-center facil" :to="{ name: 'facilTests', params: { id: route.params.user_id } }">
                                <h4>Facil</h4>
                        </router-link>
                        
                        <router-link class="card col-3 padding60 text-center normal" to="normalTest">
                                <h4>Normal</h4>
                        </router-link>
                        
                        <router-link class="card col-3 padding60 text-center dificil" to="dificilTest">
                             <h4>Dificil</h4>
                        </router-link>
                        
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
import axios from 'axios';
import useOnMount from '@/composables/common';
const { getSpecificStudents, students} = useOnMount();
const route = useRoute()




onMounted(() => {

    getSpecificStudents(route.params.id);
   
})

</script>

<style>
h4{
    margin: 0px;
}

.padding30{
    padding: 30px;
}

.padding60{
    padding: 60px;
}

.card{
    margin: 0px;
}

.facil{
    background-color: lightgreen;
}

.normal{
    background-color: lightsalmon;
}

.dificil{
    background-color: lightcoral;
}
</style>