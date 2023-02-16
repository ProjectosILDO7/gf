<template>
    <div class="container mt-4">
        <h3 class="text-secondary">Painel de controle</h3>
        <div class="row">
            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Utilizadores</div>
                    <div class="card-body">
                        <div class="row mb-0">
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6 text-center">
                                <p class="card-text text-center"><i class="fa-solid fa-users fa-lg"></i></p>
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6 border-start m-auto">
                                <p class="card-text text-center"><strong>50.000</strong></p>
                            </div>

                            <div class="form-group col-12 text-end text-light mt-2">
                                <router-link to="#" class="text-light">Detalhes</router-link>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Pagamentos</div>
                    <div class="card-body">
                        <div class="row mb-0">
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6 text-center">
                                <p class="card-text text-center"><i class="fa-solid fa-circle-dollar-to-slot fa-lg"></i></p>
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6 border-start m-auto">
                                <p class="card-text text-center"><strong>2.500</strong></p>
                            </div>

                            <div class="form-group col-12 text-end text-light mt-2">
                                <router-link to="#" class="text-light">Detalhes</router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="card text-white bg-info mb-3 ml-2">
                    <div class="card-header">Notificações</div>
                    <div class="card-body">
                        <div class="row mb-0">
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6 text-center">
                                <p class="card-text text-center"><i class="fa-solid fa-comments-dollar fa-lg"></i></p>
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6 border-start m-auto">
                                <p class="card-text text-center"><strong>2.500</strong></p>
                            </div>

                            <div class="form-group col-12 text-end text-light mt-2">
                                <router-link to="#" class="text-light">Detalhes</router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts (Gráficos) -->
            <report/>

        </div>

    </div>
</template>

<script>
    import Report from './reports/reportsComponents.vue'
    export default{
        components:{
            Report
        }

    }
</script>