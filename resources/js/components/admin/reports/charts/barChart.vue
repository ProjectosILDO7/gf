<template>
    <div class="mt-4" style="max-width: 600px">
      <h5 class="mt-2">Presença semanal - Funcionárias ( F )</h5>
      <vue3-chart-js v-bind="{ ...barChart }" />
    </div>
  </template>
  
  <script>
  import Vue3ChartJs from "@j-t-mcc/vue3-chartjs";
  
  export default {
    name: "App",
    components: {
      Vue3ChartJs,
    },
    setup() {
      const barChart = {
        type: "bar",
        options: {
          min: 0,
          max: 100,
          responsive: true,
          plugins: {
            legend: {
              position: "top",
            },
          },
          scales: {
            y: {
              min: -100,
              max: 100,
              ticks: {
                callback: function (value) {
                  return `${value}%`;
                },
              },
            },
          },
        },
        data: {
          labels: ["Segunda", "Terça", "Quarta", "Quinta", "Sexta"],
          datasets: [
            {
              label: "Presença acima dos 0%",
              backgroundColor: ["#1abc9c", "#f1c40f", "#2980b9", "#34495e"],
              data: [40, 20, 50, 10, 20, 15],
            },
            {
              label: "Presença abaixo dos 0%",
              backgroundColor: ["#2ecc71", "#e67e22", "#9b59b6", "#bdc3c7"],
              data: [-40, -20, -10, -10, -20, -15],
            },
          ],
        },
      };
  
      return {
        barChart,
      };
    },
  };
  </script>
  