import BaseService from "../base.service"

export default class comparticipacaoService extends BaseService{

    static async getComparticipacaos(){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get('/comparticipacaos')
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

    static async updateFormComparticipacao(id){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/getComparticipacao/${id}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async updateComparticipacao(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .put(`/updateComparticipacao/${params.id}`, params)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async apagarComparticipacao(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/apagarComparticipacao/${params}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async addComparticipacao(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .post('/registerComparticipacao', params)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro.response.data.errors))
        })
    }

    static async detalhes(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/detalhesComparticipacao/${params}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro.response.data.errors))
        })
    }
}