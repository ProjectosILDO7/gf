const getters = {
    todasDisciplinas:(state)=>(filter)=>{
        return state.items.filter(disciplina => disciplina.cadeira.includes(filter))
    },

    todosNomesDisciplina(state){
        return state.items.filter(disciplina =>disciplina.cadeira)
    },

    todasDisciplinasCount(state, getters){
        var total= getters.todosNomesDisciplina.length
        return total
    },

}

export default getters