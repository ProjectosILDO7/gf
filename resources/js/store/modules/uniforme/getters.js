const getters = {
    todosUniformes:(state)=>(filter)=>{
        return state.items.filter(uniforme => uniforme.descricao.toUpperCase().includes(filter.toUpperCase()))
    },

    todosNomesUniforme(state){
        return state.items.filter(uniforme =>uniforme.descricao)
    },

    todosUniformesCount(state, getters){
        var total= getters.todosNomesUniforme.length
        return total
    },

}

export default getters