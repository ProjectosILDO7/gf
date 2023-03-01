import perfilService from "@/service/perfil.service.js"

export default {
    state:{
        loading:false
    },
    mutations:{
        SET_LOADING(state, loading){
            state.loading = loading
        }
    },
    actions:{
        perfilupadate(_, params){
           perfilService.perfilUpdate(params)
        }
    }
}