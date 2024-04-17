import { ref, inject, reactive } from 'vue'
import { useRouter } from 'vue-router'
export default function useEdit() {

    const strSuccess = ref();
    const strError = ref();
    const swal = inject('$swal');

    // Save the student data changed
    const saveTask = async($id, $student) =>{
         // getUsers();
         axios.post('/api/student/update/'+$id, $student)
         .then(response => {
             strError.value = ""
             strSuccess.value = response.data.success
             swal({
                 icon: "success",
                 title: "Datos Cambiados"
             })
             location.reload(); 
         })
         .catch(function (error) {
             strSuccess.value = ""
             strError.value = error.response.data.message
             swal({
                 icon: "error",
                 title: "Datos Incorrectos"
             })
             location.reload(); 
         });
    }

    return{
        saveTask,
    }
}