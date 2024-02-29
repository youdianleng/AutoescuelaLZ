<template>
    <div class="grid">
        <div class="col-12">
            <div class="card">
                <h2>TEST Nº1</h2>
                <div class="row">
                    <h2>1. ¿Qué precaución debe adoptar todo conductor para reducir el riesgo de atropello a peatones?</h2>
                    <div class="col-2">
                        <img src="/testImages/question1.jpg" alt="" height="200px" width="200px">
                    </div>
                    <div class="col-10">
                        <p>a. Indicarles que cruzen la calzada en vías con varios carriles</p>
                        <p>b. Moderar la velocidad en zonas donde puede haber aglomeración de personas</p>
                        <p>c. Circular lo más cerca posible de la acera o de los vehículos estacionados </p>
                    </div>
                    <button class="btn btn-success">Siguiente</button>
                </div>
                <div class="row mt-5">
            <div v-for="i in 30" :key="i" class="card mr-2" style="width: 5px; height: 5px; justify-content: center;">
              {{ i }}
            </div>
          </div>
                

                
            </div>
        </div>
</div>

</template>


