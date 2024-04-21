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

.textoReview #text{
    width: 50%;
}


.estudianteDestacada{
    padding: 40px;
    width: 24%;
    margin-bottom: 0px;
}

.caja-inferior {

    margin-top: 250px; /* Ajusta el espacio entre la caja inferior y el cuadro */
}

.informacionCarnet{
    padding: 60px;
}

.cardCarnet{
    padding: 30px;
    text-align: justify;
    box-shadow: 1px 0px 5px 1px;
    margin-bottom: 0px;
}

.cardCarnet button{
    float: right;
}

.carouselExampleIndicators{
    padding: 7rem 2rem 2rem 4rem;
}

.col-12{
    padding: 0px;
}

p{
    margin: 0px;
}

h2{
    margin: 0px;
}

h3{
    margin: 0px;
}

h4{
    margin: 0px;
}

h5{
    margin: 0px;
}
h6{
    margin: 0px;
}

.mb-0{
    margin-bottom: 0px;
}

.boxInformacionAmbiento{
    padding: 20px;
}

.imgMoto{
    padding: 60px;
}

.imgCoche{
    padding: 60px;
}

.informacionCoche{
    padding: 30px;
}
.cajaDeInformacion{
    position: absolute;
    top: 100%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 20px;
    border-radius: 10px;
    z-index: 4; 
}

.cajaInformacionSegundario{
    padding-top: 20px;
    padding-bottom: 20px;
    border-radius: 10px;
}

.cardInformacion{
    width: 30%;
    box-shadow: 0px 0px 2px 1px;
    text-align: center;
    margin-bottom: 0px;
}

.cardInformacion p{
    text-align: start;
}


.informacionMoto{
    padding: 30px;
}

.informacionAlumno{
    padding: 30px;
}

.opinionesAlumnoCard{
    padding: 20px;
}

.cardAlumno{
    border-radius: 10px;
}

.cajaSecundarioAlumno{
    height: 100%;
}

.cardAlumno{
    height: 100%;
}

.formularioContacto{
    margin-top: 50px;
    width: 50%;
}

.botonEnvio{
    width: 50%;
    float: right;
}
textarea {
    height: 86px;
    resize: none;
}

.backgroundContent{
    width: 100%;
    height: 275px;
    position: absolute;
    bottom: 0;
    left: 0;
    background: linear-gradient(180deg, #EC2526 36.46%, rgba(236, 37, 38, 0) 170.55%);
    clip-path: polygon(0 0, 100% 35%, 100% 100%, 0% 100%);
}
.tipoCarnetPeque{
    position: relative
}

.imgInfo{
    position: relative;
    width: 60px;
    height: 60px;
}

.circleButtonInfo{
    width: 80px;
    height: 80px;
    border-radius: 500px;
    background: black;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: all .4s ease-in-out;
}

.h2Autoescuela{
    font-size: 30px;
}

.IconTiposCarnets{
    margin-top: 30px;
    height: 90px;
    width: 90px;
    background-color: red;
    border-radius: 500px;
    transition-duration: 0.5s;
    cursor: pointer;
}

.IconTiposCarnets:hover{
    background-color: white;
    border: 1px solid black;
}

.textoOfrece{
    font-size: 1rem;
}

.absoluteImgGalardonada{
    position: relative;
}

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
        padding-left: 10%;
        z-index: 6;
        font-weight: 800;
    }

    .squarePasadoExamen{
        padding: 20px;
        height: 200px;
        backdrop-filter: blur(10px);
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.15);
        transition-duration:1s;
    }

    .squarePasadoExamen:hover{
        background-color:#D61819;
    }

    .cardCarousel{
        display: none;
    }

.shadowPortada{
    position: absolute;
    z-index: 2;
    width: 100%;
    height: 100%;
    background-color: black;
    opacity: 0.4;
    margin: 0px;
}

.contentShadowBox{
    position: absolute;
    z-index: 3;
    width: 100%;
    height: 100%;
}

.grandText{
    font-size: 74px;
    font-family:Arial, Helvetica, sans-serif;
}

.slimeTest{
    font-size: 20px;
}

.p-carousel-item{
    width: 50%;
}

@media only screen and (max-width: 1200px) {
    .cajaInformacionSegundario{
        visibility: hidden;
        padding: 10px;
    }
    .caja-inferior{
        margin: 0px;
    }

    .informacionCarnet{
        padding: 30px;
    }

    .tipoCarnetPeque{
        padding: 20px;
    }

    .cardCarnet{
        padding: 20px;
        margin: 0px!important;
    }

    .padding20{
        padding: 20px;
    }
    .motoTopMargin{
        margin-top: 20px!important;
    }

    .resenyaCol12{
        visibility: hidden;
        height: 0px;
    }
    .resenyaCol6{
        visibility: visible;
    }

    .iconCoches{
        display: none!important;;
    }

    .cardCarousel{
        visibility: visible;
        display: block;
    }

    .cardInformacion{
        display: none;
    }

    .squarePasadoExamen h2{
        font-size: 20px;
    }

    .p-carousel-indicators{
        display: none;
    }
}

@media only screen and (max-width: 760px) {
    #contentBox h2{ 
        font-size: 13px;
        padding-bottom: 0px!important;
    }
    
    .mainText{
        font-size: 16px!important;
        margin-bottom: 0.3rem!important;
        margin-top: 0px!important;
    }

    .buttonInfo{
        width: 50%;
        font-size: 10px;
    }
    .carousel-inner{
        height: 100%;
    }
    .backgroundContent{
        height: 50%;
    }
    .galadonadaTexto{
        font-size: 15px;
    }

    .bottonInfo{
        padding: 0px!important;
    }

    .circleButtonInfo{
        width: 40px;
        height: 40px;
    }

    .h2Autoescuela{
        font-size: 18px;
    }
    .proporcionamosP{
        font-size: 11px!important;
        margin-bottom: 15px!important;
    }

    .textoOfrece{
        font-size: 8px;
    }

    .IconTiposCarnets{
        width: 50px;
        height: 50px;
    }

    .textoOfreceH4{
        font-size: 13px;
    }

    .informacionCarnet{
        padding-bottom: 0px;
    }

    .SobreNosotroText h2{
        font-size: 15px;
    }

    .preparado{
        font-size: 16px!important;
    }

    .buttonContactar{
        width: 90%;
        font-size: 8px;
        padding: 10px;
    }
    .squarePasadoExamen{
        height: 50px;
        margin-top: 10px;
    }

    .informacionCarnet h1{
        font-size: 15px;
    }

    ..p-carousel-indicators{
        display: block;
    }

    .w-full{
        height: 200px!important;
    }
}
</style>