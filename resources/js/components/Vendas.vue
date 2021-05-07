<template>
  <div class="row">
    <!--@on-selected-rows-change="selectionChanged"-->
    <vue-good-table
      @on-selected-rows-change="selectionChanged"
      ref="my-table"
      :columns="columns"
      :rows="rows"
      style="width: 100%"
      :select-options="{
        enabled: true,
      }"
      :search-options="{ enabled: true }"
    >
      <div slot="selected-row-actions">
        <button class="btn btn-danger">
          <i class="nav-icon fas fa-trash"></i> Apagar
        </button>
        <button class="btn btn-primary" data-toggle="modal" data-target="#ver">
          <i class="nav-icon fas fa-eye"></i> Detalhes
        </button>
      </div>
    </vue-good-table>
    <!--Modal DETALHES-->
    <div
      class="modal fade"
      id="ver"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-dialog-centered"
        role="document"
        style="width: 500px"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detalhes</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="padding: 0px">
            <div class="row">
              <div class="col-md-4">
                <button
                  class="btn curved"
                  data-toggle="modal"
                  data-target="#foto"
                >
                  <img
                    id="modal_foto"
                    :src="'/imagens/perfil/default.png'"
                    class
                    style="width: 100%"
                  />
                </button>
                <center>
                  <h3 class="text-muted pull-right" id="modal_ID"></h3>
                </center>
              </div>
              <div class="col-md-7">
                <h3 class="text-muted pull-right" id="modal_nome"></h3>
                <ul class="list-group list-group-unbordered">
                  <li class="list-group-item">
                    <b class="text-muted">
                      <i class="text-muted fas fa-user"></i>
                    </b>
                    <a
                      class="text-muted pull-right"
                      id="modal_user"
                      style="float: right"
                    ></a>
                  </li>
                  <li class="list-group-item">
                    <b class="text-muted">
                      <i class="text-muted fas fa-envelope"></i>
                    </b>
                    <a
                      class="text-muted pull-right"
                      id="modal_email"
                      style="float: right"
                    ></a>
                  </li>
                  <li class="list-group-item">
                    <b class="text-muted">
                      <i class="text-muted fas fa-phone-alt"></i>
                    </b>
                    <a
                      class="text-muted pull-right"
                      id="modal_cell"
                      style="float: right"
                    ></a>
                  </li>
                </ul>
                <div id="teste"></div>
              </div>
            </div>
            <div class="col-md-12">
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <br />
                  <center>
                    <h5 class="text-muted pull-right">Pedido</h5>
                  </center>
                </li>
              </ul>
              <div class="table-responsive" id="div_tabela">
                <table class="table" id="tab">
                  <tr>
                    <th>Artigo</th>
                    <th>qtd</th>
                    <th>P. unitário</th>
                    <th style="float: right">sub-total</th>
                  </tr>
                </table>
              </div>
              <h5 style="display: inline; float: right">
                Total:
                <h5
                  style="display: inline; float: right"
                  id="total_pedido"
                ></h5>
              </h5>
            </div>
          </div>
          <div class="modal-footer">
            <button
              data-dismiss="modal"
              class="btn curved btn-primary"
              style="float: right"
            >
              Fechar
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
  </div>
</template>
<script>
export default {
  name: "my-component",
  data() {
    return {
      rowSelection: [],
      pedidos: [],
      artigos: [],
      idrequisicao: 0,
      nr_linhas: 0,
      form: new Form({
        id: "",
        total_venda: "",
        delivery: "",
        created_at: "",
      }),
      columns: [
        {
          label: "Ref.",
          field: "ref",
        },
        {
          label: "Cliente",
          field: "cliente",
        },
        {
          label: "Total do pedido",
          field: "total",
        },
        {
          label: "Email",
          field: "email",
          type: "text",
        },
        {
          label: "Celular",
          field: "cell",
          type: "text",
        },
        {
          label: "Data e hora do pedido",
          field: "data_pedido",
        },
        {
          label: "Data e hora da venda",
          field: "data_venda",
        },
      ],
      rows: [],
    };
  },
  methods: {
    buscarDados() {
      axios.get("api/vendas", {}).then(({ data }) => {
        this.pedidos = data.pedidos;
        this.rows = [];
        data.pedidos.forEach((pedido) => {
          this.rows.push({
            id: 1,
            ref: pedido.idrequisicao,
            cliente: pedido.name + " " + pedido.apelido,
            total: pedido.total_venda + ",00MT",
            email: pedido.email,
            cell: pedido.celular,
            data_pedido: pedido.created_at,
            data_venda: pedido.updated_at,
          });
        });
      });
    },
    removerTabela() {
      var removeTab = document.getElementById("tab");

      var parentEl = removeTab.parentElement;

      parentEl.removeChild(removeTab);

      this.adicionarTabela();
    },
    adicionarTabela() {
      const tabela = document.createElement("tabela");
      tabela.innerHTML =
        "<table class='table' id='tab'><tr><th>Artigo</th><th>qtd</th><th>P. unitário</th><th style='float: right'>sub-total</th></tr></table>";
      document.getElementById("div_tabela").appendChild(tabela);
    },
    selectionChanged(params) {
      this.removerTabela();
      this.rowSelection = params.selectedRows;
      if (this.rowSelection.length >= 1) {
        document.getElementById(
          "modal_user"
        ).innerHTML = this.rowSelection[0].cliente;
        document.getElementById(
          "modal_email"
        ).innerHTML = this.rowSelection[0].email;
        document.getElementById(
          "modal_cell"
        ).innerHTML = this.rowSelection[0].cell;
        this.idrequisicao = this.rowSelection[0].ref;
        document.getElementById(
          "total_pedido"
        ).innerHTML = this.rowSelection[0].total;

        axios
          .get("api/pedidos/" + this.rowSelection[0].ref)
          .then(({ data }) => {
            data.artigos.forEach((artigo) => {
              //cria nova linha da tabela
              const tr = document.createElement("tr");
              //monta a estrutura d linha criada
              tr.innerHTML =
                "<td>" +
                artigo.artigo +
                "</td> <td>" +
                artigo.qtd +
                "</td> <td>" +
                artigo.v_venda +
                " MT </td>" +
                "</td> <td  style='float: right'>" +
                artigo.v_venda * artigo.qtd +
                " MT </td>";
              //adiciona a linha a tabela
              document.getElementById("tab").appendChild(tr);
            });
          });
      }
    },
  },
  created() {
    this.buscarDados();
  },
};
</script>