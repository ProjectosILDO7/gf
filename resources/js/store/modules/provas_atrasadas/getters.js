const getters = {
    todasProvasAtrasadasValor(state){
        return state.items.filter(p => p.cobranca)
    },

    todosNomesProvasAtrasadas(state){
        return state.items.filter(p => p.cobranca)
    },

    todasProvasAtrasadasCount(state, getters){
        var total= getters.todosNomesProvasAtrasadas.length
        return total
    },

}

export default getters