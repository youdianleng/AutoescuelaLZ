<template>
        <div class="container col-12">
            <div class="row justify-content-center col-12" >
                <div class="col-md-6 d-flex">
                    <div class="col-12 card border-0 shadow-sm loginBox ">
                        <div class="col-12 d-flex boxShadowBox">
                            <div class="card-body col-8">
                                <form @submit.prevent="submitLogin" class="ps-3 pt-3 pb-3 pe-3">
                                    <div class="">
                                        <!-- Email -->
                                        <div class="mb-3 fw-bold">
                                            <label for="email" class="form-label">{{ $t('email') }}</label>
                                            <input v-model="loginForm.email" id="email" type="email" class="form-control" required autofocus autocomplete="username">
                                            <!-- Validation Errors -->
                                            <div class="text-danger mt-1">
                                                <div v-for="message in validationErrors?.email">
                                                    {{ message }}
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Password -->
                                        <div class="mb-4 fw-bold">
                                            <label for="password" class="form-label">
                                                {{ $t('password') }}
                                            </label>
                                            <input v-model="loginForm.password" id="password" type="password" class="form-control" required autocomplete="current-password">
                                            <!-- Validation Errors -->
                                            <div class="text-danger-600 mt-1">
                                                <div v-for="message in validationErrors?.password">
                                                    {{ message }}
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Remember me -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" v-model="loginForm.remember" id="flexCheckIndeterminate">
                                            <label class="form-check-label" for="flexCheckIndeterminate">
                                                {{ $t('remember_me') }}
                                            </label>
                                        </div>

                                        <!-- Buttons -->
                                        <div class="flex items-center justify-end mt-4 mb-4">
                                            <button class="btn btn-primary" :class="{ 'opacity-25': processing }" :disabled="processing">
                                                {{ $t('login') }}
                                            </button>
                                        </div>
                                    </div>
                                    <router-link :to="{name: 'auth.forgot-password'}" class="forgotPassword">{{ $t('forgot_password')}}</router-link>
                                </form>
                            </div>
                            <div class="col-4 noPadding imgDriveHiddenPart">
                                <div class="nubePrincipal col-12"></div>
                                <div class="d-flex">
                                    <div class="nube1"></div>
                                    <div class="nube2"></div>
                                </div>
                                     
                                        <div class="nieves col-12">
                                            <span style="--i:11"></span>
                                            <span style="--i:12"></span>
                                            <span style="--i:15"></span>
                                            <span style="--i:17"></span>
                                            <span style="--i:18"></span>
                                            <span style="--i:13"></span>
                                            <span style="--i:14"></span>
                                            <span style="--i:19"></span>
                                            <span style="--i:20"></span>
                                            <span style="--i:10"></span>
                                            <span style="--i:24"></span>
                                            <span style="--i:21"></span>
                                            <span style="--i:23"></span>
                                            <span style="--i:22"></span>
                                        </div>
                                    </div>
                            </div>
                    
                        
                        
                    </div>
                </div>
            </div>
        </div>
</template>

<script setup>

import useAuth from '@/composables/auth'
import Image from 'primevue/image';

const { loginForm, validationErrors, processing, submitLogin } = useAuth();

</script>

<style scoped>

.btn-primary{
    background-color: #273C7A;
    color: white;
}


.loginBox{
    margin-top: 150px;
    margin-bottom: 150px;
    padding: 0px;
}

.container{
    max-width: 100%;
    background-image: url("/images/Drive.jpg");
    margin-left: 0px;
    margin-right: 0px;
    background-size: cover;
}

.boxShadowBox{
    box-shadow: 10px 10px 5px 1px white;
    border: 1px black solid;
    border-radius: 5px;
    padding: 0px;
}

.noPadding{
    padding: 0px;
    opacity: 0.8;
}

.imgDriveHiddenPart{
    position: relative;
    overflow: hidden;
    background-image: url("/images/semana_santa.png");
    background-size: cover;
}

#email{
    border-top: 0px;
    border-left: 0px;
    border-right: 0px;
    border-radius: 0px;
    border-color: black ;
    padding: 0px;
}

#email:focus{
    outline: none!important;
    box-shadow: none;
}

#password{
    border-top: 0px;
    border-left: 0px;
    border-right: 0px;
    border-radius: 0px;
    border-color: black ;
    padding: 0px;
}

#password:focus{
    outline: none!important;
    box-shadow: none;
}

.forgotPassword{
    color: grey;
}

.forgotPassword:hover{
    color: blue;
    transition: 1s;
}

.nubePrincipal{
    position: absolute;
    width: 100%;
    height: 30px;
    background-color: white;
}

.nube1{
    position: relative;
    width: 60%;
    height: 50px;
    background-color: white;
    border-radius: 50%;
}

.nube2{
    position: relative;
    width: 40%;
    height: 40px;
    background-color: white;
    border-radius: 50%;
}

.nieves{
    position: relative;
    display: flex;
    height: 100%;
}

.nieves span{
    position: relative;
    width: 5%!important;
    height: 20px!important;
    background-color: white;
    margin:2%;
    padding-bottom: 10%;
    border-radius: 50%;
    filter: blur(1px);
    animation: nevendo 5s linear infinite;
    animation-duration:
        calc(35s / var(--i));

}

@keyframes nevendo {
    0% {
        transform: translateX(0) translateY(0);
    }
    70% {
        transform: translateX(0) translateY(300px) scale(1);
    }
    100% {
        transform: translateX(0) translateY(300px) scale(0);
    }
}

</style>