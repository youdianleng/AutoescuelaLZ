<template>
    <div class="lg-container">
         <div class="col-12">
            <Image src="/images/infoAutoescuela/via.png" alt="Image" width="100%" />
         </div>

         <div class="col-12 imgVia d-flex justify-content-around"> 
            <div class="col-6">
                <Image src="/images/infoAutoescuela/coche.jpg" alt="Image" width="100%" />
            </div>
            <div class="col-5">
                <h3>Sobre Nosotros</h3>
                <h6>Mejor Autoescuela que puedes encontrar en EUROPEA</h6>
                <p class="infoSobre">AutoEscuela LZ se estableció a finales de 2019 y ha ayudado/asistido a más de 6.000 estudiantes a realizar su sueño de conducir. 
                    Tenemos más del 40% de la experiencia docente en escuelas de manejo de todo el mundo y todos los profesores de nuestra escuela son conductores. 
                    élites Como líder en información sobre vehículos, estamos comprometidos a brindar a los estudiantes el mejor ambiente de aprendizaje y los métodos de enseñanza más cómodos.</p>
            </div>
         </div>

         <!-- Create the section for student message -->
        <section class="col-12 carnets bg-white" id="carnetCoche">
            <div class="informacionCarnet ">
                <div class="col-12 d-flex justify-content-center">
                    <div>
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="/images/assets/LZ.png" style="height: 30px;">
                            <h3 class="d-flex justify-content-center ms-2">Autoescuela Perfecta</h3>
                        </div>
                        <h1>LICENCIA DE CONDUCIR PROPORCIONADA</h1>
                        
                    </div>
                </div>
            </div>


            <div class="d-flex col-12 justify-content-around bg-white pb-5">
                <div class="row col-5">
                    <div class="col-12 card bg-body-tertiary">
                        <Image src="/images/infoAutoescuela/practicaCoche.png" class="imgCarnet" alt="Image" width="100%" id="mueveImagen" />
                        <div class="texto col-12">
                            <h2>Licencia Coche</h2>
                            <p>Una licencia de conducir de automóvil es una licencia que requiere mucho tiempo para practicar, generalmente toma entre 2 y 4 meses, 
                                generalmente puedes aprender suficientes conocimientos teóricos para participar en el primer al segundo mes, después de uno o dos meses de comenzar. 
                                , podemos realizar el examen práctico y tras aprobarlo podremos obtener el permiso de conducir.</p>
                        </div>
                    </div>
                </div>
                <div class="row col-5">
                    <div class="col-12 card bg-body-tertiary">
                        <Image src="/images/infoAutoescuela/practicaMoto.png" class="imgCarnet d-flex justify-content-end" alt="Image" width="100%" id="mueveImagen"/>
                        <div class="texto col-12">
                            <h2>Licencia Moto</h2>
                            <p>Si desea obtener una licencia de conducir de vehículos motorizados, 
                                los estudiantes deben familiarizarse primero con las reglas y señales de conducción, 
                                luego realizar primero un examen teórico y luego tomar 20 lecciones prácticas como estándar para dominar la conducción.
                                 son capaces de conducir solos. Puede solicitar la prueba y confirmar si debe emitir una licencia de conducir de vehículos motorizados según los resultados de la prueba.</p>
                        </div>
                    </div>
                </div>
            </div>
           
        </section>

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

    .col-12{
        padding: 0px;
    }

    .imgVia{
        padding: 70px;
    }
    .infoSobre{
        font-size: 14px;
    }

    .card{
        margin-bottom: 0px;
        position: relative;
       overflow: hidden;
    }

    .card .imgCarnet{
        position: relative;
        z-index: 1;
    }

    .card:hover .imgCarnet{
        translate: 100% 0px;
        transition: 5s;
    }

    .card .imgCarnet{
        translate: 0% 0px;
        transition: 5s;
    }

    .texto{
        position: absolute;
        z-index: 0;
        padding: 60px;
    }

    .carnets{
        padding-bottom: 50px;
    }

</style>