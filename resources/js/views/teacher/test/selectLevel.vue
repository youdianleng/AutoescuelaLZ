<template>
    <div class="card col-12">
        <div class="padding30 col-12 ">
            <h1>TEST</h1>
            <div class=" col-12">
                <div class="col-12 card padding30">
                    {{ StudentMadeTest }}
                    <h3>{{ students.name }}</h3>
                    <div class="col-12">
                        <h2>Test Completados</h2>
                        <h4 class="mt-2">Numero de Tests Completados</h4>
                    </div>
                </div>
                <div class="col-12 card padding30 mt-5">
                    <h2>Selecciona el nivel de Test</h2>
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
import useSelectLevel from '@/composables/selectLevel';
import useOnMount from '@/composables/common';
const { createFindMadedTest, StudentMadeTest } = useSelectLevel();
const { getSpecificStudents, students} = useOnMount();
const route = useRoute()




onMounted(() => {

    getSpecificStudents(route.params.id);
    createFindMadedTest(route.params.id);
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
    padding: 40px;
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