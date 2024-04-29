<template>
    <div class="container">
        <div class="col-12 setMiddle">
            <div class="col-12 d-flex justify-content-center">
                <img id="imagen" src="/images/assets/semaforoVerde.svg" class="d-block col-12" alt="...">
            </div>
            <div class="col-12 d-flex justify-content-center mt-5">

                <div v-for="elemento in arrayRespuesta">
                    <button v-if="elemento == 1" class="card mr-2 bg-success "
                        style="width: 5px; height: 5px; align-items: center; justify-content: center;">
                        {{ elemento }}
                    </button>
                    <button v-if="elemento == 0" class="card mr-2 bg-secondary-subtle "
                        style="width: 5px; height: 5px; align-items: center; justify-content: center;">
                        {{ elemento }}
                    </button>
                </div>
            </div>
        </div>

    </div>
</template>


<script setup>
import { ref, onMounted, reactive, createElementBlock, computed } from "vue";
import { useRoute } from "vue-router";
const route = useRoute()

let contador = 0;

// Arreglo con las URLs de las imágenes
let imagenes = ["/images/assets/semaforoVerde.svg", "/images/assets/semaforoNaranja.svg", "/images/assets/semaforoRojo.svg"];
// Índice actual de la imagen
let indice = 0;

const arrayRespuesta = ref();




// Función para cambiar la imagen
function cambiarImagen() {
    // Obtener el elemento de la imagen
    let img = document.getElementById("imagen");


        // Cambiar el atributo src de la imagen
        img.src = imagenes[indice];

        // Incrementar el índice para la siguiente imagen
        indice++;

        // Reiniciar el índice si llegamos al final del arreglo
        if (indice === imagenes.length) {
            indice = 0;
        }
    
}


// Llamar a la función cambiarImagen cada 5 segundos

let intervalo = setInterval(function() {
    if (contador < 20) {
        contador++;
        // Llamar a la función cambiarImagen aquí
        cambiarImagen();
        if(contador === 20) {
            validar();
        }
    } else {
        // Detener el intervalo una vez que contador llegue a 10
        clearInterval(intervalo);
    }


     

}, 200);


function validar(){
    let img = document.getElementById("imagen");
    if(route.params.accept == 3){
        img.src = "/images/assets/semaforoNaranja.svg";
    }else if(route.params.accept < 3){
        img.src = "/images/assets/semaforoVerde.svg";
    }else{
        img.src = "/images/assets/semaforoRojo.svg";
    }

    // Decodificar
    let cadenaCodificada = route.params.respuesta;

    var cadenaDecodificada = atob(cadenaCodificada);

    // Convertir la cadena decodificada de JSON a un array
    var arrayDecodificado = JSON.parse(cadenaDecodificada);

    arrayRespuesta.value = arrayDecodificado;


}





</script>

<style scope>

.setMiddle{
    padding-top: 5%;
    padding-bottom: 5%;
}

.setMiddle img{
    width: 300px!important;
    height: 500px;
}

</style>