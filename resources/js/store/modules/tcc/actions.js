import Service from '../../../service/tcc/tcc.service.js'

const actions = {
    
    loadingTccs({commit}){
        commit('PRELOADING', true)
        return Service.getTccs()
                        .then(response =>commit('ADD_ALL_TCCS', response.data))
                        .catch(error=>console.log(error))
                        .finally(()=>commit('PRELOADING', false))
    },

    createTcc(_, params){
        return Service.addTcc(params)
    },

    updateFormTcc({commit}, id){
        commit('PRELOADING', true)
        return Service.updateFormTcc(id)
                             .finally(()=>commit('PRELOADING', false))
    },

    updateTcc({commit}, params){
        commit('PRELOADING', true)
        return Service.updateTcc(params)
                             .finally(()=>commit('PRELOADING', false))
    },

    apagarTcc({commit}, params){
        commit('PRELOADING', true)
        return Service.apagarTcc(params)
                             .finally(()=>commit('PRELOADING', false))
    },

    detalhesTcc({commit}, params){
        commit('PRELOADING', true)
        return Service.detalhes(params)
                             .finally(()=>commit('PRELOADING', false))
    },
}

export default actions