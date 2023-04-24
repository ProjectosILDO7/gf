import estudantePagamento from '../../../service/pagamentos/servicePagamentos.service.js'

const actions = {
    getEstudantePagamento({commit}, params){
        commit('PRELOADING', true)
        return estudantePagamento.getEstudantePagamento(params)
                             .finally(()=>commit('PRELOADING', false))
    },
}

export default actions