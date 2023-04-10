import multasService from '../../../service/multa/multas.service.js'

const actions = {
    
    loadingMultas({commit}){
        commit('PRELOADING', true)
        return multasService.getMultas()
                        .then(response =>commit('ADD_ALL_MULTAS', response.data))
                        .catch(error=>console.log(error))
                        .finally(()=>commit('PRELOADING', false))
    },

    createMulta(_, params){
        return multasService.addMulta(params)
    },

    updateFormMulta({commit}, id){
        commit('PRELOADING', true)
        return multasService.updateFormMulta(id)
                             .finally(()=>commit('PRELOADING', false))
    },

    updateMulta({commit}, params){
        commit('PRELOADING', true)
        return multasService.updateMulta(params)
                             .finally(()=>commit('PRELOADING', false))
    },

    apagarMulta({commit}, params){
        commit('PRELOADING', true)
        return multasService.apagarMulta(params)
                             .finally(()=>commit('PRELOADING', false))
    },

    detalhesMulta({commit}, params){
        commit('PRELOADING', true)
        return multasService.detalhes(params)
                             .finally(()=>commit('PRELOADING', false))
    },
}

export default actions