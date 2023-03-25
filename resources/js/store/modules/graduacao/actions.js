import GraduactionsService from '../../../service/graduacao/graduaction.service.js'

const actions = {
    
    loadingGraduaction({commit}){
        commit('PRELOADING', true)
        return GraduactionsService.getGraduactions()
                        .then(response =>commit('ADD_ALL_GRADUACTION', response.data))
                        .catch(error=>console.log(error))
                        .finally(()=>commit('PRELOADING', false))
    },

    createGraduaction(_, params){
        return GraduactionsService.addGraduaction(params)
    },

    updateFormGraduaction({commit}, id){
        commit('PRELOADING', true)
        return GraduactionsService.updateFormGraduaction(id)
                             .finally(()=>commit('PRELOADING', false))
    },

    updateGraduaction({commit}, params){
        commit('PRELOADING', true)
        return GraduactionsService.updateGraduaction(params)
                             .finally(()=>commit('PRELOADING', false))
    },

    apagarGraduaction({commit}, params){
        commit('PRELOADING', true)
        return GraduactionsService.apagarGraduaction(params)
                             .finally(()=>commit('PRELOADING', false))
    },

    detalhesGraduaction({commit}, params){
        commit('PRELOADING', true)
        return GraduactionsService.detalhes(params)
                             .finally(()=>commit('PRELOADING', false))
    }
}

export default actions