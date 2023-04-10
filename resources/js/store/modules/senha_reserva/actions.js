import reservaSenhaDeEstudante from '../../../service/senha_reserva/senha_reserva.service.js'

const actions = {
    
    loadingReservaSenhaEstudante({commit}){
        return reservaSenhaDeEstudante.getSenhaEstudantes()
                        .then(response =>commit('ADD_ALL_SENHA_ESTUDANTES', response.data))
                        .catch(error=>console.log(error))
    },
}

export default actions