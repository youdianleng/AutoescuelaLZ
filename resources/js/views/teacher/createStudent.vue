<template>
    <div class="grid mt-5">
        <!-- Exist Student Panel (Edit Student or Delete Student)-->
        <div class="col-12 row justify-content-center">
            <div class="principalEdit card col-11">
                <h2>Editar Estudiantes</h2>
                <div class="muestraEstudiantes col-12 mt-5">
                    <div class="d-flex justify-content-end col-12">
                        <div class="col-4 d-flex justify-content-around">   
                            <button @click.prevent="panelCreateStudent()" class="btn btn-dark col-5 border">Nueva Estudiante</button>
                            <button @click.prevent="panelEditStudent()" class="btn btn-dark col-5 border">Edit Student</button>
                        </div>
                    </div>
                    
                    <div class="divDinamica col-lg-12" id="divDinamica">
                       <table class="col-12 d-flex justify-content-around" id="divPrincipalCreate">
                            <tbody class="col-12 row justify-content-around">
                                <tr class="col-12 d-flex justify-content-around border-top border-bottom">
                                    <th class="col-2">Full Name</th>
                                    <th class="col-2">Email</th>
                                    <th class="col-2">Password</th>
                                    <th class="col-2">License</th>
                                    <th class="col-2">Teacher</th>
                                    <th class="col-2">Edit</th>
                                </tr>
                                <tr v-for="student in students" class="col-12 d-flex justify-content-around">
                                    <td class="col-2">{{ student.name }}  {{ student.surname }}</td>
                                    <td class="col-2">{{ student.email }}</td>
                                    <td class="col-2">{{ student.password }}</td>
                                    <td class="col-2" v-if="student.license_id === 1">Coche</td>
                                    <td class="col-2" v-else="student.license_id === 2">Moto</td>
                                    <td class="col-2">{{ student.teacher_id }}</td>
                                    <td class="col-2 d-flex justify-content-between">
                                        <router-link :to="{ name: 'EditStudent', params: { id: student.id } }">
                                            <button type="submit" class="editButton btn btn-primary">Editar</button>
                                        </router-link>
                                        <button @click.prevent="deleteStudent(student.id)" class="editButton btn btn-primary">Eliminar</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>


         



        <!-- {{ users.data[0]}} -->
        <!-- <div class="col-12 d-flex justify-content-center">
            <div class="row col-11">
                <div class="card col-12 ">
                    <div class="formularioCrearStudent">
                        <div class="contenidoStudent">
                            <h2>Nuevas Estudiantes</h2>   
                            <div class="d-flex">
                                <div class="col-12 row">
                                    <form @submit.prevent="createStudent" class="col-12 row">
                                        <input placeholder="Nombre" v-model="student.name" name="name" required>
                                        {{ errors.name }}
                                        {{ name }}
                                        <input class="mt-4" name="surname" v-model="student.surname" placeholder="Apellido">
                                        <input class="mt-4" name="image" v-model="student.image" placeholder="Imagen">
                                        <input type="mail" name="email" v-model="student.email" class="mt-4" placeholder="Email" required>
                                        {{ errors.email }}
                                        <input class="mt-4" name="password" v-model="student.password" placeholder="Contraseña" required>
                                        {{ errors.password }}
                                        <select class="mt-4" name="license_id" v-model="student.license_id" required>
                                            <option>1</option>
                                            <option>2</option>
                                        </select>
                                        {{ errors.licencia_id }}
                                        <select class="mt-4" name="teacher_id" v-model="student.teacher_id" required>
                                            <option>1</option>
                                            <option>2</option>
                                        </select>
                                        {{ errors.teacher_id }}
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="col-3 mt-3 btn btn-dark">Crear</button>
                                        </div>
                                        
                                    </form>
                                
                                </div>
                            
                            </div>
                           
                        </div>
                        

                    </div>
                </div>
            </div>
            
        </div> -->
    </div>
</template>
  

<script setup>
// Import all the library 
import { ref, onMounted, reactive, createElementBlock } from "vue";
import { useForm, useField } from "vee-validate";
import { useRoute } from "vue-router";
import * as yup from 'yup';
import { es } from 'yup-locales';
import { setLocale } from 'yup';
// import useUsers from "../../composables/users";
// const {users, getUsers, deleteUser} = useUsers()

// Get all the student we have in bbdd
const students = ref();

onMounted(() => {

    // getUsers();
    axios.get('/api/student')
        .then(response => {
            students.value = response.data;

        })
        .catch(function (error) {
            console.log(error);
        });
})



// asigment of the required validation fields
const schema = yup.object({
    name: yup.string().required().max(5).label('Nombre'),
    password: yup.string().required().label('password'),
    email: yup.string().required().label('email'),
    license_id: yup.string().required().label('license_id'),
    teacher_id: yup.string().required().label('teacher_id'),

})

// Define the validate using form fields
const { validate, errors } = useForm({ validationSchema: schema })
const route = useRoute()

// Set the Success and Error message
const strSuccess = ref();
const strError = ref();

setLocale(es);


// Get the value from the form Inputs
const { value: name } = useField('name', null, { initialValue: '' });
const { value: surname } = useField('surname', null, { initialValue: '' });
const { value: image } = useField('image', null, { initialValue: '' });
const { value: email } = useField('email', null, { initialValue: '' });
const { value: password } = useField('password', null, { initialValue: '' });
const { value: license_id } = useField('license_id', null, { initialValue: '' });
const { value: teacher_id } = useField('teacher_id', null, { initialValue: '' });

// Create an array with all the value send by form
const student = reactive({
    name,
    surname,
    image,
    email,
    password,
    license_id,
    teacher_id
})


// Send to create one Student calling the function we defined in API
function createStudent() {
// if validate 
validate().then(form => {
    console.log('validate');
    //If the content of the form is validate
    if (form.valid) {
        // Call the funtion with all the content we saved (Sending as $request)
        axios.post('/api/student/create', student)
            .then(response => {
                strError.value = ""
                strSuccess.value = response.data.success
            })
            .catch(function (error) {
                strSuccess.value = ""
                strError.value = error.response.data.message
            });
    }
})

}


// Delete the user
function deleteStudent($id) {
// if validate 
validate().then(form => {
    console.log('validate');
    //If the content of the form is validate
    if (form.valid) {
        // Call the funtion with all the content we saved (Sending as $request)
        axios.delete('/api/student/'+$id)
            .then(response => {
                strError.value = ""
                strSuccess.value = response.data.success
            })
            .catch(function (error) {
                strSuccess.value = ""
                strError.value = error.response.data.message
            });
    }
})

}


// Mostrar panel de crear nueva usuario
function panelCreateStudent(){


    let divPrincipal = document.getElementById("divDinamica");

    if (document.getElementById("divPrincipalEdit")){
        let borrarEdit = document.getElementById("divPrincipalEdit");
        borrarEdit.remove();
    }


     if (document.getElementById("divPrincipalCreate")){
        let borrarPrincipal = document.getElementById("divPrincipalCreate");
        borrarPrincipal.remove();
        let divPrincipalCreate = document.createElement("div");
        divPrincipalCreate.id = "divPrincipalCreate";
        divPrincipal.append(divPrincipalCreate);
        divPrincipalCreate.classList.add("col-12", "d-flex", "justify-content-center");

        let divSegundarioCreate = document.createElement("div");
        divPrincipalCreate.append(divSegundarioCreate);
        divSegundarioCreate.id = "divSegundarioCreate";
        divSegundarioCreate.classList.add("row", "col-11");

        let divTerceraCreate = document.createElement("div");
        divSegundarioCreate.append(divTerceraCreate);
        divTerceraCreate.classList.add("card", "col-12");
        divTerceraCreate.id = "divTerceraCreate";

        let boxFormCreateStudent = document.createElement("div");
        divTerceraCreate.append(boxFormCreateStudent);
        boxFormCreateStudent.classList.add("formularioCrearStudent");

        let contenidoStudent = document.createElement("div");
        boxFormCreateStudent.append(contenidoStudent);
        contenidoStudent.classList.add("contenidoStudent");

        let h2ContenidoStudent = document.createElement("h2");
        contenidoStudent.append(h2ContenidoStudent);
        h2ContenidoStudent.innerHTML = "Nuevas Estudiantes";

        let cajaPrincipalForm = document.createElement("div");
        contenidoStudent.append(cajaPrincipalForm);
        cajaPrincipalForm.classList.add("d-flex");

        let comienzaForm = document.createElement("div");
        cajaPrincipalForm.append(comienzaForm);
        comienzaForm.classList.add("col-12","row");

        let formCreateStudent = document.createElement("form");
        comienzaForm.append(formCreateStudent);
        formCreateStudent.classList.add("col-12","row");
        formCreateStudent.setAttribute("v-on:submit.prevent", "createStudent()");

        let inputName = document.createElement("input");
        formCreateStudent.append(inputName);
        inputName.placeholder = "Nombre";
        inputName.setAttribute("v-model","student.name");
        inputName.setAttribute("required","");
        inputName.name = "name";

        let mostrarErrorName = document.createElement("p");
        formCreateStudent.append(mostrarErrorName);
        mostrarErrorName.innerHTML = "{{ errors.name }}";

        let inputSurname = document.createElement("input");
        formCreateStudent.append(inputSurname);
        inputSurname.classList.add("mt-4");
        inputSurname.name = "surname";
        inputSurname.setAttribute("v-model","student.surname");
        inputSurname.placeholder = "Apellido";

        let inputImage = document.createElement("input");
        formCreateStudent.append(inputImage);
        inputImage.classList.add("mt-4");
        inputImage.name = "image";
        inputImage.setAttribute("v-model","student.image");
        inputImage.placeholder = "Imagen";

        let inputEmail = document.createElement("input");
        formCreateStudent.append(inputEmail);
        inputEmail.classList.add("mt-4");
        inputEmail.name = "email";
        inputEmail.setAttribute("v-model","student.email");
        inputEmail.placeholder = "Email";
        inputEmail.type = "mail";
        inputEmail.setAttribute("required","");
        
        let errorEmail = document.createElement("p");
        formCreateStudent.append(errorEmail);
        errorEmail.innerHTML = "{{ errors.email }}";

        let inputPassword = document.createElement("input");
        formCreateStudent.append(inputPassword);
        inputPassword.classList.add("mt-4");
        inputPassword.name = "password";
        inputPassword.setAttribute("v-model","student.password");
        inputPassword.placeholder = "Contraseña";
        inputPassword.type = "password";
        inputPassword.setAttribute("required","");

        let errorContrasenya = document.createElement("p");
        formCreateStudent.append(errorContrasenya);
        errorContrasenya.innerHTML = "{{ errors.password }}";

        let selectLicencia = document.createElement("select");
        formCreateStudent.append(selectLicencia);
        selectLicencia.classList.add("mt-4");
        selectLicencia.name = "license_id";
        selectLicencia.setAttribute("v-model","student.license_id");
        selectLicencia.setAttribute("required","");

        let optionOne = document.createElement("option");
        selectLicencia.append(optionOne);
        optionOne.innerHTML = "1";

        let optionTwo = document.createElement("option");
        selectLicencia.append(optionTwo);
        optionTwo.innerHTML = "2";

        let errorLicensia_id = document.createElement("p");
        formCreateStudent.append(errorLicensia_id);
        errorLicensia_id.innerHTML = "{{ errors.licencia_id }}";

        let selectTeacher_id = document.createElement("select");
        formCreateStudent.append(selectTeacher_id);
        selectTeacher_id.classList.add("mt-4");
        selectTeacher_id.name = "teacher_id";
        selectTeacher_id.setAttribute("v-model","student.teacher_id");
        selectTeacher_id.setAttribute("required","");

        let optionTeacherOne = document.createElement("option");
        selectTeacher_id.append(optionTeacherOne);
        optionTeacherOne.innerHTML = "1";

        let optionTeacherTwo = document.createElement("option");
        selectTeacher_id.append(optionTeacherTwo);
        optionTeacherTwo.innerHTML = "2";

        let errorTeacher_id = document.createElement("p");
        formCreateStudent.append(errorTeacher_id);
        errorTeacher_id.innerHTML = "{{ errors.teacher_id }}";

        let boxBotonEnviar = document.createElement("div");
        formCreateStudent.append(boxBotonEnviar);
        boxBotonEnviar.classList.add("col-12","d-flex","justify-content-end");

        let botonEnviar = document.createElement("button");
        boxBotonEnviar.append(botonEnviar);
        botonEnviar.classList.add("col-3","mt-3","btn","btn-dark");
        botonEnviar.type = "submit";
        botonEnviar.innerHTML = "Crear";

     }else{

        let divPrincipalCreate = document.createElement("div");
        divPrincipalCreate.id = "divPrincipalCreate";
        divPrincipal.append(divPrincipalCreate);
        divPrincipalCreate.classList.add("col-12", "d-flex", "justify-content-center");

        let divSegundarioCreate = document.createElement("div");
        divPrincipalCreate.append(divSegundarioCreate);
        divSegundarioCreate.id = "divSegundarioCreate";
        divSegundarioCreate.classList.add("row", "col-11");

        let divTerceraCreate = document.createElement("div");
        divSegundarioCreate.append(divTerceraCreate);
        divTerceraCreate.classList.add("card", "col-12");
        divTerceraCreate.id = "divTerceraCreate";

        let boxFormCreateStudent = document.createElement("div");
        divTerceraCreate.append(boxFormCreateStudent);
        boxFormCreateStudent.classList.add("formularioCrearStudent");

        let contenidoStudent = document.createElement("div");
        boxFormCreateStudent.append(contenidoStudent);
        contenidoStudent.classList.add("contenidoStudent");

        let h2ContenidoStudent = document.createElement("h2");
        contenidoStudent.append(h2ContenidoStudent);
        h2ContenidoStudent.innerHTML = "Nuevas Estudiantes";

        let cajaPrincipalForm = document.createElement("div");
        contenidoStudent.append(cajaPrincipalForm);
        cajaPrincipalForm.classList.add("d-flex");

        let comienzaForm = document.createElement("div");
        cajaPrincipalForm.append(comienzaForm);
        comienzaForm.classList.add("col-12","row");

        let formCreateStudent = document.createElement("form");
        comienzaForm.append(formCreateStudent);
        formCreateStudent.classList.add("col-12","row");
        formCreateStudent.setAttribute("v-on:submit.prevent", "createStudent");

        let inputName = document.createElement("input");
        formCreateStudent.append(inputName);
        inputName.placeholder = "Nombre";
        inputName.setAttribute("v-model","student.name");
        inputName.setAttribute("required","");
        inputName.name = "name";

        let mostrarErrorName = document.createElement("p");
        formCreateStudent.append(mostrarErrorName);
        mostrarErrorName.innerHTML = "{{ errors.name }}";

        let inputSurname = document.createElement("input");
        formCreateStudent.append(inputSurname);
        inputSurname.classList.add("mt-4");
        inputSurname.name = "surname";
        inputSurname.setAttribute("v-model","student.surname");
        inputSurname.placeholder = "Apellido";

        let inputImage = document.createElement("input");
        formCreateStudent.append(inputImage);
        inputImage.classList.add("mt-4");
        inputImage.name = "image";
        inputImage.setAttribute("v-model","student.image");
        inputImage.placeholder = "Imagen";

        let inputEmail = document.createElement("input");
        formCreateStudent.append(inputEmail);
        inputEmail.classList.add("mt-4");
        inputEmail.name = "email";
        inputEmail.setAttribute("v-model","student.email");
        inputEmail.placeholder = "Email";
        inputEmail.type = "mail";
        inputEmail.setAttribute("required","");
        
        let errorEmail = document.createElement("p");
        formCreateStudent.append(errorEmail);
        errorEmail.innerHTML = "{{ errors.email }}";

        let inputPassword = document.createElement("input");
        formCreateStudent.append(inputPassword);
        inputPassword.classList.add("mt-4");
        inputPassword.name = "password";
        inputPassword.setAttribute("v-model","student.password");
        inputPassword.placeholder = "Contraseña";
        inputPassword.type = "password";
        inputPassword.setAttribute("required","");

        let errorContrasenya = document.createElement("p");
        formCreateStudent.append(errorContrasenya);
        errorContrasenya.innerHTML = "{{ errors.password }}";

        let selectLicencia = document.createElement("select");
        formCreateStudent.append(selectLicencia);
        selectLicencia.classList.add("mt-4");
        selectLicencia.name = "license_id";
        selectLicencia.setAttribute("v-model","student.license_id");
        selectLicencia.setAttribute("required","");

        let optionOne = document.createElement("option");
        selectLicencia.append(optionOne);
        optionOne.innerHTML = "1";

        let optionTwo = document.createElement("option");
        selectLicencia.append(optionTwo);
        optionTwo.innerHTML = "2";

        let errorLicensia_id = document.createElement("p");
        formCreateStudent.append(errorLicensia_id);
        errorLicensia_id.innerHTML = "{{ errors.licencia_id }}";

        let selectTeacher_id = document.createElement("select");
        formCreateStudent.append(selectTeacher_id);
        selectTeacher_id.classList.add("mt-4");
        selectTeacher_id.name = "teacher_id";
        selectTeacher_id.setAttribute("v-model","student.teacher_id");
        selectTeacher_id.setAttribute("required","");

        let optionTeacherOne = document.createElement("option");
        selectTeacher_id.append(optionTeacherOne);
        optionTeacherOne.innerHTML = "1";

        let optionTeacherTwo = document.createElement("option");
        selectTeacher_id.append(optionTeacherTwo);
        optionTeacherTwo.innerHTML = "2";

        let errorTeacher_id = document.createElement("p");
        formCreateStudent.append(errorTeacher_id);
        errorTeacher_id.innerHTML = "{{ errors.teacher_id }}";

        let boxBotonEnviar = document.createElement("div");
        formCreateStudent.append(boxBotonEnviar);
        boxBotonEnviar.classList.add("col-12","d-flex","justify-content-end");

        let botonEnviar = document.createElement("button");
        boxBotonEnviar.append(botonEnviar);
        botonEnviar.classList.add("col-3","mt-3","btn","btn-dark");
        botonEnviar.innerHTML = "Crear";
        botonEnviar.id = "CrearStudent";

    }

    // let clicar = document.getElementById("CrearStudent");
    // clicar.addEventListener("click", function(){
    //     createStudent();
    // })


}


// Panel for create a new Licence
function panelEditStudent(){


let divPrincipal = document.getElementById("divDinamica");


if (document.getElementById("divPrincipalCreate")){
        let borrarPrincipal = document.getElementById("divPrincipalCreate");
        borrarPrincipal.remove();
}

 if (document.getElementById("divPrincipalEdit")){
    let borrarEdit = document.getElementById("divPrincipalEdit");
    borrarEdit.remove();
    let tableEdit = document.createElement("table");
    tableEdit.id = "divPrincipalEdit";
    divPrincipal.append(tableEdit);
    tableEdit.classList.add("col-12","d-flex","justify-content-around");

    let tbodyEdit = document.createElement("tbody");
    tableEdit.append(tbodyEdit);
    tbodyEdit.classList.add("col-12","row","justify-content-around");

    let trPrimero = document.createElement("tr");
    tbodyEdit.append(trPrimero);
    trPrimero.classList.add("col-12","d-flex","justify-content-around","border-top","border-bottom");

    let thName = document.createElement("th");
    trPrimero.append(thName);
    thName.classList.add("col-2");
    thName.innerHTML = "Full Name";

    let thEmail = document.createElement("th");
    trPrimero.append(thEmail);
    thEmail.classList.add("col-2");
    thEmail.innerHTML = "Email";

    let thPassword = document.createElement("th");
    trPrimero.append(thPassword);
    thPassword.classList.add("col-2");
    thPassword.innerHTML = "Password";

    let thLicense = document.createElement("th");
    trPrimero.append(thLicense);
    thLicense.classList.add("col-2");
    thLicense.innerHTML = "License";

    let thTeacher = document.createElement("th");
    trPrimero.append(thTeacher);
    thTeacher.classList.add("col-2");
    thTeacher.innerHTML = "Teacher";

    let thEdit = document.createElement("th");
    trPrimero.append(thEdit);
    thEdit.classList.add("col-2");
    thEdit.innerHTML = "Edit";

    let trSegundo = document.createElement("tr");
    tbodyEdit.append(trSegundo);
    trSegundo.setAttribute("v-for","student in students");
    trSegundo.classList.add("col-12","d-flex","justify-content-around");

    let tdName = document.createElement("td");
    trSegundo.append(tdName);
    tdName.classList.add("col-2");
    tdName.innerHtml = "{{ student.name }}" + "{{ student.name }}";

    let tdEmail = document.createElement("td");
    trSegundo.append(tdEmail);
    tdEmail.classList.add("col-2");
    tdEmail.innerHtml = "{{ student.email }}";

    let tdPassword = document.createElement("td");
    trSegundo.append(tdPassword);
    tdPassword.classList.add("col-2");
    tdPassword.innerHtml = "{{ student.password }}";

    let tdLicense_Coche = document.createElement("td");
    trSegundo.append(tdLicense_Coche);
    tdLicense_Coche.classList.add("col-2");
    tdLicense_Coche.setAttribute("v-if","student-license_id === 1");
    tdLicense_Coche.innerHtml = "Coche";

    // let tdLicense_Moto = document.createElement("td");
    // trSegundo.append(tdLicense_Moto);
    // tdLicense_Moto.classList.add("col-2");
    // tdLicense_Moto.setAttribute("v-if","student-license_id === 2");
    // tdLicense_Moto.innerHtml = "Moto";
    

    let tdTeacher_id = document.createElement("td");
    trSegundo.append(tdTeacher_id);
    tdTeacher_id.classList.add("col-2");
    tdTeacher_id.innerHtml = "{{ student.teacher_id }}";

    let tdEdit = document.createElement("td");
    trSegundo.append(tdEdit);
    tdEdit.classList.add("col-2","d-flex","justify-content-between");

    let routeTdEdit = document.createElement("router-link");
    tdEdit.append(routeTdEdit);
    routeTdEdit.setAttribute(":to","'{ name: 'EditStudent', params: { id: student.id } }''");

    let buttonRouteEdit = document.createElement("button");
    routeTdEdit.append(buttonRouteEdit);
    buttonRouteEdit.type = "submit";
    buttonRouteEdit.classList.add("editButton","btn","btn-primary");
    buttonRouteEdit.innerHTML = "Editar";

    let buttonDelete = document.createElement("button");
    tdEdit.append(buttonDelete);
    buttonDelete.setAttribute("v-on:click.prevent","deleteStudent(student.id)");
    buttonDelete.classList.add("editButton","btn","btn-primary");
    buttonDelete.innerHTML = "Eliminar";

 }else{
    let tableEdit = document.createElement("table");
    tableEdit.id = "divPrincipalEdit";
    divPrincipal.append(tableEdit);
    tableEdit.classList.add("col-12","d-flex","justify-content-around");

    let tbodyEdit = document.createElement("tbody");
    tableEdit.append(tbodyEdit);
    tbodyEdit.classList.add("col-12","row","justify-content-around");

    let trPrimero = document.createElement("tr");
    tbodyEdit.append(trPrimero);
    trPrimero.classList.add("col-12","d-flex","justify-content-around","border-top","border-bottom");

    let thName = document.createElement("th");
    trPrimero.append(thName);
    thName.classList.add("col-2");
    thName.innerHTML = "Full Name";

    let thEmail = document.createElement("th");
    trPrimero.append(thEmail);
    thEmail.classList.add("col-2");
    thEmail.innerHTML = "Email";

    let thPassword = document.createElement("th");
    trPrimero.append(thPassword);
    thPassword.classList.add("col-2");
    thPassword.innerHTML = "Password";

    let thLicense = document.createElement("th");
    trPrimero.append(thLicense);
    thLicense.classList.add("col-2");
    thLicense.innerHTML = "License";

    let thTeacher = document.createElement("th");
    trPrimero.append(thTeacher);
    thTeacher.classList.add("col-2");
    thTeacher.innerHTML = "Teacher";

    let thEdit = document.createElement("th");
    trPrimero.append(thEdit);
    thEdit.classList.add("col-2");
    thEdit.innerHTML = "Edit";

    let trSegundo = document.createElement("tr");
    tbodyEdit.append(trSegundo);
    trSegundo.setAttribute("v-for","student in students");
    trSegundo.classList.add("col-12","d-flex","justify-content-around");

    let tdName = document.createElement("td");
    trSegundo.append(tdName);
    tdName.classList.add("col-2");
    tdName.innerHtml = "{{ student.name }}" + "{{ student.name }}";

    let tdEmail = document.createElement("td");
    trSegundo.append(tdEmail);
    tdEmail.classList.add("col-2");
    tdEmail.innerHtml = "{{ student.email }}";

    let tdPassword = document.createElement("td");
    trSegundo.append(tdPassword);
    tdPassword.classList.add("col-2");
    tdPassword.innerHtml = "{{ student.password }}";

    let tdLicense_Coche = document.createElement("td");
    trSegundo.append(tdLicense_Coche);
    tdLicense_Coche.classList.add("col-2");
    tdLicense_Coche.setAttribute("v-if","student-license_id === 1");
    tdLicense_Coche.innerHtml = "Coche";

    // let tdLicense_Moto = document.createElement("td");
    // trSegundo.append(tdLicense_Moto);
    // tdLicense_Moto.classList.add("col-2");
    // tdLicense_Moto.setAttribute("v-if","student-license_id === 2");
    // tdLicense_Moto.innerHtml = "Moto";
    

    let tdTeacher_id = document.createElement("td");
    trSegundo.append(tdTeacher_id);
    tdTeacher_id.classList.add("col-2");
    tdTeacher_id.innerHtml = "{{ student.teacher_id }}";

    let tdEdit = document.createElement("td");
    trSegundo.append(tdEdit);
    tdEdit.classList.add("col-2","d-flex","justify-content-between");

    let routeTdEdit = document.createElement("router-link");
    tdEdit.append(routeTdEdit);
    routeTdEdit.setAttribute(":to","'{ name: 'EditStudent', params: { id: student.id } }''");

    let buttonRouteEdit = document.createElement("button");
    routeTdEdit.append(buttonRouteEdit);
    buttonRouteEdit.type = "submit";
    buttonRouteEdit.classList.add("editButton","btn","btn-primary");
    buttonRouteEdit.innerHTML = "Editar";

    let buttonDelete = document.createElement("button");
    tdEdit.append(buttonDelete);
    buttonDelete.setAttribute("v-on:click.prevent","deleteStudent(student.id)");
    buttonDelete.classList.add("editButton","btn","btn-primary");
    buttonDelete.innerHTML = "Eliminar";
}


}
</script>

<style>
    
    
    .menuSelect{
        padding: 30px;
        background-color: white;
        border-radius: 12px;
        border: 1px solid var(--surface-border);
    }

    .row > *{
        padding: 0px;
    }

    .botoneCreacion{
        border: 1px black solid;
    }

    .botoneCreacionAlumno:hover{
        border: 1px #D5D8DC solid;
    }

    .botoneCreacionPregunta:hover{
        border: 1px #D5D8DC solid;
    }

    .borderCreacion{
        padding: 20px;
        border-radius: 10px;
    }

    .botoneCreacionAlumno{
        padding: 20px;
        margin-top: 30px;
        border-radius: 10px;
        border: 1px black solid;
    }

    .botoneCreacionPregunta{
        padding: 20px;
        margin-top: 30px;
        border-radius: 10px;
        border: 1px black solid;
    }

    .editButton{
        width: 92px;
        height: 32px;
    }

    /* Formulario de estudiante */
    .formularioCrearStudent{
        padding: 20px;
    }

    .formularioCrearStudent form{
        padding: 20px;
    }

    .contenidoStudent input{
        padding: 5px;
        border-radius: 5px;
        border: 1px black solid;
    }

    .contenidoStudent select{
        padding: 5px;
        border-radius: 5px;
        border: 1px black solid;
    }

    .textoDeRecuerdo{
        padding-left: 20px;
        padding-top: 30px;
        text-align: justify;
    }

    .contenidoStudent button{
        padding-top: 10px;
        padding-bottom: 10px;
        padding-left: 35px;
        padding-right: 35px;
    }



    /* Principal box for Edit User Panel */
    .principalEdit{
        padding: 20px;
    }
</style>