<template>
    <div class="grid">
        <h1 class="ms-3">Panel de Creación</h1>
        <div class="col-12 d-flex">
            
            <div class="col-4">
                <div class="menuSelect">
                    <div class="borderCreacion">
                        <h3>Menu de Creación</h3>
                        <div class="row col-12 justify-content-center mb-5">
                            <div class="d-flex botoneCreacionAlumno justify-content-center">
                                <img src="/public/images/ImagenCrear/crearUsuario.png">
                                <button class="btn btn-white">Alta Alumnnos</button>
                            </div>
                            <div class="d-flex botoneCreacionPregunta justify-content-center">
                                <svg height="35px" width="35px">
                                    <imagen height="35px" width="35px" href="/public/images/ImagenCrear/crearPregunta.png"></imagen>
                                </svg>
                                <button class="btn btn-white ">Nuevas Preguntas</button>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="row col-8">
                <div class="card col-11 ms-5 ">
                    <div class="formularioCrearStudent">
                        <div class="contenidoStudent">
                            <h2>Nuevas Estudiantes</h2>   
                            <div class="d-flex">
                                <div class="col-8 row">
                                    <form class="col-12 row">
                                        <input placeholder="Nombre" required>
                                        <input class="mt-4" placeholder="Apellido">
                                        <input class="mt-4" placeholder="DNI/NIE" required>
                                        <input class="mt-4" placeholder="Imagen">
                                        <input type="mail" class="mt-4" placeholder="Email" required>
                                        <input class="mt-4" placeholder="Contraseña" required>
                                        <select class="mt-4" required>
                                            <option>Coche</option>
                                            <option>Moto</option>
                                        </select>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button class="col-5 mt-3 btn btn-dark">Crear</button>
                                        </div>
                                        
                                    </form>
                                
                                </div>
                                <div class="col-4 textoDeRecuerdo">
                                    <h4>Notificaciones</h4>
                                    <p>Para poder crear Estudiante nueva hay que asegurar el estudiante
                                        ha entregado todos los documento de forma correcta y que es obligatorio 
                                        tener los identidad y el tipo de carnet que desea sacar.
                                    </p>
                                </div>
                            
                            </div>
                           
                        </div>
                        

                    </div>
                </div>
            </div>
            
        </div>
    </div>
</template>

<script>
    
</script>

<style>
    
    
    .menuSelect{
        padding: 30px;
        background-color: white;
        border-radius: 12px;
        border: 1px solid var(--surface-border);
    }

    .row > *{
        padding: 0px;
    }

    .botoneCreacion{
        border: 1px black solid;
    }

    .botoneCreacionAlumno:hover{
        border: 1px #D5D8DC solid;
    }

    .botoneCreacionPregunta:hover{
        border: 1px #D5D8DC solid;
    }



    .borderCreacion{
        padding: 20px;
        border-radius: 10px;
    }

    .botoneCreacionAlumno{
        padding: 20px;
        margin-top: 30px;
        border-radius: 10px;
        border: 1px black solid;
    }

    .botoneCreacionPregunta{
        padding: 20px;
        margin-top: 30px;
        border-radius: 10px;
        border: 1px black solid;
    }


    /* Formulario de estudiante */
    .formularioCrearStudent{
        padding: 20px;
    }

    .formularioCrearStudent form{
        padding: 20px;
    }

    .contenidoStudent input{
        padding: 5px;
        border-radius: 5px;
        border: 1px black solid;
    }

    .contenidoStudent select{
        padding: 5px;
        border-radius: 5px;
        border: 1px black solid;
    }

    .textoDeRecuerdo{
        padding-left: 20px;
        padding-top: 30px;
        text-align: justify;
    }

    .contenidoStudent button{
        padding-top: 10px;
        padding-bottom: 10px;
        padding-left: 35px;
        padding-right: 35px;
    }
</style>