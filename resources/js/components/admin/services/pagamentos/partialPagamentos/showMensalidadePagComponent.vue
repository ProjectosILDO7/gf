<template>
    <div class="card mt-4 mb-1 shadow" v-for="e in estudanteInfo" :key="e.id">
        <div class="card-body">
            <div class="row">
                <div class="form-grouo col-4">
                    <span class="text-secondary">Mensalidade paga: <strong>{{ e.data_pagamento }}</strong></span>
                </div>

                <div class="form-grouo col-4">
                    <span class="text-secondary">Valor pago: <strong class="text-success">{{
                        vueNumberFormat(e.valor_mensalidade, { isInteger: true }) }}</strong></span>
                </div>

                <div class="form-grouo col-4">
                    <span class="text-secondary"> 
                        <strong class="text-success">
                            <router-link to="#" title="Imprimir comprovativo">
                                <i class="fa fa-print fw-bold text-secondary"></i>
                            </router-link>
                        </strong>
                    </span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: 'mostrarMaisPagamentos',
    props: ['estudanteID'],
    data() {
        return {
            estudanteInfo:[],

        }
    },

    created() {
        this.showEstudante();
    },

    methods: {
        showEstudante() {
            return this.$store.dispatch('detalhesEstudante', this.estudanteID)
                .then((response) => {
                    this.estudanteInfo = response.data.mensalidades
                    console.log(response.data.mensalidades)
                })
                .catch((erro) => { console.log(erro) })
        }
    }
}
</script>