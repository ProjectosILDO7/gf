import uniformesService from '../../../service/uniformes/uniformes.service.js'

const actions = {
    
    loadingUniformes({commit}){
        commit('PRELOADING', true)
        return uniformesService.getUniformes()
                        .then(response =>commit('ADD_ALL_UNIFORMES', response.data))
                        .catch(error=>console.log(error))
                        .finally(()=>commit('PRELOADING', false))
    },

    createUniforme(_, params){
        return uniformesService.addUniforme(params)
    },

    updateFormUniforme({commit}, id){
        commit('PRELOADING', true)
        return uniformesService.updateFormUniforme(id)
                             .finally(()=>commit('PRELOADING', false))
    },

    updateUniforme({commit}, params){
        commit('PRELOADING', true)
        return uniformesService.updateUniforme(params)
                             .finally(()=>commit('PRELOADING', false))
    },

    apagarUniforme({commit}, params){
        commit('PRELOADING', true)
        return uniformesService.apagarUniforme(params)
                             .finally(()=>commit('PRELOADING', false))
    },

    detalhesUniforme({commit}, params){
        commit('PRELOADING', true)
        return uniformesService.detalhes(params)
                             .finally(()=>commit('PRELOADING', false))
    },
}

export default actions