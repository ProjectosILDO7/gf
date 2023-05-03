import BaseService from "../base.service"

export default class pagamentoService extends BaseService{

    static async getEstudantePagamento(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/getEstudantePagamento/${params}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async pagMensalidade(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .post(`/pag_mensalidade`, params)
                .then((resp)=>resolve(resp.data.mensalidade))
                .catch((erro)=>reject(erro.response.data.errors.mensalidade))
        })
    }
}