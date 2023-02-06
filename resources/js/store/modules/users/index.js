import AuthService from "@/service/auth.service"

export default{
    state:{
        user:{
            user:'',
            email:''
        },
        loggedIn:false
    },
    mutations:{
        SET_USER(state, user){
            state.user=user,
            state.loggedIn=true
        },
        LOGOUT(state){
            state.user={
                user:'',
                email:''
            },
            loggedIn=false
        }
    },
    actions:{
        auth({state}, params){
            state.loggedIn
           return AuthService.auth(params)
        }
    },
}