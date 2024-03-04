<template>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">

            <router-link to="/" >
                <img src="/images/logo.svg" alt="logo AutoEscuelaLZ" height="100px" width="200px" />
                <span></span>
            </router-link>

            <router-link to="info">
                <button class="p-link layout-topbar-button layout-topbar-button-c">
                    Información
                </button>
            </router-link>

            <router-link to="CreateStudent">
                <button v-if="role === 'teacher'" class="p-link layout-topbar-button layout-topbar-button-c">
                Estudiants
                </button>
            </router-link>
            
        
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mt-2 mt-lg-0 me-auto mb-2 mb-lg-0">
                    <LocaleSwitcher />
                </ul>
                <ul class="navbar-nav mt-2 mt-lg-0 ms-auto">
                    <template v-if="!user?.name">
                        <li class="nav-item">
                            <router-link class="nav-link" to="/login">{{ $t('login') }}</router-link>
                        </li>
                    </template>
                    <li v-if="user?.name" class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Hola, {{ user.name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><router-link class="dropdown-item" to="profile">Perfil</router-link></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="javascript:void(0)" @click="logout">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script setup>
import { ref, computed, onMounted, onBeforeUnmount } from 'vue';
import { useLayout } from '../composables/layout';
import { useStore } from 'vuex';
import useAuth from "@/composables/auth";
import LocaleSwitcher from "../components/LocaleSwitcher.vue";

const { onMenuToggle } = useLayout();
const store = useStore();
const user = computed(() => store.state.auth.user)
const role = computed(() => store.state.auth.role)
const { processing, logout } = useAuth();

const topbarMenuActive = ref(false);

const onTopBarMenuButton = () => {
    topbarMenuActive.value = !topbarMenuActive.value;
};

const topbarMenuClasses = computed(() => {
    return {
        'layout-topbar-menu-mobile-active': topbarMenuActive.value
    };
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
    height: 70px;
    width: 100%;
}

.nav-link{
    padding-top: 0px;
}

.container{
    margin: 0px;
    padding-left: 28px;
    width: 100%;
}
</style>
