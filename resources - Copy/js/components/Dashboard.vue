<template>
  <div class="container">
    <div class="row">
      <!-- fix for small devices only -->
      <div class="clearfix hidden-md-up"></div>
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-info elevation-2">
            <i class="fa fa-shopping-bag"></i>
          </span>
          <div class="info-box-content">
            <span class="info-box-text">Artigos</span>
            <span class="info-box-number" id="artigos"></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>

      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-2">
            <i class="nav-icon fas fa-chart-line"></i>
          </span>
          <div class="info-box-content">
            <span class="info-box-text">Resumo de Vendas</span>
            <span class="info-box-number" id="vendas"></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-2">
            <i class="nav-icon fas fa-shopping-basket"></i>
          </span>
          <div class="info-box-content">
            <span class="info-box-text">Encomendas</span>
            <span class="info-box-number" id="encomendas"></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-2">
            <i class="fa fa-users"></i>
          </span>
          <div class="info-box-content">
            <span class="info-box-text">Utilizadores</span>
            <span class="info-box-number" id="utilizadores"></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>

      <!-- /.col -->
    </div>
  </div>
</template>

<script>
//import LineExample from "./Charts/LineChart.js";
export default {
  name: "tes",
  components: {
    //LineExample
  },

  methods: {
    estatisticas() {
      axios.get("api/dash").then(({ data }) => {
        document.getElementById("artigos").innerHTML = data.artigos;
        document.getElementById("vendas").innerHTML = data.vendas + ",00MT";
        document.getElementById("encomendas").innerHTML = data.encomendas;
        document.getElementById("utilizadores").innerHTML = data.utilizadores;
      });
    }
  },
  created() {
    this.estatisticas();
  }
};
</script>