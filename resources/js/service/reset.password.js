import BaseService from "./base.service"
import { TOKEN_NAME } from '@/configs'

export default class ResetPassword extends BaseService {

    static async auth (params) {
        return new Promise((resolve, reject) => {
            this.request()
                .post('/forget-password', params)
                .then(response => resolve(response))
                .catch(error => reject(error.response))
        })
    }
}