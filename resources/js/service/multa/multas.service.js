import BaseService from "../base.service"

export default class multasService extends BaseService{

    static async getMultas(){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get('/multas')
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

    static async updateFormMulta(id){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/getMulta/${id}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async updateMulta(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .put(`/updateMulta/${params.id}`, params)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async apagarMulta(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/apagarMulta/${params}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async addMulta(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .post('/registerMulta', params)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro.response.data.errors))
        })
    }

    static async detalhes(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/detalhesMulta/${params}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro.response.data.errors))
        })
    }
}