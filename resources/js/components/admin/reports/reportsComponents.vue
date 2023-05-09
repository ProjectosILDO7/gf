<template>
    <div class="row">
        <div class="form-group col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <line-chart-vue/>
            <p><bar-chart/></p>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <doughnut-chart-vue/>
            <pie-chart/>
        </div>
    </div>
</template>

<script>
import doughnutChartVue from './charts/doughnutChart.vue';
import LineChartVue from './charts/lineChart.vue';
import pieChart from './charts/pieChart.vue';
import barChart from './charts/barChart.vue';

export default {
  name: 'ChartsComponent',
  components: {
    doughnutChartVue,
    LineChartVue,
    pieChart,
    barChart
  },
  
}
</script>
