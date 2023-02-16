<template>
    <div class="row mt-4">
        <h4 class="text-secondary">Relatório</h4>
        <div class="form-group col-12">
            <line-chart/>
        </div>
<p/>
        <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <polar-chart/>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <pie-chart/>
        </div>

    </div>
</template>

<script>
import PolarChart from './charts/PolarChart.vue'
import LineChart from './charts/LineChart.vue'
import PieChart from './charts/PieChart.vue'

export default{
    name:"Charts",
    components:{
        PolarChart,
        LineChart,
        PieChart
    }

}
</script>