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
        <section class="col-12">
            <div class="informacionCarnet bg-white">
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
                <div class="col-5 card bg-body-tertiary">
                    <Image src="/images/infoAutoescuela/practicaCoche.jpg" alt="Image" width="100%" id="mueveImagen" />
                    <button class="btn btn-primary" id="cambiarEstilo">Ver más</button>
                </div>

                <div class="col-5 card bg-body-tertiary">
                    <Image src="/images/infoAutoescuela/practicaMoto.jpg" alt="Image" width="100%" id="mueveImagen"/>
                    <button class="btn btn-primary" id="cambiarEstilo">Ver más</button>
                </div>
            </div>
           
        </section>

    </div>
    
</template>

<script>
    document.getElementById("cambiarEstilo").addEventListener("click", function() {
        var boton = document.getElementById("mueveImagen");
        if (boton.classList.contains("moverImagen")) {
            boton.classList.remove("moverImagen");
        } else {
            boton.classList.add("moverImagen");
        }
    });
</script>

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
        font-size: 12px;
    }

    .card{
        margin-bottom: 0px;
        position: relative;
    }

    .card button{
        position: absolute;
        top: 85%;
        left: 6%;
    }

    .moverImagen{
        translate: 100% 0px;
        transition: 5s;
    }
</style>