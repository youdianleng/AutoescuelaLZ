import { ref, inject } from 'vue'
import { useRouter } from 'vue-router'

export default function useOnMount() {
    const students = ref([]);
    const licenses = ref();
    const teachers = ref();

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

    const getTeachers = async() =>{
        // getUsers();
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
        getLicense
    }
}