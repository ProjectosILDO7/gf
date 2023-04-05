const getters = {
    todosEmolumentos:(state)=>(filter)=>{
        return state.items.filter(emolumento => emolumento.emolumento.toUpperCase().includes(filter.toUpperCase()))
    },

    todosNomesEmolumento(state){
        return state.items.filter(emolumento =>emolumento.emolumento)
    },

    todosEmolumentosCount(state, getters){
        var total= getters.todosNomesEmolumento.length
        return total
    },

}

export default getters