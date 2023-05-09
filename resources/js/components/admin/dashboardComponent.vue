<template>
    <div class="container mt-4">
        <h3 class="text-secondary">Painel de controle</h3>
        <div class="row">
            <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                <div class="card text-white bg-light mb-3 shadow">
                    <div class="card-body">
                        <div class="row mb-0">
                            <div class="col-12 text-muted text-center mb-2">
                                Funcionários
                            </div>
                            <div class="form-group col-4 m-auto">
                                <span>
                                    <router-link to="#" class="btn btn-primary btn-rounded shadow">
                                        <i class="fa-solid fa-user-tie"></i>
                                    </router-link>
                                </span>
                            </div>
                            <div class="form-group col-4 m-auto text-secondary">
                                <span class="fw-bold h6">
                                    17.0000
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                <div class="card text-white bg-light mb-3 shadow">
                    <div class="card-body">
                        <div class="row mb-0">
                            <div class="col-12 text-muted text-center mb-2">
                                Departamentos
                            </div>
                            <div class="form-group col-4 m-auto">
                                <span>
                                    <router-link to="#" class="btn btn-warning btn-rounded shadow">
                                        <i class="fa-solid fa-address-book"></i>
                                    </router-link>
                                </span>
                            </div>
                            <div class="form-group col-4 m-auto text-secondary">
                                <span class="fw-bold h6">
                                    17.0000
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                <div class="card text-white bg-light mb-3 shadow">
                    <div class="card-body">
                        <div class="row mb-0">
                            <div class="col-12 text-muted text-center mb-2">
                                Estudantes
                            </div>
                            <div class="form-group col-4 m-auto">
                                <span>
                                    <router-link to="#" class="btn btn-success btn-rounded shadow">
                                        <i class="fa-solid fa-user-graduate"></i>
                                    </router-link>
                                </span>
                            </div>
                            <div class="form-group col-4 m-auto text-secondary">
                                <span class="fw-bold h6">
                                    17.0000
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                <div class="card text-white bg-light mb-3 shadow">
                    <div class="card-body">
                        <div class="row mb-0">
                            <div class="col-12 text-muted text-center mb-2">
                                Cursos
                            </div>
                            <div class="form-group col-4 m-auto">
                                <span>
                                    <router-link to="#" class="btn btn-info btn-rounded shadow">
                                        <i class="fa-solid fa-graduation-cap"></i>
                                    </router-link>
                                </span>
                            </div>
                            <div class="form-group col-4 m-auto text-secondary">
                                <span class="fw-bold h6">
                                    17.0000
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts (Gráficos) -->
            <graficos />

        </div>

    </div>
</template>

<script>
import Graficos from './reports/reportsComponents.vue'
export default {
    components: {
        Graficos
    }

}
</script>

<style scoped>
.btn-rounded {
    font-size: 200%;
    border-radius: 30%;
}
</style>

