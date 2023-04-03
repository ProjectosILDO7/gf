import disciplinasService from '../../../service/disciplinas/disciplinas.service.js'

const actions = {
    
    loadingDisciplinas({commit}){
        commit('PRELOADING', true)
        return disciplinasService.getDisciplinas()
                        .then(response =>commit('ADD_ALL_DISCIPLINAS', response.data))
                        .catch(error=>console.log(error))
                        .finally(()=>commit('PRELOADING', false))
    },

    loadingDisciplinasExcel({commit}){
        commit('PRELOADING', true)
        return disciplinasService.getDisciplinas()
                        .catch(error=>console.log(error))
                        .finally(()=>commit('PRELOADING', false))
    },

    verDisciplinasEmCursosl({commit}){
        commit('PRELOADING', true)
        return disciplinasService.getDisciplinasEmCursos()
                        .catch(error=>console.log(error))
                        .finally(()=>commit('PRELOADING', false))
    },

    createDisciplina(_, params){
        return disciplinasService.addDisciplina(params)
    },

    updateFormDisciplina({commit}, id){
        commit('PRELOADING', true)
        return disciplinasService.updateFormDisciplina(id)
                             .finally(()=>commit('PRELOADING', false))
    },

    updateDisciplina({commit}, params){
        commit('PRELOADING', true)
        return disciplinasService.updateDisciplina(params)
                             .finally(()=>commit('PRELOADING', false))
    },

    apagarDisciplina({commit}, params){
        commit('PRELOADING', true)
        return disciplinasService.apagarDisciplina(params)
                             .finally(()=>commit('PRELOADING', false))
    },

    detalhesDisciplina({commit}, params){
        commit('PRELOADING', true)
        return disciplinasService.detalhes(params)
                             .finally(()=>commit('PRELOADING', false))
    },
    exportDisciplinasCursos({commit}){
        commit('PRELOADING', true)
        return disciplinasService.exportDisciplinasCursos()
                             .finally(()=>commit('PRELOADING', false))
    }
}

export default actions