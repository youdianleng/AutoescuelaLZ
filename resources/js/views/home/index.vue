<template>

    <div class="lg-container">

        <!-- Carrousel para mostrar los informaciones general de autoescuela -->
        <div id="carouselExampleAutoplaying" class="carousel slide border-bottom bg-white" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="col-12 d-flex">
                        <img src="/images/imagesCarrouselHome/comienzaAConducir.jpg" class="d-block col-12" alt="..." height="700px">
                    </div>
                
                </div>
            </div>
        </div>

        <!-- Crear el section de Informacion de Coche y Informacion de Motos -->
        <h3 class="d-flex justify-content-center">Información Sobre Carnets</h3>
        <div class="col-12 d-flex justify-content-center mb-4">
            <img src="/images/assets/flechaAbajo.png"  width="100px">
        </div>
        
        <section class="col-12">
            <!-- Creado para informaciones de Coche -->
            <article class="col-12 d-flex border-top">
                <div class="col-6 informacionCoche bg-white">
                    <h5>Como puedo sacar carnet de <strong>Coche</strong> ?</h5>
                    <h6>Carnet Coche en AutoescuelaLZ</h6>
                    <p class="mt-5 mb-5">Para poder sacar el carnet de Coche en AutoescuelaLZ necesitaras tener pasado el examen de teoria
                        y examen de practica, cada uno de ello tiene que estar finalizado en un tiempo destacado. Clica al boton P
                        para cualquiera Información
                        mas detallado.
                    </p>
                    <div class="d-flex justify-content-end mt-5">
                        <button class="btn btn-primary">Mas Informaciones</button>
                    </div>
                </div>
                <div class="col-6 imgCoche d-flex justify-content-center">
                    <img src="/images/ImagesInformacionCocheMoto/coche.png" width="380px" height="200px">
                </div>
            </article>

            <!-- Creado para informciones de Motos -->
            <article class="col-12 d-flex  border-bottom">
                <div class="col-6 imgMoto d-flex justify-content-center" width="200px" height="200px">
                    <img src="/images/ImagesInformacionCocheMoto/moto.png" width="380px" height="200px">
                </div>
                <div class="col-6 informacionMoto bg-white">
                    <h5>Como puedo sacar carnet de <strong>Moto</strong> ?</h5>
                    <h6>Carnet Coche en AutoescuelaLZ</h6>
                    <p class="mt-5 mb-5">Para poder sacar el carnet de Coche en AutoescuelaLZ necesitaras tener pasado el examen de teoria
                        y examen de practica, cada uno de ello tiene que estar finalizado en un tiempo destacado. Clica al boton P
                        para cualquiera Información
                        mas detallado.
                    </p>
                    <div class="d-flex justify-content-end mt-5">
                        <button class="btn btn-primary">Mas Informaciones</button>
                    </div>
                </div>
            </article>

        </section>



        <!-- Crear el parte para mostrar los opiniones de los alumnos -->
        <div class="col-12 border-top border-bottom bg-white">
            <h3 class="d-flex justify-content-center ">Opiniones de los Alumnos</h3>
            <div class="col-12 d-flex justify-content-center mb-4">
                <img src="/images/assets/flechaAbajo.png"  width="100px">
            </div>
            <div class="d-flex">
            <div class="informacionAlumno col-6"> 
                    <div class="d-flex cajaSecundarioAlumno">

                        <div class="col-6 d-flex align-items-center mt-5">
                            <img class="col-12" src="/images/imagesCarrouselHome/perfectStudyEnvironment.jpeg" >
                        </div>

                        <div class="opinionesAlumnoCard col-6">
                            <div class="bg-info-subtle cardAlumno row justify-content-center">
                                <div>
                                    <h2 class="d-flex justify-content-center" >Alumnos Destacados</h2>
                                    <p class="d-flex justify-content-center mt-5"><strong>&lt&ltNombre: Zhiou&gt&gt</strong></p>
                                    <p class="d-flex justify-content-center mt-3"><strong>&lt&ltApellido: Zhu&gt&gt</strong></p>
                                    <h5 class="d-flex justify-content-center mt-3">perspectiva del profesor</h5>
                                    <p class="d-flex justify-content-center mt-5 text-center">Zhiou ha sido unos de los mejores estudiantes que hemos tenido que se fuerza mucho para sacar un nota maxima possible y que esta muy motivado de ayudar y trabajar con otros compañeros</p>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                    
            </div>

            <div class="carrouselOpiniones col-6">
                <div id="carouselExampleAuto" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleAuto" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleAuto" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleAuto" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="col-12 d-flex">
                                <img src="/images/imagesCarrouselHome/perfectStudyEnvironment.jpeg" class="d-block col-12" alt="...">
                            </div>
                        
                        </div>
                        <div class="carousel-item">
                            <div class="col-12 d-flex">
                                <img src="/images/imagesCarrouselHome/perfectStudyEnvironment.jpeg" class="d-block col-12" alt="...">
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-12 d-flex">
                                <img src="/images/imagesCarrouselHome/perfectStudyEnvironment.jpeg" class="d-block col-12" alt="...">
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAuto" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAuto" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    </div>
                </div>
            </div>

            
        </div>


        <!-- Crear el parte para poder poner contacto con nosotros desde formulario -->

        <div class="formulario col-12 mt-5 d-flex border-bottom">
            <div class="col-7">
                <h2 class="d-flex justify-content-center">Formulario De Contacto</h2>
                <div class="d-flex justify-content-center">
                    <div class="row formularioContacto" >
                        <label>Nombre y Apellido:</label><br>
                        <input required><br>
                        <label>Email:</label><br>
                        <input required><br>
                        <label>Tipo de Carnet: </label><br>
                        <select>
                            <option>Coche</option>
                            <option>Moto</option>
                        </select><br>

                        <label>Comentario: </label><br>
                        <textarea required></textarea><br>

                        <button class="mt-4 botonEnvio">Enviar</button>
                    </div>
                    
                </div>
                
            </div>
            <div class="col-5">
                <img class="col-12" src="/images/formulario.png">
            </div>
        </div>

    </div>
    
</template>


<style>
.carouselExampleIndicators{
    padding: 7rem 2rem 2rem 4rem;
}

.col-6{
    padding: 0px;
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