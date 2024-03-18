<template>

    <div class="lg-container">

        <!-- Carrousel para mostrar los informaciones general de autoescuela -->
        <div id="carouselExampleAutoplaying" class="carousel slide border-bottom bg-white" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="col-12 d-flex">
                        <img src="/images/imagesCarrouselHome/comienzaAConducir.jpg" class="d-block col-12" alt="...">
                    </div>
                   
                </div>
                
            </div>
            <div class="cajaDeInformacion col-8 d-flex justify-content-center">
                <div class="col-12 d-flex justify-content-around cajaInformacionSegundario">
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
            <div class="informacionCarnet d-flex justify-content-between">
                <div class="col-4">
                    <h3>Tipo de Carnet</h3>
                    <p>Proporcionamos a los estudiantes dos tipos de permisos de conducir: permiso de conducir de automóvil y permiso de conducir de motocicleta. 
                        También puede encontrar formas y métodos para obtener otros permisos de conducir en nuestro sitio web.</p>
                    <div class="col-12 d-flex justify-content-around">
                        <div class="col-4 row align-items-end">
                            <img class="col-12" src="/images/assets/coche.png"  >
                        </div>
                        <div class="col-4">
                            <img class="col-12" src="/images/assets/motocicleta.png">
                        </div>
                    </div>
                </div>
                <div class="col-7 d-flex justify-content-between">
                    <div class="card col-6 cardCarnet">
                        <h3 class="pt-5">CARNET COCHE</h3>
                        <p class="mt-3">El permiso de conducción de automóviles requiere que los estudiantes realicen una serie de estudios teóricos de al menos 1 mes y al menos 20 lecciones de conducción.
                             Proporcionaremos a los estudiantes materiales de aprendizaje y maestros para ayudarlos en el aprendizaje.
                             <br>Si desea obtener información más detallada, haga clic en el botón para saltar.</p>
                        <div class="col-12 mt-4">
                            <router-link to="/info#carnetCoche" class="col-3 btn btn-primary">Ver Más</router-link>  
                        </div>
                    </div>
                    <div class="card col-6 ms-3 cardCarnet">
                        <h3 class="pt-5">CARNET MOTO</h3>
                        <p class="mt-3">El permiso de conducción de motocicletas requiere que los estudiantes realicen una serie de estudios teóricos de al menos 1 mes y al menos 20 lecciones de conducción.
                             Proporcionaremos a los estudiantes materiales de aprendizaje y maestros para ayudarlos en el aprendizaje.
                             <br>Si desea obtener información más detallada, haga clic en el botón para saltar.</p>
                        <div class="col-12 mt-4">
                            <router-link to="/info#carnetCoche" class="col-3 btn btn-primary">Ver Más</router-link>   
                        </div>
                        
                    </div>
                </div>
                
                
            </div>
        </section>

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
            <div class="d-flex col-12 justify-content-around bg-white pb-5">
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
                {{ index }}
            </div>
        </section>


        <!-- Create form for send message -->
        <section class="col-12 mt-5">
            <div class="d-flex justify-content-center position-relative">
                <img src="/images/assets/images.png" class="col-8">
                <div class="formlulario">
                    <h2 class="text-white">Contactar con Nosotros</h2>
                    <form class="row col-7 mt-3">
                        <input  class=" mt-5" placeholder="Nombre">
                        <input  class="mt-5" placeholder="Apelildo">
                        <input  class="mt-5" placeholder="Email"> 
                        <textarea  class="mt-5" style="resize: none; height: 200px;"></textarea>
                        <button  class="col-5 mt-5 btn btn-dark">Envia</button>
                    </form>
                </div>
            </div>
        </section>


    </div>
</template>


<style>

.formlulario{
    position: absolute;
    top: 3%;
    left: 50%;
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
    z-index: 1; 
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
</style>