import { createStore } from "vuex";
import users from "./modules/users";
import perfil from "./modules/perfil";
import curso from "./modules/curso"
import carregar from "./modules/preloading/preloading-carregando.js"
import preloading_simples from "./modules/preloading/preloading-simples.js"

export default createStore({
    modules:{
        users,
        perfil,
        curso,
        carregar,
        preloading_simples
    }
})