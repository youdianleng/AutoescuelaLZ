<template>
    <div class="bg-image">
        <div class="container">
            <div class="row justify-content-center" >
                <div class="col-md-6 d-flex">
                    <div class="col-12 card border-0 shadow-sm loginBox ">
                        <div class="col-12 d-flex boxShadowBox">
                            <div class="card-body col-6">
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
                            <div class="col-6 noPadding imgDriveHiddenPart">
                                
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

.bg-image{
    background-image: url("/images/Drive.jpg");
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
    overflow: hidden;
    background-image: url("/images/Drive.jpg");
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


</style>