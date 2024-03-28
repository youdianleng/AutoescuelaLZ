<template>
    <div class="col-12">
        <div class="padding30 card">
            <h2>Test Facil</h2>

            <div class="row">
                <div v-for="tes in test" :key="tes.id" class="col-md-2">
                    <div class="card">
                        <img src="/images/assets/images.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Test 1</p>
                            <router-link :to="{ name: 'Test' , params: { id: tes.level }}" class="btn btn-primary col-12">Realizar</router-link>
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
const { test, getFacilTest } = useTest();
const route = useRoute()



onMounted(() => {

    getFacilTest();
    console.log(test);

});



</script>

<style>
.padding30{
    padding: 30px!important;
}

.card{
    padding: 0px;
}

</style>