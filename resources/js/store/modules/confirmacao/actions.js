import confirmacoesService from '../../../service/confirmacao/confirmacao.service.js'

const actions = {
    
    loadingDados({commit}){
        commit('PRELOADING', true)
        return confirmacoesService.getDados()
                        .then(response =>commit('ADD_ALL_CONFIRMACOES', response.data))
                        .catch(error=>console.log(error))
                        .finally(()=>commit('PRELOADING', false))
    },

    createDados(_, params){
        return confirmacoesService.addDados(params)
    },

    updateFormDados({commit}, id){
        commit('PRELOADING', true)
        return confirmacoesService.updateFormDados(id)
                             .finally(()=>commit('PRELOADING', false))
    },

    updateDados({commit}, params){
        commit('PRELOADING', true)
        return confirmacoesService.updateDados(params)
                             .finally(()=>commit('PRELOADING', false))
    },

    apagarDados({commit}, params){
        commit('PRELOADING', true)
        return confirmacoesService.apagarDados(params)
                             .finally(()=>commit('PRELOADING', false))
    },

    detalhesDados({commit}, params){
        commit('PRELOADING', true)
        return confirmacoesService.detalhes(params)
                             .finally(()=>commit('PRELOADING', false))
    },
}

export default actions