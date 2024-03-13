<script setup>
import { useLayout } from '../composables/layout';
import { computed } from 'vue';
import Image from 'primevue/image';

const { layoutConfig } = useLayout();

const logoUrl = computed(() => {
    return `layout/images/${layoutConfig.darkTheme.value ? 'logo-white' : 'logo-dark'}.svg`;
});
</script>

<template>
    <div class="layout-footer row col-12">
        <nav class="col-12 d-flex ">
            <div class="col-3 padding_in">
                <h5>Donde Estamos</h5>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d374.02801692303234!2d2.017889463037388!3d41.412652984353755!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a49a8fe6b59a81%3A0xc4fddcd7c13f414e!2sCarrer%20Major%2C%2060%2C%2008750%20Molins%20de%20Rei%2C%20Barcelona!5e0!3m2!1sca!2ses!4v1710255652217!5m2!1sca!2ses" class="col-12 mt-3" height="250px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-3 padding_in" >
                <h5>Redes Social</h5>
                <div class="linkedin d-flex mt-3">
                    <a href=""><Image src="/images/imgRedesSocial/linkedin.png" class="me-2" alt="Image" width="20" />Linkedin</a>
                </div>
                <div class="facebook d-flex mt-3">
                    <a href=""><Image src="/images/imgRedesSocial/facebook.png" class="me-2" alt="Image" width="20" />Facebook</a>
                </div>
                <div class="whatsapp d-flex mt-3">
                    <a href=""> <Image src="/images/imgRedesSocial/whatsapp.png" class="me-2" alt="Image" width="20" />Whatsapp</a>
                </div>
                <div class="x d-flex mt-3">
                    <a href=""> <Image src="/images/imgRedesSocial/x.png" class="me-2" alt="Image" width="20" />X</a>
                </div>
                <div class="instagram d-flex mt-3">
                    <a href=""> <Image src="/images/imgRedesSocial/instagram.png" class="me-2" alt="Image" width="20" />Instagram</a>
                </div>
            </div>
            <div class="col-3 padding_in">
                <h5>Info Autoescuela</h5>
                <div class="row ">
                    <router-link to="/" class="mt-3">Sobre Nosotros</router-link>
                    <router-link to="/" class="mt-3">Carnets</router-link>
                </div>
                
            </div>
            <div class="col-3 padding_in">
                <h5>Politica Privacidad</h5>
                <div class="row">
                    <router-link to="/" class="mt-3">Politica de Privacidad</router-link>
                    <router-link to="/" class="mt-3">Cookies</router-link>
                    <router-link to="/" class="mt-3">Acuerdos</router-link>
                </div>
            </div>
        </nav>
        <hr>
        <p class="col-11">CopyRight@ZhiouLaia 2024</p>
    </div>
    
</template>
<style lang="scss" scoped>
.padding_in{
    padding: 30px;
}
.layout-footer{
    background-color: black;
    border: 0px;
    margin-left: 0px;
}

h5{
    color: white;
}

p{
    color: white;
}

a{
    color: white;
}

a:hover{
    color: blue;
    transition: 0.7s;
}
</style>
