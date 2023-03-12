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

    static async addCourse(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .post('/registerCurso', params)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro.response.data.errors))
        })
    }

}