import emolumentosService from '../../../service/emolumentos/emolumentos.service.js'

const actions = {
    
    loadingEmolumentos({commit}){
        commit('PRELOADING', true)
        return emolumentosService.getEmolumentos()
                        .then(response =>commit('ADD_ALL_EMOLUMENTOS', response.data))
                        .catch(error=>console.log(error))
                        .finally(()=>commit('PRELOADING', false))
    },

    createEmolumento(_, params){
        return emolumentosService.addEmolumento(params)
    },

    updateFormEmolumento({commit}, id){
        commit('PRELOADING', true)
        return emolumentosService.updateFormEmolumento(id)
                             .finally(()=>commit('PRELOADING', false))
    },

    updateEmolumento({commit}, params){
        commit('PRELOADING', true)
        return emolumentosService.updateEmolumento(params)
                             .finally(()=>commit('PRELOADING', false))
    },

    apagarEmolumento({commit}, params){
        commit('PRELOADING', true)
        return emolumentosService.apagarEmolumento(params)
                             .finally(()=>commit('PRELOADING', false))
    },

    detalhesEmolumento({commit}, params){
        commit('PRELOADING', true)
        return EmolumentosService.detalhes(params)
                             .finally(()=>commit('PRELOADING', false))
    },
}

export default actions