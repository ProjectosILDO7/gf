<template>
  <div class="container mt-4">
    <topo-page-component
      :namePage="namePage"
      :nameButton="nameButto"
      :pageTopoIcon="pageTopoIcon"
      @buscar-curso-id="buscaEstudanteID"
    />

    <br />
    <!-- Área de impressão -->
    <div class="row">
      <div
        class="form-group col-6 text-start mb-2"
        v-if="todosAlunosCount != 0"
      >
        <!-- Export Excel file -->
        <download-excel
          class="btn btn-sm btn-outline-success"
          :data="estudantes"
          :fields="fields"
          :json_meta="json_meta"
          type="xls"
          worksheet="Meus estudantes"
          name="Lista de alunos.xls"
        >
          <i class="fa-solid fa-file-excel"></i> Exportar Excel
        </download-excel>
      </div>

      <div class="form-group col-6 text-end mb-2" v-if="todosAlunosCount != 0">
        <span class="rext-secondary">Total de estudantes:</span>
        <span class="rext-secondary fw-bold"> ( {{ todosAlunosCount }} )</span>
      </div>

      <div class="form-group col-12 text-end mb-2" v-else>
        <span class="rext-secondary">Total de estudantes:</span>
        <span class="rext-secondary fw-bold"> ( {{ todosAlunosCount }} )</span>
      </div>
    </div>
    <!-- Înput search -->
    <form class="d-flex" role="search" v-if="todosAlunosCount >= 10">
      <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping"
          ><i class="fa-solid fa-magnifying-glass"></i
        ></span>
        <input
          class="form-control form-control-sm me-2"
          v-model="filter"
          type="search"
          placeholder="Pesquisar"
          aria-label="Search"
        />
      </div>
    </form>
    <!-- End input search -->

    <div class="row" v-if="estudantes == ''">
      <div class="form-group col-12 text-danger text-center fw-bold">
        Nenhum registo econtrado...
      </div>
    </div>

    <div
      class="card mt-2 shadow"
      v-for="estudante in estudantes"
      :key="estudante.id"
    >
      <div class="card-body">
        <div class="row">
          <div
            class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3 d-flex justify-content-start"
          >
            <span class="text-secondary">
              <div class="dropdown">
                <button
                  class="btn btn-light"
                  type="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  <i class="fa-solid fa-ellipsis-vertical"></i>
                </button>
                <ul class="dropdown-menu">
                  <li>
                    <a
                      class="dropdown-item"
                      href="#"
                      data-bs-toggle="modal"
                      data-bs-target="#staticBackdrop"
                      @click="updateEstudanteForm(estudante.id)"
                      ><i class="fa-regular fa-pen-to-square text-success"></i>
                      Alterar</a
                    >
                  </li>
                  <li>
                    <a
                      class="dropdown-item"
                      href="#"
                      data-bs-toggle="modal"
                      data-bs-target="#modalDeleteConfirm"
                      @click="deleteEstudante(estudante.id)"
                      ><i class="fa-solid fa-trash text-danger"></i> Apagar</a
                    >
                  </li>
                  <li>
                    <a
                      class="dropdown-item"
                      href="#"
                      data-bs-toggle="offcanvas"
                      data-bs-target="#offcanvasRight"
                      aria-controls="offcanvasRight"
                      @click="detalhes(estudante.id)"
                    >
                      <i class="fa-solid fa-eye"></i> Vêr Detalhes
                    </a>
                  </li>
                  <li>
                    <a
                      class="dropdown-item"
                      href="#"
                      data-bs-toggle="offcanvas"
                      data-bs-target="#offcanvasRight"
                      aria-controls="offcanvasRight"
                      @click="efectuarPagamento(estudante.id)"
                    >
                      <i class="fa-solid fa-credit-card"></i>
                      Efectuar pagamentos
                    </a>
                  </li>
                </ul>
              </div>
            </span>
          </div>

          <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <p class="text-secondary h6">
              <span v-show="estudante.image">
                <router-link :to="`${url}${estudante.image}`" target="_blank">
                  <img
                    :src="`${url}${estudante.image}`"
                    alt="image"
                    class="rounded-circle rounded-3 tamanhoUserImage"
                  />
                </router-link>
                {{ estudante.nome }}</span
              >
              <span v-show="!estudante.image"
                ><img
                  :src="url_no_image"
                  alt="Sem_imagem"
                  class="rounded-circle rounded-3 tamanhoUserImage"
                />
                {{ estudante.nome }}</span
              >
            </p>
          </div>

          <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <label class="text-success">Curso inscrito</label>
            <p class="text-secondary h6">
              <i class="fa-solid fa-graduation-cap text-success"></i>
              {{ estudante.cursos.cursos }}
            </p>
          </div>

          <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <label class="text-success">Graduação inscrito</label>
            <p class="text-secondary h6">
              <i class="fa-solid fa-graduation-cap text-success"></i>
              {{ estudante.graduacoes.grade }}
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
    <br />
    <!-- paginate -->
    <nav aria-label="paginate mt-4">
      <ul class="pagination pagination-sm" v-if="estudantes.last_page > 1">
        <li class="page-item" v-if="estudantes.current_page != 1">
          <a
            class="page-link"
            href="#"
            @click.prevent="loadingEstudantes(estudantes.current_page - 1)"
            >{{ "<<" }}</a
          >
        </li>

        <li
          :class="['page-item', { active: estudantes.current_page == page }]"
          aria-current="page"
          v-for="page in estudantes.last_page"
          :key="page.id"
        >
          <a
            class="page-link"
            href="#"
            @click.prevent="loadingEstudantes(page)"
            >{{ page }}</a
          >
        </li>

        <li
          class="page-item"
          v-if="estudantes.current_page < estudantes.last_page"
        >
          <a
            class="page-link"
            href="#"
            @click.prevent="loadingEstudantes(estudantes.current_page + 1)"
            >{{ ">>" }}</a
          >
        </li>
      </ul>
    </nav>

    <!-- Modal cadastrar e editar-->
    <div
      class="modal fade"
      id="staticBackdrop"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">
              <i class="fa-solid fa-graduation-cap"></i>
              <span v-if="btnSaveVariavel">Cadastre novos estudantes</span>
              <span v-else>Alterar dados do estudante</span>
            </h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <form action="">
                <!-- Componente de upload de imagem -->
                <div class="form-group col-12 text-center">
                    <label for="file-upload" class="text-secondary col-12 cursor"
                        >(Opcional) Selecione uma foto</label
                      >
                  <span class="text-danger small col-12" v-if="erros.image">{{
                    erros.image[0]
                  }}</span>

                  <div class="file-upload-section mb-0" v-if="btnSaveVariavel">

                    <label id="preview" for="file-upload">
                      <img v-if="items.imgPreview" :src="items.imgPreview==null ? url_no_image:items.imgPreview" class="rounded-start border border-2 cursor mb-0"/>
                      <img v-else :src="url_no_image" class="rounded-start border border-2 cursor mb-0"/>
                    </label>

                    <div class="file-upload">
                      <input type="file" id="file-upload" class="form-control form-control-sm invisivel" @change="onFileChange" enctype="multpart/form-data"/>
                    </div>

                    <div v-if="items.imgPreview" class="col-12 d-grid gap-2">
                      <span class="cursor" @click.prevent="removeImage()">
                        <i class="fa-solid fa-trash-can h3 text-danger"></i> 
                      </span>
                    </div>
                    
                  </div>

                  <div class="file-upload-section mb-0" v-else>
                    <label id="preview" for="file-upload" v-show="editImage">
                      <img
                        v-if="`${url}${items.image}`"
                        :src="`${url}${items.image}`"
                        class="rounded-start border border-2 cursor mb-0"
                      />
                    </label>

                    <label id="preview" for="file-upload">
                      <img
                        v-if="items.imgPreview"
                        :src="items.imgPreview"
                        class="rounded-start border border-2 cursor mb-0"
                      />
                    </label>
<!-- `${url}${items.image}`===null ? url_no_image:`${url}${items.image}` -->
                    <div class="file-upload">
                      <input
                        type="file"
                        id="file-upload"
                        class="form-control form-control-sm invisivel"
                        @change="onFileChangeEdit"
                        enctype="multipart/form-data"
                      />
                    </div>
                    <div
                      v-if="`${url}${items.image}`"
                      class="col-12 text-center"
                      v-show="editImage"
                    >
                      <span
                         class="cursor"
                        @click.prevent="removeImageEdit()"
                      >
                        <i class="fa-solid fa-trash-can h3 text-danger"></i>
                        
                      </span>
                    </div>

                    <div v-else class="col-12 mt-2 text-center">
                      <span
                         class="cursor"
                        @click.prevent="removeImage()"
                      >
                        <i class="fa-solid fa-trash-can h3 text-danger"></i>
                        
                      </span>
                    </div>
                  </div>
                </div>

                <div class="form-group col-12 mb-2">
                  <span class="text-danger small col-12" v-if="erros.nome">{{
                    erros.nome[0]
                  }}</span>
                  <label for="" class="text-secodary col-12"
                    >Nome completo</label
                  >
                  <input
                    type="text"
                    class="form-control form-control-sm fw-bold"
                    placeholder="Informe nome completo"
                    v-model="items.nome"
                  />
                </div>

                <div class="form-group col-12 mb-2">
                  <span class="text-danger small col-12" v-if="erros.numBI">{{
                    erros.numBI[0]
                  }}</span>
                  <label for="" class="text-secodary col-12"
                    >Nº do Bilhete</label
                  >
                  <input
                    type="text"
                    class="form-control form-control-sm fw-bold"
                    placeholder="Informe nº do Bilhete"
                    v-model="items.numBI"
                  />
                </div>

                <div class="form-group col-12 mb-2">
                  <span
                    class="text-danger small col-12"
                    v-if="erros.curso_id"
                    >{{ erros.curso_id[0] }}</span
                  >
                  <label for="" class="text-secodary col-12"
                    >Inscrever no curso de:</label
                  >
                  <select
                    class="form-control form-control-sm fw-bold"
                    v-model="items.curso_id"
                  >
                    <option disabled class="selected" value="">
                      Selessione um curso
                    </option>
                    <option
                      :value="curso.id"
                      v-for="curso in getCoursesID"
                      :key="curso.id"
                    >
                      {{ curso.cursos }}
                    </option>
                  </select>
                </div>

                <div class="form-group col-12 mb-2">
                  <span
                    class="text-danger small col-12"
                    v-if="erros.curso_id"
                    >{{ erros.curso_id[0] }}</span
                  >
                  <label for="" class="text-secodary col-12"
                    >Inscrever na graduação do(a):</label
                  >
                  <select
                    class="form-control form-control-sm fw-bold"
                    v-model="items.grade_id"
                  >
                    <option disabled class="selected" value="">
                      Selessione a graduação
                    </option>
                    <option
                      :value="grade.id"
                      v-for="grade in getGraduacaoID"
                      :key="grade.id"
                      class="fw-bold"
                    >
                      {{ grade.grade }}
                    </option>
                  </select>
                </div>

                <div class="form-group col-12 mb-2" v-if="btnSaveVariavel">
                  <span class="text-danger small col-12" v-if="erros.email">{{
                    erros.email[0]
                  }}</span>
                  <label for="" class="text-secodary col-12">E-mail</label>
                  <input
                    type="email"
                    class="form-control form-control-sm fw-bold"
                    placeholder="Informe o e-amil"
                    v-model="items.email"
                  />
                </div>
              </form>
            </div>
          </div>

          <div class="modal-footer" v-if="btnSaveVariavel">
            <button
              type="submit"
              @click="cleanForm"
              class="btn btn-sm btn-secondary"
              data-bs-dismiss="modal"
            >
              <span> <i class="fa-solid fa-circle-xmark"></i> Fechar </span>
            </button>
            <button
              @click.prevent="registerEstudantes"
              type="button"
              class="btn btn-sm btn-success"
            >
              <span v-if="loading">
                <i class="fa-regular fa-floppy-disk"></i>
                Tentando salvar...
              </span>
              <span v-else>
                <i class="fa-regular fa-floppy-disk"></i>
                Cadastrar
              </span>
            </button>
          </div>

          <div class="modal-footer" v-else>
            <button
              type="submit"
              @click="cleanForm"
              class="btn btn-sm btn-secondary"
              data-bs-dismiss="modal"
            >
              <span> <i class="fa-solid fa-circle-xmark"></i> Fechar </span>
            </button>
            <button
              @click.prevent="updateEstudante"
              type="button"
              class="btn btn-sm btn-success"
            >
              <span v-if="loading">
                <i class="fa-regular fa-floppy-disk"></i>
                salvando a alteração...
              </span>
              <span v-else>
                <i class="fa-regular fa-floppy-disk"></i> Salvar
              </span>
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- End Modal cadastrar e editar-->

    <!-- Modal Confirm Delete -->
    <div
      class="modal fade"
      id="modalDeleteConfirm"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">
              <i class="fa-solid fa-trash text-danger"></i> Apagar estudante
            </h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="form-group col-12 text-center">
                <span class="text-primary">
                  <h6>Tens a certeza que desejas apagar este estudante...?</h6>
                </span>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="submit"
              class="btn btn-sm btn-secondary"
              data-bs-dismiss="modal"
            >
              <span> <i class="fa-solid fa-circle-xmark"></i> Fechar </span>
            </button>
            <button
              @click.prevent="apagarEstudante(deleteEstudanteId)"
              type="button"
              class="btn btn-sm btn-danger"
            >
              <span v-if="loading">
                <i class="fa-regular fa-floppy-disk"></i>
                Apagando o estudante...
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
    <div
      class="offcanvas offcanvas-end"
      tabindex="-1"
      id="offcanvasRight"
      aria-labelledby="offcanvasRightLabel"
    >
      <div class="offcanvas-header">
        <div class="form-group col-9 text-end text-info">
          <h5 id="offcanvasRightLabel text-center">DETALHES DO ESTUDANTE</h5>
        </div>
        <div class="form-group col-3 text-end">
          <button
            type="button"
            class="btn-close text-reset"
            data-bs-dismiss="offcanvas"
            aria-label="Close"
          ></button>
        </div>
      </div>
      <div class="offcanvas-body">
        <div class="row">
          <div class="form-group col-12 text-center">
            <span v-show="info.image">
              <router-link :to="`${url}${info.image}`" target="_blank">
                <img
                  :src="`${url}${info.image}`"
                  alt="image"
                  class="rounded-circle rounded-3"
                  style="width: 60px !important; height: 60px !important"
                />
              </router-link>
            </span>
            <span v-show="!info.image"
              ><img
                :src="url_no_image"
                alt="Sem_imagem"
                class="rounded-circle rounded-3"
                style="width: 60px !important; height: 60px !important"
            /></span>
          </div>
        </div>

        <hr />

        <div class="row">
          <div class="form-group col-12 text-center">
            <div class="card shadow">
              <h4>
                <span class="text-danger">{{ info.nome }}</span>
              </h4>
            </div>
          </div>

          <div class="form-group col-12 mt-4">
            <div class="card mt-2">
              <div class="card-body">
                <p class="text-success">Nº do documento pessoal:</p>
                <p class="text-secondary mt-0 fw-bold topoMargin">
                  {{ info.numBI }}
                </p>
              </div>
            </div>
            <div class="card mt-2">
              <div class="card-body">
                <p class="text-success">Inscrito na graduação do(a):</p>
                <p class="text-secondary mt-0 fw-bold topoMargin">
                  {{ gradeInfo }}
                </p>
              </div>
            </div>
            <div class="card mt-2">
              <div class="card-body">
                <p class="text-success">Inscrito no curso de:</p>
                <p class="text-secondary mt-0 fw-bold topoMargin">
                  {{ cursoInfo }}
                </p>
                <p class="mt-0 fw-bold topoMargin">
                  Pago no valor de:
                  <span class="text-success"
                    >{{
                      vueNumberFormat(cobrancaInfo, {
                        isInteger: true,
                      })
                    }}
                  </span>
                </p>
              </div>
            </div>
            <div class="card mt-2">
              <div class="card-body">
                <p class="text-success">E-mail:</p>
                <p class="text-secondary mt-0 fw-bold topoMargin">
                  {{ emailInfo }}
                </p>
                <p class="text-success topoMargin">Senha de acesso:</p>
                <p class="text-secondary mt-0 fw-bold topoMargin">
                  {{ senhaReservaInfo }}
                </p>
              </div>
            </div>
            <div class="card mt-2">
              <div class="card-body">
                <p class="text-success">Painel de acesso:</p>
                <p class="text-primary mt-0 fw-bold topoMargin">
                  {{ adminInfo }}
                </p>
              </div>
            </div>
            <div class="card mt-2">
              <div class="card-body">
                <p class="text-success">Data de registo:</p>
                <p class="text-secondary topoMargin">
                  <span> {{ formatoDeData }} </span>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { notify } from "@kyvg/vue3-notification";
import dateFormat from "@vue-formily/date-format";
import topoPageComponent from "../partials/topoPageComponent.vue";

export default {
  name: "estudante-component",
  emits: ["cleanForm", "buscaAlunoID"],
  data() {
    return {
      url: window.url + "storage/image/estudantes/",
      url_no_image: window.url + "image/no-Image.jpg",
      editImage: false,
      items: {
        user_id: "",
        curso_id: "",
        grade_id: "",
        numBI: "",
        email: "",
        image: null,
        imgPreview: null,
        nome: "",
      },
      data: [
        {
          nome: "",
          numBI: "",
          cursos: {
            cobranca: "",
            cursos: "",
          },
          graduacoes: {
            grade: "",
          },
          users: {
            admin: "",
            email: "",
          },
        },
      ],
      json_meta: [
        [
          {
            key: "charset",
            value: "utf-8",
          },
        ],
      ],
      fields: {
        "Nome completo": "nome",
        "Nº do Bilhete": "numBI",
        curso: "cursos.cursos",
        "Valor do curso": "cursos.cobranca",
        "Classe/Graduação": "graduacoes.grade",
        "Área de acesso": "users.admin",
        "E-mail": "users.email",
      },
      erros: [],
      deleteEstudanteId: "",
      filter: "",
      info: [],

      gradeInfo: "",
      emailInfo: "",
      cursoInfo: "",
      cobrancaInfo: "",
      adminInfo: "",
      senhaReservaInfo: "",

      fomatoData: "",
      namePage: "Estudantes",
      nameButto: "Novo estudante",
      pageTopoIcon: "fa-solid fa-circle-user",
      loading: false,
      btnSaveVariavel: false,
    };
  },

  created() {
    this.loadingEstudantes();
    this.loadingCourses();
    this.loadingGraduaction();
    this.loadinReservasSenhas();
  },

  computed: {
    estudantes() {
      //return this.$store.state.estudantes.items.filter(estudante =>toUpperCase(estudante.nome.includes(toUpperCase(this.filter))))
      return this.$store.getters.todosAlunos(this.filter);
    },

    todosAlunosCount() {
      return this.$store.getters.todosAlunosCount;
    },

    getCoursesID() {
      return this.$store.state.curso.items;
    },

    getGraduacaoID() {
      return this.$store.state.graduacao.items;
    },

    getReservaSenha() {
      return this.$store.state.senha_reserva.items;
    },
    params() {
      return {
        page: this.estudantes.current_page,
      };
    },

    formatoDeData() {
      if (this.info != "") {
        const data = new Date(this.info.created_at);
        //dateFormat.options.locales = ['enUS'];
        return new Intl.DateTimeFormat("pt-BR", {
          dateStyle: "full",
          timeStyle: "short",
          timeZone: "Africa/luanda",
        }).format(data);
        //dateFormat.format('DDDD-MMMM-YYYY', data)
      }
    },
  },

  methods: {
    // Uplodd Image for Save
    onFileChange(e) {
      let file = e.target.files[0];
      this.items.imgPreview = URL.createObjectURL(file);
      let reader = new FileReader();
      reader.onloadend = () => {
        this.items.image = reader.result;
      };
      reader.readAsDataURL(file);
    },
    removeImage() {
      this.items.image = null;
      this.items.imgPreview = null;
    },

    // Upload Image for Update

    onFileChangeEdit(e) {
      this.editImage = false;
      let file = e.target.files[0];
      this.items.imgPreview = URL.createObjectURL(file);

      let reader = new FileReader();
      reader.onloadend = () => {
        this.items.image = reader.result;
      };
      reader.readAsDataURL(file);
    },
    removeImageEdit() {
      this.editImage = false;
      this.items.image = null;
      this.items.imgPreview = this.url_no_image;
    },

    getEstudantesFind(pesquisa) {
      this.wordFind = this.$store.getters.getEstudantesFind(pesquisa);
    },

    buscaEstudanteID() {
      this.btnSaveVariavel = true;
      this.cleanForm();
    },
    detalhes(id) {
      this.info = [];
      this.$store
        .dispatch("detalhesEstudante", id)
        .then((response) => {
          this.info = response.data;
          this.cursoInfo = this.info.cursos.cursos;
          this.cobrancaInfo = this.info.cursos.cobranca;
          this.gradeInfo = this.info.graduacoes.grade;
          this.emailInfo = this.info.users.email;
          this.adminInfo = this.info.users.admin;
          this.senhaReservaInfo = this.info.senhas.senha_reserva;
        })
        .catch((error) => {
          notify({
            title: "Erro de localização",
            text: error,
            type: "warn",
          });
        });
    },

    cleanForm() {
      (this.items = {
        user_id: "",
        curso_id: "",
        grade_id: "",
        numBI: "",
        email: "",
        image: null,
        imgPreview: null,
        nome: "",
      }),
        (this.erros = []);
    },

    loadingEstudantes() {
      //var store = useStore()
      this.$store.dispatch("loadingEstudantes");
    },

    loadingGraduaction() {
      //var store = useStore()
      this.$store.dispatch("loadingGraduaction");
    },

    loadingCourses() {
      //var store = useStore()
      this.$store.dispatch("loadingCourse");
    },

    loadinReservasSenhas() {
      this.$store.dispatch("loadingReservaSenhaEstudante");
    },

    registerEstudantes() {
      this.$store
        .dispatch("createEstudante", this.items)
        .then(() => {
          notify({
            title: "Sucesso",
            text: "Estudante registado com sucesso",
            type: "success",
          });
          this.loadingEstudantes();

          this.cleanForm();
          this.erros = [];
        })
        .catch((error) => {
          this.erros = error;
          notify({
            title: "Erro",
            text: "Ocorreu um erro durante o processo de cadastro!",
            type: "warn",
          });
        });
    },
    updateEstudanteForm(id) {
      this.btnSaveVariavel = false;
      this.editImage = true;
      this.cleanForm();
      this.$store
        .dispatch("updateFormEstudante", id)
        .then((response) => (this.items = response.data.getEstudante))
        .catch((error) => {
          notify({
            title: "Não encotrado",
            text: "O estudante que pretendes localizar não existe",
            type: "warn",
          });
        });
    },

    updateEstudante() {
      this.$store
        .dispatch("updateEstudante", this.items)
        .then((response) => {
          notify({
            title: "Sucesso",
            text: response.data.message,
            type: "success",
          });
          this.loadingEstudantes();
          this.cleanForm();
          this.erros = [];
        })
        .catch((error) => {
          this.erros = error.response.data.errors;
          notify({
            title: "Erro",
            text: "Erro durante a actualização",
            type: "warn",
          });
        });
    },

    deleteEstudante(id) {
      this.deleteEstudanteId = id;
    },

    apagarEstudante(id) {
      this.$store
        .dispatch("apagarEstudante", id)
        .then((response) => {
          notify({
            title: "Sucesso",
            text: response.data.message,
            type: "success",
          });
          this.loadingEstudantes();
        })
        .catch((error) => {
          notify({
            title: "Erro",
            text: error.data.erro,
            type: "warn",
          });
        });
    },

    printDoc() {
      alert("teste impressao de doc");
    },
  },

  components: {
    topoPageComponent,
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
.invisivel{
    visibility: hidden;
}
.tamanhoUserImage {
  width: 60px !important;
  height: 60px !important;
}
</style>
