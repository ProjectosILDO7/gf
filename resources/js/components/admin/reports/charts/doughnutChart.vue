<template>
    <div class="m-auto"
      style="height: 300px; width: 400px; display: flex; flex-direction: column"
    >
    <p class="m-auto">Funcionários activos & Inativos</p>
      <vue3-chart-js
        :id="doughnutChart.id"
        :type="doughnutChart.type"
        :data="doughnutChart.data"
        @before-render="beforeRenderLogic"
      ></vue3-chart-js>
    </div>
  </template>
  
  <script>
  import Vue3ChartJs from '@j-t-mcc/vue3-chartjs'
  
  export default {
    name: 'App',
    components: {
      Vue3ChartJs,
    },
    setup () {
      const doughnutChart = {
        id: 'doughnut',
        type: 'doughnut',
        data: {
          labels: ['Activos', 'Inativos'],
          datasets: [
            {
              backgroundColor: [
                '#00D8FF',
                '#DD1B16'
              ],
              data: [80, 10]
            }
          ]
        }
      }
  
      const beforeRenderLogic = (event) => {
        //...
        //if(a === b) {
        //  event.preventDefault()
        //}
      }
  
      return {
        doughnutChart,
        beforeRenderLogic
      }
    },
  }
  </script>
  