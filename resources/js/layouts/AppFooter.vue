<script setup>
import { useLayout } from '../composables/layout';
import { computed } from 'vue';

const { layoutConfig } = useLayout();

const logoUrl = computed(() => {
    return `layout/images/${layoutConfig.darkTheme.value ? 'logo-white' : 'logo-dark'}.svg`;
});
</script>

<template>
    <div class="layout-footer row mt-5 col-12">
        <nav class="col-12 d-flex ">
            <div class="col-3 padding_in">
                <h5>Ubicacion</h5>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d374.02801692303234!2d2.017889463037388!3d41.412652984353755!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a49a8fe6b59a81%3A0xc4fddcd7c13f414e!2sCarrer%20Major%2C%2060%2C%2008750%20Molins%20de%20Rei%2C%20Barcelona!5e0!3m2!1sca!2ses!4v1710255652217!5m2!1sca!2ses" class="col-12" height="250px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-3 padding_in" >
                <h5>Contacto</h5>
            </div>
            <div class="col-3 padding_in">
                <h5>Politica Privacidad</h5>
            </div>
            <div class="col-3 padding_in">
                <h5>Info Autoescuela</h5>
            </div>
        </nav>
        <p class="col-11">CopyRight@ZhiouLaia 2024</p>
    </div>
    
</template>
<style lang="scss" scoped>
.padding_in{
    padding: 30px;
}
.layout-footer{
    background-color: black;
}

h5{
    color: white;
}

p{
    color: white;
}
</style>
