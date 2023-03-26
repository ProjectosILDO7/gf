import { createStore } from "vuex";
import users from "./modules/users";
import perfil from "./modules/perfil";
import curso from "./modules/curso"
import graduacao from "./modules/graduacao"
import estudantes from "./modules/estudantes"
import carregar from "./modules/preloading/preloading-carregando.js"
import preloading_simples from "./modules/preloading/preloading-simples.js"
import btn_loading from "./modules/preloading/btn-preloading-black.js"

export default createStore({
    modules:{
        users,
        perfil,
        curso,
        graduacao,
        estudantes,
        carregar,
        btn_loading,
        preloading_simples
    }
})