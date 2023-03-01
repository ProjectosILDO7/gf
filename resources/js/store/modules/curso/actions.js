import coursesService from '../../../service/curso/curso.service.js'

const actions = {
    getCourses({commit}){
        coursesService.getCourses().then((response)=>commit('ADD_ALL_COURSES', response.data))
    }
}

export default actions