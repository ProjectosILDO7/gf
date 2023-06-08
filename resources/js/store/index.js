import { createStore } from "vuex";
import users from "./modules/users";
import perfil from "./modules/perfil";
import curso from "./modules/curso"
import categorias from "./modules/categoria"
import departamento from "./modules/departamento"
import disciplinas from "./modules/disciplinas"
import emolumentos from "./modules/emolumento"
import uniforme from "./modules/uniforme"
import transporte from "./modules/transporte"
import multas from "./modules/multa"
import confirmacao from "./modules/confirmacao"
import comparticipacao from "./modules/comparticipacao"
import provas_atrasadas from "./modules/provas_atrasadas"
import tcc from "./modules/tcc"
import estudantePagamento from "./modules/pagamentos"
import graduacao from "./modules/graduacao"
import estudantes from "./modules/estudantes"
import graficos from "./modules/graficos"
import funcionarios from './modules/funcionarios'
import senha_reserva from "./modules/senha_reserva"
import carregar from "./modules/preloading/preloading-carregando.js"
import preloading_simples from "./modules/preloading/preloading-simples.js"
import btn_loading from "./modules/preloading/btn-preloading-black.js"

export default createStore({
    modules:{
        users,
        perfil,
        curso,
        categorias,
        departamento,
        funcionarios,
        disciplinas,
        emolumentos,
        comparticipacao,
        uniforme,
        transporte,
        graficos,
        provas_atrasadas,
        tcc,
        estudantePagamento,
        multas,
        confirmacao,
        graduacao,
        senha_reserva,
        estudantes,
        carregar,
        btn_loading,
        preloading_simples
    }
})