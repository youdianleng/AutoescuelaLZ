<template>
    <div class="lg-container">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/images/calle1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/images/calle1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/images/calle1.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
        </div>

        <div class="sobreNosotros col-12 d-flex">
            <div class="col-8">
                <h2>Sobre Nosotros</h2>
                <h4>AutoescuelaLZ</h4>
                <p>Nuestra escuela de manejo se estableció en Barcelona, ​​España en el año 2000. Contamos con el sistema de enseñanza más vanguardista y 
                    el método de enseñanza más cómodo. En los últimos años, nuestra escuela de manejo ha tenido el honor de ser invitada a varias ceremonias de premios, 
                    entre ellas, entre otros, la mejor escuela de manejo de 2010, el mejor maestro en 2013, el mejor maestro en 2015 y otros honores.
​                  </p>
            </div>
            <div class="col-4">
                <img class="col-12" src="/images/calle1.jpg">
            </div>
            
        </div>


        <div class="col-12 informacionCarnet">
            <div class="col-12">
                <h2>Tipos de Carnet</h2>
                <div class="col-12 bg-white mt-3 d-flex justify-content-between">
                    <h4>Coche</h4>
                    <img src="/images/assets/flechaAbajoMenu.png" height="30px" width="30px">
                </div>
                <div class="col-12 bg-white mt-3 ">
                    <div class="d-flex justify-content-between">
                        <h4>Moto</h4>
                        <img src="/images/assets/flechaArribaMenu.png" height="30px" width="30px">
                    </div>
                    

                    <div class="col-12 border-top pt-5">
                        <h2>Obtener Carnet Moto</h2>
                        <p>Para poder obtener carnet de Moto en nuestro autoescuela tienes que seguir a siguiente LINK para 
                            elegir el plan de pago y conocer los fechas de examen. Nosotros sumistramos materiales como libros,
                            acceso a plataforma de test online y otros cosas mas.
                        </p>

                        <button>Apuntar a Moto</button>
                    </div>
                </div>
            </div>
        </div>



    </div>
    
</template>
<style>
    .carousel-inner{
        height: 300px;
    }
    img{
        overflow: hidden;
    }

    .informacionCarnet{
        padding: 30px;
    }

    .sobreNosotros{
        padding: 30px;
    }
    h4{
        margin: 0px;
    }
</style>