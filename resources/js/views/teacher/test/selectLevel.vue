<template>
    <div>
        <div class="imgTopVia">
        <Image src="/images/test/test.jpg" alt="Image" width="100%" />
        
        </div>
        <div class="shadow">
        
    </div>
    <h1 class="SobreNosotroText d-flex align-items-center text-white justify-content-center">
        <div class="row justify-content-center">
            <p class="d-flex justify-content-center">NIVELES DE PRUEBA SELECCIONABLES</p>
        </div>
    </h1>
    <div class="card col-12">
            <div class=" col-12">


                
                <div class="col-12 padding30">
                    <div class="col-12">
                        <h2 class="d-flex justify-content-center fw-bold">TEST COMPLETADOS</h2>
                        <h4 class="mt-2 d-flex justify-content-center">Numero de Tests Completados: {{ StudentMadeTest.length }}</h4>
                    </div>
                </div>
                <div class="col-xl-12 padding30">
                    <h2 class="d-flex justify-content-center fw-bold">SUGERENCIA</h2>
                    <div class="d-flex justify-content-center mt-5 col-xl-12">
                        <div class="d-flex justify-content-around col-xl-12">
                            <div class="col-xl-2 card ">
                                <div class="col-xl-12 d-flex justify-content-center">
                                    <svg width="60" height="60" xmlns="http://www.w3.org/2000/svg" >
                                        <image xlink:href="/images/test/uno.svg" width="60" height="60" />
                                    </svg>
                                </div>
                                <p class="mt-3 text-justify">Comprender las respuestas en lugar de memorizarlas.</p>
                                
                            </div>
                            <div class="col-xl-2 card ">
                                <div class="col-xl-12 d-flex justify-content-center">
                                    <svg width="60" height="60" xmlns="http://www.w3.org/2000/svg">
                                        <image xlink:href="/images/test/dos.svg" width="60" height="60" />
                                    </svg>
                                </div>
                                <p class="mt-3 text-justify">La respuesta puede no ser única, ¿tal vez haya múltiples?</p>
                            </div>
                            <div class="col-xl-2 card ">
                                <div class="col-xl-12 d-flex justify-content-center">
                                    <svg width="60" height="60" xmlns="http://www.w3.org/2000/svg">
                                        <image xlink:href="/images/test/tres.svg" width="60" height="60" />
                                    </svg>
                                </div>
                                <p class="mt-3 text-justify">Presta más atención a las imágenes, te ayudará mucho.</p>
                            </div>
                            <div class="col-xl-2 card">
                                <div class="col-xl-12 d-flex justify-content-center">
                                    <svg width="60" height="60" xmlns="http://www.w3.org/2000/svg">
                                        <image xlink:href="/images/test/cuatro.svg" width="60" height="60" />
                                    </svg>
                                </div>
                                <p class="mt-3 text-justify">Finalmente, cree en ti mismo y no cambies tu elección.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 padding30 mt-5">
                    <div class="col-xl-12">
                        <h2 class="d-flex justify-content-center fw-bold">SELECCIONA EL NIVEL DE PRUEBA</h2>
                    </div>
                    <div class="d-xl-flex col-12 justify-content-between mt-5">
                        <div class="col-xl-8 row justify-content-between">
                                <div class="col-xl-6 padding30">
                                    <div class="col-xl-12 d-flex">
                                        <router-link class=" col-xl-4 col-xs-12 text-center d-flex align-items-center" :to="{ name: 'facilTests', params: { id: route.params.user_id } }">
                                            <svg width="60" height="60" xmlns="http://www.w3.org/2000/svg">
                                                <image xlink:href="/images/test/easy.svg" width="60" height="60" />
                                            </svg>
                                        </router-link>
                                        <h3 class="col-xl-7 ms-2 fw-bold">PREGUNTAS TESTS SIMPLES</h3>
                                    </div>
                                    <div class="col-xl-12 mt-3 textBox">
                                        <p>Aquí aparecerán varios tipos de pruebas que podemos observar en tiempos normales, como aceleración, posición de freno, funcionamiento de luces indicadoras y otras cuestiones similares.</p>
                                    </div>
                                    <div class="col-xl-12 d-flex justify-content-end mt-3">
                                        <router-link class="buttonRealizar card col-xl-4 col-xs-12 text-center facil" :to="{ name: 'facilTests', params: { id: route.params.user_id } }">
                                            <p class="text-white fw-bold">Realizar</p>
                                        </router-link>
                                    </div>
                                </div>
                                <div class="col-xl-6 padding30">
                                    <div class="col-xl-12 d-flex">
                                        <router-link class="col-xl-4 col-xs-12 text-center d-flex align-items-center" :to="{ name: 'facilTests', params: { id: route.params.user_id } }">
                                            <svg width="60" height="60" xmlns="http://www.w3.org/2000/svg">
                                                <image xlink:href="/images/test/medium.svg" width="60" height="60" />
                                            </svg>
                                        </router-link>
                                        <h3 class="col-xl-7 ms-2 fw-bold">PREGUNTAS TESTS NORMALES</h3>
                                    </div>
                                    <div class="col-xl-12 mt-3 textBox">
                                        <p>Aquí habrá problemas un poco más difíciles, generalmente más cercanos al funcionamiento de los vehículos y a las señales, como por ejemplo: cómo conducir en la zona de construcción, qué restricciones existen en la ciudad, etc.</p>
                                    </div>
                                    <div class="col-xl-12 d-flex justify-content-end mt-3">
                                        <router-link class="buttonRealizar card col-xl-4 col-xs-12 text-center facil" :to="{ name: 'normalTests', params: { id: route.params.user_id } }">
                                            <p class="text-white fw-bold">Realizar</p>
                                        </router-link>
                                    </div>
                                </div>
                                <div class="col-xl-6 padding30">
                                    <div class="col-xl-12 d-flex">
                                        <router-link class=" col-xl-4 col-xs-12 text-center d-flex align-items-center" :to="{ name: 'facilTests', params: { id: route.params.user_id } }">
                                            <svg width="60" height="60" xmlns="http://www.w3.org/2000/svg">
                                                <image xlink:href="/images/test/hard.svg" width="60" height="60" />
                                            </svg>
                                        </router-link>
                                        <h3 class="col-xl-7 ms-2 fw-bold">PREGUNTAS TESTS DIFICIL</h3>
                                    </div>
                                    <div class="col-xl-12 mt-3 textBox">
                                        <p>Esta será la situación más difícil y rara. Solo la encontraremos en muy pocas situaciones, como por ejemplo: cómo rescatar en un accidente automovilístico, cómo operar en la escena de un desastre, etc.</p>
                                    </div>
                                    <div class="col-xl-12 d-flex justify-content-end mt-3">
                                        <router-link class="buttonRealizar card col-xl-4 col-xs-12 text-center facil" :to="{ name: 'dificilTests', params: { id: route.params.user_id } }">
                                            <p class="text-white fw-bold">Realizar</p>
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 card fondoColorPregunta text-white">
                                <div class="col-xl-12 d-flex justify-content-center mt-4 ">
                                    <h4 class="fw-bold text-white">COMENTARIOS DE PREGUNTAS</h4>
                                </div>
                                <div class="col-xl-12 d-flex justify-content-center mt-4">
                                    <p class="fw-bold text-justify">Si encuentra algún error o confusión durante la prueba, utilice este formulario para enviarnos un informe.</p>
                                </div>
                                <div class="col-xl-12 d-flex justify-content-center mt-5 inputBox"> 
                                    <InputText type="text" v-model="value" class="col-xl-10" placeholder="Nombre"/>
                                </div>
                                <div class="col-xl-12 d-flex justify-content-center inputBox"> 
                                    <InputText type="text" v-model="value" class="col-xl-10" placeholder="Email"/>
                                </div>
                                <div class="col-xl-12 d-flex justify-content-center inputBox"> 
                                    <InputText type="text" v-model="value" class="col-xl-10" placeholder="Profe Asignado" />
                                </div>
                                <div class="col-xl-12 d-flex justify-content-center inputBox"> 
                                    <Textarea  rows="7" cols="42" placeholder="Introduce el Nivel de Test, Numero de Pregunta y Detalle de Error" />
                                </div>
                                <div class="col-xl-12 d-flex justify-content-center inputBox pt-5"> 
                                    <router-link class="buttonRealizarPregunta card col-xl-8 col-xs-12 text-center facil" :to="{ name: 'facilTests', params: { id: route.params.user_id } }">
                                        <p class=" fw-bold">Enviar</p>
                                    </router-link>
                                </div>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
// import the library
import { ref, onMounted, reactive } from "vue";
import { useForm, useField } from "vee-validate"; 
import { useRoute } from "vue-router";
import * as yup from 'yup';
import axios from 'axios';
import useSelectLevel from '@/composables/selectLevel';
import useOnMount from '@/composables/common';
import InputText from 'primevue/inputtext';
import Textarea from 'primevue/textarea';
const { createFindMadedTest, StudentMadeTest } = useSelectLevel();
const { getSpecificStudents, students} = useOnMount();
const route = useRoute()




onMounted(() => {
    //call the function when the page is loaded
    getSpecificStudents(route.params.id);
    createFindMadedTest(route.params.id);
})



</script>

<style>

.imgTopVia{
        position: absolute;
        height:  350px;
        overflow: hidden;
        z-index: 0;
    }

    .shadow{
        position: absolute;
        width: 100%;
        height: 350px;
        background-color: black;
        z-index: 5;
        opacity: 0.5;
    }

    .SobreNosotroText{
        position: relative;
        width: 100%;
        height: 350px;
        margin: 0px;
        z-index: 6;
        font-size: 60px;
        font-weight: 800;
    }

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


.buttonRealizar{
    padding: 10px;
    border-radius: 25px;
    background-color: black;
}
.buttonRealizarPregunta{
    padding: 10px;
    border-radius: 25px;
    background-color: white;
    color: #D52323;
}

.buttonRealizarPregunta:hover{
    background-color: transparent;
    color: white;
    transition-duration: 1s;
}

.textBox{
    height: 120px;
}

.text-justify{
    text-align: justify;
}

.fondoColorPregunta{
    background-color: #D52323;
}

.inputBox{
    margin-top: 20px;
}

@media only screen and (max-width: 576px) {

    .testsLevel{
        margin-top: 30px;
    }
}


</style>