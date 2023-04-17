const getters = {
    todosTccs:(state)=>(filter)=>{
        return state.items.filter(t => t.cobranca.toUpperCase().includes(filter.toUpperCase()))
    },

    todosNomesTccs(state){
        return state.items.filter(t => t.cobranca)
    },

    todosTccsCount(state, getters){
        var total= getters.todosNomesTccs.length
        return total
    },

}

export default getters