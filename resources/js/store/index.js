import { createStore } from "vuex";
import users from "./modules/users";

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
        users
    }
})