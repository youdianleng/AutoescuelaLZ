import { ref, inject } from 'vue'
import { useRouter } from 'vue-router'

export default function useSelectLevel() {

    const StudentMadeTest = ref([]);
    
    //Swal
    const swal = inject('$swal');
    // Set the Success and Error message
    const strSuccess = ref();
    const strError = ref();
    // Create an array with all the value send by form
    const createFindMadedTest= async(student) =>{
        // Call the funtion with all the content we saved (Sending as $request)
        axios.get('/api/selectLevel/student/' + student)
            .then(response => {
                StudentMadeTest.value = response.data.data
            })
            .catch(function (error) {
                strSuccess.value = ""
                if (error.response?.data) {
                   strError.value = error.response.data.errors
                }
                swal({
                    icon: "error",
                    title: "No ha encontrado ninguna registro"
                })

            });
    }

    return{
        createFindMadedTest,
        StudentMadeTest
    }
}