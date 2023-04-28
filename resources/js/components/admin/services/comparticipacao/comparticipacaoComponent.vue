<template>
    <div class="container mt-4">

        <topo-page-component :namePage="namePage" :nameButton="nameButto" :pageTopoIcon="pageTopoIcon"
            @buscar-curso-id="novaComparticipacao"/>

        <br>

        <!-- <div class="row">
            <div class="form-group col-6 text-start mb-2">
                <span class="text-secondary">Confirmação:</span> <span class="fw-bold">( {{ totalDeConfirmacoes }}
                    )</span>
            </div>

            <div class="form-group col-6 text-end mb-2" v-if="totalDeConfirmacoes != 0">
                <a class="btn btn-sm btn-outline-success ml-2" :href="`${urlExport}${meID}`">
                    <i class="fa-solid fa-file-excel fa-lg"></i> Exportar lista do valor de confirmação
                </a>
            </div>
        </div>


        <form class="d-flex" role="search" v-if="totalDeConfirmacoes >= 6">
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-magnifying-glass"></i></span>
                <input class="form-control form-control-sm" v-model="filter" type="search" placeholder="Pesquisar"
                    aria-label="Search">
            </div>
        </form> -->

        <div class="row" v-if="comparticipacaos == ''">
            <div class="form-group col-12 text-danger text-center fw-bold">
                De momento não tens nenhum valor de comparticipação cadastrada...
            </div>
        </div>

        <div class="card mt-2 shadow" v-for="compart in comparticipacaos" :key="compart.id">
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
                                            data-bs-target="#staticBackdrop" @click="updateComparticipacForm(compart.id)"><i
                                                class="fa-regular fa-pen-to-square text-success"></i> Alterar</a></li>
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                            data-bs-target="#modalDeleteConfirm" @click="deleteComparticipacao(compart.id)"><i
                                                class="fa-solid fa-trash text-danger"></i> Apagar</a></li>
                                </ul>
                            </div>
                        </span>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <label class="text-success">Valor de comparticipação</label>
                        <p class="text-secondary h6"><i class="fa-solid fa-cart-shopping"></i>
                             {{ vueNumberFormat(compart.cobranca, {isInteger:true}) }}
                        </p>
                    </div>

                </div>
            </div>

            <!-- Listagem em tabela
                 <div class="card-body">

                <div class="row">

                    <div class="form-group col-12">
                        <div class="table-responsive">

                            <table class="table table-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>Cod.</th>
                                        <th>Cursos</th>
                                        <th>Cobrança</th>
                                        <th>Opções</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr v-for="curso in courses.data" :key="curso.id">
                                        <td>{{ curso.id }}</td>
                                        <td>{{ curso.cursos }}</td>
                                        <td>{{ vueNumberFormat(curso.cobranca, { isInteger: true }) }}</td>
                                        <td>
                                            <button @click="updateCursoForm(curso.id)"
                                                class="btn btn-sm btn-outline-success mr-2" type="button"
                                                data-bs-toggle="modal" data-bs-target="#modalEdit" to="#">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger mr-2" data-bs-toggle="modal"
                                                data-bs-target="#modalDeleteConfirm" @click="deleteCourse(curso.id)">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table> 

                           

                            <nav aria-label="paginate">
                                <ul class="pagination pagination-sm" v-if="courses.last_page > 1">
                                    <li class="page-item" v-if="courses.current_page != 1">
                                        <a class="page-link" href="#"
                                            @click.prevent="loadingCourse(courses.current_page - 1)">{{ '<<' }}</a>
                                    </li>

                                    <li :class="['page-item', { 'active': courses.current_page == page }]" aria-current="page"
                                        v-for="page in courses.last_page" :key="page.id">
                                        <a class="page-link" href="#" @click.prevent="loadingCourse(page)">{{ page }}</a>
                                    </li>

                                    <li class="page-item" v-if="courses.current_page < courses.last_page">
                                        <a class="page-link" href="#"
                                            @click.prevent="loadingCourse(courses.current_page + 1)">{{ '>>' }}</a>
                                    </li>
                                </ul>
                            </nav>


                        </div>
                    </div>
                </div>
            </div> -->
        </div>
        <br>

        <!-- Modal cadastrar -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">
                            <span class="" v-if="btnSaveVariavel">
                                <i class="fa-solid fa-graduation-cap"></i> Cadastre novo valor de comparticipação
                            </span>
                            <span class="" v-else>
                                <i class="fa-solid fa-graduation-cap"></i> Alter informações de comparticipação
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
                                    <label for="" class="text-secodary col-12">Valor de comparticipação</label>

                                    <VueNumberFormat class="form-control form-control-sm" v-model:value="items.cobranca"
                                        :options="{ precision: 2, prefix: '', suffix: ' ', isInteger: true, acceptNegative: false, masked: false }">
                                    </VueNumberFormat>
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
                        <button @click.prevent="registerComparticipacao" type="button" class="btn btn-sm btn-success">
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
                        <button @click.prevent="updateComparticipacao" type="button" class="btn btn-sm btn-success">
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
                            Apagar valor de comparticipação</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-12 text-center">
                                <span class="text-primary">
                                    <h6>Tens a certeza que desejas apagar o valor desta comparticipação...?</h6>
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
                        <button @click.prevent="apagarComparticipacao(deleteComparticipacaoId)" type="button"
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
    name: "Comparticipacao-component",

    data() {
        return {
            //urlExport: URL_API + '/ExportToExcelConfirmacao/',
            meID:'',
            items: { cobranca:'' },
            erros: [],
            deleteComparticipacaoId: '',
            filter: '',
            info: [],
            fomatoData: '',
            namePage: 'Comparticipação',
            nameButto: 'Novo valor de comparticipação',
            pageTopoIcon: 'fa-solid fa-circle-dollar-to-slot',
            loading: false,
            btnSaveVariavel: false,
        }
    },
    created() {
        this.loadingComparticipacaos()
        this.me()
    },

    computed: {
        comparticipacaos() {
            return this.$store.getters.todasComparticipacaos(this.filter)
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

        novaComparticipacao() {
            this.btnSaveVariavel = true;
            this.cleanForm();
        },

        cleanForm() {
            this.items={ cobranca:'' },
            this.erros = []
        },

        loadingComparticipacaos() {
            //var store = useStore()
            this.$store.dispatch('loadingComparticipacaos')
        },

        registerComparticipacao() {
            this.$store.dispatch('createComparticipacao', this.items)
                .then(() => {
                    notify({
                        title: 'Sucesso',
                        text: "Valor de comparticipação registada com sucesso",
                        type: 'success'
                    })
                    this.cleanForm()
                    this.loadingComparticipacaos()
                })
                .catch((error) => {
                    this.erros = error
                    console.log(error)
                    notify({
                        title: 'Erro',
                        text: this.erros.cobranca,
                        type: 'warn'
                    })

                })
        },
        updateComparticipacForm(id) {
            this.btnSaveVariavel = false
            this.cleanForm()
            this.$store.dispatch('updateFormComparticipacao', id)
                .then((response) => this.items = response.data.getComparticipacao)
                .catch((error) => {
                    notify({
                        title:'Não encotrado',
                        text: 'A confirmação que pretendes localizar não existe',
                        type: 'warn'
                    })
                })
        },

        updateComparticipacao() {

            this.$store.dispatch('updateComparticipacao', this.items)
                .then(() => {
                    notify({
                        title: 'Sucesso',
                        text: 'O valor da comparticipação foi actualizado com sucesso..!',
                        type: 'success'
                    })
                    this.cleanForm()
                    this.loadingComparticipacaos()
                })
                .catch((error) => {
                    notify({
                        title: 'Erro',
                        text: 'Não foi possível actualizar...!',
                        type: 'warn'
                    })
                    this.erros = error.response.data.errors
                    console.log(this.erros)
                })
        },

        deleteComparticipacao(id) {
            this.deleteComparticipacaoId = id;
        },

        apagarComparticipacao(id) {
            this.$store.dispatch('apagarComparticipacao', id)
                .then((response) => {
                    notify({
                        title: 'Sucesso',
                        text: response.data.message,
                        type: 'success'
                    })
                    this.loadingComparticipacaos()
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