<template>

    <div class="lg-container">

        <!-- Carrousel para mostrar los informaciones general de autoescuela -->
        <div id="carouselExampleAutoplaying" class="carousel slide border-bottom bg-white" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="col-12 d-flex">
                        <img src="/images/imagesCarrouselHome/comienzaAConducir.jpg" class="d-block col-12" alt="...">
                        <div class="shadowPortada row align-items-center col-12">
                            
                        </div>
                        <div class="d-flex align-items-center contentShadowBox col-12">
                            <div id="contentBox" class="col-12">
                                <h2 class="d-flex justify-content-center col-12 text-white  mb-3 slimeTest mainText">Comienza tu Camino aqui</h2>
                                <h2 class="d-flex justify-content-center col-12 text-white fw-bold grandText">Amable y Paciente</h2>
                                <h2 class="d-flex justify-content-center col-12 text-white fw-bold grandText">Tu Primer Opción</h2>
                                <h2 class="d-flex justify-content-center col-12 text-white  mt-3 pb-5 slimeTest mainText">Comienza tu Camino aqui con Nosotros</h2>
                                <router-link to="/info" class="d-flex justify-content-center col-12 text-white  mt-3 slimeTest mt-5">
                                    <Button class="buttonInfo" label="Informacion Autoescuela" />
                                </router-link>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>

            <div class="cajaDeInformacion col-8 d-flex justify-content-center">
                <div class="col-12 d-lg-flex justify-content-around cajaInformacionSegundario">
                    <div class="card cardInformacion">
                        <h3 class="fw-bold">ENSEÑANZA</h3>
                        <h6 class="mb-4">AMBIENTE CONFORTABLE</h6>
                        <p>La autoescuela ha pasado por una serie de pruebas para conseguir el ambiente más cómodo para los alumnos,
                             cada año también enviaremos un formulario para pedir a los alumnos su opinión y mejoras al respecto.
                        </p>
                    </div>
                    <div class="card cardInformacion">
                        <h3 class="fw-bold">NUESTRO PROFES</h3>
                        <h6 class="mb-4">AMABLE Y RESPONSABLE</h6>
                        <p>Cada profe es divertido y responsable y tiene al menos 15 años de experiencia en conducción y un rico conocimiento de respuesta a emergencias.
                        </p>
                    </div>
                    <div class="card cardInformacion mb-0">
                        <h3 class="fw-bold">PATRÓN EXAMEN</h3>
                        <h6 class="mb-4">EXAMEN COMPRENSIVO</h6>
                        <p>La autoescuela ha pasado por una serie de pruebas para conseguir el ambiente más cómodo para los alumnos,
                             cada año también enviaremos un formulario para pedir a los alumnos su opinión y mejoras al respecto.
                        </p>
                    </div>
                </div>
            </div>
           
        </div>
        

        <!-- Crear el section de Informacion de Coche y Informacion de Motos -->
        <div class="caja-inferior">

        </div>
        <section class="col-12">
            <div class="informacionCarnet d-xl-flex justify-content-xl-between justify-content-sm-center ">
                <div class="col-xl-5 col-sm-8 tipoCarnetPeque">
                    <div class="col-12 absoluteImgGalardonada">
                        <Image src="/images/imagesCarrouselHome/winner.png" alt="Image" width="100%" class="imgInfo"/>
                        <div class="backgroundContent d-flex align-items-end col-12">
                            <span class="ps-5 col-9 mb-4 d-flex">
                                <h2 class="galadonadaTexto fw-bold text-white">Escuela de manejo galardonada en la ciudad</h2>
                            </span>
                            <span class="col-3 ps-4 bottonInfo">
                                <button class="circleButtonInfo mb-4">
                                    <i class="pi pi-arrow-right text-white"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <section class="col-xl-6 col-sm-12 d-lg-flex  padding20 me-md-5">
                    <article>
                        <div class="d-flex">
                            <h3><<<</h3>
                            <p>Tipos de Carnet</p>
                            <h3>>>></h3>
                        </div>
                        <div class="mt-2">
                            <h2 class="fw-bold h2Autoescuela">Por qué deberías elegir nuestro Autoescuela?</h2>
                        </div>
                        <div class="mt-2">
                            <p class="fs-5 proporcionamosP">En nuestra autoescuela proporcionamos a los estudiantes permisos de conducir para dos tipos de vehículos, 
                            podemos garantizar que los estudiantes obtendrán sus permisos de conducir de la forma más rápida y sencilla.</p>
                        </div>
                        <div class="boxIcon">
                            <div class="d-flex col-12 justify-content-between">
                                <div class="IconTiposCarnets d-flex justify-content-center align-items-center col-3">
                                    <Image src="/images/assets/coche.png" alt="Image" width="100%"/>
                                </div>
                                <div class="row align-items-end col-md-10 col-xs-12">
                                    <div class="row align-items-end ms-3">
                                        <h4 class="fw-bold textoOfreceH4">Carnet Coche</h4>
                                        <p class="pt-1 textoOfrece">Ofrecemos planes de aprendizaje completos y correctos y canales de examen convenientes.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex col-12 justify-content-between mb-5">
                                <div class="IconTiposCarnets d-flex justify-content-center align-items-center col-3">
                                    <Image src="/images/assets/motocicleta.png" alt="Image" width="100%"/>
                                </div>
                                <div class="row align-items-end col-md-10 col-xs-12">
                                    <div class="row align-items-end ms-3">
                                        <h4 class="fw-bold textoOfreceH4">Carnet Moto</h4>
                                        <p class="pt-1 textoOfrece">Ofrecemos lugares de práctica de motocicletas, servicios de apoyo y profesores profesionales.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </section>
                
                
                
            </div>
        </section>
        <div>
            <div class="col-12 imgTopVia">
                <Image src="/images/imagesCarrouselHome/Conduccion_segura.jpg" alt="Image" width="100%" height="100%" />
                
            </div>
            <div class="shadow">
                
            </div>
        </div>
        <div class="SobreNosotroText d-flex align-items-center justify-content-around text-white pb-5 col-12 ">
            <div class="col-md-4">
                <p class="text-danger fs-4 preparado">Estas Preparado?</p>
                <h2 class="text-white fw-bold">Nuestros Record</h2>
                <router-link to="contacto">
                    <Button label="Contactar con Nosotros" class="mt-5 buttonContactar" />
                </router-link>
            </div>

            <div class="col-7 d-md-flex justify-content-around">
                <div class="squarePasadoExamen col-md-3 col-xs-12 d-flex align-items-center">
                    <div class="col-12">
                        <h2 class="d-flex justify-content-center text-white fw-bold">3M +</h2>
                        <p class="d-flex justify-content-center fw-bold">Matriculado</p>
                    </div>
                </div>
                <div class="squarePasadoExamen col-md-3 col-xs-12 d-flex align-items-center">
                    <div class="col-12">
                        <h2 class="d-flex justify-content-center text-white fw-bold">11M +</h2>
                        <p class="d-flex justify-content-center fw-bold">Satisfacción</p>
                    </div>
                </div>
                <div class="squarePasadoExamen col-md-3 col-xs-12 d-flex align-items-center">
                    <div class="col-12">
                        <h2 class="d-flex justify-content-center text-white fw-bold">70 +</h2>
                        <p class="d-flex justify-content-center fw-bold">Profesor</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Create the section for student message -->
        <section class="col-12">
            <div class="informacionCarnet bg-white">
                <div class="col-12 d-flex justify-content-center">
                    <div>
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="/images/assets/LZ.png" >
                            <h3 class="d-flex justify-content-center ms-2">Autoescuela Perfecta</h3>
                        </div>
                        <h1 class="d-flex justify-content-center">NUESTRO ESTUDIANTES DESTACADAS</h1>
                        
                    </div>
                </div>

                <div class="cardCarousel col-12">
                    <Carousel :value="allReview" :numVisible="2" :numScroll="1" :responsiveOptions="responsiveOptions">
                        <template #item="slotProps" class="col-6">
                            <div class="border-1 surface-border border-round m-2  p-3" style="height: 100%;">
                                <div class="mb-3">
                                    <div class="mx-auto">
                                        <img :src="`${slotProps.data.media[0].original_url}`" class="w-full border-round" height="350">
                                    </div>
                                </div>
                                <div class="mb-3 fs-1">{{ slotProps.data.name }}</div>
                                <div class="col-12 textoReview" v-if="slotProps.data.review_student.length > 0">
                                    <p>{{ slotProps.data.review_student[0].review }}</p>
                                </div>
                            </div>
                            
                        </template>
                    </Carousel>
                </div>
            </div>
            
            <div class="d-flex col-12 justify-content-around bg-white pb-5 resenyaCol12">
                <div v-for="index in allReview" :key="index" class="card bg-body-tertiary estudianteDestacada">
                    <img v-if="index.review_student.length > 0" :src="`${ index.media[0].original_url }`" width="100%" height="299">
                    <div v-if="index.review_student.length > 0" class="mt-4">
                        <h3>MENSAJE ESTUDIANTIL</h3>
                        <h4 class="mt-3">{{ index.name }}</h4>
                        <p class="mt-4" v-if="index.review_student.length > 0">
                            {{ index.review_student[0].review }}
                        </p>
                    </div>
                </div>
            </div>
        </section>

    </div>
</template>

<script setup>
// import library
import { ref, onMounted } from "vue";
import useReview from "@/composables/review";
const { getReviews,allReview } = useReview();


onMounted(() => {
    // function that gonna search all the student, Teacher and License in our database
    getReviews();
   
})
    // Where we store all the review we want to show

    // This part of code use for show amount of review in responsive mode
    const responsiveOptions = ref([
    {
        breakpoint: '1400px',
        numVisible: 2,
        numScroll: 1
    },
    {
        breakpoint: '1199px',
        numVisible: 3,
        numScroll: 1
    },
    {
        breakpoint: '767px',
        numVisible: 2,
        numScroll: 1
    },
    {
        breakpoint: '575px',
        numVisible: 1,
        numScroll: 1
    }
]);
</script>

<style>
@import '/resources/css/home.css';
@import '/resources/css/common.css';
</style>