import { ref, inject } from 'vue'
import { useRouter } from 'vue-router'

export default function useReview() {

    const allReview = ref();
    // get all the review we have
    const getReviews = async() => {
        axios.get('/api/review')
        .then(response => {
            allReview.value = response.data;
        })
        .catch(function (error) {
            console.log(error);
        });
    }

    return{
        getReviews,
        allReview
    }
}