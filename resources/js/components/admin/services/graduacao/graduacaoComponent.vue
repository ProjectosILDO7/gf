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

        <div class="card mt-2 shadow" v-for="graduacao in graduacoes" :key="graduacao.id">
            <div class="card-body">
                <div class="row">

                    <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4 d-flex justify-content-start">
                        <span class="text-secondary">
                            <div class="dropdown">
                                <button class="btn btn-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalEdit"
                                            @click="updategraduacaoForm(graduacao.id)"><i
                                                class="fa-regular fa-pen-to-square text-success"></i> Alterar</a></li>
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                            data-bs-target="#modalDeleteConfirm" @click="deleteGraduaction(graduacao.id)"><i
                                                class="fa-solid fa-trash text-danger"></i> Apagar</a></li>
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="offcanvas"
                                            data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"
                                            @click="detalhes(graduacao.id)">
                                            <i class="fa-solid fa-eye"></i> Vêr Detalhes
                                        </a></li>
                                </ul>
                            </div>
                        </span>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <label class="text-success">graduação</label>
                        <p class="text-secondary h6"><i class="fa-solid fa-graduation-cap text-success"></i> {{
                            graduacao.grade
                        }}
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
            <ul class="pagination pagination-sm" v-if="graduacoes.last_page > 1">
                <li class="page-item" v-if="graduacoes.current_page != 1">
                    <a class="page-link" href="#" @click.prevent="loadingGraduac(graduacoes.current_page - 1)">{{ '<<'
                    }}</a>
                </li>

                <li :class="['page-item', { 'active': graduacoes.current_page == page }]" aria-current="page"
                    v-for="page in graduacoes.last_page" :key="page.id">
                    <a class="page-link" href="#" @click.prevent="loadingGraduac(page)">{{ page }}</a>
                </li>

                <li class="page-item" v-if="graduacoes.current_page < graduacoes.last_page">
                    <a class="page-link" href="#" @click.prevent="loadingGraduac(graduacoes.current_page + 1)">{{ '>>'
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
                        <h5 class="modal-title" id="staticBackdropLabel"><i class="fa-solid fa-graduation-cap"></i> Cadastre
                            nova graduação</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <form action="">

                                <div class="form-group col-12 mb-2">
                                    <span class="text-danger small col-12" v-if="erros.grade">{{ erros.grade[0] }}</span>
                                    <label for="" class="text-secodary col-12">Nome da graduação</label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Informe nova graduação" v-model="items.grade">
                                </div>

                                <div class="form-group col-12 mb-2">

                                    <span class="text-danger small col-12" v-if="erros.curso_id">{{ erros.curso_id[0]
                                    }}</span>
                                    <label for="" class="text-secodary col-12">Adissionar ao curso de:</label>
                                    <select class="form-control form-control-sm" v-model="items.curso_id" multiple>
                                        <option disabled class="selected" value=""> Selessione um curso</option>
                                        <option :value="curso.id" v-for="curso in getCoursesID" :key="curso.id">{{ curso.cursos }}
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
                        <button @click.prevent="registerGraduacao" type="button" class="btn btn-sm btn-success">
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
        <!-- End Modal cadastrar -->

        <!-- Modal Edit -->
        <div class="modal fade" id="modalEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"><i class="fa-solid fa-pen-to-square"></i> Alterar
                            graduação</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <form action="">

                                <div class="form-group col-12 mb-2">
                                    <span class="text-danger small col-12" v-if="erros.grade">{{ erros.grade[0] }}</span>
                                    <label for="" class="text-secodary col-12">Nome do graduacao</label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Informe novo graduacao" v-model="items.grade">
                                </div>
                                <div class="form-group col-12 mb-2">
                                    <span class="text-danger small col-12" v-if="erros.curso_id">{{ erros.curso_id[0]
                                    }}</span>
                                    <label for="" class="text-secodary col-12">Adissionar ao curso de:</label>
                                    <select class="form-control form-control-sm" v-model="items.curso_id" multiple>
                                        <option disabled class="selected" value=""> Selessione um curso</option>
                                        <option :value="curso.id" v-for="curso in getCoursesID" :key="curso.id">{{ curso.cursos }}
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
                        <button @click.prevent="updateGraduaction(items.id)" type="button" class="btn btn-sm btn-success">
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
        <!-- End Modal Edit -->

        <!-- Modal Confirm Delete -->
        <div class="modal fade" id="modalDeleteConfirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"><i class="fa-solid fa-trash text-danger"></i>
                            Apagar a
                            graduação</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-12 text-center">
                                <span class="text-primary">
                                    <h6>Tens a certeza que desejas apagar esta graduação...?</h6>
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
                        <button @click.prevent="apagarGraduaction(deleteGraduacId)" type="button"
                            class="btn btn-sm btn-danger">
                            <span v-if="loading">
                                <i class="fa-regular fa-floppy-disk"></i> Apagando o graduacao...
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
                    <h5 id="offcanvasRightLabel text-center">DETALHES DA GRADUAÇÃO</h5>
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
                            <h4><span class="text-danger">{{ info.grade }}</span></h4>
                        </div>
                    </div>

                    <div class="form-group col-12 mt-4">
                        <div class="card mt-2" v-for="curso in info.cursos" :key="curso.id">
                            
                            <div class="card-body">
                                <p class="text-success">Curso associado</p>
                                <p class="text-secondary mt-0 fw-bold topoMargin">{{ curso.cursos }}</p>
                                <p class="mt-0 fw-bold topoMargin">Valor do curso: <span class="text-success">{{ vueNumberFormat(curso.cobranca, {isInteger:true}) }} </span></p>

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
    name: "graduacao-component",
    emits: ['cleanForm', 'buscaCursosID'],
    data() {
        return {
            items: {
                grade: '',
                curso_id: ''
            },
            erros: [],
            deleteGraduacId: '',
            filter: '',
            info: [],
            fomatoData: '',
            namePage: 'Graduação / Classe',
            nameButto: 'Nova graduação',
            pageTopoIcon: 'fa-solid fa-graduation-cap',
            loading: false
        }
    },
    created() {
        this.loadingGraduaction()
        this.loadingCourses()
    },

    computed: {

        graduacoes() {
            return this.$store.state.graduacao.items.filter(graduacao => graduacao.grade.includes(this.filter))
        },

        getCoursesID() {
            return this.$store.state.curso.items
        },
        params() {
            return {
                page: this.graduacoes.current_page
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
        buscaCursosID() {
            console.log('testou positivo')
        },
        detalhes(id) {
            this.info = []
            this.$store.dispatch('detalhesGraduaction', id)
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
            this.items = { graduacaos: '', cobranca: '' }
        },

        loadingGraduaction() {
            //var store = useStore()
            this.$store.dispatch('loadingGraduaction')
        },

        loadingCourses() {
            //var store = useStore()
            this.$store.dispatch('loadingCourse')
        },

        registerGraduacao() {
            console.log(this.items)
            this.$store.dispatch('createGraduaction', this.items)
                .then(() => {
                    notify({
                        title: 'Sucesso',
                        text: "O graduacao foi registado com sucesso",
                        type: 'success'
                    })
                    this.loadingGraduaction()
                    this.loadingCourses()
                    this.items = { grade: '', curso_id: '' }
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
        updategraduacaoForm(id) {
            this.$store.dispatch('updateFormGraduaction', id)
                .then((response) => this.items = response.data.getGraduaction)
                .catch((error) => {
                    notify({
                        title: 'Não encotrado',
                        text: 'A graduação que pretendes localizar não existe',
                        type: 'warn'
                    })
                })
        },

        updateGraduaction() {
            this.$store.dispatch('updateGraduaction', this.items)
                .then((response) => {
                    notify({
                        title: 'Sucesso',
                        text: response.data.message,
                        type: 'success'
                    })
                    this.loadingGraduaction()
                    this.items = { grade: '', curso_id: '' }
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

        deleteGraduaction(id) {
            this.deleteGraduacId = id;
        },

        apagarGraduaction(id) {
            this.$store.dispatch('apagarGraduaction', id)
                .then((response) => {
                    notify({
                        title: 'Sucesso',
                        text: response.data.message,
                        type: 'success'
                    })
                    this.loadingGraduaction()
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