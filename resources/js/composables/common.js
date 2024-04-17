import { ref, inject } from 'vue'
import { useRouter } from 'vue-router'

export default function useOnMount() {
    const students = ref([]);
    const licenses = ref();
    const teachers = ref();

    // Get all the user 
    const getStudents = async() =>{
         // getUsers();
        axios.get('/api/student')
        .then(response => {
            students.value = response.data.data;
        })
        .catch(function (error) {
            console.log(error);
        });
    }


    const getSpecificStudents = async(id) =>{
       axios.get('/api/student/' + id )
       .then(response => {
           students.value = response.data.data;

       })
       .catch(function (error) {
           console.log(error);
       });
   }

    const getTeachers = async() =>{
        axios.get('/api/teacher')
        .then(response => {
            teachers.value = response.data;
    
        })
        .catch(function (error) {
            console.log(error);
        });
   }

   const getLicense = async() =>{
    // getUsers();
    axios.get('/api/license')
    .then(response => {
        licenses.value = response.data;

    })
    .catch(function (error) {
        console.log(error);
    });
    }


    return{
        teachers,
        licenses,
        students,
        getStudents,
        getTeachers,
        getLicense,
        getSpecificStudents
    }
}