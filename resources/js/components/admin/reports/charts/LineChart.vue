<template>
    <div class="card">
        <div class="card-header">
            Line Chart
        </div>
        <div class="card-body">
            <Line :data="data" :options="options" />
        </div>
    </div>
  </template>
  
  <script lang="ts">
  import {
    Chart as ChartJS,
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    Title,
    Tooltip,
    Legend
  } from 'chart.js'
  import { Line } from 'vue-chartjs'
  import * as chartConfig from './chartConfig.js'
  
  ChartJS.register(
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    Title,
    Tooltip,
    Legend
  )
  
  export default {
    name: 'LineChart',
    components: {
      Line
    },
    data() {
      return chartConfig
    }
  }
  </script>