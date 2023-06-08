<template>
    <div class="container mt-2">
        <div class="card shadow m-auto text-center mb-4">
            <div class="container py-4"><strong>REGISTO DE PONTO</strong></div>
        </div>

        <div class="row">
            <div class="form-group col-12">
                <form>
                    <input type="text" class="form-control form-control-sm shadow bg-light" placeholder="Pesquisar pelo nome completo"
                        v-model="search">
                    <div class="d-grid gap-2">
                        <button type="button" class="btn btn-sm btn-primary mt-2 shadow" @click="procurar"
                            v-if="search != ''">
                            <span v-if="loading">...</span>
                            <span v-else>Procurar</span>
                        </button>
                        <button type="button" class="btn btn-sm btn-secondary disabled mt-2 shadow" @click="procurar"
                            v-else>
                            <span v-if="loading">...</span>
                            <span v-else>Procurar</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <hr>

        <div class="card shadow" v-if="statusDeBusca">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered bordered-success">
                        <thead>
                            <tr>
                                <th>Nome Completo</th>
                                <th>Nº do documento</th>
                                <th>Departamento</th>
                                <th>Data da assinatura</th>
                                <th>Assinatura</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="(user, index) in data" :key="index">
                                <td>{{ user.name }}</td>
                                <td>{{ user.numBI }}</td>
                                <td>{{ user.departamentos.departamento }}</td>
                                <td>{{ dataAssinatura }}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary" v-if="user.status == 'Activo'"
                                        @click="assinar(user.id)">
                                        <span v-if="loadingAssinatura"><i class="fa fa-edit"></i>Assinar ...</span>
                                        <span v-else><i class="fa fa-edit"></i> Assinar presença</span>
                                    </button>
                                    <button class="btn btn-sm btn-danger disabled" v-else>
                                        <i class="fa fa-edit"></i> Não autorizado
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <preloading v-if="loading == true"></preloading>


    </div>
</template>
<script>
import { notify } from '@kyvg/vue3-notification'
import { URL_API } from '../../configs'
import axios from 'axios'
import preloading from "../../components/preloading/preloading-carregando.vue"

export default {
    name: 'Seviços-componente',

    data() {
        return {
            search: '',
            data: [],
            url2: 'searchFuncionario',
            statusDeBusca: false,
            loading: false,
            loadingAssinatura: false
        }
    },

    created() {
        this.statusDeBusca = false,
            this.loading = false
    },

    computed: {
        dataAssinatura() {
            const data = new Date();
            //dateFormat.options.locales = ['enUS'];
            return new Intl.DateTimeFormat("pt-BR", {
                dateStyle: "full",
                timeStyle: "short",
                timeZone: "Africa/luanda",
            }).format(data);
            //dateFormat.format('DDDD-MMMM-YYYY', data)
        },
    },

    methods: {
        procurar() {
            if (this.search != '') {
                this.loading = true
                axios.post(`${URL_API}/${this.url2}/${this.search}`)
                    .then((response) => {
                        if (response.data.user == '') {
                            notify({
                                title: 'Não econtrado',
                                text: 'Não foi possível localizar este funcionário',
                                type: 'warn'
                            })
                            return { ...this.statusDeBusca = false, ...this.loading = false }
                        } else {
                            this.data = response.data.user
                            this.statusDeBusca = true
                        }

                    })
                    .catch((error) => console.log(error))
                    .finally(() => {
                        this.loading = false
                    })
            }
        },

        assinar(id) {
            this.loadingAssinatura = true
            axios.post(`${URL_API}/assinatura/${id}`)
                .then((response) => {
                    console.log(response)
                    this.$swal.fire({
                        title: 'Sucesso',
                        text: response.data.mensagem,
                        icon: 'success',
                        timer: 15000
                    })
                })
                .catch((erro) => {
                    this.$swal.fire({
                        title: 'Erro',
                        text: erro.response.data.mensagem,
                        icon: 'info',
                        timer: 15000
                    })
                })
                .finally(() => this.loadingAssinatura = false)
        },
    },

    components: {
        preloading
    }
}
</script>