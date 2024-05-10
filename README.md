# Características

Ejemplo proyecto Laravel 10 + vue3 PAra DAW

- ✅ Laravel 10
- ✅ Vue 3
- ✅ VueRouter + Vuex
- ✅ Vue i18n Multi Idioma
- ✅ Iniciar sesión
- ✅ Restablecimiento de contraseña
- ✅ Login
- ✅ Panel de administración
- ✅ Gestión de perfiles
- ✅ Gestión de usuarios
- ✅ Gestión de roles
- ✅ Gestión de permisos
- ✅ Cambio de contraseña
- ✅ Verificación de correo electrónico
- ✅ Gestión de Posts
- ✅ Blog de Frontend
- ✅ Boostrap 5

## Proyecto Laravel Vue 3 AutoescuelaLZ
### Descripción
Este proyecto está basado en vue3 y utiliza la escuela de manejo como ejemplo. El objetivo es imitar un sitio web de escuela de manejo real. Usamos php, js, vue3 y algunos conocimientos de front-end para iniciar el proyecto. A continuación puede encontrar algunos documentos e información importantes que necesita saber para comprender mejor cómo se crea el proyecto. 
Para iniciar el proyecto necesitaremos instalar XAMPP y BBDD phpMyAdmin para poder seguir y ejecutar el proyecto.
### Requisitos  
Habilidades que vamos a usar:  
- PHP
- Javascript
- HTML
- CSS
- VUE3
- PRIME VUE

Herramientas:
- XAMPP
- PhpMyAdmin
- VisualCode / Otros Compilador 

## Instalación
Necesitaremos realizar lo siguiente para poder iniciar y ejecutar nuestro proyecto.
1. Instalar XAMPP:
   Puedes usar el Link para redireccionar hacia pagina oficial de XAMPP y Instalar el ultimo version  (8.1.2 o Mayor)
   [XAMPP_LAST_VERSION](https://www.apachefriends.org/es/download.html)  
   1- Setup Panel  
      <img src="/readmeSource/SetupXampp.png" alt="Setup" width="350" height="300">  
   2- Instalacion de servidores  
      <img src="/readmeSource/Setup2Xampp.png" alt="Setup" width="350" height="300">  
   3- Seleccionar ruta de instalacion  
      <img src="/readmeSource/Setup3Xampp.png" alt="Setup" width="350" height="300">  
   4- Elegir lenguaje  
      <img src="/readmeSource/Setup4Xampp.png" alt="Setup" width="350" height="300">  
   5- Ir a ruta donde has instalado el Xampp  
      <img src="/readmeSource/UseXampp.png" alt="Setup" width="2200" height="100">  
   6- Despues de activar el "Xampp control" -> Ejecutar los Servidores  
      <img src="/readmeSource/Use2Xampp.png" alt="Setup" width="350" height="300">  

## Instalacion GIT   
En tu visualcode o en otros compilador hacer lo siguiente para poder bajar el proyecto
### Instalar Git Hub Desktop  
Para poder crear un fichero como repositorio tenemos que bajar el GIT HUB  
[GIT HUB](https://desktop.github.com/)  

### Prepara Repositorio  
1. Despues de bajar el git hub tienes que Crear / Logear tu cuenta de GIT HUB  
   <img src="/readmeSource/github.png" alt="Setup" width="350" height="300">  
3. Luego Crear un nuevo repositorio (Sera donde se almacera todos los ficheros de proyecto y se conectara con el github)  
   <img src="/readmeSource/github2.png" alt="Setup" width="500" height="300">  
5. Desde compilador ubica en repositorio desde comando prompt y realizar lo siguientes pasos  
   <img src="/readmeSource/github3.png" alt="Setup" width="1800" height="100">  


### Clonar Repositorio 

```bash
git clone ....
```

### Instalar vía Composer

```bash
composer install
```

### Copiar el fichero .env.example  a .env edita las credenciales y la url


### Generar Application Key

```bash
php artisan key:generate
```

### Migrar base de datos

```bash
php artisan migrate
```

### Lanzar Seeders

```bash
php artisan db:seed
```

### Instalar las dependencias de Node

```bash
npm install

npm run dev
```
### Lanzar a producción

```bash
npm run build or yarn build
```
