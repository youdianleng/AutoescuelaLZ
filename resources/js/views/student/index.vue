<template>
    <div class="grid">
        <div class="col-12">
            <div class="card">
                <h1>Zona personal. Carnet de coche <i class="pi pi-car" style="color: black; font-size: 2.5rem"></i></h1>
                <div class="row">
                    <div class="col-2">
                        <img src="/testImages/profile_image.png" alt="" height="200px" width="200px">
                    </div>

                    <div class="col-10">
                        <p>Laia</p>
                        <p>Vizcarro Viladiu</p>
                        <p>Calle 123, numero 54 08547 Barcelona</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <h2>NIVEL DE DIFICULTAD DEL TEST</h2>
                <div class="d-flex justify-content-evenly">
                    <div class=" card d-flex flex-column">
                        <img src="testImages/semaforo-en-verde.jpg" alt="" height="200px">
                        <button type="submit" class="btn btn-success mt-4 mb-4">Acceder al test <i class="pi pi-angle-double-right" style="color: white"></i></button>
                    </div>
                    <div class="card d-flex flex-column"> 
                        <img src="testImages/semaforo-en-ambar.jpg" alt="" height="200px">
                        <button type="submit" class="btn btn-success mt-4 mb-4">Acceder al test <i class="pi pi-angle-double-right" style="color: white"></i></button>
                    </div>
                    <div class="card d-flex flex-column mb-3">
                        <img src="testImages/semaforo-en-rojo.jpg" alt="" height="200px">
                        <button type="submit" class="btn btn-success mt-4 mb-4">Acceder al test <i class="pi pi-angle-double-right" style="color: white"></i></button>
                    </div>
                </div>

                <!-- Test todos los niveles -->
                <div class="row">
                    <div class="col-6">
                        <h2>TEST DE TODOS LOS NIVELES</h2>
                        Acceder al test
                    </div>

                    <div class="col-6">
                        <h2>TEST CON LAS PREGUNTAS MÁS FALLADAS</h2>
                        <img src="testImages/semaforo-rojo-test-errores.jpg" alt="" height="200px">                        
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script setup>
</script>

<style scoped></style>
