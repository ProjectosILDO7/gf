const getters = {
    todasMultas:(state)=>(filter)=>{
        return state.items.filter(multa => multa.cobranca.toUpperCase().includes(filter.toUpperCase()))
    },

    todosNomesMulta(state){
        return state.items.filter(multa => multa.cobranca)
    },

    todasMultasCount(state, getters){
        var total= getters.todosNomesMulta.length
        return total
    },

}

export default getters