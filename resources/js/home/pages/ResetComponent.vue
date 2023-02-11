<template>
    <div class="card col-xs-12 col-sm-12 col-md-4 col-lg-4 m-auto mt-4 shadow">

        <div class="card-header text-center">
            <span class="">
                <b>Propy-x: Redefinir senha</b>
            </span>
        </div>
        <br>
        <div class="card-body">
            <p class="text-muted">
                <b>Esqueceu sua senha?</b>
            </p>
            <p><span class="text-muted mb-4">Sem problema coisas assim acotecem. Informe-nos seu e-mail na caixa abaixo,
                    de seguida enviarémos um link de redefinição de senha</span> </p>


            <form action="" method="post">

                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text" id="addon-wrapping">
                        <i class="fa-solid fa-at"></i>
                    </span>
                    <input type="text" class="form-control" placeholder="E-mail" v-model="email" aria-label="E-mail"
                        aria-describedby="addon-wrapping">
                </div>

                <div class="d-grid gap-2">
                    <button 
                    :class="[
                        'btn','btn-info', 'text-light',
                        loading ? 'loading':''
                    ]" 
                    type="button" @click.prevent="resetPassword">
                        <span v-if="loading">
                            <i class="fa-solid fa-rotate"></i> Enviar pedido...
                        </span>
                        <span v-else>
                            <i class="fa-solid fa-rotate"></i> Enviar pedido de redefinição de senha
                        </span>
                    </button>
                </div>
                <br>
                <hr>
                <div class="form-group text-md-center text-align-sm">
                    <ul>
                        <li><router-link class="text-secondary" :to="{ name: 'home.register' }">
                                Criar uma conta
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
import { notify } from "@kyvg/vue3-notification";

export default {

    setup() {
    const email = ref("")
    const store = useStore()
    const loading = ref(false)

    const resetPassword = () => {
        loading.value = true
        store.dispatch('forgetPassword', { email:email.value } )
             .then(() => notify({
                title:'Sucesso',
                text:'Enviamos um link de redefinição da sua senha no seu e-mail',
                type:'success'
             }))
             .catch((error) => {
                    let msmErro = 'Falha na requisição'
                    if (error.status === 422) msmErro = 'Dados inválidos'
                    if (error.status === 404) msmErro = 'Usuário não encontrado'

                    notify({
                        title: "Falha na solicitação",
                        text: msmErro,
                        type:"warn"
                    });
                })
             .finally(() => loading.value=false)   
    }

    return {
        email,
        resetPassword,
        loading
    }
}
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

/* Small devices (portrait tablets and large phones, 600px and up) */
@media only screen and (min-width: 600px) {
    .text-align-sm {
        text-align: end !important;
    }
}

/* Medium devices (landscape tablets, 768px and up) */
@media only screen and (min-width: 768px) {
    .text-align-sm {
        text-align: end !important;
    }
}
</style>
