import { createStore } from "vuex";
import users from "./modules/users";
import perfil from "./modules/perfil";
import curso from "./modules/curso"

export default createStore({
    state:{
        loading:false,
        loadingMessage:'Carregando... aguarde!'
    },
    mutations:{
        CHANGE_LOADING(state, status, sms='Carregando... aguarde!'){
            state.loading=status,
            state.loadingMessage=sms
        }

    },
    actions:{

    },
    modules:{
        users,
        perfil,
        curso
    }
})