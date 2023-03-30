const getters = {
    todasGraduacoes:(state)=>(filter)=>{
        return state.items.filter(nome => nome.grade.includes(filter))
    },

    todosNomesGraduacoes(state){
        return state.items.filter(nome =>nome.grade)
    },

    todasGraduacoesCount(state, getters){
        var total= getters.todosNomesGraduacoes.length
        return total
    },

}

export default getters