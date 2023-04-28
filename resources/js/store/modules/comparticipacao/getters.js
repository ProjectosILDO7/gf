const getters = {
    todasComparticipacaos:(state)=>(filter)=>{
        return state.items.filter(comp => comp.cobranca.toUpperCase().includes(filter.toUpperCase()))
    },

    todosNomesComparticipacao(state){
        return state.items.filter(comp => comp.cobranca)
    },

    todasComparticipacaoCount(state, getters){
        var total= getters.todosNomesComparticipacao.length
        return total
    },

}

export default getters