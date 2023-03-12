import coursesService from '../../../service/curso/curso.service.js'

const actions = {
    
    loadingCourse({commit}){
        commit('PRELOADING_CARREGAR', true)
        return coursesService.getCourses()
                        .then(response =>commit('ADD_ALL_COURSES', response.data))
                        .catch(error=>console.log(error))
                        .finally(()=>commit('PRELOADING_CARREGAR', false))
    },
    
    createCourse(_, params){
        return coursesService.addCourse(params)
    }
}

export default actions