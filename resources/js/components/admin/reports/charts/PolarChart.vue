<template>
    <div class="card">
        <div class="card-header">Radar Chart</div>
        <div class="card-body">
            <Radar :data="data" :options="options" />
        </div>
    </div>
</template>
  
<script lang="ts">
import {
    Chart as ChartJS,
    RadialLinearScale,
    PointElement,
    LineElement,
    Filler,
    Tooltip,
    Legend
} from 'chart.js'
import { Radar } from 'vue-chartjs'
import * as chartConfig from './PolarChartConfig.js'

ChartJS.register(
    RadialLinearScale,
    PointElement,
    LineElement,
    Filler,
    Tooltip,
    Legend
)

export default {
    name: 'App',
    components: {
        Radar
    },
    data() {
        return chartConfig
    }
}
</script>
