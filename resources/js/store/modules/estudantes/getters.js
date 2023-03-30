const getters = {
    todosAlunos:(state)=>(filter)=>{
        return state.items.filter(todos => 
            todos.nome.toUpperCase().includes(filter.toUpperCase()) ||
            todos.numBI.toUpperCase().includes(filter.toUpperCase()) ||
            todos.cursos["cursos"]
              .toUpperCase()
              .includes(filter.toUpperCase()) ||
              todos.graduacoes["grade"]
              .toUpperCase()
              .includes(filter.toUpperCase()))
    },

    contarAluno(state){
        return state.items.filter(todos =>todos.nome)
    },

    todosAlunosCount(state, getters){
        var total= getters.contarAluno.length
        return total
    },

}

export default getters