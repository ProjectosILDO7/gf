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
                                type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" to="#"><i
                                    class="fa-solid fa-square-plus"></i> Novo curso</router-link>
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
                                    <tr v-for="curso in cursos.data" :key="curso.id">
                                        <td>{{ curso.id }}</td>
                                        <td>{{ curso.cursos }}</td>
                                        <td>{{ curso.cobranca }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-success mr-2">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger mr-2">
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
                                    <label for="" class="text-secodary">Nome do curso</label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Informe novo curso">
                                </div>

                                <div class="form-group col-12 mb-2">
                                    <label for="" class="text-secodary">(Opcional) valor da cobrança</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Cobrança">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal"><i
                                class="fa-solid fa-circle-xmark"></i> Fechar</button>
                        <button type="button" class="btn btn-sm btn-success"><i class="fa-regular fa-floppy-disk"></i>
                            Cadastrar</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>

import { computed, onMounted, ref } from 'vue'
import { useStore } from 'vuex'
import { notify } from '@kyvg/vue3-notification'

export default {
    name: "Curso-component",
    setup() {
        const store = useStore()
        const cursos = computed(() => store.state.curso.cursos.cursos)

        onMounted(() => store.dispatch('getCourses'))

        return {
            cursos,
            store
        }
    }
}
</script>