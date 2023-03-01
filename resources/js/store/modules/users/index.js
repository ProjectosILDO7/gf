import AuthService from "@/service/auth.service";

export default {
    state: {
        user: {},
        authorization: false,
    },

    mutations: {
        SET_USER(state, user) {
            state.user = user;
            state.authorization = true;
        },
        LOGOUT(state) {
            state.user = {};
            state.authorization = false;
        },
    },

    actions: {
        auth({ dispatch }, params) {
            return AuthService.auth(params).then(() => dispatch("getMe"));
        },

        getMe({ commit }) {
            commit("CHANGE_LOADING", true);

           return AuthService.getMe()
                .then((user) => commit("SET_USER", user))
                .finally(() => commit("CHANGE_LOADING", false));
        },

        logout({ commit }) {
            commit("CHANGE_LOADING", true);

            return AuthService.logout()
                .then(() => commit("LOGOUT"))
                .finally(() => commit("CHANGE_LOADING", false));
        },

        forgetPassword(_, params) {
            return AuthService.forgetPassword(params);
        },

        userSave({commit}, params){
            commit('CHANGE_LOADING', true)
            return AuthService.userSave(params)
                                .then((res)=>console.log(res))
                                .catch((error)=>console.log(error))
                                .finally(()=>commit('CHANGE_LOADING', false))
        },
    },
};
