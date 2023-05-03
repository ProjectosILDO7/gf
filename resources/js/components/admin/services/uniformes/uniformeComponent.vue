<template>
    <div class="container mt-4">

        <topo-page-component :namePage="namePage" :nameButton="nameButto" :pageTopoIcon="pageTopoIcon"
            @buscar-curso-id="novoUniforme" />

        <br>

        <div class="row">
            <div class="form-group col-6 text-start mb-2">
                <span class="text-secondary">Total de uniformes:</span> <span class="fw-bold">( {{ totalDeUniformes }}
                    )</span>
            </div>

            <div class="form-group col-6 text-end mb-2" v-if="totalDeUniformes != 0">
                <a class="btn btn-sm btn-outline-success ml-2" :href="`${urlExport}${meID}`">
                    <i class="fa-solid fa-file-excel fa-lg"></i> Exportar lista de uniformes
                </a>
            </div>
        </div>


        <form class="d-flex" role="search" v-if="totalDeUniformes >= 6">
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-magnifying-glass"></i></span>
                <input class="form-control form-control-sm" v-model="filter" type="search" placeholder="Pesquisar"
                    aria-label="Search">
            </div>
        </form>

        <div class="row" v-if="uniformes == ''">
            <div class="form-group col-12 text-danger text-center fw-bold">
                De momento não tens nenhum uniforme cadastrado...
            </div>
        </div>

        <div class="card mt-2 shadow" v-for="uniforme in uniformes" :key="uniforme.id">
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
                                            data-bs-target="#staticBackdrop" @click="updateUniformeForm(uniforme.id)"><i
                                                class="fa-regular fa-pen-to-square text-success"></i> Alterar</a></li>
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                            data-bs-target="#modalDeleteConfirm" @click="deleteUniforme(uniforme.id)"><i
                                                class="fa-solid fa-trash text-danger"></i> Apagar</a></li>
                                </ul>
                            </div>
                        </span>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <label class="text-success">Uniformes</label>
                        <p class="text-secondary h6"><i class="fa-solid fa-user-tie"></i> {{
                            uniforme.descricao
                        }}
                        </p>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <label class="text-success">Cobrança</label>
                        <p class="text-secondary h6"><i class="fa-solid fa-cart-shopping"></i>
                             {{ vueNumberFormat(uniforme.cobranca, {isInteger:true})}}
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
        <!-- paginate -->
        <nav aria-label="paginate mt-4">
            <ul class="pagination pagination-sm" v-if="uniformes.last_page > 1">
                <li class="page-item" v-if="uniformes.current_page != 1">
                    <a class="page-link" href="#" @click.prevent="loadingUniformes(uniformes.current_page - 1)">{{ '<<'
                    }}</a>
                </li>

                <li :class="['page-item', { 'active': uniformes.current_page == page }]" aria-current="page"
                    v-for="page in uniformes.last_page" :key="page.id">
                    <a class="page-link" href="#" @click.prevent="loadingUniformes(page)">{{ page }}</a>
                </li>

                <li class="page-item" v-if="uniformes.current_page < uniformes.last_page">
                    <a class="page-link" href="#" @click.prevent="loadingUniformes(uniformes.current_page + 1)">{{ '>>'
                    }}</a>
                </li>
            </ul>
        </nav>

        <!-- Modal cadastrar -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">
                            <span class="" v-if="btnSaveVariavel">
                                <i class="fa-solid fa-graduation-cap"></i> Cadastre novo uniforme
                            </span>
                            <span class="" v-else>
                                <i class="fa-solid fa-graduation-cap"></i> Alter informações do uniforme
                            </span>

                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <form action="">

                                <div class="form-group col-12 mb-2">
                                    <span class="text-danger small col-12" v-if="erros.descricao">{{ erros.descricao[0]
                                    }}</span>
                                    <label for="" class="text-secodary col-12">Nome do uniforme</label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Informe o uniforme" v-model="items.descricao">
                                </div>

                                <div class="form-group col-12 mb-2">
                                    <span class="text-danger small col-12" v-if="erros.cobranca">{{ erros.cobranca[0]
                                    }}</span>
                                    <label for="" class="text-secodary col-12">Valor da cobrança</label>

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
                        <button @click.prevent="registerUniforme" type="button" class="btn btn-sm btn-success">
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
                        <button @click.prevent="updateUniforme" type="button" class="btn btn-sm btn-success">
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
                            Apagar o uniforme</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-12 text-center">
                                <span class="text-primary">
                                    <h6>Tens a certeza que desejas apagar este uniforme...?</h6>
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
                        <button @click.prevent="apagarUniforme(deleteUniformeId)" type="button"
                            class="btn btn-sm btn-danger">
                            <span v-if="loading">
                                <i class="fa-regular fa-floppy-disk"></i> Apagando o curso...
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
    name: "Emolumento-component",

    data() {
        return {
            urlExport: URL_API + '/ExportToExcelUniforme/',
            meID:'',
            items: { descricao:'', cobranca:'' },
            erros: [],
            deleteUniformeId: '',
            filter: '',
            info: [],
            fomatoData: '',
            namePage: 'Uniformes',
            nameButto: 'Novo uniforme',
            pageTopoIcon: 'fa-solid fa-user-tie',
            loading: false,
            btnSaveVariavel: false,
        }
    },
    created() {
        this.loadingUniformes()
        this.me()
    },

    computed: {
        uniformes() {
            return this.$store.getters.todosUniformes(this.filter)
        },

        totalDeUniformes(){
            return this.$store.getters.todosUniformesCount
        },

        params() {
            return {
                page: this.uniformes.current_page
            }
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

        novoUniforme() {
            this.btnSaveVariavel = true;
            this.cleanForm();
        },

        detalhes(id) {
            this.info = []
            this.$store.dispatch('detalhesUniforme', id)
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
            this.items = { descricao: '', cobranca:'' },
            this.erros = []
        },

        loadingUniformes() {
            //var store = useStore()
            this.$store.dispatch('loadingUniformes')
        },

        registerUniforme() {
            this.$store.dispatch('createUniforme', this.items)
                .then(() => {
                    notify({
                        title: 'Sucesso',
                        text: "Uniforme registado com sucesso",
                        type: 'success'
                    })
                    this.cleanForm()
                    this.loadingUniformes()
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
        updateUniformeForm(id) {
            this.btnSaveVariavel = false
            this.cleanForm()
            this.$store.dispatch('updateFormUniforme', id)
                .then((response) => this.items = response.data.getUniforme)
                .catch((error) => {
                    notify({
                        title: 'Não encotrado',
                        text: 'O Uniforme que pretendes localizar não existe',
                        type: 'warn'
                    })
                })
        },

        updateUniforme() {
            this.$store.dispatch('updateUniforme', this.items)
                .then(() => {
                    notify({
                        title: 'Sucesso',
                        text: 'O uniforme foi actualizado com sucesso..!',
                        type: 'success'
                    })
                    this.cleanForm()
                    this.loadingUniformes()
                })
                .catch((error) => {
                    notify({
                        title: 'Erro',
                        text: 'Não foi possível actualizar este uniforme',
                        type: 'warn'
                    })
                    this.erros = error.response.data.errors
                })
        },

        deleteUniforme(id) {
            this.deleteUniformeId = id;
        },

        apagarUniforme(id) {
            this.$store.dispatch('apagarUniforme', id)
                .then((response) => {
                    notify({
                        title: 'Sucesso',
                        text: response.data.message,
                        type: 'success'
                    })
                    this.loadingUniformes()
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