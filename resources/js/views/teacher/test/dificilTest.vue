<template>
    <div class="col-12">
        <div class="padding30 card">
            <h2 class="d-flex justify-content-center fw-bold">PRUEBAS FACILES</h2>

            <div class="row">
                <div v-for="(tes, index) in test" :key="tes.id" class="col-md-3">
                    <div vclass="card">
                        <img src="/images/assets/images.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text fw-thin">Test {{ index+1 }}</p>
                            <router-link :to="{ name: 'Test' , params: { level: tes.level, id: tes.id }}" class="btn btn-primary col-12">Realizar</router-link>
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
import axios from 'axios';
import useTest from "@/composables/test";
const { test, getDificilTest } = useTest();
const route = useRoute()



onMounted(() => {
    
    getDificilTest();
    console.log(test);

});



</script>

<style>
@import '/resources/css/facilTest.css';
</style>