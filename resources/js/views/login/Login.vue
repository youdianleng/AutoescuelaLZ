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
@import '/resources/css/login.css';

</style>