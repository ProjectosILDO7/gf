<template>
    <div class="card col-xs-12 col-sm-12 col-md-4 col-lg-4 m-auto mt-4 shadow">

        <div class="card-header text-center">
            <span class="">
                <b>Propy-x: Login</b>
            </span>
        </div>
        <br>
        <div class="card-body">
            <form @submit.prevent="auth">

                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text" id="addon-wrapping">
                        <i class="fa-solid fa-at"></i>
                    </span>
                    <input type="text" class="form-control" placeholder="Utilizador" aria-label="Utilizador"
                        aria-describedby="addon-wrapping" v-model="user.email">
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text" id="addon-wrapping">
                        <i class="fa-solid fa-user-lock"></i>
                    </span>
                    <input type="password" class="form-control" placeholder="Senha" aria-label="Senha"
                        aria-describedby="addon-wrapping" v-model="user.password">
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
                            <i class="fa-solid fa-right-to-bracket"></i> Entrar
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
                            <router-link class="text-secondary" :to="{ name: 'home.register' }">
                                Criar uma conta
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
    name: "auth",
    data(){
        return{
            user:{ email:'', password:'',device_name:'propy'},
            loading:false
        }
    },

    methods: {
        auth(){
            this.loading=true
            this.$store.dispatch('auth', this.user)
                        .then(()=>{this.$router.push({name:'admin.home'})})
                        
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
