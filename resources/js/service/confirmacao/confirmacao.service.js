import BaseService from "../base.service"

export default class confirmacoesService extends BaseService{

    static async getDados(){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get('/confirmacoes')
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

    static async updateFormDados(id){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/getConfirmacao/${id}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async updateDados(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .put(`/updateConfirmacao/${params.id}`, params)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async apagarDados(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/apagarConfirmacao/${params}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async addDados(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .post('/registerConfirmacao', params)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro.response.data.errors))
        })
    }

    static async detalhes(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/detalhesConfirmacao/${params}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro.response.data.errors))
        })
    }
}