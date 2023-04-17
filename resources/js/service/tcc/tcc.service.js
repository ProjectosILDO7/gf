import BaseService from "../base.service"

export default class tccService extends BaseService{

    static async getTccs(){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get('/tccs')
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

    static async updateFormTcc(id){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/getTcc/${id}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async updateTcc(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .put(`/updateTcc/${params.id}`, params)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async apagarTcc(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/apagarTcc/${params}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async addTcc(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .post('/registerTcc', params)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro.response.data.errors))
        })
    }

    static async detalhes(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/detalhesTcc/${params}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro.response.data.errors))
        })
    }
}