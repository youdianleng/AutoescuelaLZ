
import { ref, inject } from 'vue'
import { useRouter } from 'vue-router'

export default function usExercises() {
        const exercises = ref({})


        const exercise = ref({
            // title: '',
            // content: '',
            // category_id: '',
            thumbnail: ''
        })

        const router = useRouter()
        const validationErrors = ref({})
        const isLoading = ref(false)
        const swal = inject('$swal')


    const storeExercise = async (exercise) => {
        if (isLoading.value) return;

        isLoading.value = true
        validationErrors.value = {}

        let serializedExercise = new FormData()
        for (let item in exercise) {
            if (exercise.hasOwnProperty(item)) {
                serializedExercise.append(item, exercise[item])
            }
        }

        axios.post('/api/exercises', serializedExercise, {
            headers: {
                "content-type": "multipart/form-data"
            }
        })
            .then(response => {
                router.push({ name: 'exercises.index' })
                swal({
                    icon: 'success',
                    title: 'Exercise saved successfully'
                })
            })
            .catch(error => {
                if (error.response?.data) {
                    validationErrors.value = error.response.data.errors
                }
            })
            .finally(() => isLoading.value = false)
    }
}