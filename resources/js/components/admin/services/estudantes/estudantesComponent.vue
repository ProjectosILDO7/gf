<template>
    <div class="container mt-4">

        <topo-page-component :namePage="namePage" :nameButton="nameButto" :pageTopoIcon="pageTopoIcon"
            @buscar-curso-id="buscaCursosID" />

        <br>

        <form class="d-flex" role="search">
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-magnifying-glass"></i></span>
                <input class="form-control form-control-sm me-2" v-model="filter" type="search" placeholder="Pesquisar"
                    aria-label="Search">
            </div>
        </form>

        <div class="card mt-2 shadow" v-for="estudante in estudantes" :key="estudante.id">
            <div class="card-body">
                <div class="row">

                    <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3 d-flex justify-content-start">
                        <span class="text-secondary">
                            <div class="dropdown">
                                <button class="btn btn-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalEdit"
                                            @click="updateEstudanteForm(estudante.id)"><i
                                                class="fa-regular fa-pen-to-square text-success"></i> Alterar</a></li>
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                            data-bs-target="#modalDeleteConfirm" @click="deleteEstudante(estudante.id)"><i
                                                class="fa-solid fa-trash text-danger"></i> Apagar</a></li>
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="offcanvas"
                                            data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"
                                            @click="detalhes(estudante.id)">
                                            <i class="fa-solid fa-eye"></i> Vêr Detalhes
                                        </a></li>
                                </ul>
                            </div>
                        </span>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3">
                        <label class="text-success">Nome do estudante</label>
                        <p class="text-secondary h6"><i class="fa-solid fa-circle-user"></i> {{
                            estudante.nome
                        }}
                        </p>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3">
                        <label class="text-success">Curso inscrito</label>
                        <p class="text-secondary h6"><i class="fa-solid fa-graduation-cap text-success"></i> nome do curso
                        </p>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3">
                        <label class="text-success">Graduação inscrito</label>
                        <p class="text-secondary h6"><i class="fa-solid fa-graduation-cap text-success"></i>nome da graduação
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
                                        <th>graduacaos</th>
                                        <th>Cobrança</th>
                                        <th>Opções</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr v-for="graduacao in graduacoes.data" :key="graduacao.id">
                                        <td>{{ graduacao.id }}</td>
                                        <td>{{ graduacao.graduacaos }}</td>
                                        <td>{{ vueNumberFormat(graduacao.cobranca, { isInteger: true }) }}</td>
                                        <td>
                                            <button @click="updategraduacaoForm(graduacao.id)"
                                                class="btn btn-sm btn-outline-success mr-2" type="button"
                                                data-bs-toggle="modal" data-bs-target="#modalEdit" to="#">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger mr-2" data-bs-toggle="modal"
                                                data-bs-target="#modalDeleteConfirm" @click="deleteGraduac(graduacao.id)">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table> 

                           

                            <nav aria-label="paginate">
                                <ul class="pagination pagination-sm" v-if="graduacoes.last_page > 1">
                                    <li class="page-item" v-if="graduacoes.current_page != 1">
                                        <a class="page-link" href="#"
                                            @click.prevent="loadingGraduac(graduacoes.current_page - 1)">{{ '<<' }}</a>
                                    </li>

                                    <li :class="['page-item', { 'active': graduacoes.current_page == page }]" aria-current="page"
                                        v-for="page in graduacoes.last_page" :key="page.id">
                                        <a class="page-link" href="#" @click.prevent="loadingGraduac(page)">{{ page }}</a>
                                    </li>

                                    <li class="page-item" v-if="graduacoes.current_page < graduacoes.last_page">
                                        <a class="page-link" href="#"
                                            @click.prevent="loadingGraduac(graduacoes.current_page + 1)">{{ '>>' }}</a>
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
            <ul class="pagination pagination-sm" v-if="estudantes.last_page > 1">
                <li class="page-item" v-if="estudantes.current_page != 1">
                    <a class="page-link" href="#" @click.prevent="loadingEstudantes(estudantes.current_page - 1)">{{ '<<'
                    }}</a>
                </li>

                <li :class="['page-item', { 'active': estudantes.current_page == page }]" aria-current="page"
                    v-for="page in estudantes.last_page" :key="page.id">
                    <a class="page-link" href="#" @click.prevent="loadingEstudantes(page)">{{ page }}</a>
                </li>

                <li class="page-item" v-if="estudantes.current_page < estudantes.last_page">
                    <a class="page-link" href="#" @click.prevent="loadingEstudantes(estudantes.current_page + 1)">{{ '>>'
                    }}</a>
                </li>
            </ul>
        </nav>

        <!-- Modal cadastrar e editar-->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"><i class="fa-solid fa-graduation-cap"></i> Cadastre
                            nova estudante</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <form action="">

                                <div class="form-group col-12 mb-2">
                                    <span class="text-danger small col-12" v-if="erros.nome">{{ erros.nome[0] }}</span>
                                    <label for="" class="text-secodary col-12">Nome completo</label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Informe nova graduação" v-model="items.nome">
                                </div>

                                <div class="form-group col-12 mb-2">
                                    <span class="text-danger small col-12" v-if="erros.curso_id">{{ erros.curso_id[0]
                                    }}</span>
                                    <label for="" class="text-secodary col-12">Inscrever no curso de:</label>
                                    <select class="form-control form-control-sm" v-model="items.curso_id" multiple>
                                        <option disabled class="selected" value=""> Selessione um curso</option>
                                        <option :value="curso.id" v-for="curso in getCoursesID" :key="curso.id">{{ curso.cursos }}
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group col-12 mb-2">
                                    <span class="text-danger small col-12" v-if="erros.curso_id">{{ erros.curso_id[0]
                                    }}</span>
                                    <label for="" class="text-secodary col-12">Inscrever na graduação de(a):</label>
                                    <select class="form-control form-control-sm" v-model="items.grade_id" multiple>
                                        <option disabled class="selected" value=""> Selessione a graduação</option>
                                        <option :value="grade.id" v-for="grade in getGraduationID" :key="grade.id">{{ grade.grade }}
                                        </option>
                                    </select>
                                </div>


                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" @click="cleanForm" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">
                            <span>
                                <i class="fa-solid fa-circle-xmark"></i> Fechar
                            </span>
                        </button>
                        <button @click.prevent="registerEstudantes" type="button" class="btn btn-sm btn-success">
                            <span v-if="loading">
                                <i class="fa-regular fa-floppy-disk"></i> Tentando salvar...
                            </span>
                            <span v-else>
                                <i class="fa-regular fa-floppy-disk"></i> Cadastrar
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal cadastrar e editar-->


        <!-- Modal Confirm Delete -->
        <div class="modal fade" id="modalDeleteConfirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"><i class="fa-solid fa-trash text-danger"></i>
                            Apagar estudante</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-12 text-center">
                                <span class="text-primary">
                                    <h6>Tens a certeza que desejas apagar este estudante...?</h6>
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
                        <button @click.prevent="apagarEstudante(deleteEstudanteId)" type="button"
                            class="btn btn-sm btn-danger">
                            <span v-if="loading">
                                <i class="fa-regular fa-floppy-disk"></i> Apagando o estudante...
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

        <!-- Înfo Canvas - informações a direita -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">

                <div class="form-group col-9 text-end text-info">
                    <h5 id="offcanvasRightLabel text-center">DETALHES DO ESTUDANTE</h5>
                </div>
                <div class="form-group col-3 text-end">
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>

            </div>
            <div class="offcanvas-body">
                <div class="row">
                    <div class="form-group col-12 text-center">
                        <h1><i class="fa fa-graduation-cap fs-lg text-success"></i></h1>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="form-group col-12 text-center">
                        <div class="card shadow">
                            <h4><span class="text-danger">{{ info.nome }}</span></h4>
                        </div>
                    </div>

                    <div class="form-group col-12 mt-4">
                        <div class="card mt-2">  
                            <div class="card-body">
                                <p class="text-success">Curso associado</p>
                                <p class="text-secondary mt-0 fw-bold topoMargin">{{ info.cursos.cursos }}</p>
                                <p class="mt-0 fw-bold topoMargin">Valor do curso: <span class="text-success">{{ vueNumberFormat(info.cursos.cobranca, {isInteger:true}) }} </span></p>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-12 mt-4">
                        <div class="card">
                            <div class="card-body">
                                <h5>Data de registo: <span class="text-secondary text-success"> {{ formatoDeData }} </span>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>

            </div>
        </div>

    </div>
</template>

<script>
import { notify } from '@kyvg/vue3-notification'
import dateFormat from '@vue-formily/date-format';
import topoPageComponent from '../partials/topoPageComponent.vue'

export default {
    name: "estudante-component",
    emits: ['cleanForm', 'buscaAlunoID'],
    data() {
        return {
            items: {
                user_id:'',
                curso_id:'',
                grade_id:'',
                image:'',
                nome:'',
                organization:'',
            },
            erros: [],
            deleteGraduacId: '',
            filter: '',
            info: [],
            fomatoData: '',
            namePage: 'Estudantes',
            nameButto: 'Novo estudante',
            pageTopoIcon: 'fa-solid fa-circle-user',
            loading: false
        }
    },
    created() {
        this.loadingEstudantes()
        this.loadingCourses()
    },

    computed: {

        estudantes() {
            return this.$store.state.estudantes.items.filter(estudante => estudante.nome.includes(this.filter))
        },

        getCoursesID() {
            return this.$store.state.curso.items
        },

        getGraduacaoID() {
            return this.$store.state.grade.items
        },
        params() {
            return {
                page: this.estudantes.current_page
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
        buscaEstudanteID() {
            console.log('teste')
        },
        detalhes(id) {
            this.info = []
            this.$store.dispatch('detalhesEstudante', id)
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
            this.items = {
                user_id:'',
                curso_id:'',
                grade_id:'',
                image:'',
                nome:'',
                organization:'',
            }
        },

        loadingEstudantes() {
            //var store = useStore()
            this.$store.dispatch('loadingEstudantes')
        },

        loadingGraduaction() {
            //var store = useStore()
            this.$store.dispatch('loadingGraduaction')
        },

        loadingCourses() {
            //var store = useStore()
            this.$store.dispatch('loadingCourse')
        },

        registerEstudantes() {
            
            this.$store.dispatch('createEstudantes', this.items)
                .then(() => {
                    notify({
                        title: 'Sucesso',
                        text: "Estudante registado com sucesso",
                        type: 'success'
                    })
                    this.loadingEstudantes()

                    this.cleanForm()
                    this.erros = []
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
        updateEstudanteForm(id) {
            this.$store.dispatch('updateFormEstudante', id)
                .then((response) => this.items = response.data.getEstudante)
                .catch((error) => {
                    notify({
                        title: 'Não encotrado',
                        text: 'O estudante que pretendes localizar não existe',
                        type: 'warn'
                    })
                })
        },

        updateEstudante() {
            this.$store.dispatch('updateEstudante', this.items)
                .then((response) => {
                    notify({
                        title: 'Sucesso',
                        text: response.data.message,
                        type: 'success'
                    })
                    this.loadingEstudantes()
                    this.cleanForm()
                    this.erros = []
                })
                .catch((error) => {
                    this.erros = error.response.data.errors
                    notify({
                        title:'Erro',
                        text: 'Erro durante a actualização',
                        type: 'warn'
                    })
                })
        },

        deleteEstudante(id) {
            this.deleteEstudanteId = id;
        },

        apagarEstudante(id) {
            this.$store.dispatch('apagarEstudante', id)
                .then((response) => {
                    notify({
                        title: 'Sucesso',
                        text: response.data.message,
                        type: 'success'
                    })
                    this.loadingEstudantes()
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
    .topoMargin{
        margin-top: -5% !important;
    }
</style>