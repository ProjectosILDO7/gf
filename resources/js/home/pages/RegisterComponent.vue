<template>
    <div class="card col-xs-12 col-sm-12 col-md-4 col-lg-4 m-auto mt-4 shadow">

        <div class="card-header text-center">
            <span class="">
                <b>Propy-x: Criar uma conta</b>
            </span>
        </div>
        <br>
        <div class="card-body">
            <form method="">

                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text" id="addon-wrapping">
                        <i class="fa-solid fa-at"></i>
                    </span>
                    <input type="text" class="form-control" placeholder="Nome" v-model="name" aria-label="Nome"
                        aria-describedby="addon-wrapping">
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text" id="addon-wrapping">
                        <i class="fa-solid fa-at"></i>
                    </span>
                    <input type="email" class="form-control" v-model="email" placeholder="E-mail" aria-label="E-mail"
                        aria-describedby="addon-wrapping">
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text" id="addon-wrapping">
                        <i class="fa-solid fa-user-lock"></i>
                    </span>
                    <input type="password" class="form-control" v-model="password" placeholder="Senha" aria-label="Senha"
                        aria-describedby="addon-wrapping">
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text" id="addon-wrapping">
                        <i class="fa-solid fa-user-lock"></i>
                    </span>
                    <input type="password" name="password_confirmation" v-model="password_confirmation" class="form-control" placeholder="Repetir senha"
                        aria-label="Repetir senha" aria-describedby="addon-wrapping">
                </div>

                <div class="d-grid gap-2">
                    <button :class="[
                        'btn', 'btn-info', 'text-light',
                        loading ? 'loading' : ''
                    ]" type="button" @click.prevent="salvarUsuario">
                        <span v-if="loading">
                            <i class="fa-solid fa-spinner"></i> Carregar...
                        </span>
                        <span v-else>
                            <i class="fa-solid fa-right-to-bracket"></i> Criar conta
                        </span>
                    </button>
                </div>
                <br>
                <hr>
                <div class="form-group text-md-center text-align-sm">
                    <ul>
                        <li><router-link class="text-secondary" :to="{ name: 'home.reset' }">
                                Esqueci minha senha
                            </router-link></li>
                        <li>
                            <router-link class="text-secondary" :to="{ name: 'home.login' }">
                                Ja tenho uma conta
                            </router-link>
                        </li>
                    </ul>
                </div>

            </form>
        </div>
    </div>
</template>

<script>
import { ref } from 'vue'
import { useStore } from 'vuex'
import router from '../../router/'
import { notify } from "@kyvg/vue3-notification";


export default {
    name: 'RegisterUser',
    setup() {
        const store = useStore()
        const name = ref("")
        const email = ref("")
        const password = ref("")
        const password_confirmation = ref("")
        const loading = ref(false)

        const salvarUsuario = () => {
            loading.value = true
            store.dispatch('userSave', {
                name:name.value,
                email: email.value,
                password: password.value,
                password_confirmation: password_confirmation.value,
            })
                .then(() => {
                    notify({
                        title:'Sucesso',
                        text:'Conta criada com sucesso',
                        type:'success'
                    }),
                    router.push({name:'home.login'})
                })
                .catch((error) => {
                    let msmErro = 'Falha au tentar criar a conta'
                    if (error.status === 422) msmErro = 'Dados inválidos'
                    notify({
                        title: "Pedido negado",
                        text: msmErro,
                        type:"warn"
                    });
                })
                .finally(() => loading.value = false)
        }
        return {
            salvarUsuario,
            name,
            email,
            password,
            password_confirmation,
            loading
        }
    },
}

</script>

<style scoped>
ul li {
    list-style: none;
}

ul li a {
    list-style: none;
    text-decoration: none;
}

ul li a:hover {
    list-style: none;
    text-decoration: none;
    color: blue !important
}

/* Extra small devices (phones, 600px and down) */
@media only screen and (max-width: 600px) {
    .text-align-sm {
        text-align: center !important;
    }
}
</style>
