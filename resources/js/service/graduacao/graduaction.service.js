import BaseService from "../base.service"

export default class GraduactionsService extends BaseService{

    static async getGraduactions(){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get('/graduactions')
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

    static async updateFormGraduaction(id){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/getGraduaction/${id}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async updateGraduaction(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .put(`/updateGraduaction/${params.id}`, params)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async apagarGraduaction(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/apagarGraduaction/${params}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async addGraduaction(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .post('/registerGraduaction', params)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro.response.data.errors))
        })
    }

    static async detalhes(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/detalhesGraduaction/${params}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro.response.data.errors))
        })
    }

}