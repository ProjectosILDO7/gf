import comparticipacaoService from '../../../service/comparticipacao/comparticipacao.service'

const actions = {
    
    loadingComparticipacaos({commit}){
        commit('PRELOADING', true)
        return comparticipacaoService.getComparticipacaos()
                        .then(response =>commit('ADD_ALL_COMPARTICIPACAO', response.data))
                        .catch(error=>console.log(error))
                        .finally(()=>commit('PRELOADING', false))
    },

    createComparticipacao(_, params){
        return comparticipacaoService.addComparticipacao(params)
    },

    updateFormComparticipacao({commit}, id){
        commit('PRELOADING', true)
        return comparticipacaoService.updateFormComparticipacao(id)
                             .finally(()=>commit('PRELOADING', false))
    },

    updateComparticipacao({commit}, params){
        commit('PRELOADING', true)
        return comparticipacaoService.updateComparticipacao(params)
                             .finally(()=>commit('PRELOADING', false))
    },

    apagarComparticipacao({commit}, params){
        commit('PRELOADING', true)
        return comparticipacaoService.apagarComparticipacao(params)
                             .finally(()=>commit('PRELOADING', false))
    },

    detalhesComparticipacao({commit}, params){
        commit('PRELOADING', true)
        return comparticipacaoService.detalhes(params)
                             .finally(()=>commit('PRELOADING', false))
    },
}

export default actions