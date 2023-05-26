import coursesService from '../../../service/curso/curso.service.js'

const actions = {
    
    loadingCourse({commit}){
        commit('PRELOADING', true)
        return coursesService.getCourses()
                        .then(response =>commit('ADD_ALL_COURSES', response.data))
                        .catch(error=>console.log(error))
                        .finally(()=>commit('PRELOADING', false))
    },

    createCourse(_, params){
        return coursesService.addCourse(params)
    },

    updateFormCourse({commit}, id){
        commit('PRELOADING', true)
        return coursesService.updateFormCourse(id)
                             .finally(()=>commit('PRELOADING', false))
    },

    updateCurso({commit}, params){
        commit('PRELOADING', true)
        return coursesService.updateCurso(params)
                             .finally(()=>commit('PRELOADING', false))
    },

    apagarCurso({commit}, params){
        commit('PRELOADING', true)
        return coursesService.apagarCurso(params)
                             .finally(()=>commit('PRELOADING', false))
    },

    detalhesCursos({commit}, params){
        commit('PRELOADING', true)
        return coursesService.detalhes(params)
                             .finally(()=>commit('PRELOADING', false))
    }
}

export default actions