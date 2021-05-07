<template>
  <div class="ActivityGraph__Weapper">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Activity Data</h3>
      </div>
      <div class="box-body">
        <div class="row">
          <line-chart></line-chart>
         </div>
      </div>
    </div>
  </div>
</template>
    
<script>
import LineChart from "./Linechart.js";
export default {
  components: {
    "line-chart": LineChart,
  },
};
</script>