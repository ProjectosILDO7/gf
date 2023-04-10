const getters = {
    todasConfirmacoes:(state)=>(filter)=>{
        return state.items.filter(confirmacao => confirmacao.cobranca.toUpperCase().includes(filter.toUpperCase()))
    },

    todosNomesConfirmacoes(state){
        return state.items.filter(confirmacao => confirmacao.cobranca)
    },

    todasConfirmacoesCount(state, getters){
        var total= getters.todosNomesConfirmacoes.length
        return total
    },

}

export default getters