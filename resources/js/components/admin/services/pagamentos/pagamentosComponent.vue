<template>
  <div class="container mt-4">
    <topo-page-component :namePage="namePage" :pageTopoIcon="pageTopoIcon" @buscar-curso-id="buscaEstudanteID" />

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
          <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button"
            role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fa-solid fa-circle-dollar-to-slot"></i>
            Comparticipação</button>
          <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button"
            role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fa-solid fa-id-card-clip"></i>
            Emolumento</button>
          <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button"
            role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fa-solid fa-user-tie"></i>
            Uniforme</button>
          <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button"
            role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fa-solid fa-bus"></i>
            Transporte</button>
          <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button"
            role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fa-solid fa-hand-holding-medical"></i>
            Multas</button>
          <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button"
            role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fa-solid fa-spell-check"></i> Provas em
            atraso</button>
          <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button"
            role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fa-solid fa-user-graduate"></i>
            T.C.C</button>
        </div>
      </nav>
      <div class="tab-content p-3 border" id="nav-tabContent">
        <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
          <div class="row">
            <div class="form-group col-12 text-start">
              <p><strong class="text-success fw-bold">
                  <i class="fa-solid fa-comments-dollar"></i>
                  Pagamento de propina</strong></p>
            </div>
            <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3 text-start">
              <label for="curso" class="text-start">Curso:</label>
              <input type="text" class="form-control form-control-sm fw-bold" v-model="cursoInfo" disabled>
            </div>

            <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3 text-start">
              <label for="data">Período do pagamento:</label>
              <Datepicker v-model="picked" class="form-control form-control-sm fw-bold" :inputFormat="inputFormat"
                :locale="locale" />
            </div>
            <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3 text-start">
              <label for="curso" class="text-start">Cobrança:</label>
              <VueNumberFormat class="form-control form-control-sm text-success fw-bold" disabled
                v-model:value="cobrancaInfo"
                :options="{ precision: 2, prefix: '', suffix: ' ', isInteger: true, acceptNegative: false, masked: false }">
              </VueNumberFormat>
            </div>

            <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3 text-start gab-2 grid">
              <label for="curso" class="text-start">Efectuar pagamento:</label>
              <button class="btn btn-sm btn-outline-primary">
                <i class="fa-solid fa-circle-dollar-to-slot"></i> Pagar
              </button>
            </div>
          </div>

        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
          <p><strong>This is some placeholder content the Profile tab's associated content.</strong>
            Clicking another tab will toggle the visibility of this one for the next.
            The tab JavaScript swaps classes to control the content visibility and styling. You can use it with
            tabs, pills, and any other <code>.nav</code>-powered navigation.</p>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
          <p><strong>This is some placeholder content the Profile tab's associated content.</strong>
            Clicking another tab will toggle the visibility of this one for the next.
            The tab JavaScript swaps classes to control the content visibility and styling. You can use it with
            tabs, pills, and any other <code>.nav</code>-powered navigation.</p>
        </div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
          <p><strong>This is some placeholder content the Contact tab's associated content.</strong>
            Clicking another tab will toggle the visibility of this one for the next.
            The tab JavaScript swaps classes to control the content visibility and styling. You can use it with
            tabs, pills, and any other <code>.nav</code>-powered navigation.</p>
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
      picked: new Date(),
      url: window.url + "storage/image/estudantes/",
      url_no_image: window.url + "image/no-Image.jpg",

      editImage: false,
      items: {},
      erros: [],
      deleteEstudanteId: "",
      filter: "",
      info: [],
      locale: pt,


      gradeInfo: "",
      emailInfo: "",
      cursoInfo: "",
      cobrancaInfo: "",
      adminInfo: "",
      senhaReservaInfo: "",
      inputFormat: "dd-MM-yyyy",

      fomatoData: "",
      namePage: "Efectuar pagamentos",
      pageTopoIcon: "fa-solid fa-cash-register",
      loading: false,
      btnSaveVariavel: false,
    };
  },

  created() {
    this.$store.dispatch('getEstudantePagamento', this.id)
      .then((response) => {
        this.info = response.data
        this.cursoInfo = this.info.cursos.cursos
        this.cobrancaInfo = this.info.cursos.cobranca
      })
      .catch((erro) => console.log(erro))



  },

  computed: {},

  methods: {
    //const  = require('date-fns-tz')
  },

  components: {
    topoPageComponent,
    Datepicker
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
}</style>
  