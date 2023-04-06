import BaseService from "../base.service"

export default class uniformesService extends BaseService{

    static async getUniformes(){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get('/uniformes')
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

    static async updateFormUniforme(id){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/getUniforme/${id}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async updateUniforme(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .put(`/updateUniforme/${params.id}`, params)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async apagarUniforme(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/apagarUniforme/${params}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async addUniforme(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .post('/registerUniforme', params)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro.response.data.errors))
        })
    }

    static async detalhes(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/detalhesUniforme${params}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro.response.data.errors))
        })
    }
}