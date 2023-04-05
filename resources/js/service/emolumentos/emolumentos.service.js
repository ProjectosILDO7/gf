import BaseService from "../base.service"

export default class emolumentosService extends BaseService{

    static async getEmolumentos(){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get('/emolumentos')
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

    static async updateFormEmolumento(id){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/getEmolumento/${id}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async updateEmolumento(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .put(`/updateEmolumento/${params.id}`, params)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async apagarEmolumento(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/apagarEmolumento/${params}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async addEmolumento(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .post('/registerEmolumento', params)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro.response.data.errors))
        })
    }

    static async detalhes(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/detalhesEmolumento/${params}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro.response.data.errors))
        })
    }
}