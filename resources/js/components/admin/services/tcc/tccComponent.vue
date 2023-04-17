<template>
    <div class="container mt-4">

        <topo-page-component :namePage="namePage" :nameButton="nameButto" :pageTopoIcon="pageTopoIcon"
            @buscar-curso-id="novoTcc"/>

        <br>

        <div class="row">
            <div class="form-group col-6 text-start mb-2">
                <span class="text-secondary">Total de registo:</span> <span class="fw-bold">( {{ totalDeTccs }}
                    )</span>
            </div>

            <div class="form-group col-6 text-end mb-2" v-if="totalDeTccs != 0">
                <a class="btn btn-sm btn-outline-success ml-2" :href="`${urlExport}${meID}`">
                    <i class="fa-solid fa-file-excel fa-lg"></i> Exportar lista do valor de TCC registada
                </a>
            </div>
        </div>


        <form class="d-flex" role="search" v-if="totalDeTccs >= 6">
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-magnifying-glass"></i></span>
                <input class="form-control form-control-sm" v-model="filter" type="search" placeholder="Pesquisar"
                    aria-label="Search">
            </div>
        </form>

        <div class="row" v-if="Tccs == ''">
            <div class="form-group col-12 text-danger text-center fw-bold">
                De momento não tens nenhum valor de TCC registado...
            </div>
        </div>

        <div class="card mt-2 shadow" v-for="t in Tccs" :key="t.id">
            <div class="card-body">
                <div class="row">

                    <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4 d-flex justify-content-start">
                        <span class="text-secondary">
                            <div class="dropdown">
                                <button class="btn btn-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop" @click="updateTccForm(t.id)"><i
                                                class="fa-regular fa-pen-to-square text-success"></i> Alterar</a></li>
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                            data-bs-target="#modalDeleteConfirm" @click="deleteTcc(t.id)"><i
                                                class="fa-solid fa-trash text-danger"></i> Apagar</a></li>
                                </ul>
                            </div>
                        </span>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <label class="text-success">Cursos</label>
                        <p class="text-secondary h6" v-for="curso in t['cursos']" :key="curso.id"><i class="fa-solid fa-graduation-cap"></i> {{ curso.cursos }} </p>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <label class="text-success">Cobrança</label>
                        <p class="text-secondary h6"><i class="fa-solid fa-cart-shopping"></i>
                             {{ vueNumberFormat(t.cobranca, {isInteger:true}) }}
                        </p>
                    </div>

                </div>
            </div>

       </div>
        
        <!-- Modal cadastrar -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">
                            <span class="" v-if="btnSaveVariavel">
                                <i class="fa-solid fa-graduation-cap"></i> Cadastre novo valor de TCC
                            </span>
                            <span class="" v-else>
                                <i class="fa-solid fa-graduation-cap"></i> Alter informações de TCC
                            </span>

                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <form action="">

                                <div class="form-group col-12 mb-2">
                                    <span class="text-danger small col-12" v-if="erros.cobranca">{{ erros.cobranca[0]
                                    }}</span>
                                    <label for="" class="text-secodary col-12">Valor de TCC</label>

                                    <VueNumberFormat class="form-control form-control-sm" v-model:value="items.cobranca"
                                        :options="{ precision: 2, prefix: '', suffix: ' ', isInteger: true, acceptNegative: false, masked: false }">
                                    </VueNumberFormat>
                                </div>

                                <div class="form-group col-12 mb-2">
                                    <span class="text-danger small col-12" v-if="erros.curso_id">{{ erros.curso_id[0]
                                    }}</span>
                                    <label for="" class="text-secodary col-12">Associar nos cursos</label>
                                    <select class="form-control form-control-sm" multiple v-model="items.curso_id">
                                        <option class="text-secondary" value="">Cursos</option>
                                        <option class="text-secondary fw-bold" :value="curso.id" v-for="curso in cursos"
                                            :key="curso.id">{{ curso.cursos }}</option>
                                    </select>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="modal-footer" v-if="btnSaveVariavel">
                        <button type="submit" @click="cleanForm" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">
                            <span>
                                <i class="fa-solid fa-circle-xmark"></i> Fechar
                            </span>
                        </button>
                        <button @click.prevent="registerTcc" type="button" class="btn btn-sm btn-success">
                            <span v-if="loading">
                                <i class="fa-regular fa-floppy-disk"></i> Tentando salvar...
                            </span>
                            <span v-else>
                                <i class="fa-regular fa-floppy-disk"></i> Cadastrar
                            </span>
                        </button>
                    </div>
                    <div class="modal-footer" v-else>
                        <button type="submit" @click="cleanForm" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">
                            <span>
                                <i class="fa-solid fa-circle-xmark"></i> Fechar
                            </span>
                        </button>
                        <button @click.prevent="updateTcc" type="button" class="btn btn-sm btn-success">
                            <span v-if="loading">
                                <i class="fa-regular fa-floppy-disk"></i> Tentando salvar...
                            </span>
                            <span v-else>
                                <i class="fa-regular fa-floppy-disk"></i> Salvar alteração
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal cadastrar -->


        <!-- Modal Confirm Delete -->
        <div class="modal fade" id="modalDeleteConfirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"><i class="fa-solid fa-trash text-danger"></i>
                            Apagar valor de TCC</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-12 text-center">
                                <span class="text-primary">
                                    <h6>Tens a certeza que desejas apagar o valor desta TCC...?</h6>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">
                            <span>
                                <i class="fa-solid fa-circle-xmark"></i> Fechar
                            </span>
                        </button>
                        <button @click.prevent="apagarTcc(deleteTccId)" type="button"
                            class="btn btn-sm btn-danger">
                            <span v-if="loading">
                                <i class="fa-regular fa-floppy-disk"></i> Apagando...
                            </span>
                            <span v-else>
                                <i class="fa-regular fa-floppy-disk"></i> Apagar
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Confirm Delete -->


    </div>
</template>

<script>
import { notify } from '@kyvg/vue3-notification'
import topoPageComponent from '../partials/topoPageComponent.vue'
import { URL_API } from '../../../../configs/index.js'

export default {
    name: "Tcc-component",

    data() {
        return {
            urlExport: URL_API + '/ExportToExcelTcc/',
            meID:'',
            items: { curso_id:[], cobranca:'' },
            erros: [],
            deleteTccId: '',
            filter: '',
            info: [],
            fomatoData: '',
            namePage: 'Cobrança de TCC',
            nameButto: 'Nova cobrança',
            pageTopoIcon: 'fa-solid fa-clipboard-check',
            loading: false,
            btnSaveVariavel: false,
        }
    },
    created() {
        this.loadingTccs()
        this.loadingCursos()
        this.me()
    },

    computed: {
        Tccs() {
            return this.$store.getters.todosTccs(this.filter)
        },

        totalDeTccs(){
            return this.$store.getters.todosTccsCount
        },

        cursos() {
            return this.$store.getters.todosCursos(this.filter)
        },


        formatoDeData() {
            if (this.info != '') {
                const data = new Date(this.info.created_at)
                //dateFormat.options.locales = ['enUS'];
                return new Intl.DateTimeFormat('pt-BR', { dateStyle: 'full', timeStyle: 'short', timeZone: 'Africa/luanda' }).format(data)
                //dateFormat.format('DDDD-MMMM-YYYY', data)
            }
        }

    },

    methods: {
        me(){
           this.$store.dispatch('getMeSemLoading')
                                .then((resp)=>this.meID=resp.id)
        },

        novoTcc() {
            this.btnSaveVariavel = true;
            this.cleanForm();
        },

        detalhes(id) {
            this.info = []
            this.$store.dispatch('detalhesTcc', id)
                .then((response) => {
                    this.info = response.data
                    console.log(this.info)
                })
                .catch((error) => {
                    notify({
                        title: 'Erro de localização',
                        text: error,
                        type: 'warn'
                    })
                })
        },

        cleanForm() {
            this.items={ curso_id:[], cobranca:'' },
            this.erros = []
        },

        loadingTccs() {
            //var store = useStore()
            this.$store.dispatch('loadingTccs')
        },

        loadingCursos() {
            //var store = useStore()
            this.$store.dispatch('loadingCourse')
        },

        registerTcc() {
            this.$store.dispatch('createTcc', this.items)
                .then(() => {
                    notify({
                        title: 'Sucesso',
                        text: "Registado com sucesso",
                        type: 'success'
                    })
                    this.cleanForm()
                    this.loadingTccs()
                })
                .catch((error) => {
                    this.erros = error
                    notify({
                        title: 'Erro',
                        text: "Ocorreu um erro durante o processo de cadastro!",
                        type: 'warn'
                    })

                })
        },
        updateTccForm(id) {
            this.btnSaveVariavel = false
            this.cleanForm()
            this.$store.dispatch('updateFormTcc', id)
                .then((response) => this.items = response.data.getTcc)
                .catch((error) => {
                    notify({
                        title:'Não encotrado',
                        text: 'Não foi localizado...',
                        type: 'warn'
                    })
                })
        },

        updateTcc() {
            console.log(this.items)
            this.$store.dispatch('updateTcc', this.items)
                .then(() => {
                    notify({
                        title: 'Sucesso',
                        text: 'Actualizado com sucesso..!',
                        type: 'success'
                    })
                    this.cleanForm()
                    this.loadingTccs()
                })
                .catch((error) => {
                    notify({
                        title: 'Erro',
                        text: 'Não foi possível actualizar...!',
                        type: 'warn'
                    })
                    this.erros = error.response.data.errors
                })
        },

        deleteTcc(id) {
            this.deleteTccId = id;
        },

        apagarTcc(id) {
            this.$store.dispatch('apagarTcc', id)
                .then((response) => {
                    notify({
                        title: 'Sucesso',
                        text: response.data.message,
                        type: 'success'
                    })
                    this.loadingTccs()
                })
                .catch((error) => {
                    notify({
                        title: 'Erro',
                        text: error.data.erro,
                        type: 'warn'
                    })
                })
        }
    },

    components: {
        topoPageComponent,
    }
}
</script>

<style scoped>
.topoMargin {
    margin-top: -5% !important;
}
</style>