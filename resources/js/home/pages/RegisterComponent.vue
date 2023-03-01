<template>
    <div class="card col-xs-12 col-sm-12 col-md-4 col-lg-4 m-auto mt-4 shadow">

        <div class="card-header text-center">
            <span class="">
                <b>Propy-x: Criar uma conta</b>
            </span>
        </div>
        <br>
        <div class="card-body">
            <form @submit.prevent="salvarUsuario">

                <span class="small text-danger" v-if="erros.name">{{ erros.name[0] }}</span>
                <div class="input-group flex-nowrap mb-3 has-validation">
                    
                    <span class="input-group-text" id="addon-wrapping">
                        <i class="fa-solid fa-at"></i>
                    </span>
                    <input type="text" name="name" :class="['form-control', {'is-invalid':erros.name}]" placeholder="Nome" v-model="name" aria-label="Nome"
                        aria-describedby="addon-wrapping">
                </div>

                <span class="small text-danger" v-if="erros.email">{{ erros.email[0] }}</span>
                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text" id="addon-wrapping">
                        <i class="fa-solid fa-at"></i>
                    </span>
                    <input type="email" name="email" :class="['form-control', {'is-invalid':erros.email}]" v-model="email" placeholder="E-mail" aria-label="E-mail"
                        aria-describedby="addon-wrapping">
                </div>

                <span class="small text-danger" v-if="erros.password">{{ erros.password[0] }}</span>
                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text" id="addon-wrapping">
                        <i class="fa-solid fa-user-lock"></i>
                    </span>
                    <input type="password" name="password" :class="['form-control', {'is-invalid':erros.password}]" v-model="password" placeholder="Senha" aria-label="Senha"
                        aria-describedby="addon-wrapping">
                </div>

                <span class="small text-danger" v-if="erros.password_confirmation">{{ erros.password_confirmation[0] }}</span>
                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text" id="addon-wrapping">
                        <i class="fa-solid fa-user-lock"></i>
                    </span>
                    <input type="password" name="password_confirmation" v-model="password_confirmation" :class="['form-control', {'is-invalid':erros.password_confirmation}]" placeholder="Repetir senha"
                        aria-label="Repetir senha" aria-describedby="addon-wrapping">
                </div>

                <div class="d-grid gap-2">
                    <button :class="[
                        'btn', 'btn-info', 'text-light',
                        loading ? 'loading' : ''
                    ]" type="submit">
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
import regiteruser from "../../service/register.user.service.js"


export default {
    name: 'RegisterUser',
    setup() {
        const store = useStore()
        const name = ref("")
        const email = ref("")
        const password = ref("")
        const password_confirmation = ref("")
        const loading = ref(false)
        const erros = ref('')

        const salvarUsuario = () => {
            loading.value=true
            regiteruser.register({
                name:name.value,
                email: email.value,
                password: password.value,
                password_confirmation:password_confirmation.value
            }).then(() => {
                notify({
                    title:'Sucesso', 
                    text:'Conta criada com sucesso', 
                    type:'success'
                })
                router.push({name:'admin.home'})
            }).catch((error) => {
                erros.value=error.data.errors
            }).finally(()=>loading.value=false)
        }
        return {
            erros,
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
