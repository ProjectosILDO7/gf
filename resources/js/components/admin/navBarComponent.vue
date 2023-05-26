<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-dark shadow">
            <div class="container">

                <button class="navbar-toggler btn-sm" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars text-light"></i>
                </button>
                <div class="collapse navbar-collapse justify-content-start" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <router-link class="nav-link active text-white" aria-current="page"
                                :to="{ name: 'admin.dashboard' }">
                                <i class="fa-solid fa-gauge-high"></i>
                                Controle
                            </router-link>
                        </li>

                        <li class="nav-item">
                            <router-link class="nav-link active text-white" aria-current="page"
                                to="#">
                                <i class="fa fa-database"></i>
                                Cadastro
                            </router-link>
                        </li>
                    </ul>
                </div>

                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <!-- <li class="nav-item">
                            <router-link router-link :to="{ name: 'admin.notify' }" class="nav-link text-white">
                                <i class="fa-solid fa-bell"></i><sup><span
                                        class="rounded-pill py-1 px-1 bg-success text-white small">10</span></sup>
                            </router-link>
                        </li> -->
                        <!-- <li class="nav-item">
                            <router-link class="nav-link text-white" :to="{ name: 'admin.message' }">
                                <i class="fa-solid fa-envelope"></i><sup><span
                                        class="rounded-pill py-1 px-1 bg-success text-white small">15</span></sup>
                            </router-link>
                        </li> -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span v-if="me.image">
                                    <img v-if="url + me.image" :src="url + me.image" alt="user-image" class="rounded-circle tamanhoUserImage"> <b>{{ me.name }}</b>!                                    
                                </span>

                                <span v-else>
                                    <img :src="url_no_image" alt="user-image" class="rounded-circle tamanhoUserImage"> <b>{{ me.name }}</b>!
                                </span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><router-link class="dropdown-item" :to="{ name: 'admin.perfil' }"><i
                                            class="fa-solid fa-user"></i> Perfil</router-link></li>
                                <!-- <li><router-link class="dropdown-item" :to="{ name: 'admin.users' }"><i
                                            class="fa-solid fa-users-gear"></i> Usuários</router-link></li> -->
                                <!-- <li><router-link class="dropdown-item" to="#"><i class="fa-solid fa-bag-shopping"></i> Minha
                                        assinatura</router-link></li> -->
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#" @click.prevent="logout">
                                        <span v-if="loading"><i class="fa-solid fa-right-from-bracket"></i> Saindo...</span>
                                        <span v-else><i class="fa-solid fa-right-from-bracket"></i> Sair</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- <li class="nav-link">
                            <a href="#" class="btn btn-sm btn-success" @click.prevent="logout">
                                <span v-if="loading">
                                    <i class="fa-solid fa-right-from-bracket"></i>Terminando...
                                </span>
                                <span v-else>
                                    <i class="fa-solid fa-right-from-bracket"></i>Terminar
                                </span>
                            </a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </nav>

        <router-view />
    </div>
</template>
<script>
import { useStore } from 'vuex'
import { computed, ref } from "vue"
import router from '@/router'

export default {
    name: "NavbarTopo",
    setup() {
        const loading = ref(false)
        const store = useStore()
        const url = window.url + "storage/image/funcionarios/"
        const url_no_image = window.url + "image/no-Image.jpg"

        const logout = () => {
            loading.value = true
            store.dispatch('logout')
                .then(() => router.push({ name: 'home.login' }))
                .catch((error) => console.log(error))
                .finally(() => loading.value = false)
        }

        const me = computed(() => {
            return store.state.users.user
        })

        return {
            me,
            store,
            url,
            url_no_image,
            logout,
            loading,
        }
    },

}
</script>

<style scope>
    .text-capitalize {
        text-transform: capitalize !important;
    }
    .tamanhoUserImage {
        width: 30px !important;
        height: 30px !important;
        background-color: #fff;
    }
</style>