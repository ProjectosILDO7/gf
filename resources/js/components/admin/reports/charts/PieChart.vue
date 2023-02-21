<template>
    <div class="card">
        <div class="card-header">
            Pagamentos por categoria
        </div>
        <div class="card-body">
            <Pie :data="data" :options="options" />
        </div>
    </div>
  </template>
  
  <script lang="ts">
  import { Chart as ChartJS, ArcElement, Tooltip, Legend } from 'chart.js'
  import { Pie } from 'vue-chartjs'
  import * as chartConfig from './PieChartConfig.js'
  
  ChartJS.register(ArcElement, Tooltip, Legend)
  
  export default {
    name: 'App',
    components: {
      Pie
    },
    data() {
      return chartConfig
    }
  }
  </script>