import EstudantesService from '../../../service/estudantes/estudante.service.js'

const actions = {
    
    loadingEstudantes({_, commit}){
        commit('PRELOADING', true)
        return EstudantesService.getEstudantes()
                        .then((response) =>{
                            commit('ADD_ALL_ESTUDANTES', response.data)
                        })
                        .catch((error)=>console.log(error))
                        .finally(()=>commit('PRELOADING', false))
    },

    createEstudante(_, params){
        return EstudantesService.addEstudante(params)
    },

    all_studante(){
        return EstudantesService.getEstudantes()
                                
    },

    updateFormEstudante({commit}, id){
        commit('PRELOADING', true)
        return EstudantesService.updateFormEstudante(id)
                             .finally(()=>commit('PRELOADING', false))
    },

    updateEstudante({commit}, params){
        commit('PRELOADING', true)
        return EstudantesService.updateEstudante(params)
                             .finally(()=>commit('PRELOADING', false))
    },

    apagarEstudante({commit}, params){
        commit('PRELOADING', true)
        return EstudantesService.apagarEstudante(params)
                             .finally(()=>commit('PRELOADING', false))
    },

    detalhesEstudante({commit}, params){
        commit('PRELOADING', true)
        return EstudantesService.detalhes(params)
                             .finally(()=>commit('PRELOADING', false))
    }
}

export default actions