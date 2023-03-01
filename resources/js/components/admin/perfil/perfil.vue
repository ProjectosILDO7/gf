<template>
    <div class="container mt-4">
        <div class="card shadow animate__animated animate__bounce">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <h4 class="text-secondary"><i class="fa-solid fa-circle-user"></i> Meu Perfil</h4>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6 d-flex justify-content-end">
                        <span class="text-secondary">
                            <router-link class="text-decoration-none text-success" to="#"><i
                                    class="fa-regular fa-pen-to-square"></i> Actualizar perfil</router-link>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="card mt-4 shadow">
            <div class="card-body">
                
                <div class="row">
                    <div class="form-group col-12 text-center">
                        <span>
                            <h1><i class="fa fa-user-circle"></i></h1>
                        </span>
                    </div>
                    <form action="#" @submit.prevent="updatePerfil">
                        <span class="small text-danger" v-if="erro.name">{{ erro.name[0] }}</span>
                        <div class="col-8 m-auto mb-4 has-validation">
                            <label class="visually-show text-secondary" for="inlineFormInputGroupUsername">NOME
                                PRÓPRIO</label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="fa-solid fa-circle-user"></i></div>
                                <input type="text" name="name" id="inlineFormInputGroupUsername"
                                    :class="['form-control form-control-sm disabled bg-light', {'is-invalid': erro.name }]" v-model="perfil.name">
                            </div>
                        </div>

                        <div class="col-8 m-auto mb-4">
                            <span class="small text-danger" v-if="erro.email">{{ erro.email[0] }}</span>
                            <label class="visually-show text-secondary" for="inlineFormInputGroupUsername">E-MAIL DE
                                ACESSO</label>
                            <div class="input-group has-validation">
                                <div class="input-group-text"><i class="fa-solid fa-envelope-open-text"></i></div>
                                <input type="email" name="email" id="inlineFormInputGroupUsername"
                                    :class="['form-control form-control-sm disabled bg-light', {'is-invalid':erro.email }]" v-model="perfil.email">
                            </div>
                        </div>

                        <div class="col-8 m-auto mb-4">
                            <span class="small text-danger" v-if="erro.password">{{ erro.password[0] }}</span>
                            <label class="visually-show text-secondary" for="inlineFormInputGroupUsername">SENHA (OPCIONAL)
                                INFORME UMA SENHA CASO QUEIRA ALTERAR</label>
                            <div class="input-group has-validation">
                                <div class="input-group-text"><i class="fa-solid fa-user-lock"></i></div>
                                <input type="password" name="password" id="inlineFormInputGroupUsername"
                                    :class="['form-control form-control-sm disabled bg-light', {'is-invalid':erro.password }]"
                                    placeholder="Informe uma nova senha" v-model="password">
                            </div>
                        </div>

                        <div class="col-8 m-auto mb-4 d-grid gap-2 mt-2">
                            <button type="submit" class="btn btn-sm btn-success">
                                <i class="fa-regular fa-pen-to-square"></i> <span class="" v-if="loading">Actualizando perfil...</span> <span class="" v-else>Actualizar Perfil</span>
                            </button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</template>

<script>

import { computed, ref } from 'vue'
import { useStore } from 'vuex'
import { notify } from '@kyvg/vue3-notification'
import perfilService from '../../../service/perfil.service.js'

export default {
    name: "Perfil-component",
    setup() {
        const loading = ref(false)
        const erro = ref('')
        const store = useStore()
        const perfil = computed(() => {
            return store.state.users.user
        })

        const password = ref("")

        const updatePerfil = () => {
                loading.value=true
                perfilService.perfilUpdate({
                    name: perfil.value.name,
                    email: perfil.value.email,
                    password:password.value,
                }).then((resp)=>{
                    const sms = resp
                    notify({
                        title:'Sucesso',
                        text:'Dados de usuário actualizado com sucesso',
                        type:'success'
                    })
                }).catch((error)=>{
                    erro.value=error.data.errors
                }).finally(()=>loading.value=false)
        }

        return {
            erro,
            loading,
            perfil,
            store,
            password,
            updatePerfil
        }


    }
}
</script>