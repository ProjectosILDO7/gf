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

                    <form action="#" @submit.prevent="updatePerfil">
                        <div class="col-8 m-auto mb-4">

                            <label class="visually-show text-secondary" for="inlineFormInputGroupUsername">NOME
                                PRÓPRIO</label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="fa-solid fa-circle-user"></i></div>
                                <input type="text" name="name" id="inlineFormInputGroupUsername"
                                    class="form-control form-control-sm disabled bg-light" v-model="perfil.name">
                            </div>
                        </div>

                        <div class="col-8 m-auto mb-4">
                            <label class="visually-show text-secondary" for="inlineFormInputGroupUsername">E-MAIL DE
                                ACESSO</label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="fa-solid fa-envelope-open-text"></i></div>
                                <input type="email" name="email" id="inlineFormInputGroupUsername"
                                    class="form-control form-control-sm disabled bg-light" v-model="perfil.email">
                            </div>
                        </div>

                        <div class="col-8 m-auto mb-4">
                            <label class="visually-show text-secondary" for="inlineFormInputGroupUsername">SENHA (OPCIONAL)
                                INFORME UMA SENHA CASO QUEIRA ALTERAR</label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="fa-solid fa-user-lock"></i></div>
                                <input type="password" name="password" id="inlineFormInputGroupUsername"
                                    class="form-control form-control-sm disabled bg-light"
                                    placeholder="Informe uma nova senha" v-model="password">
                            </div>
                        </div>

                        <div class="col-8 m-auto mb-4 d-grid gap-2 mt-2">
                            <button type="submit" class="btn btn-sm btn-success"><i class="fa-regular fa-pen-to-square"></i>
                                <span class="" v-if="loading">Actualizando perfil...</span>
                                <span class="" v-else>Actualizar Perfil</span>
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

export default {
    name: "Perfil-component",
    setup() {
        const store = useStore()
        const loading = ref(false)

        const perfil = computed(() => {
            return store.state.users.user
        })

        const password = ref("")

        const updatePerfil = () => {
            loading.value = true,
                store.dispatch('upPerfil', {
                    name: perfil.value.name,
                    email: perfil.value.email,
                    password:password.value,
                }).finally(()=>loading.value=false)
        }

        return {
            perfil,
            store,
            password,
            loading,
            updatePerfil
        }


    }
}
</script>