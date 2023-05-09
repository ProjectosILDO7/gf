<template>
    <div class="m-auto mt-4" style="height: 300px; width: 400px; display: flex; flex-direction: column">
      <p class="m-auto">Alunos activos & Inativos</p>
      <vue3-chart-js v-bind="{ ...pieChart }" />
    </div>
  </template>
  
  <script>
 import Vue3ChartJs from '@j-t-mcc/vue3-chartjs'
 import zoomPlugin from 'chartjs-plugin-zoom'
  
  export default {
    name: "pieChart",
    components: {
      Vue3ChartJs,
    },
    setup() {
      const pieChart = {
        type: "pie",
        data: {
          labels: ["Activos", "Inativos"],
          datasets: [
            {
              backgroundColor: [ "#00D8FF", "#DD1B16"],
              data: [80, 10],
            },
          ],
        },
      };
  
      return {
        pieChart,
      };
    },
  };
  </script>
  