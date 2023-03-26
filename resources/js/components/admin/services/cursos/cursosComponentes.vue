<template>
    <div class="container mt-4">

        <topo-page-component :namePage="namePage" :nameButton="nameButto" :pageTopoIcon="pageTopoIcon" @buscar-curso-id="cleanForm"/>

        <br>

        <form class="d-flex" role="search">
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-magnifying-glass"></i></span>
                <input class="form-control form-control-sm me-2" v-model="filter" type="search" placeholder="Pesquisar"
                    aria-label="Search">
            </div>
        </form>

        <div class="card mt-2 shadow" v-for="curso in courses" :key="curso.id">
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
                                            @click="updateCursoForm(curso.id)"><i
                                                class="fa-regular fa-pen-to-square text-success"></i> Alterar</a></li>
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                            data-bs-target="#modalDeleteConfirm" @click="deleteCourse(curso.id)"><i
                                                class="fa-solid fa-trash text-danger"></i> Apagar</a></li>
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="offcanvas"
                                            data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"
                                            @click="detalhes(curso.id)">
                                            <i class="fa-solid fa-eye"></i> Vêr Detalhes
                                        </a></li>
                                </ul>
                            </div>
                        </span>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <label class="text-success">Curso</label>
                        <p class="text-secondary h6"><i class="fa-solid fa-graduation-cap text-success"></i> {{ curso.cursos
                        }}
                        </p>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <label class="text-success">Cobrança</label>
                        <p class="text-secondary h6"><i class="fa-solid fa-circle-dollar-to-slot"></i> {{
                            vueNumberFormat(curso.cobranca, { isInteger: true }) }}
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
            <ul class="pagination pagination-sm" v-if="courses.last_page > 1">
                <li class="page-item" v-if="courses.current_page != 1">
                    <a class="page-link" href="#" @click.prevent="loadingCourse(courses.current_page - 1)">{{ '<<' }}</a>
                </li>

                <li :class="['page-item', { 'active': courses.current_page == page }]" aria-current="page"
                    v-for="page in courses.last_page" :key="page.id">
                    <a class="page-link" href="#" @click.prevent="loadingCourse(page)">{{ page }}</a>
                </li>

                <li class="page-item" v-if="courses.current_page < courses.last_page">
                    <a class="page-link" href="#" @click.prevent="loadingCourse(courses.current_page + 1)">{{ '>>'
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
                            novo curso</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <form action="">

                                <div class="form-group col-12 mb-2">
                                    <span class="text-danger small col-12" v-if="erros.cursos">{{ erros.cursos[0] }}</span>
                                    <label for="" class="text-secodary col-12">Nome do curso</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Informe novo curso"
                                        v-model="items.cursos">
                                </div>

                                <div class="form-group col-12 mb-2">
                                    <span class="text-danger small col-12" v-if="erros.cobranca">{{ erros.cobranca[0]
                                    }}</span>
                                    <label for="" class="text-secodary col-12">(Opcional) valor da cobrança</label>
                                    <!-- <input type="text" class="form-control form-control-sm" placeholder="Cobrança"
                                        v-model="items.cobranca"> -->
                                    <VueNumberFormat class="form-control form-control-sm" v-model:value="items.cobranca"
                                        :options="{ precision: 2, prefix: '', suffix: ' ', isInteger: true, acceptNegative: false, masked: false }">
                                    </VueNumberFormat>
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
                        <button @click.prevent="registerCurso" type="button" class="btn btn-sm btn-success">
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
                            curso</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <form action="">

                                <div class="form-group col-12 mb-2">
                                    <span class="text-danger small col-12" v-if="erros.cursos">{{ erros.cursos[0] }}</span>
                                    <label for="" class="text-secodary col-12">Nome do curso</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Informe novo curso"
                                        v-model="items.cursos">
                                </div>

                                <div class="form-group col-12 mb-2">
                                    <span class="text-danger small col-12" v-if="erros.cobranca">{{ erros.cobranca[0]
                                    }}</span>
                                    <label for="" class="text-secodary col-12">(Opcional) valor da cobrança</label>
                                    <!-- <input type="text" class="form-control form-control-sm" placeholder="Cobrança"
                                        v-model="items.cobranca"> -->
                                    <VueNumberFormat class="form-control form-control-sm" v-model:value="items.cobranca"
                                        :options="{ precision: 2, prefix: '', suffix: ' ', isInteger: true, acceptNegative: false, masked: false }">
                                    </VueNumberFormat>
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
                        <button @click.prevent="updateCurso(items.id)" type="button" class="btn btn-sm btn-success">
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
                            Apagar o
                            curso</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-12 text-center">
                                <span class="text-primary">
                                    <h6>Tens a certeza que desejas apagar este curso...?</h6>
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
                        <button @click.prevent="apagarCurso(deleteCourseId)" type="button" class="btn btn-sm btn-danger">
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
                    <h5 id="offcanvasRightLabel text-center">DETALHES DO CURSO</h5>
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
                            <h4><span class="text-danger">{{ info.cursos }}</span></h4>
                        </div>
                    </div>

                    <div class="form-group col-12 mt-4">
                        <div class="card">
                            <div class="card-body">
                                <h5>Cobrança: <span class="text-secondary text-success">{{ vueNumberFormat(info.cobranca,
                                    { isInteger: true }) }}</span></h5>
                            </div>
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

    </div>
</template>

<script>
import { notify } from '@kyvg/vue3-notification'
import dateFormat from '@vue-formily/date-format';
import topoPageComponent from '../partials/topoPageComponent.vue'

export default {
    name: "Curso-component",

    data() {
        return {
            items: { cursos: '', cobranca: '' },
            erros: [],
            deleteCourseId: '',
            filter: '',
            info: [],
            fomatoData: '',
            namePage:'Curso',
            nameButto:'Novo curso',
            pageTopoIcon:'fa-solid fa-graduation-cap',
            loading:false
        }
    },
    created() {
        this.loadingCourse(1)
    },

    computed: {

        courses() {
            return this.$store.state.curso.items.filter(curso => curso.cursos.includes(this.filter))
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

        detalhes(id) {
            this.info = []
            this.$store.dispatch('detalhes', id)
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
            this.items = { cursos: '', cobranca: '' },
            this.erros=[]
        },

        loadingCourse() {
            //var store = useStore()
            this.$store.dispatch('loadingCourse')
        },

        registerCurso() {

            this.$store.dispatch('createCourse', this.items)
                .then(() => {
                    notify({
                        title: 'Sucesso',
                        text: "O Curso foi registado com sucesso",
                        type: 'success'
                    })
                    this.loadingCourse()
                    this.cleanForm()
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
        updateCursoForm(id) {
            this.cleanForm()
            this.$store.dispatch('updateFormCourse', id)
                .then((response) => this.items = response.data.getCourse)
                .catch((error) => {
                    notify({
                        title: 'Não encotrado',
                        text: 'O curso que pretendes localizar não existe',
                        type: 'warn'
                    })
                })
        },

        updateCurso() {
            this.$store.dispatch('updateCurso', this.items)
                .then(() => {
                    notify({
                        title: 'Sucesso',
                        text: 'O curso foi actualizado com sucesso..!',
                        type: 'success'
                    })
                    this.loadingCourse()
                    this.cleanForm()
                })
                .catch((error) => {
                    notify({
                        title: 'Erro',
                        text: 'Não foi possível actualizar este curso',
                        type: 'warn'
                    })
                    this.erros=error.response.data.errors
                })
        },

        deleteCourse(id) {
            this.deleteCourseId = id;
        },

        apagarCurso(id) {
            this.$store.dispatch('apagarCurso', id)
                .then((response) => {
                    notify({
                        title: 'Sucesso',
                        text: response.data.message,
                        type: 'success'
                    })
                    this.loadingCourse()
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