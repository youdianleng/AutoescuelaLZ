<template>
    <div class="lg-container">
         <div class="col-12 imgTopVia">
            <Image src="/images/infoAutoescuela/via.png" alt="Image" width="100%" />
            
         </div>
         <div class="shadow">
            
        </div>
        <h1 class="SobreNosotroText d-flex align-items-end text-white pb-5">Sobre Nosotros</h1>

         <div class="col-lg-12 imgVia d-lg-flex justify-content-lg-around"> 
            <div class="col-lg-6 col-md-12 d d-flex align-items-center imgCoche">
                <Image src="/images/infoAutoescuela/coche.jpg" alt="Image" width="100%" />

            </div>
            <div class="col-lg-6 col-md-12 mdTextoPadding30">
                <p class="text-warning">Conducir</p>
                <h1 class="fw-bold mb-3">Empiece a aprender a conducir hoy</h1>
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
                        <h1 class="fw-bold d-flex justify-content-center">LICENCIA DE CONDUCIR PROPORCIONADA</h1>
                        
                    </div>
                </div>
            </div>


            <div class="d-lg-flex col-12 justify-content-around bg-white pb-5 ">
                <div class="row col-lg-5 col-md-12 informacionCarnet ">
                    <div class="col-12 card bg-body-tertiary rounded">
                        <Image src="/images/infoAutoescuela/practicaCoche.png" class="imgCarnet" alt="Image" width="100%" id="mueveImagen" />
                        <div class="texto col-12">
                            <h2 class="fw-bold h2texto">Licencia Coche</h2>
                            <p class="ptexto">Una licencia de conducir de automóvil es una licencia que requiere mucho tiempo para practicar, generalmente toma entre 2 y 4 meses, 
                                generalmente puedes aprender suficientes conocimientos teóricos para participar en el primer al segundo mes, después de uno o dos meses de comenzar. 
                                , podemos realizar el examen práctico y tras aprobarlo podremos obtener el permiso de conducir.</p>
                        </div>
                    </div>
                </div>
                <div class="row col-lg-5 col-md-12 topMoto informacionCarnet rounded">
                    <div class="col-12 card bg-body-tertiary rounded">
                        <Image src="/images/infoAutoescuela/practicaMoto.png" class="imgCarnet d-flex justify-content-end" alt="Image" width="100%" id="mueveImagen"/>
                        <div class="texto col-12">
                            <h2 class="fw-bold h2texto">Licencia Moto</h2>
                            <p class="ptexto">Si desea obtener una licencia de conducir de vehículos motorizados, 
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
        padding-top: 100px;
        padding-left: 200px;
        padding-right: 200px;
        padding-bottom: 100px;
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
        padding-left: 20%;
        z-index: 6;
        font-size: 60px;
        font-weight: 800;
    }

    .infoSobre{
        font-size: 12px;
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
        padding: 50px;
    }

    .carnets{
        padding-bottom: 50px;
    }

    .padding30px{
        padding: 30px;
    }

    .mdTextoPadding30{
        padding-top: 30px;
        padding-bottom: 40px;
        padding-left: 50px;
        padding-right: 50px;
    }

    .mdTextoPadding30 h1{
        margin: 0px;
    }
    .mdTextoPadding30 p{
        margin: 0px;
    }

    
    @media only screen and (max-width: 1050px) {
        .imgVia{
            padding: 0px;
        }

        .imgTopVia{
            height: 150px;
        }
        .shadow{
            height: 150px;
        }
        .SobreNosotroText {
            height: 150px;
            font-size: 20px;
        }
        h1{
            font-size: medium;
            font-weight: bold;
            margin-top: 0px;
        }

        h2{
            font-size: 1.5rem;
            font-weight: bold;
        }

        .card{
            border-radius: 0px;
        }

        .texto{
            padding: 15px;
            
        }

        .texto h2{
            font-size: 20px;
            
        }

        .texto p{
            font-size: 15px;
        }

        .topMoto{
            margin-top: 20px;
        }

        
    }

    @media only screen and (max-width: 1400px) {
        .h2texto{
            font-size: 20px;
        }

        .ptexto{
            font-size: 11px;
        }

        .texto{
            padding: 30px;
        }
    }

    @media only screen and (max-width: 576px) {
        .texto h2{
            font-size: 12px;
            
        }

        .texto p{
            font-size: 8px;
        }

        .informacionCarnet h1{
            font-size: 12px;
            margin-top: 30px;
        }

        .imgCoche{
            padding: 50px;
            padding-bottom: 10px;
        }
    }



</style>