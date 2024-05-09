<template>
    
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" id="navbar">
        <div class="container">
            <div class="col-ms-12 d-lg-none">
                <Button class="border-0" icon="pi pi-bars" @click="visible = true" />
            </div>
            <div class="esconderTopBar col-12 d-flex align-items-center">
                <router-link to="/" >
                    <img src="/images/logo.svg" alt="logo AutoEscuelaLZ" height="100px" width="130px" />
                    <span></span>
                </router-link>

                <router-link to="/info">
                    <button class="p-link layout-topbar-button layout-topbar-button-c" id="Information">
                        {{ $t(`Informacion`)}}
                    </button>
                </router-link>

                <router-link to="/teacher/createStudent">
                    <button v-if="role === 'teacher'" class="p-link layout-topbar-button layout-topbar-button-c">
                        Estudiantes
                    </button>
                </router-link>
                
                <router-link to="/teacher/CreateTest">
                    <button v-if="role === 'teacher'" class="p-link layout-topbar-button layout-topbar-button-c">
                    Preguntas test
                    </button>
                </router-link>
                <router-link v-if="role === 'student'" :to="{ name: 'SelectLevel', params: { id: user.user_id } }">
                    <button   class="p-link layout-topbar-button layout-topbar-button-c">
                    Test
                    </button>
                </router-link>
                
                <router-link to="/contacto">
                    <button class="p-link layout-topbar-button layout-topbar-button-c" id="Information">
                        {{ $t(`Contacto`) }}
                    </button>
                </router-link>
                <router-link to="/student/profile" v-if=" role == 'student'">
                    <button class="p-link layout-topbar-button layout-topbar-button-c" id="Information">
                        {{ $t(`Perfile`) }}
                    </button>
                </router-link>
                <router-link to="/teacher/profile" v-if=" role == 'teacher'">
                    <button class="p-link layout-topbar-button layout-topbar-button-c" id="Information">
                        {{ $t(`Perfile`) }}
                    </button>
                </router-link>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mt-2 mt-lg-0 me-auto mb-2 mb-lg-0">
                        <LocaleSwitcher />
                    </ul>
                    
                </div>
            </div>
        </div>
    </nav>
    



    <div class="d-flex justify-content-center sideBar">
        <Sidebar v-model:visible="visible">
            <template #container="{ closeCallback }">
                <div class="flex flex-column h-full">
                    <div class="flex align-items-center justify-content-between px-4 pt-3 flex-shrink-0">
                        <span class="inline-flex align-items-center gap-2">
                            <img src="/images/logo.svg" alt="logo AutoEscuelaLZ" height="80px" width="100px" />
                            <span class="font-semibold text-2xl text-primary">AL SCHOOL</span>
                        </span>
                        <span>
                            <Button type="button" @click="closeCallback" icon="pi pi-times" rounded outlined class="h-2rem w-2rem"></Button>
                        </span>
                    </div>
                    <div class="overflow-y-auto">
                        <ul class="list-none p-3 m-0">
                            <li>
                                <router-link to="/">
                                    <a class="flex align-items-center cursor-pointer p-3 border-round text-700 hover:surface-100 transition-duration-150 transition-colors p-ripple">
                                        <i class="pi pi-home mr-2"></i>
                                        <span class="font-medium">Home</span>
                                    </a>
                                </router-link>
                            </li>
                            <li>
                                <router-link to="/info">
                                    <a class="flex align-items-center cursor-pointer p-3 border-round text-700 hover:surface-100 transition-duration-150 transition-colors p-ripple">
                                        <i class="pi pi-info-circle mr-2"></i>
                                        <span class="font-medium">Información Autoescuela</span>
                                    </a>
                                </router-link>
                            </li>
                            <li  v-if="role === 'student'">
                                <router-link :to="{ name: 'SelectLevel', params: { id: user.user_id } }">
                                    <a class="flex align-items-center cursor-pointer p-3 border-round text-700 hover:surface-100 transition-duration-150 transition-colors p-ripple">
                                        <i class="pi pi-book mr-2"></i>
                                        <span class="font-medium">Realizar Test</span>
                                    </a>
                                </router-link>
                            </li>
                            <li v-if="role === 'teacher'">
                                <router-link to="/teacher/createStudent">
                                    <a class="flex align-items-center cursor-pointer p-3 border-round text-700 hover:surface-100 transition-duration-150 transition-colors p-ripple">
                                        <i class="pi pi-check-circle mr-2"></i>
                                        <span class="font-medium">Añadir Estudiante</span>
                                    </a>
                                </router-link>
                            </li>
                            <li v-if="role === 'teacher'">
                                <router-link to="/teacher/createTest">
                                    <a class="flex align-items-center cursor-pointer p-3 border-round text-700 hover:surface-100 transition-duration-150 transition-colors p-ripple">
                                        <i class="pi pi-bookmark mr-2"></i>
                                        <span class="font-medium">Crear Preguntas</span>
                                    </a>
                                </router-link>
                                
                            </li>
                            <li v-if="role == 'teacher' || role == 'student'">
                                <router-link to="/profile">
                                    <a class="flex align-items-center cursor-pointer p-3 border-round text-700 hover:surface-100 transition-duration-150 transition-colors p-ripple">
                                        <i class="pi pi-user mr-2"></i>
                                        <span class="font-medium">{{ $t(`Perfile`) }}</span>
                                    </a>
                                </router-link>
                            </li>
                            <li>
                                <router-link to="/contacto">
                                    <a class="flex align-items-center cursor-pointer p-3 border-round text-700 hover:surface-100 transition-duration-150 transition-colors p-ripple">
                                        
                                        <i class="pi pi-whatsapp mr-2"></i>
                                        <span class="font-medium">Contacto</span>                      
                                    </a>
                                </router-link>
                            </li>
                            <li v-if="role === 'teacher' || role === 'student'">
                                <a class="flex align-items-center cursor-pointer p-3 border-round text-700 hover:surface-100 transition-duration-150 transition-colors p-ripple" href="javascript:void(0)" @click="logout">
                                    <i class="pi pi-sign-out mr-2"></i>
                                    <span class="font-medium">Cerrar Session</span>                      
                                </a>
                            </li>
                            <li v-if="role === null">
                                <a class="flex align-items-center cursor-pointer p-3 border-round text-700 hover:surface-100 transition-duration-150 transition-colors p-ripple" href="javascript:void(0)" @click="logout">
                                    <i class="pi pi-sign-out mr-2"></i>
                                    <span class="font-medium">Login</span>                      
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </template>
        </Sidebar>
        
    </div>


    <div class="navbar1 d-flex align-items-center" id="navbar1">
            <div class="container ">
                <ul class="navbar-nav mt-2 mt-lg-0 ms-auto">
                    <template v-if="!user?.name">
                        <li class="nav-item">
                            <router-link class="nav-link text-white" to="/login">{{ $t('login') }}</router-link>
                        </li>
                    </template>
                    <div class="d-flex">
                        <li v-if="user?.name" class="text-white d-flex align-items-center">
                            <p class="me-3"> Hola, {{ user.name }}</p>
                                
                        </li>
                        <li v-if="user?.name" class="text-white d-flex">
                            <p class="text-white logout" href="javascript:void(0)" @click="logout">{{ $t('logout') }}</p>   
                        </li>
                    </div>
                </ul>
            </div>
    </div>
</template>

<script setup>
import { ref, computed, onMounted, onBeforeUnmount } from 'vue';
import { useLayout } from '../composables/layout';
import { useStore } from 'vuex';
import useAuth from "@/composables/auth";
import LocaleSwitcher from "../components/LocaleSwitcher.vue";
import 'primeicons/primeicons.css';
const { onMenuToggle } = useLayout();
const store = useStore();
const user = computed(() => store.state.auth.user)
const role = computed(() => store.state.auth.role)
const { processing, logout } = useAuth();

const visible = ref(false);

const topbarMenuActive = ref(false);

const onTopBarMenuButton = () => {
    topbarMenuActive.value = !topbarMenuActive.value;
};

onMounted(() => {
    // Cmabiar el titulo de pagina
    document.title = "AutoescuelaLZ";

        // Crear un elemento link para el ícono de la pestaña del navegador
    const link = document.createElement('link');
    link.rel = 'icon';
    link.type = 'image/svg+xml';
    link.href = '/images/logo.svg'; // Ruta a tu archivo SVG

    // Añadir el enlace al head del documento
    document.head.appendChild(link);
    
})

const topbarMenuClasses = computed(() => {
    return {
        'layout-topbar-menu-mobile-active': topbarMenuActive.value
    };
});

// Funcion para que cambiar el style de barra de cabecera
window.addEventListener('scroll', function() {
    // Calcula el scroll Y de pantalla
    let alturaScroll = window.scrollY; 

    // Definir el altura que queremos que se va cambiar style 
    let alturaDeseada = 80; 
    
    // Indicar los id de barras
    let navbar = document.getElementById("navbar");
    let navbar1 = document.getElementById("navbar1");

    // Cuando movemos mas de 80 pixel se cambia
    if (alturaScroll >= alturaDeseada) {
        navbar.classList.add('scroll-efecto'); 
        navbar1.classList.add('scroll-efecto'); 
    } else {
        // Cuando el altura vuelve a ser menor que 80 se vuelve
        navbar.classList.remove('scroll-efecto'); 
        navbar1.classList.remove('scroll-efecto'); 
    }
});
</script>

<style lang="scss" scoped>
.layout-topbar-button-c,
.layout-topbar-button-c:hover {
    width: auto;
    background-color: rgb(255, 255, 255, 0);
    border: 0;
    border-radius: 0%;
    padding: 1em;
}

a{
    padding-top: 0px;
}

.navbar{
    width: 100%;
}

.nav-link{
    padding-top: 0px;
}

.container{
    display: flex;
    justify-content: space-between;
    padding-left: 28px;
    width: 100%;
}

$screen-md: 970px;

// Media query para pantallas medianas y más pequeñas
@media only screen and (max-width: $screen-md) {
    .esconderTopBar {
        display: none !important;
    }

    .sideBar{
        display: block!important;;
    }
    
}

.sideBar{
    display: none!important;;
}

.text-2xl {
        font-size: 1.2rem !important;
    }

nav{
    position:absolute;
    z-index: 9998;
    height: 80px;
    
}

.navbar1{
    position:relative;
    width: 100%;
    height: 80px;
    background-color: #D52323;
    z-index: 9999;
    clip-path: polygon(60% 100%, 40% 0%, 100% 0%, 100% 100%);
    color: black;
}

.scroll-efecto {
    position: fixed!important;
}

.logout{
    cursor: pointer;
}

.layout-topbar-button:hover{
    color: #F3BD00;
    transition-duration: 0.5s;
}

</style>
