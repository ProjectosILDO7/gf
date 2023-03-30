import reservaSenhaDeEstudante from '../../../service/senha_reserva/senha_reserva.service.js'

const actions = {
    
    loadingReservaSenhaEstudante({commit}){
        return reservaSenhaDeEstudante.getSenhaEstudantes()
                        .then(response =>commit('ADD_ALL_SENHA_ESTUDANTES', response.data))
                        .catch(error=>console.log(error))
    },

    detalhes({commit}, params){
        commit('PRELOADING', true)
        return coursesService.detalhes(params)
                             .finally(()=>commit('PRELOADING', false))
    }
}

export default actions