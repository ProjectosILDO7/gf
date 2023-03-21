import BaseService from "../base.service"

export default class cursosService extends BaseService{

    static async getCourses(){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get('/courses')
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

    static async updateFormCourse(id){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/getCourse/${id}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async updateCurso(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .put(`/updateCurso/${params.id}`, params)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async apagarCurso(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/apagarCurso/${params}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async addCourse(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .post('/registerCurso', params)
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