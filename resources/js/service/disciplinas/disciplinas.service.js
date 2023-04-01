import BaseService from "../base.service"

export default class disciplinasService extends BaseService{

    static async getDisciplinas(){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get('/disciplinas')
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async filter(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .post('/filter', {params})
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro.response))
        })
    }

    static async updateFormDisciplina(id){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/getDisciplina/${id}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async updateDisciplina(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .put(`/updateDisciplina/${params.id}`, params)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async apagarDisciplina(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/apagarDisciplina/${params}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async addDisciplina(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .post('/registerDisciplina', params)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro.response.data.errors))
        })
    }

    static async detalhes(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/detalhes/${params}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro.response.data.errors))
        })
    }

}