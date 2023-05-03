<template>
  <div class="container mt-4">
    <topo-page-component :namePage="namePage" :pageTopoIcon="pageTopoIcon" />

    <br />
    <!-- Exibicao do estudante para o pagamento -->
    <div class="row">
      <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">

        <div class="form-group text-start">
          <span v-show="info.image">
            <router-link :to="`${url}${info.image}`" target="_blank">
              <img :src="`${url}${info.image}`" alt="image" class="rounded-start border border-2 cursor mb-0"
                style="width: 60px !important; height: 60px !important" />
            </router-link>
          </span>
          <span v-show="!info.image"><img :src="url_no_image" alt="Sem_imagem"
              class="rounded-start border border-2 cursor mb-0"
              style="width: 60px !important; height: 60px !important" /></span>
        </div>

      </div>

      <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 border-start">
        <span class="text-secondary">
          Nome: <h6 class="text-primary">{{ info.nome }}</h6>
        </span>

      </div>

      <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 border-start">
        <span class="text-secondary">
          Curso: <h6 class="text-primary">{{ cursoInfo }}</h6>
        </span>

      </div>

      <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 border-start">
        <span class="text-secondary">
          Documento: <h6 class="text-primary fw-bold">{{ info.numBI }}</h6>
        </span>

      </div>

      <li>
        <hr class="dropdown-divider">
      </li>

    </div>

    <div class="card text-center">
      <nav>
        <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
          <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button"
            role="tab" aria-controls="nav-home" aria-selected="true"><i class="fa fa-graduation-cap"></i>
            Mensalidade</button>
          <button class="nav-link" id="nav-comparticipacao-tab" data-bs-toggle="tab" data-bs-target="#nav-comparticipacao"
            type="button" role="tab" aria-controls="nav-profile" aria-selected="false"><i
              class="fa-solid fa-circle-dollar-to-slot"></i>
            Comparticipação</button>
          <button class="nav-link" id="nav-emolumento-tab" data-bs-toggle="tab" data-bs-target="#nav-emolumento"
            type="button" role="tab" aria-controls="nav-profile" aria-selected="false"><i
              class="fa-solid fa-id-card-clip"></i>
            Emolumento</button>
          <button class="nav-link" id="nav-uniforme-tab" data-bs-toggle="tab" data-bs-target="#nav-uniforme" type="button"
            role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fa-solid fa-user-tie"></i>
            Uniforme</button>
          <button class="nav-link" id="nav-trasporte-tab" data-bs-toggle="tab" data-bs-target="#nav-trasporte"
            type="button" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fa-solid fa-bus"></i>
            Transporte</button>
          <button class="nav-link" id="nav-multa-tab" data-bs-toggle="tab" data-bs-target="#nav-multa" type="button"
            role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fa-solid fa-hand-holding-medical"></i>
            Multas</button>
          <button class="nav-link" id="nav-provaEmAtraso-tab" data-bs-toggle="tab" data-bs-target="#nav-provaEmAtraso"
            type="button" role="tab" aria-controls="nav-contact" aria-selected="false"><i
              class="fa-solid fa-spell-check"></i> Provas em
            atraso</button>
          <button class="nav-link" id="nav-tcc-tab" data-bs-toggle="tab" data-bs-target="#nav-tcc" type="button"
            role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fa-solid fa-user-graduate"></i>
            T.C.C</button>
        </div>
      </nav>
      <div class="tab-content p-3 border" id="nav-tabContent">
        <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
          <div class="row">
            <div class="form-group col-6 text-start">
              <p><strong class="text-success fw-bold">
                  <i class="fa-solid fa-comments-dollar"></i>
                  Pagamento de propina</strong></p>
            </div>
            <div class="form-group col-6 text-end">
              <p class="">
                <button class="btn btn-sm btn-outline-secondary" @click="mostrar(info.id)">
                  <i class="fa-solid fa-eye"></i>
                </button>
              </p>
            </div>
            <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3 text-start">
              <label for="curso" class="text-start">Curso:</label>
              <input type="text" class="form-control form-control-sm fw-bold" v-model="cursoInfo" disabled>
            </div>

            <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3 text-start">
              <label for="data">Período do pagamento:</label>
              <Datepicker v-model="items.picked" class="form-control form-control-sm fw-bold" :inputFormat="inputFormat"
                :locale="locale" />
            </div>
            <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3 text-start">
              <label for="curso" class="text-start">Cobrança:</label>
              <VueNumberFormat class="form-control form-control-sm text-success fw-bold" disabled
                v-model:value="items.cobrancaInfo"
                :options="{ precision: 2, prefix: '', suffix: ' ', isInteger: true, acceptNegative: false, masked: false }">
              </VueNumberFormat>
            </div>

            <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3 text-start gab-2 grid">
              <label for="curso" class="text-start">Efectuar pagamento:</label>
              <button class="btn btn-sm btn-outline-primary" @click="mensalidade(info.id)">
                <i class="fa-solid fa-circle-dollar-to-slot"></i> Pagar
              </button>
            </div>
          </div>

          <!-- Mostrar mais pagamentos -->
          <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12" v-show="mostrarPagamentos">

            <div class="row mt-4 mb-0">
                <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-start">
                    <router-link class="btn btn-sm btn-outline-secondary" to="#">
                        <i class="fa fa-file-word"></i> Exportar mensalidades
                    </router-link>
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <input type="text" placeholder="Procurar mensalidade" class="form-control form-control-sm" v-model="filter"/>
                </div>
            </div>

            <div class="card mt-4 mb-0 shadow" v-for="e in estudanteInfo" :key="e.id">
              <div class="card-body">
                <div class="row text-start">
                  <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <span class="text-secondary">Mensalidade paga: <p><strong>{{ e.data_pagamento }}</strong></p></span>
                  </div>

                  <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <span class="text-secondary">Valor pago: <p><strong class="text-success">{{
                      vueNumberFormat(e.valor_mensalidade, { isInteger: true }) }}</strong></p></span>
                  </div>

                  <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center">
                    <span class="text-secondary">
                      Exportar:
                      <p>
                      <strong class="text-success">
                        <a class="btn btn-sm btn-outline-secondary" :href="`${urlExport}${e.id}`" title="Imprimir comprovativo">
                          <i class="fa fa-file-word"></i>
                        </a>
                      </strong></p>
                    </span>
                  </div>
                </div>
              </div>
            </div>


          </div>

        </div>
        <div class="tab-pane fade" id="nav-comparticipacao" role="tabpanel" aria-labelledby="nav-profile-tab">
          <p><strong>comparticipacao.</strong></p>
        </div>
        <div class="tab-pane fade" id="nav-emolumento" role="tabpanel" aria-labelledby="nav-profile-tab">
          <p><strong>Emolumento.</strong></p>
        </div>
        <div class="tab-pane fade" id="nav-uniforme" role="tabpanel" aria-labelledby="nav-contact-tab">
          <p><strong>Uniforme.</strong></p>
        </div>
        <div class="tab-pane fade" id="nav-trasporte" role="tabpanel" aria-labelledby="nav-contact-tab">
          <p><strong>Transporte.</strong></p>
        </div>
        <div class="tab-pane fade" id="nav-multa" role="tabpanel" aria-labelledby="nav-contact-tab">
          <p><strong>Multa.</strong></p>
        </div>
        <div class="tab-pane fade" id="nav-provaEmAtraso" role="tabpanel" aria-labelledby="nav-contact-tab">
          <p><strong>Provas em atraso.</strong></p>
        </div>
        <div class="tab-pane fade" id="nav-tcc" role="tabpanel" aria-labelledby="nav-contact-tab">
          <p><strong>TCC.</strong></p>
        </div>
      </div>
    </div>

  </div>
</template>
  
<script>
import { notify } from "@kyvg/vue3-notification";
import dateFormat from "@vue-formily/date-format";
import topoPageComponent from "../partials/topoPageComponent.vue";
import tabsComponent from "../estudantes/tabsComponent.vue";
import Datepicker from "vue3-datepicker"
import { pt, eo, ru } from 'date-fns/locale'
import showMensalidade from './partialPagamentos/showMensalidadePagComponent.vue'
import { URL_API } from '../../../../configs/index.js'

export default {
  name: "pagamentos-component",
  emits: ["cleanForm", "buscaAlunoID"],
  props: {
    id: {
      require: true
    }
  },
  data() {
    return {
      url: window.url + "storage/image/estudantes/",
      url_no_image: window.url + "image/no-Image.jpg",
      urlExport: URL_API + '/ExportToWordComprovativo/',

      editImage: false,
      items: {
        estudante_id: '',
        cobrancaInfo: '',
        picked: new Date(),
      },
      erros: [],
      deleteEstudanteId: "",
      filter: "",
      info: [],
      locale: pt,
      estudanteID: '',
      estudanteInfo: [],


      gradeInfo: "",
      emailInfo: "",
      cursoInfo: "",
      adminInfo: "",
      senhaReservaInfo: "",
      inputFormat: "dd-MM-yyyy",

      fomatoData: "",
      namePage: "Efectuar pagamentos",
      pageTopoIcon: "fa-solid fa-cash-register",
      loading: false,
      btnSaveVariavel: false,
      mostrarPagamentos: false,
    };
  },

  created() {
    this.$store.dispatch('getEstudantePagamento', this.id)
      .then((response) => {
        this.info = response.data
        this.cursoInfo = this.info.cursos.cursos
        this.items.cobrancaInfo = this.info.cursos.cobranca
      })
      .catch((erro) => console.log(erro))



  },

  computed: {},

  methods: {
    //pagamento Mensalidade
    mensalidade(idAluno) {

      this.items.estudante_id = idAluno,
        this.$store.dispatch('pagMensalidade', this.items)
          .then((response) => {
            this.$swal.fire({
              title: 'Sucesso',
              text: response,
              icon: 'success',
              timer: 15000
            })
          })
          .catch((erro) => {
            console.log(erro)
            this.$swal.fire({
              title: 'Erro de pagamento',
              text: erro,
              icon: 'warning',
              timer: 15000
            })
          });
    },


    mostrar(id) {
      this.mostrarPagamentos = true
      console.log(this.mostrarPagamentos)
      this.estudanteID = id
      this.showEstudante()
    },

    showEstudante() {
      return this.$store.dispatch('detalhesEstudante', this.estudanteID)
        .then((response) => {
          this.estudanteInfo = response.data.mensalidades
          console.log(response.data.mensalidades)
        })
        .catch((erro) => { console.log(erro) })
    }


  },

  components: {
    topoPageComponent,
    Datepicker,

  },
};
</script>
  
<style scoped>
.topoMargin {
  margin-top: -5% !important;
}

img {
  width: 150px;
  height: 150px;
  object-fit: fill;
}

.cursor {
  cursor: pointer !important;
}

.invisivel {
  visibility: hidden;
}

.tamanhoUserImage {
  width: 60px !important;
  height: 60px !important;
}

li {
  list-style-type: none;
}
</style>
  