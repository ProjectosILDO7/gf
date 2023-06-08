<template>
  <div class="row">

    <div class="form-group col-xs-12 col-sm-12 col-md-8 col-lg-8 text-center">
      <!-- <line-chart-vue/> -->
      <div class="card">
          <div class="card-header bg-dark text-light">
              Presenças registadas durante os mêses
          </div>
          <div class="card-body">
              <Bar v-if="loaded" :data="chartData" />
          </div>
      </div>

    </div>

    <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4 text-center">
      <!-- <doughnut-chart-vue/> -->
      <div class="card">
          <div class="card-header bg-dark text-light">
              Funcionários activos e inactivos
          </div>
          <div class="card-body">
              
          </div>
      </div>
      
    </div>
  </div>
</template>

<script>
import { Bar } from 'vue-chartjs'
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)
import { URL_API } from "../../../configs/index.js"

export default {
  name: 'BarChart',
  components: { Bar },
  data: () => ({
    loaded: false,
    chartData: null
  }),
  async mounted () {
    this.loaded = false
    try {
      const { userlist } = await fetch(`${URL_API}/getGraficoBarra`)
      this.chartdata = userlist
      this.loaded = true
    } catch (e) {
      console.error(e)
    }
  }
}
//     const store = useStore()
//     const chartBar = ref("")
//     // GRAFICO DE BARRR
//     const barChart = {
//       type: "bar",
//       options: {
//         min: 0,
//         max: 100,
//         responsive: true,
//         plugins: {
//           legend: {
//             position: "top",
//           },
//         },
//         scales: {
//           y: {
//             max: 100,
//             ticks: {
//               callback: function (value) {
//                 return `${value}`;
//               },
//             },
//           },
//         },
//       },
//       data: {
//         labels: ["Jan", "Fev", "Mar", "Abr", "Maio", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
//         datasets: [
//           {
//             label: "Presença acima dos 0%",
//             backgroundColor: ["#1abc9c", "#f1c40f", "#2980b9", "#34495e", "#f1c40f", "#2980b9", "#34495e", "#f1c40f", "#2980b9", "#34495e", "#f1c40f"],
//             data: [chartBar.value],
//           },
//           // {
//           //   label: "Presença abaixo dos 0%",
//           //   backgroundColor: ["#2ecc71", "#e67e22", "#9b59b6", "#bdc3c7"],
//           //   data: [-40, -20, -10, -10, -20, -15],
//           // },
//         ],
//       },

//     };
// //------------------------------------------------------------------------------------------------------------------------------
// // GRAFICO DE PIZZA
//     const pieChart = {
//       type: "pie",
//       data: {
//         labels: ["Activos", "Inativos"],
//         datasets: [
//           {
//             backgroundColor: ["#00D8FF", "#DD1B16"],
//             data: [80, 10],
//           },
//         ],
//       },
//     };
// // ------------------------------------------------------------------------------------------------------
//     const graficoDeBarra=()=>{
//       this.$store.dispatch('loadingGraficoDeBarra')
//     };

//     created(()=>{
//       this.graficoDeBarra()
//     }),

//     computed(()=>{
//        chartBar=()=>{
//         return store.getters.presencaMensal
//       }
//     })

//     return {
//       barChart,
//       pieChart,
//       graficoDeBarra,
//     };


//   },

</script>
