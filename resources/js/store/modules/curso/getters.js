const getters = {
    todosCursos:(state)=>(filter)=>{
        return state.items.filter(curso => curso.cursos.includes(filter))
    },

    todosNomesCurso(state){
        return state.items.filter(curso =>curso.cursos)
    },

    todosCursosCount(state, getters){
        var total= getters.todosNomesCurso.length
        return total
    },

}

export default getters