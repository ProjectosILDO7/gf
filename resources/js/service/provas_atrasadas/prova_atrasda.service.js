import BaseService from "../base.service"

export default class prova_atrasdaService extends BaseService{

    static async getProvas_atrasadas(){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get('/provas_atrasadas')
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

    static async updateFormProvasAtrasadasService(id){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/getProva_atrasada/${id}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async updateProvasAtrasadasService(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .put(`/updateProva_atrasada/${params.id}`, params)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async apagarProvasAtrasadasService(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/apagarProva_atrasada/${params}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async addProvasAtrasadasService(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .post('/registerProva_atrasada', params)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro.response.data.errors))
        })
    }

    static async detalhes(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/detalhesProva_atrasada/${params}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro.response.data.errors))
        })
    }
}