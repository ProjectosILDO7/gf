import BaseService from "../base.service"

export default class EstudantesService extends BaseService{

    static async getEstudantes(){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get('/estudantes')
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

    static async updateFormEstudante(id){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/getEstudante/${id}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async updateEstudante(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .put(`/updateEstudante/${params.id}`, params)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async apagarEstudante(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/apagarEstudante/${params}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async addEstudante(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .post('/registerEstudante', params)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro.response.data.errors))
        })
    }

    static async detalhes(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/detalhesEstudante/${params}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro.response.data.errors))
        })
    }

}