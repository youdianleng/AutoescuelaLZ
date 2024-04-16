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
                                <h2 class="d-flex justify-content-center col-12 text-white  mb-3 slimeTest">Comienza tu Camino aqui</h2>
                                <h2 class="d-flex justify-content-center col-12 text-white fw-bold grandText">Amable y Paciente</h2>
                                <h2 class="d-flex justify-content-center col-12 text-white fw-bold grandText">Tu Primer Opción</h2>
                                <h2 class="d-flex justify-content-center col-12 text-white  mt-3 pb-5 slimeTest">Comienza tu Camino aqui con Nosotros</h2>
                                <router-link to="/info" class="d-flex justify-content-center col-12 text-white  mt-3 slimeTest mt-5">
                                    <Button label="Informacion Autoescuela" />
                                </router-link>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>

            <div class="cajaDeInformacion col-8 d-flex justify-content-center">
                <div class="col-12 d-lg-flex justify-content-around cajaInformacionSegundario">
                    <div class="card cardInformacion">
                        <h3>ENSEÑANZA</h3>
                        <h5 class="mb-4">AMBIENTE CONFORTABLE</h5>
                        <p>La autoescuela ha pasado por una serie de pruebas para conseguir el ambiente más cómodo para los alumnos,
                             cada año también enviaremos un formulario para pedir a los alumnos su opinión y mejoras al respecto.
                        </p>
                    </div>
                    <div class="card cardInformacion">
                        <h3>NUESTRO PROFES</h3>
                        <h5 class="mb-4">AMABLE Y RESPONSABLE</h5>
                        <p>Cada profe es divertido y responsable y tiene al menos 15 años de experiencia en conducción y un rico conocimiento de respuesta a emergencias.
                        </p>
                    </div>
                    <div class="card cardInformacion mb-0">
                        <h3>PATRÓN EXAMEN</h3>
                        <h5 class="mb-4">EXAMEN COMPRENSIVO</h5>
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
            <div class="informacionCarnet d-lg-flex justify-content-between">
                <div class="col-lg-5 col-md-12 tipoCarnetPeque">
                    <div class="col-12 absoluteImgGalardonada">
                        <Image src="/images/imagesCarrouselHome/winner.png" alt="Image" width="100%" class="imgInfo"/>
                        <div class="backgroundContent d-flex align-items-end col-12">
                            <span class="ps-5 col-9 mb-4 d-flex">
                                <h2 class="galadonadaTexto fw-bold text-white">Escuela de manejo galardonada en la ciudad</h2>
                            </span>
                            <span class="col-3 ps-4">
                                <button class="circleButtonInfo mb-4">
                                    <i class="pi pi-arrow-right text-white"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <section class="col-lg-6 col-md-12 d-lg-flex  padding20 me-5">
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
                            <p class="fs-5">En nuestra autoescuela proporcionamos a los estudiantes permisos de conducir para dos tipos de vehículos, 
                            podemos garantizar que los estudiantes obtendrán sus permisos de conducir de la forma más rápida y sencilla.</p>
                        </div>
                        <div class="boxIcon">
                            <div class="d-flex col-12 justify-content-between">
                                <div class="IconTiposCarnets d-flex justify-content-center align-items-center col-3">
                                    <Image src="/images/assets/coche.png" alt="Image" width="60" class="imgInfo"/>
                                </div>
                                <div class="row align-items-end col-10">
                                    <div class="row align-items-end">
                                        <h4 class="fw-bold">Carnet Coche</h4>
                                        <p class="pt-1 textoOfrece">Ofrecemos planes de aprendizaje completos y correctos y canales de examen convenientes.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex col-12 justify-content-between mb-5">
                                <div class="IconTiposCarnets  d-flex justify-content-center align-items-center">
                                    <Image src="/images/assets/motocicleta.png" alt="Image" width="60" class="imgInfo"/>
                                </div>
                                <div class="row align-items-end col-10">
                                    <div class="row align-items-end">
                                        <h4 class="fw-bold">Carnet Moto</h4>
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
            <div class="col-4">
                <p class="text-danger fs-4">Estas Preparado?</p>
                <h2 class="text-white fw-bold">Nuestros Estudiantes Pasado el Examen</h2>
                <router-link to="contacto">
                    <Button label="Contactar con Nosotros" class="mt-5" />
                </router-link>
            </div>

            <div class="col-7 d-flex justify-content-around">
                <div class="squarePasadoExamen col-3 d-flex align-items-center">
                    <div class="col-12">
                        <h2 class="d-flex justify-content-center text-white fw-bold">1</h2>
                        <p class="d-flex justify-content-center fw-bold">Matriculado</p>
                    </div>
                </div>
                <div class="squarePasadoExamen col-3 d-flex align-items-center">
                    <div class="col-12">
                        <h2 class="d-flex justify-content-center text-white fw-bold">1</h2>
                        <p class="d-flex justify-content-center fw-bold">satisfacción</p>
                    </div>
                </div>
                <div class="squarePasadoExamen col-3 d-flex align-items-center">
                    <div class="col-12">
                        <h2 class="d-flex justify-content-center text-white fw-bold">1</h2>
                        <p class="d-flex justify-content-center fw-bold">Mejor profesor</p>
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
                            <img src="/images/assets/LZ.png" style="height: 30px;">
                            <h3 class="d-flex justify-content-center ms-2">Autoescuela Perfecta</h3>
                        </div>
                        <h1>NUESTRO ESTUDIANTES DESTACADAS</h1>
                        
                    </div>
                </div>
            </div>
            <div class="d-flex col-12 justify-content-around bg-white pb-5 resenyaCol12">
                <div v-for="index in 4" :key="index" class="card bg-body-tertiary estudianteDestacada">
                    <img :src="`/images/imgEstudianteDestacada/Estudiante${index}.png`">
                    <div class="mt-4">
                        <h3>MENSAJE ESTUDIANTIL</h3>
                        <h4>Henry Joseph</h4>
                        <div class="mt-2">
                            <img src="/images/assets/Estrella.png" class="col-1" style="padding-left: 0px;" >
                            <img src="/images/assets/Estrella.png" class="col-1" style="padding-left: 0px;">
                            <img src="/images/assets/Estrella.png" class="col-1" style="padding-left: 0px;">
                            <img src="/images/assets/Estrella.png" class="col-1" style="padding-left: 0px;">
                            <img src="/images/assets/Estrella.png" class="col-1" style="padding-left: 0px;">
                        </div>
                        <p>
                            ¡El ambiente de enseñanza perfecto! ! Profesores y compañeros muy amables, 
                            siempre que tengo dudas o problemas siempre se pueden solucionar a tiempo.
                            Si alguna vez planeo tomar otro examen de licencia de conducir,
                            ¡aun así vendré aquí!
                        </p>
                    </div>
                </div>
            </div>


            <div class="card">
                <Carousel :value="products" :numVisible="3" :numScroll="1" :responsiveOptions="responsiveOptions">
                    <template #item="slotProps">
                        <div class="border-1 surface-border border-round m-2  p-3">
                            <div class="mb-3">
                                <div class="relative mx-auto">
                                    <img :src="'https://primefaces.org/cdn/primevue/images/product/' + slotProps.data.image" :alt="slotProps.data.name" class="w-full border-round" />
                                    <Tag :value="slotProps.data.inventoryStatus" :severity="getSeverity(slotProps.data.inventoryStatus)" class="absolute" style="left:5px; top: 5px"/>
                                </div>
                            </div>
                            <div class="mb-3 font-medium">{{ slotProps.data.name }}</div>
                            <div class="flex justify-content-between align-items-center">
                                <div class="mt-0 font-semibold text-xl">${{ slotProps.data.price }}</div>
                                <span>
                                    <Button icon="pi pi-heart" severity="secondary" outlined />
                                    <Button icon="pi pi-shopping-cart" class="ml-2"/>
                                </span>
                            </div>
                        </div>
                    </template>
                </Carousel>
            </div>
        </section>

    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
    const products = ref();
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


.estudianteDestacada{
    padding: 40px;
    width: 24%;
    margin-bottom: 0px;
}

.caja-inferior {

    margin-top: 250px; /* Ajusta el espacio entre la caja inferior y el cuadro */
}

.informacionCarnet{
    padding: 90px;
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

@media only screen and (max-width: 1150px) {
    .cajaInformacionSegundario{
        visibility: hidden;
        padding: 10px;
    }
    .caja-inferior{
        margin: 0px;
    }

    .informacionCarnet{
        padding: 0px;
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
</style>