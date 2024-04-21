<template>
    <div class="lg-container">
         <div class="col-12 imgTopVia">
            <Image src="/images/contacto/contacto.jpg" alt="Image" width="100%" />
            
         </div>
         <div class="shadow">
            
        </div>
        <h1 class="SobreNosotroText d-flex align-items-center text-white justify-content-center">
            <div class="row justify-content-center">
                <p class="d-flex justify-content-center">Contacto</p>
                <div class="d-flex justify-content-center mt-3 backgroundContacto">
                    <Breadcrumb :model="items">
                        <template #separator> / </template>
                        <template #item="{ item }">
                            <a class="cursor-pointer" :href="item.url">
                                <span v-if="item.indicador == 'Contacto'" style="color: orange;">{{ item.indicador }}</span>
                                <span v-if="item.indicador != 'Contacto'">{{ item.indicador }}</span>
                            </a>
                        </template>
                        
                    </Breadcrumb>
                </div>
            </div>
        </h1>
        <div class="col-12 ">
            <div class="formularioContacto d-xl-flex justify-content-between">
                <div class="col-xl-6 col-md-12 hiddenIframe">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d374.02801692303234!2d2.017889463037388!3d41.412652984353755!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a49a8fe6b59a81%3A0xc4fddcd7c13f414e!2sCarrer%20Major%2C%2060%2C%2008750%20Molins%20de%20Rei%2C%20Barcelona!5e0!3m2!1sca!2ses!4v1710255652217!5m2!1sca!2ses" class="col-12" height="100%" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-xl-6 col-md-12 tablaContactar">
                    <p>Contactar con nosotros</p>
                    <h2 class="fw-bold">Si tiene alguna consulta, contáctenos</h2>
                    <p>Si tiene alguna pregunta sobre nuestro cronograma de cursos, nuestros métodos educativos u otras preguntas, 
                        asegúrese de contactarnos a tiempo, lo resolveremos en el menor tiempo y nos comunicaremos con usted.</p>
                    <div class="mt-5">
                        <div class="d-flex col-12 justify-content-between">
                            <FloatLabel class="col-6">
                                <InputText id="Nombre" v-model="value" class="col-10"/>
                                <label for="Nombre">Nombre</label>
                            </FloatLabel>
                            <FloatLabel class="col-6">
                                <InputText id="Apellido" v-model="value1" class="col-10"/>
                                <label for="Apellido">Apellido</label>
                            </FloatLabel>
                        </div>
                        <div class="d-flex col-12 mt-5">
                            <FloatLabel class="col-12">
                                <InputText id="Email" v-model="value2" class="col-11"/>
                                <label for="Email">Email</label>
                            </FloatLabel>
                        </div>
                        <div class="d-flex col-11 mt-5 textArea">
                            <Textarea v-model="value3" variant="filled" rows="5" placeholder="Introduce tus Preguntas"/>
                        </div>
                        <div class="d-flex col-12 mt-5">
                            <Button class="botonFormulario" label="Submit" />
                        </div>
                    </div>
                </div>
            </div>
        </div>


         
        

    </div>
    
</template>
<script setup>
    import FloatLabel from 'primevue/floatlabel';
    import Textarea from 'primevue/textarea';
    import { ref } from "vue";
    const home = ref({ icon: 'pi pi-home' });
    const items = ref([{ indicador: 'Home' }, { indicador: 'Informacion' }, { indicador: 'Contacto' }]);

    // This part of code dosen't do anything  just use for input table can supply content
    const value = ref(null);
    const value1 = ref(null);
    const value2 = ref(null);
    const value3 = ref(null);

</script>
<style>

    .col-11{
        padding: 10px;
    }

    .col-6{
        padding: 0px;
    }

    .formularioContacto{
        padding-top: 150px;
        padding-left: 100px;
        padding-right: 100px;
        padding-bottom: 150px;
    }

    .tablaContactar{
        padding-left: 30px;
    }

    .p-breadcrumb {
        background: transparent;
        border: none;
        font-size: 20px;
    }

    .p-breadcrumb a{
        color: white;
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
        z-index: 6;
        font-size: 60px;
        font-weight: 800;
    }

    .textArea{
        padding: 0px;
    }

    .p-inputtextarea{
        width: 100%;
        background-color: white;
    }

    .botonFormulario{
        padding-top: 15px;
        padding-bottom: 15px;
        padding-left: 80px;
        padding-right: 80px;
        background-color: #F3BD00;
        border-color: #F3BD00;
    }

    .p-menuitem-separator{
        color: white;
    }


    @media only screen and (max-width: 1150px) {
      .hiddenIframe{
        height: 300px;
        margin-bottom: 30px;
      }

      .tablaContactar{
        padding: 0px;
      }
    }

    @media only screen and (max-width: 760px) {
        .formularioContacto{
            padding: 10px;
        }
        .botonFormulario{
            width: 100%;
            margin-bottom: 20px;
        }

        .shadow{
            height: 211px;
        }
        
        .SobreNosotroText{
            height: 211px;
            margin-bottom: 20px;
        }

        .SobreNosotroText p{
            font-size: 30px;
        }

        .p-breadcrumb{
            font-size: 15px;
        }
    }

</style>