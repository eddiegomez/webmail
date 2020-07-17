<template>
  <div class="row">
    <!--@on-selected-rows-change="selectionChanged"-->
    <vue-good-table
      :columns="columns"
      :rows="rows"
      style="width:100%; margin-right:15px;"
      :select-options="{ 
    enabled: true,
  }"
      :search-options="{ enabled: true }"
    >
      <div slot="selected-row-actions">
        <button class="btn btn-success">
          <i class="nav-icon fas fa-check"></i> Marcar como lida
        </button>
        <button class="btn btn-warning">
          <i class="nav-icon fas fa-inbox"></i> Arquivar
        </button>
        <button class="btn btn-danger">
          <i class="nav-icon fas fa-trash"></i> Apagar
        </button>
        <button class="btn btn-primary" data-toggle="modal" data-target="#ver">
          <i class="nav-icon fas fa-eye"></i> Ver
        </button>
      </div>
    </vue-good-table>

    <!-- Modal -->
    <div id="ver" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Novo email</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <form method="POST" action="/enviar" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary">Guardar</button>
              <button type="submit" class="btn btn-success">Enviar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- End of modal -->
  </div>
</template>
<script>
export default {
  name: "my-component",
  data() {
    return {
      columns: [
        {
          label: "Nome",
          field: "name"
        },
        {
          label: "Assunto",
          field: "age"
        },
        {
          label: "Data",
          field: "createdAt",
          type: "text"
          /*dateInputFormat: "yyyy-MM-dd",
          dateOutputFormat: "MMM Do yy"*/
        }
      ],
      rows: [
        {
          id: 1,
          name: "Edson Gomes",
          age: "Teste de email",
          createdAt: "2020-06-02"
        },
        {
          id: 2,
          name: "Jane",
          age: 24,
          createdAt: "2020-06-02"
        },
        {
          id: 3,
          name: "Susan",
          age: 16,
          createdAt: "2020-06-02"
        },
        {
          id: 4,
          name: "Chris",
          age: 55,
          createdAt: "2020-06-2"
        },
        {
          id: 5,
          name: "Dan",
          age: 40,
          createdAt: "2020-06-02"
        },
        {
          id: 6,
          name: "John",
          age: 20,
          createdAt: "2020-06-02"
        },
        {
          id: 1,
          name: "Edson Gomes",
          age: "Teste de email",
          createdAt: "2020-06-02"
        },
        {
          id: 2,
          name: "Jane",
          age: 24,
          createdAt: "2020-06-02"
        },
        {
          id: 3,
          name: "Susan",
          age: 16,
          createdAt: "2020-06-02"
        },
        {
          id: 4,
          name: "Chris",
          age: 55,
          createdAt: "2020-06-2"
        },
        {
          id: 5,
          name: "Dan",
          age: 40,
          createdAt: "2020-06-02"
        },
        {
          id: 6,
          name: "John",
          age: 20,
          createdAt: "2020-06-02"
        }
      ]
    };
  },
  methods: {
    teste() {
      console.log("Active modal");
    }
  }
};
</script>