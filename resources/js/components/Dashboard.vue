<template>
  <div class="container">
    <div class="row">
      <!-- fix for small devices only -->
      <div class="clearfix hidden-md-up"></div>
      <div class="col-12 col-sm-6 col-md-2">
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
      <div class="col-12 col-sm-6 col-md-2">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-2">
            <i class="nav-icon fas fa-dolly"></i>
          </span>
          <div class="info-box-content">
            <span class="info-box-text">Pedidos</span>
            <span class="info-box-number" id="encomendas"></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-2">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-2">
            <i class="nav-icon fas fa-shopping-basket"></i>
          </span>
          <div class="info-box-content">
            <span class="info-box-text">Vendas</span>
            <span class="info-box-number" id="total_vendas"></span>
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
            <span class="info-box-text">Users</span>
            <span class="info-box-number" id="utilizadores"></span>
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
    </div>
    <div class="row" style="margin-top: 25px">
      <div class="col-sm-6">
        <h2>Balanço anual</h2>
        <line-chart style=""></line-chart>
      </div>
      <div class="col-sm-6">
        <div class="row">
          <h2>Mais vendidos</h2>
        </div>
        <div
          class="card-body"
          style="padding-left: 0px; padding-right: 0px; margin-left: -30px"
        >
          <div
            id="example2_wrapper"
            class="dataTables_wrapper container-fluid dt-bootstrap4"
          >
            <div class="row">
              <div class="col-sm-12" style="padding: -20px !important">
                <table
                  id="example2"
                  class="table table-bordered table-hover dataTable"
                  role="grid"
                  aria-describedby="example2_info"
                >
                  <thead>
                    <tr role="row">
                      <th
                        class="sorting_asc"
                        tabindex="0"
                        aria-controls="example2"
                        rowspan="1"
                        colspan="1"
                        aria-sort="ascending"
                        aria-label="Rendering engine: activate to sort column descending"
                        width="5%"
                      >
                        #
                      </th>
                      <th
                        class="sorting_asc"
                        tabindex="0"
                        aria-controls="example2"
                        rowspan="1"
                        colspan="1"
                        aria-sort="ascending"
                        aria-label="Rendering engine: activate to sort column descending"
                        width="10%"
                      >
                        Foto
                      </th>
                      <th
                        class="sorting"
                        tabindex="0"
                        aria-controls="example2"
                        rowspan="1"
                        colspan="1"
                        aria-label="Browser: activate to sort column ascending"
                      >
                        Artigo
                      </th>
                      <th
                        class="sorting"
                        tabindex="0"
                        aria-controls="example2"
                        rowspan="1"
                        colspan="1"
                        aria-label="Browser: activate to sort column ascending"
                        width="10%"
                      >
                        Vendidos
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="top in top_saled" :key="top.idartigo">
                      <td>{{ top.idartigo }}</td>
                      <td style="padding: 5px">
                        <img
                          :src="'/imagens/artigos/' + top.foto"
                          class="img-circle"
                          style="height: 50px; padding: 0px"
                        />
                      </td>
                      <td>{{ top.artigo }}</td>
                      <td><h1></h1></td>
                    </tr>
                  </tbody>
                  <tfoot></tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
  </div>
</template>

<script>
import LineChart from "./ActivityGraph/Linechart.js";
//import LineExample from "./Charts/LineChart.js";
export default {
  data() {
    return {
      top_saled: {},
      products: [],
    };
  },
  name: "tes",
  components: {
    "line-chart": LineChart,
  },

  methods: {
    estatisticas() {
      axios.get("api/dash").then(({ data }) => {
        document.getElementById("artigos").innerHTML = data.artigos;
        document.getElementById("vendas").innerHTML = data.vendas + ",00MT";
        document.getElementById("total_vendas").innerHTML = data.total_vendas;
        document.getElementById("encomendas").innerHTML = data.encomendas;
        document.getElementById("utilizadores").innerHTML = data.utilizadores;
        this.top_saled = data.top_saled;
      });
    },
  },
  created() {
    this.estatisticas();
    },
};
</script>