<template>
    <div class="lg-container">
         <div class="col-12 imgTopVia">
            <Image src="/images/infoAutoescuela/via.png" alt="Informacion de Autoescuela" width="100%" />
            
         </div>
         <div class="shadow">
            
        </div>
        <h1 class="SobreNosotroText d-flex align-items-end text-white pb-5">Sobre Nosotros</h1>

         <div class="col-lg-12 imgVia d-lg-flex justify-content-lg-around"> 
            <div class="col-lg-6 col-md-12 d d-flex align-items-center imgCoche">
                <Image src="/images/infoAutoescuela/coche.jpg" alt="Coche conduciendo por via urbana" width="100%" />

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
                            <img src="/images/assets/LZ.png" style="height: 30px;" alt="Imagen de Autoescuela Perfecta">
                            <h3 class="d-flex justify-content-center ms-2">Autoescuela Perfecta</h3>
                        </div>
                        <h1 class="fw-bold d-flex justify-content-center">LICENCIA DE CONDUCIR PROPORCIONADA</h1>
                        
                    </div>
                </div>
            </div>


            <div class="d-lg-flex col-12 justify-content-around bg-white pb-5 ">
                <div class="row col-lg-5 col-md-12 informacionCarnet ">
                    <div class="col-12 card bg-body-tertiary rounded">
                        <Image src="/images/infoAutoescuela/practicaCoche.png" class="imgCarnet" alt="Tipo de coche que usa en autoescuela" width="100%" id="mueveImagen" />
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
                        <Image src="/images/infoAutoescuela/practicaMoto.png" class="imgCarnet d-flex justify-content-end" alt="Tipo de Motocicleta que usa en autoescuela" width="100%" id="mueveImagen"/>
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

        <div class="col-xl-12 bg-grey cajaPlanPaga">
            <h1 class="d-flex justify-content-center fw-bold">SELECCIONAR OFERTA</h1>
            <div class="d-xl-flex justify-content-center">
                <div class="col-xl-3 card padding10 bg-grey pagamento">
                    <div class="col-xl-12 d-xl-flex">
                        <div class="col-xl-3">
                            <svg width="80" height="80" xmlns="http://www.w3.org/2000/svg" >
                                <image xlink:href="/images/infoAutoescuela/planBasico.svg" width="80" height="80" alt="Imagen de Plan Basico Numero 1" />
                            </svg>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <h3 class="fw-bold">PLAN BASICO</h3>

                            </div>
                            <div class="col-xl-12 mt-5 descripcionPlan">
                                <p class="text-justify">Plan Basico solo incluye kit de poder realizar los tests y para poder tener acceso a 
                                    nuestro autoescuela.
                                </p>
                                
                            </div>
                            <div class="col-xl-12 mt-5 textoPlan">
                                <ul>
                                    <li>Access al Test</li>
                                    <li>20 classe de Practica</li>
                                    <li>1 Gratis examen Teoria</li>
                                    <li>Sin Gratis examen Practica</li>
                                </ul>
                            </div>
                            <div class="col-xl-12 mt-5 d-flex justify-content-end">
                                <div class="buttonRealizarPregunta card col-xl-12 text-center facil" >
                                    <p class=" fw-bold">APUNTARME</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 card padding10 bg-grey pagamento">
                    <div class="col-xl-12 d-xl-flex">
                        <div class="col-xl-3">
                            <svg width="80" height="80" xmlns="http://www.w3.org/2000/svg" >
                                <image xlink:href="/images/infoAutoescuela/planAvanzado.svg" width="80" height="80" alt="Imagen de Plan Avanzado Numero 2" />
                            </svg>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <h3 class="fw-bold">PLAN AVANZADO</h3>

                            </div>
                            <div class="col-xl-12 mt-5 descripcionPlan">
                                <p class="text-justify ">Plan avanzado incluye varias beneficios, incluye todo lo que hay en plan basico 
                                    y aumenta los clases de Practica a 20 y sobre todo incluye 1 oportunidad de realizar examen de teoria.
                                </p>
                                
                            </div>
                            <div class="col-xl-12 mt-5 textoPlan">
                                <ul>
                                    <li>Access al Test</li>
                                    <li>20 classe de Practica</li>
                                    <li>1 Gratis examen Teoria</li>
                                    <li>Sin Gratis examen Practica</li>
                                </ul>
                            </div>
                            <div class="col-xl-12 mt-5 d-flex justify-content-end">
                                <div class="buttonRealizarPregunta card col-xl-12 text-center facil" >
                                    <p class=" fw-bold">APUNTARME</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 card padding10 bg-grey pagamento">
                    <div class="col-xl-12 d-xl-flex">
                        <div class="col-xl-3">
                            <svg width="80" height="80" xmlns="http://www.w3.org/2000/svg" >
                                <image xlink:href="/images/infoAutoescuela/planPremium.svg" width="80" height="80" alt="Imagen de Plan Premium Numero 3" />
                            </svg>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <h3 class="fw-bold">PLAN AVANZADO</h3>

                            </div>
                            <div class="col-xl-12 mt-5 descripcionPlan">
                                <p class="text-justify">Plan Basico solo incluye kits basico para poder realizar
                                    test y realizar posibles practicas para sacar lisencia de conduccion
                                </p>
                                
                            </div>
                            <div class="col-xl-12 mt-5 textoPlan">
                                <ul>
                                    <li>Access al Test</li>
                                    <li>25 classe de Practica</li>
                                    <li>2 Gratis examen Teoria</li>
                                    <li>1 Gratis examen Practica</li>
                                </ul>
                            </div>
                            <div class="col-xl-12 mt-5 d-flex justify-content-end">
                                <div class="buttonRealizarPregunta card col-xl-12 text-center facil" >
                                    <p class=" fw-bold">APUNTARME</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>


    </div>
    
</template>

<style>
@import '/resources/css/infoAutoescuela.css';
</style>