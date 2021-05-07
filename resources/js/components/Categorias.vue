<template>
  <div class="container" style="margin-top: 20px">
    <center>
      <div
        class="card col-md-9"
        style="padding: 0px !important; margin-top: 20px"
      >
        <div class="card-header">
          <h3 class="card-title">Categorias</h3>
          <div class="card-tools">
            <button class="btn btn-success" @click="newModal()">
              Adicionar <i class="fa fa-user-plus fa-fw"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body" style="padding-left: 0px; padding-right: 0px">
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
                        Id
                      </th>
                      <th
                        class="sorting"
                        tabindex="0"
                        aria-controls="example2"
                        rowspan="1"
                        colspan="1"
                        aria-label="Browser: activate to sort column ascending"
                      >
                        Categoria
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
                        Acção
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr
                      v-for="categoria in categorias"
                      :key="categoria.idcategoria"
                    >
                      <td>{{ categoria.idcategoria }}</td>
                      <td>{{ categoria.categoria }}</td>
                      <td>
                        <a href="#" @click="editModal(categoria)">
                          <i class="fa fa-edit"></i>
                        </a>
                        /
                        <a href="#" @click="apagar(categoria.idcategoria)">
                          <i class="fa fa-trash red"></i>
                        </a>
                      </td>
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
    </center>
    <!-- Modal -->
    <div
      class="modal fade"
      id="add"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 v-show="editmode" class="modal-title" id="exampleModalLabel">
              Actualizar
            </h5>
            <h5 v-show="!editmode" class="modal-title" id="exampleModalLabel">
              Nova categoria
            </h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="editmode ? update() : create()">
            <div class="modal-body">
              <div class="form-group">
                <input
                  placeholder="Categoria"
                  v-model="form.categoria"
                  type="text"
                  name="categoria"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('categoria') }"
                />
                <has-error :form="form" field="categoria"></has-error>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">
                Descartar
              </button>
              <button v-show="editmode" type="submit" class="btn btn-success">
                Actualizar
              </button>
              <button v-show="!editmode" type="submit" class="btn btn-primary">
                Gravar
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      editmode: false,
      categorias: {},
      form: new Form({
        id: "",
        categoria: "",
      }),
    };
  },
  methods: {
    buscarCategorias() {
      axios
        .get("api/categoria")
        .then(({ data }) => (this.categorias = data.categorias));
      
    },
    newModal() {
      this.editmode = false;
      this.form.reset();
      $("#add").modal("show");
    },
    editModal(categoria) {
      this.editmode = true;
      this.form.reset();
      $("#add").modal("show");
      this.form.fill(categoria);
    },
    update(id) {
      /*this.$Progress.start();
      //console.log('editando');
      this.form
        .put("api/categoria/" + this.form.id)
        .then(() => {
          this.loadUsers();
          $("#addusers").modal("hide");
          Toast.fire({
            type: "success",
            title: "Actualizado com sucesso",
          });
        })
        .catch(() => {
          this.$Progress.fail();
        });
    */
      window.alert(this.form.id);
    },
    create() {
      this.$Progress.start();
      this.form
        .post("api/categoria")
        .then(() => {
          $("#add").modal("hide");
          toast.fire({
            type: "success",
            title: "Gravado com sucesso",
          });
          this.buscarCategorias();
          this.$Progress.finish();
        })
        .catch(() => {
          this.$Progress.fail();
        });
    },
    apagar(id) {
      swal
        .fire({
          title: "Tem certeza?",
          text: "Esta operação não poderá ser revertida!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Continuar e apagar!",
        })
        .then((result) => {
          //send request to the server
          if (result.value) {
            this.form
              .delete("api/categoria/" + id)
              .then(() => {
                this.buscarCategorias();
                swal.fire("Apagado!", "Categoria apagada com.", "successo");
                Fire.$emit("AfterCreate ");
              })
              .catch(() => {
                Swal(
                  "Failed",
                  "Acção não pode ser concluida devido devido a ocorrencia de um erro interno.",
                  "warning"
                );
              });
          }
        });
    },
  },
  created() {
    this.buscarCategorias();
  },
};
</script>
