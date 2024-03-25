
import { ref, inject } from 'vue'
import { useRouter } from 'vue-router'

export default function useStudent() {
    //Swal
    const swal = inject('$swal');
    // Set the Success and Error message
    const strSuccess = ref();
    const strError = ref();
    // Create an array with all the value send by form
    const createStudent = async(student) =>{
        strSuccess.value = {};
        strError.value = {};
        let serializedPost = new FormData()
        for (let item in student) {
            if (student.hasOwnProperty(item)) {
                serializedPost.append(item, student[item])
            }
        }
        // Call the funtion with all the content we saved (Sending as $request)
        axios.post('/api/student/create', serializedPost, {
            headers: {
                "content-type": "multipart/form-data"
            }
        })
            .then(response => {
                strError.value = ""
                strSuccess.value = response.data.success
                swal({
                    icon: "success",
                    title: "Usuario creado con exito"
                })
            })
            .catch(function (error) {
                strSuccess.value = ""
                if (error.response?.data) {
                   strError.value = error.response.data.errors
                }
                swal({
                    icon: "error",
                    title: "Correo ya registrado"
                })

            });
    }

    const deleteStudent = async($id) =>{
        axios.delete('/api/student/' + $id)
        .then(response => {
            strError.value = ""
            strSuccess.value = response.data.success
            swal({
                icon: "success",
                title: "Usuario ha sido eliminidado"
            })
            location.reload(); 
        })
        .catch(function (error) {
            strSuccess.value = ""
            strError.value = error.response.data.message
            swal({
                icon: "error",
                title: "No ha podido eliminar el usuario"
            })
        });
    }

    return{
        createStudent,
        deleteStudent
    }
}