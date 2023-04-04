<template>
    <div class="container mt-4">

        <topo-page-component :namePage="namePage" :nameButton="nameButto" :pageTopoIcon="pageTopoIcon"
            @buscar-curso-id="novaDisciplina" />

        <br>

        <div class="row">
            <div class="form-group col-6 text-start mb-2">
                <span class="text-secondary">Total de disciplinas:</span> <span class="fw-bold">( {{ totalDeDisciplinas }}
                    )</span>
            </div>

            <div class="form-group col-6 text-end mb-2" v-if="totalDeDisciplinas != 0">

                <button @click="disciplinas_em_cursos" class="btn btn-sm btn-outline-info" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasLeft" aria-controls="offcanvasLeft">
                    <i class="fa-regular fa-eye"></i> Vêr disciplinas nos cursos
                </button>
                <!-- Export Excel file -->
                <!-- <download-excel class="" :data="disciplinas" :fields="fields"
                    :json_meta="json_meta" type="xls" worksheet="Disciplinas" name="Lista de disciplinas.xls">
                    <i class="fa-solid fa-file-excel"></i> Exportar para Excel (Disciplinas)
                </download-excel> -->
                <a class="btn btn-sm btn-outline-success ml-2" :href="urlExport">
                    <i class="fa-solid fa-file-excel fa-lg"></i> Exportar disciplinas e cursos
                </a>
            </div>
        </div>


        <form class="d-flex" role="search" v-if="totalDeDisciplinas >= 6">
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-magnifying-glass"></i></span>
                <input class="form-control form-control-sm" v-model="filter" type="search" placeholder="Pesquisar"
                    aria-label="Search">
            </div>
        </form>

        <div class="row" v-if="disciplinas == ''">
            <div class="form-group col-12 text-danger text-center fw-bold">
                De momento não tens nenhum disciplina cadastrada...
            </div>
        </div>

        <div class="card mt-2 shadow" v-for="disciplina in disciplinas" :key="disciplina.id">
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
                                            data-bs-target="#staticBackdrop" @click="updateDisciplinaForm(disciplina.id)"><i
                                                class="fa-regular fa-pen-to-square text-success"></i> Alterar</a></li>
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                            data-bs-target="#modalDeleteConfirm" @click="deleteDisciplina(disciplina.id)"><i
                                                class="fa-solid fa-trash text-danger"></i> Apagar</a></li>
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="offcanvas"
                                            data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"
                                            @click="detalhes(disciplina.id)">
                                            <i class="fa-solid fa-eye"></i> Vêr Detalhes
                                        </a></li>
                                </ul>
                            </div>
                        </span>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <label class="text-success">Disciplina</label>
                        <p class="text-secondary h6"><i class="fa-solid fa-book-open-reader"></i> {{
                            disciplina.cadeira
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
            <ul class="pagination pagination-sm" v-if="disciplinas.last_page > 1">
                <li class="page-item" v-if="disciplinas.current_page != 1">
                    <a class="page-link" href="#" @click.prevent="loadingDisciplina(disciplinas.current_page - 1)">{{ '<<'
                    }}</a>
                </li>

                <li :class="['page-item', { 'active': disciplinas.current_page == page }]" aria-current="page"
                    v-for="page in disciplinas.last_page" :key="page.id">
                    <a class="page-link" href="#" @click.prevent="loadingDisciplina(page)">{{ page }}</a>
                </li>

                <li class="page-item" v-if="disciplinas.current_page < disciplinas.last_page">
                    <a class="page-link" href="#" @click.prevent="loadingDisciplina(disciplinas.current_page + 1)">{{ '>>'
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
                                <i class="fa-solid fa-graduation-cap"></i> Cadastre nova disciplina
                            </span>
                            <span class="" v-else>
                                <i class="fa-solid fa-graduation-cap"></i> Alter informações da disciplina
                            </span>

                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <form action="">

                                <div class="form-group col-12 mb-2">
                                    <span class="text-danger small col-12" v-if="erros.cadeira">{{ erros.cadeira[0]
                                    }}</span>
                                    <label for="" class="text-secodary col-12">Nome da disciplina</label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Informe a disciplina" v-model="items.cadeira">
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
                        <button @click.prevent="registerDisciplina" type="button" class="btn btn-sm btn-success">
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
                        <button @click.prevent="updateDisciplina" type="button" class="btn btn-sm btn-success">
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
                            Apagar a disciplina</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-12 text-center">
                                <span class="text-primary">
                                    <h6>Tens a certeza que desejas apagar esta disciplina...?</h6>
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
                        <button @click.prevent="apagarDisciplina(deleteDisciplinaId)" type="button"
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

        <!-- Înfo Canvas - informações a direita -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">

                <div class="form-group col-9 text-end text-info">
                    <h5 id="offcanvasRightLabel text-center">DETALHES DA DISCIPLINA</h5>
                </div>
                <div class="form-group col-3 text-end">
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>

            </div>
            <div class="offcanvas-body">
                <div class="row">
                    <div class="form-group col-12 text-center">
                        <h1><i class="fa-solid fa-book-open-reader fs-lg text-success"></i></h1>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="form-group col-12 text-center">
                        <div class="card shadow">
                            <h4><span class="text-danger">{{ info.cadeira }}</span></h4>
                        </div>
                    </div>

                    <div class="card mt-2" v-for="(curso, index) in info.cursos" :key="index">
                        <div class="card-body">
                            <p class="text-success">Curso associado:</p>
                            <p class="text-secondary mt-0 fw-bold topoMargin">
                                {{ curso.cursos }}
                            </p>
                            <p class="text-secondary mt-0 topoMargin">
                                Cobrança: <span class="text-success fw-bold">{{ vueNumberFormat(curso.cobranca,
                                    { isInteger: true }) }}</span>
                            </p>
                        </div>
                    </div>

                    <div class="form-group col-12 mt-4">
                        <div class="card">
                            <div class="card-body">
                                <p class="text-success">Data de registo:</p>
                                <p class="text-secondary topoMargin"><span> {{ formatoDeData }} </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>

            </div>
        </div>

        <!-- Înfo Canvas - informações a esquerda MAIS DETALHES Disciplinas nos cursos -->
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasLeft" aria-labelledby="offcanvasLeftLabel">
            <div class="offcanvas-header">

                <div class="form-group col-9 text-end text-secondary">
                    <h5 id="offcanvasRightLabel text-center">MAIS DETALHES</h5>
                </div>
                <div class="form-group col-3 text-end">
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>

            </div>
            <div class="offcanvas-body">
                <div class="row">
                    <div class="form-group col-12 text-center">
                        <h1><i class="fa-solid fa-book-open-reader fs-lg text-success"></i></h1>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="form-group col-12 text-center">
                        <div class="card shadow">
                            <h4><span class="text-info">DISCIPLINAS NOS CURSOS</span></h4>
                        </div>
                    </div>

                    <div class="card mt-2" v-for="(curso, index) in disciplinasEmCursos" :key="index">
                        <div class="card-body">
                            <p class="text-success">Curso:</p>
                            <p class="text-secondary mt-0 fw-bold topoMargin">
                                {{ curso.cursos }}
                            </p>

                            <span v-if="curso['graduacoes'] != ''">
                                <p class="text-info topoMargin" v-for="(classe, index) in curso['graduacoes']" :key="index">
                                    <i class="fa-regular fa-square-check text-danger"></i> {{ classe.grade }}
                                </p>
                            </span>

                            <p class="text-danger small topoMargin" v-else>
                                Não tens Classes registadas neste curso
                            </p>

                            <hr class="mt-1 mb-4" />

                            <span v-if="curso['disciplinas'] != ''">
                                <p class="topoMargin mt-2" v-for="(disciplina, index) in curso['disciplinas']" :key="index">
                                    <i class="fa-solid fa-circle-check"></i> {{ disciplina.cadeira }}
                                </p>
                            </span>
                            <p class="text-danger small topoMargin" v-else>
                                Não tens disciplinas registadas neste curso
                            </p>

                        </div>
                    </div>

                    <div class="form-group col-12 mt-4">
                        <div class="card">
                            <div class="card-body m-auto">

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
import topoPageComponent from '../partials/topoPageComponent.vue'
import { URL_API } from '../../../../configs/index.js'

export default {
    name: "Curso-component",

    data() {
        return {
            urlExport: URL_API + '/ExportToExcel',
            items: { cadeira: '', curso_id: [] },
            erros: [],
            deleteDisciplinaId: '',
            filter: '',
            info: [],
            fomatoData: '',
            namePage: 'Disciplinas',
            nameButto: 'Nova disciplina',
            pageTopoIcon: 'fa-solid fa-book-open-reader',
            loading: false,
            btnSaveVariavel: false,
            disciplinasEmCursos: [],

            json_meta: [
                [
                    {
                        key: "charset",
                        value: "utf-8",
                    },
                ],
            ],

            fields: {
                "Disciplinas": "cadeira",
            },
        }
    },
    created() {
        this.loadingDisciplinas()
        this.loadingCourses()
        this.disciplinas_em_cursos()
    },

    computed: {

        disciplinas() {
            return this.$store.getters.todasDisciplinas(this.filter)
        },

        cursos() {
            return this.$store.state.curso.items;
        },

        totalDeDisciplinas() {
            return this.$store.getters.todasDisciplinasCount
        },
        params() {
            return {
                page: this.courses.current_page
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

        disciplinas_em_cursos() {
            this.$store.dispatch('verDisciplinasEmCursosl')
                .then((response) => this.disciplinasEmCursos = response.data)
        },

        novaDisciplina() {
            this.btnSaveVariavel = true;
            this.cleanForm();
        },

        detalhes(id) {
            this.info = []
            this.$store.dispatch('detalhesDisciplina', id)
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
            this.items = { cadeira: '' },
                this.erros = []
        },

        loadingCourses() {
            //var store = useStore()
            this.$store.dispatch("loadingCourse");
        },

        loadingDisciplinas() {
            //var store = useStore()
            this.$store.dispatch('loadingDisciplinas')
        },

        registerDisciplina() {
            console.log(this.items)
            this.$store.dispatch('createDisciplina', this.items)
                .then(() => {
                    notify({
                        title: 'Sucesso',
                        text: "A Disciplina foi registada com sucesso",
                        type: 'success'
                    })
                    this.cleanForm()
                    this.loadingDisciplinas()

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
        updateDisciplinaForm(id) {
            this.btnSaveVariavel = false
            this.cleanForm()
            this.$store.dispatch('updateFormDisciplina', id)
                .then((response) => this.items = response.data.getDisciplina)
                .catch((error) => {
                    notify({
                        title: 'Não encotrada',
                        text: 'A Disciplina que pretendes localizar não existe',
                        type: 'warn'
                    })
                })
        },

        updateDisciplina() {
            this.$store.dispatch('updateDisciplina', this.items)
                .then(() => {
                    notify({
                        title: 'Sucesso',
                        text: 'A disciplina foi actualizada com sucesso..!',
                        type: 'success'
                    })
                    this.cleanForm()
                    this.loadingDisciplinas()

                })
                .catch((error) => {
                    notify({
                        title: 'Erro',
                        text: 'Não foi possível actualizar esta disciplina',
                        type: 'warn'
                    })
                    this.erros = error.response.data.errors
                })
        },

        deleteDisciplina(id) {
            this.deleteDisciplinaId = id;
        },

        apagarDisciplina(id) {
            this.$store.dispatch('apagarDisciplina', id)
                .then((response) => {
                    notify({
                        title: 'Sucesso',
                        text: response.data.message,
                        type: 'success'
                    })
                    this.loadingDisciplinas()
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