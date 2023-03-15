<template>
    <div class="container mt-4">
        <div class="card shadow animate__animated animate__bounce">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <h4 class="text-secondary"><i class="fa-solid fa-graduation-cap"></i> Cursos</h4>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6 d-flex justify-content-end">
                        <span class="text-secondary">
                            <router-link class="text-decoration-none text-success btn btn-sm btn-success text-light"
                                type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" to="#"
                                @click="cleanForm">
                                <i class="fa-solid fa-square-plus"></i> Novo curso</router-link>
                        </span>
                    </div>

                </div>
            </div>
        </div>
        <br>
        <div class="card mt-4 shadow">
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
                                    <tr v-for="curso in courses" :key="curso.id">
                                        <td>{{ curso.id }}</td>
                                        <td>{{ curso.cursos }}</td>
                                        <td>{{ vueNumberFormat(curso.cobranca, { isInteger: true }) }}</td>
                                        <td>
                                            <button @click="updateCursoForm(curso.id)"
                                                class="btn btn-sm btn-outline-success mr-2" type="button"
                                                data-bs-toggle="modal" data-bs-target="#modalEdit" to="#">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger mr-2" 
                                                data-bs-toggle="modal" data-bs-target="#modalDeleteConfirm"
                                                @click="deleteCourse(curso.id)">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
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
        <!-- End Modal -->

        <!-- Modal Edit -->
        <div class="modal fade" id="modalEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"><i class="fa-solid fa-pen-to-square"></i> Alterara
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
                        <h5 class="modal-title" id="staticBackdropLabel"><i class="fa-solid fa-trash text-danger"></i> Apagar o
                            curso</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-12 text-center">
                                <span class="text-primary"><h6>Tens a certeza que desejas apagar este curso...?</h6></span>
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

    </div>
</template>

<script>
import { notify } from '@kyvg/vue3-notification'

// import { computed, onMounted, ref } from 'vue'
// import { useStore } from 'vuex'
// import { notify } from '@kyvg/vue3-notification'

export default {
    name: "Curso-component",
    data() {
        return {
            items: { cursos: '', cobranca: '' },
            erros: [],
            deleteCourseId:'',
        }
    },
    created() {
        this.loadingCourse()
    },

    computed: {
        courses() {
            return this.$store.state.curso.items.cursos
        }
    },

    methods: {
        cleanForm() {
            this.items = { cursos: '', cobranca: '' }
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
                    this.items = { cursos: '', cobranca: '' }
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
        updateCursoForm(id) {
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
                    this.items = { cursos: '', cobranca: '' }
                    this.erros = []
                })
                .catch((error) => {
                    notify({
                        title: 'Erro',
                        text: 'Não foi possível actualizar este curso',
                        type: 'warn'
                    })
                })
        },

        deleteCourse(id){
            this.deleteCourseId=id;
        },

        apagarCurso(id){
            this.$store.dispatch('apagarCurso', id)
                        .then((response)=>{
                            notify({
                                title:'Sucesso',
                                text:response.data.message,
                                type:'success'
                            })
                            this.loadingCourse()
                        })
                        .catch((error)=>{
                            notify({
                                title:'Erro',
                                text:error.data.erro,
                                type:'warn'
                            })
                        })
        }
    }
}
</script>