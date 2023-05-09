<template>
    <div class="mt-2 mb-2" style="height:300px;width:800px;">
      <h5>Presença semanal - Funcionários ( M )</h5>
      <vue3-chart-js
          :id="lineChart.id"
          :type="lineChart.type"
          :data="lineChart.data"
          :options="lineChart.options"
      ></vue3-chart-js>
    </div>
  </template>
  
  <script>
  import Vue3ChartJs from '@j-t-mcc/vue3-chartjs'
  import zoomPlugin from 'chartjs-plugin-zoom'
  
  Vue3ChartJs.registerGlobalPlugins([zoomPlugin])
  
  export default {
    name: 'App',
    components: {
      Vue3ChartJs,
    },
    setup () {
      const lineChart = {
        id: 'line',
        type: 'line',
        data: {
          labels: ['Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta'],
          datasets: [{
            label: '# of Votes',
            data: [50, 19, 3, 5, 2, 3],
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)'
            ],
            borderColor: [
              'rgba(255, 99, 132, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)'
            ],
            borderWidth: 1
          }]
        },
        options: {
          plugins: {
            zoom: {
              zoom: {
                wheel: {
                  enabled: true,
                },
                pinch: {
                  enabled: true,
                },
                mode: "y",
              },
            },
          },
        },
      }
  
      return {
        lineChart
      }
    },
  }
  </script>