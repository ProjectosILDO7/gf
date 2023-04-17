import ProvasAtrasadasService from '../../../service/provas_atrasadas/prova_atrasda.service.js'

const actions = {
    
    loadingProvasAtrasadas({commit}){
        commit('PRELOADING', true)
        return ProvasAtrasadasService.getProvas_atrasadas()
                        .then(response =>commit('PROVAS', response.data))
                        .catch(error=>console.log(error))
                        .finally(()=>commit('PRELOADING', false))
    },

    createProvasAtrasadas(_, params){
        return ProvasAtrasadasService.addProvasAtrasadasService(params)
    },

    updateFormProvasAtrasadas({commit}, id){
        commit('PRELOADING', true)
        return ProvasAtrasadasService.updateFormProvasAtrasadasService(id)
                             .finally(()=>commit('PRELOADING', false))
    },

    updateProvasAtrasadas({commit}, params){
        commit('PRELOADING', true)
        return ProvasAtrasadasService.updateProvasAtrasadasService(params)
                             .finally(()=>commit('PRELOADING', false))
    },

    apagarProvasAtrasadas({commit}, params){
        commit('PRELOADING', true)
        return ProvasAtrasadasService.apagarProvasAtrasadasService(params)
                             .finally(()=>commit('PRELOADING', false))
    },

    detalhesProvasAtrasadas({commit}, params){
        commit('PRELOADING', true)
        return ProvasAtrasadasService.detalhes(params)
                             .finally(()=>commit('PRELOADING', false))
    },
}

export default actions