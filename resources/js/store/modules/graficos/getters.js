const getters = {
    presencaMensal(state){
        return state.items.filter(graf =>graf.user_id)
    },
}

export default getters