<template>
    <div class="grid">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between pb-2 mb-2">
                        <h5 class="card-title">Todas las tareas</h5>
                        <div>
                            <router-link :to="{name: 'tasks.create'}" class="btn btn-success">Nueva Tarea</router-link>
                        </div>

                    </div>


                    <table class="table table-hover table-sm">
                        <thead class="bg-dark text-light">
                            <tr>
                                <th width="50" class="text-center">#</th>
                                <th>Name</th>
                                <th>description</th>
                                <th>date_open</th>
                                <th>date_close</th>
                                <th class="text-center" width="200">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr  v-for="task in tasks">
                                <td class="text-center">id</td>
                                <td>{{task.name}}</td>                                
                                <td>{{task.description}}</td>
                                <td>{{task.date_open}}</td>
                                    <th>{{task.date_close}}</th>
                                <td class="text-center">
                                <a class="btn btn-warning mr-1">Edit</a>
                                <button class="btn btn-danger">Delete</button>
                                </td>                               
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>


<script setup>
import {ref, onMounted} from "vue"
const tasks = ref();

    onMounted(()=>{
        // console.log('Mi vista esta montada');
        axios.get('/api/tasks')
        .then(response => {
            tasks.value = response.data;
            console.log(response.data);
        })  
    });


</script>


<style>


</style>
