<template>
  <div class="row">
    <div class="col-sm-12">
      <button
        class="btn btn-success"
        @click="newModal()"
        style="float: right; margin-bottom: 10px"
      >
        Registar utilizador <i class="fa fa-user-plus fa-fw"></i>
      </button>
    </div>
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
        <button class="btn btn-danger" @click="deleteUser()">
          <i class="nav-icon fas fa-trash"></i> Apagar
        </button>
        <button class="btn btn-success" @click="editModal()">
          <i class="nav-icon fas fa-pen"></i> Actualizar
        </button>
        <button v-show="block" class="btn btn-danger" @click="blockUser()">
          <i class="nav-icon fas fa-stop"></i> Bloquear
        </button>
        <button v-show="!block" class="btn btn-success" @click="unlockUser()">
          <i class="nav-icon fas fa-stop"></i> Desbloquear
        </button>
        <button class="btn btn-warning" @click="document()">
          <i class="nav-icon fas fa-key"></i> Alterar password
        </button>
      </div>
    </vue-good-table>
    <!-- Modal -->
    <div
      class="modal fade"
      id="addusers"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 v-show="editmode" class="modal-title" id="exampleModalLabel">
              Actualizar dados
            </h5>
            <h5 v-show="!editmode" class="modal-title" id="exampleModalLabel">
              Registo de utilizador
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
          <form @submit.prevent="editmode ? updateUser() : createUser()">
            <div class="modal-body">
              <div class="row">
                <div class="form-group col-sm-7">
                  <input
                    placeholder="Nome"
                    v-model="form.name"
                    type="text"
                    id="nome"
                    name="name"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('name') }"
                  />
                  <has-error :form="form" field="name"></has-error>
                </div>
                <div class="form-group col-sm-5">
                  <input
                    placeholder="Apelido"
                    v-model="form.apelido"
                    type="text"
                    id="apelido"
                    name="apelido"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('apelido') }"
                  />
                  <has-error :form="form" field="apelido"></has-error>
                </div>
              </div>

              <div class="row">
                <div class="form-group col-sm-7">
                  <input
                    placeholder="E-mail"
                    v-model="form.email"
                    type="email"
                    name="email"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('email') }"
                  />
                  <has-error :form="form" field="email"></has-error>
                </div>
                <div class="form-group col-sm-5">
                  <input
                    placeholder="+258"
                    v-model="form.cell"
                    type="number"
                    name="cell"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('cell') }"
                  />
                  <has-error :form="form" field="cell"></has-error>
                </div>
              </div>

              <div class="row">
                <div class="form-group col-sm-6">
                  <select
                    v-model="form.type"
                    name="type"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('type') }"
                  >
                    <option value="1">Selecione o tipo de utilizador</option>
                    <option value="1">Administrador</option>
                    <option value="2">Cliente</option>
                  </select>
                  <has-error :form="form" field="type"></has-error>
                </div>
                <div class="form-group col-sm-6">
                  <select
                    v-model="form.provincia"
                    name="provincia"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('provincia') }"
                  >
                    <option value="Maputo Cidade">Maputo Cidade</option>
                    <option value="Maputo Provincia">Maputo Provincia</option>
                    <option value="Gaza">Gaza</option>
                    <option value="Inhambane">Inhambane</option>
                    <option value="Sofala">Sofala</option>
                    <option value="Manica">Manica</option>
                    <option value="Zambézia">Zambézia</option>
                    <option value="Tete">Tete</option>
                    <option value="Nampula">Nampula</option>
                    <option value="Niassa">Niassa</option>
                    <option value="Cabo Delgado">Cabo Delgado</option>
                  </select>
                  <has-error :form="form" field="provincia"></has-error>
                </div>
              </div>

              <div class="form-group">
                <input
                  placeholder="Avenida/rua"
                  v-model="form.avenida"
                  type="text"
                  name="avenida"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('avenida') }"
                />
                <has-error :form="form" field="avenida"></has-error>
              </div>

              <div class="row">
                <div class="form-group col-sm-6">
                  <input
                    placeholder="bairro"
                    v-model="form.bairro"
                    type="text"
                    name="bairro"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('bairro') }"
                  />
                  <has-error :form="form" field="bairro"></has-error>
                </div>
                <div class="form-group col-sm-3">
                  <input
                    placeholder="Q."
                    v-model="form.quarteirao"
                    type="number"
                    name="quarteirao"
                    class="form-control"
                    :class="{
                      'is-invalid': form.errors.has('quarteirao'),
                    }"
                  />
                  <has-error :form="form" field="quarteirao"></has-error>
                </div>
                <div class="form-group col-sm-3">
                  <input
                    placeholder="N."
                    v-model="form.numero"
                    type="number"
                    name="numero"
                    class="form-control"
                    :class="{
                      'is-invalid': form.errors.has('numero'),
                    }"
                  />
                  <has-error :form="form" field="numero"></has-error>
                </div>
              </div>

              <div class="form-group">
                <textarea
                  placeholder="Informação breve do utilizador (opcional)"
                  v-model="form.bio"
                  type="text"
                  name="bio"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('bio') }"
                ></textarea>
                <has-error :form="form" field="bio"></has-error>
              </div>

              <div class="row">
                <div class="form-group col-sm-6">
                  <input
                    placeholder="palavra-passe"
                    v-model="form.password"
                    type="password"
                    name="password"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('password') }"
                  />
                  <has-error :form="form" field="password"></has-error>
                </div>
                <div class="form-group col-sm-6">
                  <input
                    placeholder="Confirme a senha"
                    type="password"
                    v-model="form.confirm"
                    name="password_confirm"
                    class="form-control"
                    :class="{
                      'is-invalid': form.errors.has('password_confirm'),
                    }"
                  />
                  <has-error :form="form" field="password_confirm"></has-error>
                </div>
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
  name: "my-component",
  data() {
    return {
      rowSelection: [],
      pedidos: [],
      artigos: [],
      idrequisicao: 0,
      nr_linhas: 0,
      editmode: false,
      block: false,
      users: [],
      status: ["Bloqueado", "Activo"],
      user: {},
      id: 0,
      form: new Form({
        id: "",
        name: "",
        apelido: "",
        email: "",
        cell: "",
        avenida: "",
        bairro: "",
        provincia: "",
        numero: "",
        quarteirao: "",
        password: "",
        confirm: "",
        type: "",
        bio: "",
        photo: "",
      }),
      columns: [
        {
          label: "ID.",
          field: "id",
        },
        {
          label: "Nome",
          field: "nome",
        },
        {
          label: "Apelido",
          field: "apelido",
        },
        {
          label: "Email",
          field: "email",
        },
        {
          label: "Celular",
          field: "cell",
          type: "text",
        },
        {
          label: "Tipo",
          field: "tipo",
        },
        {
          label: "Morada",
          field: "morada",
          type: "text",
        },
        {
          label: "Status",
          field: "status",
          type: "text",
        },
        {
          label: "Data de reg.",
          field: "data",
        },
        {
          label: "Bairro",
          field: "bairro",
          hidden: true,
        },
        {
          label: "Av",
          field: "avenida",
          hidden: true,
        },
        {
          label: "Numero",
          field: "numero",
          hidden: true,
        },
        {
          label: "Qrt",
          field: "qrt",
          hidden: true,
        },
        {
          label: "Bio",
          field: "bio",
          hidden: true,
        },
      ],
      rows: [],
    };
  },
  methods: {
    updateUser() {
      this.$Progress.start();
      this.form
        .put("api/utilizadores/" + this.form.id)
        .then(() => {
          this.loadUsers();
          $("#addusers").modal("hide");
          this.mensagem_sucesso();
          this.form.reset();
        })
        .catch(() => {
          this.$Progress.fail();
        });
    },
    blockUser() {
      swal
        .fire({
          icon: "warning",
          title: "Bloquear utilizador?",
          type: "warning",
          showCancelButton: true,
          confirmButton: "btn curved btn curved-success",
          cancelButtonColor: "#d33",
          confirmButtonText: "Bloquear",
        })
        .then((result) => {
          //send request to the server
          if (result.value) {
            axios
              .get("api/lockUser/" + this.form.id)
              .then(() => {
                this.loadUsers();
                this.mensagem_sucesso();
              })
              .catch(() => {
                this.erro();
              });
          }
        });
    },
    unlockUser() {
      swal
        .fire({
          icon: "warning",
          title: "Desbloquear utilizador?",
          type: "warning",
          showCancelButton: true,
          confirmButton: "btn curved btn curved-success",
          cancelButtonColor: "#d33",
          confirmButtonText: "Desbloquear",
        })
        .then((result) => {
          //send request to the server
          if (result.value) {
            axios
              .get("api/unlockUser/" + this.form.id)
              .then(() => {
                this.loadUsers();
                this.mensagem_sucesso();
              })
              .catch(() => {
                this.erro();
              });
          }
        });
    },
    selectionChanged(params) {
      if (params.selectedRows[0] != null) {
        this.form.name = params.selectedRows[0].nome;
        this.form.apelido = params.selectedRows[0].apelido;
        this.form.email = params.selectedRows[0].email;
        this.form.id = params.selectedRows[0].id;
        this.form.type = params.selectedRows[0].tipo;
        this.form.provincia = params.selectedRows[0].provincia;
        this.form.bairro = params.selectedRows[0].bairro;
        this.form.quarteirao = params.selectedRows[0].qrt;
        this.form.numero = params.selectedRows[0].numero;
        this.form.avenida = params.selectedRows[0].avenida;
        this.form.tipo = params.selectedRows[0].tipo;
        if (params.selectedRows[0].status == "Activo") {
          this.block = true;
        } else {
          this.block = false;
        }
      }
    },
    editModal() {
      this.editmode = true;
      // this.form.reset();
      $("#addusers").modal("show");
      //this.form.fill(user);
    },
    newModal() {
      this.editmode = false;
      this.form.reset();
      $("#addusers").modal("show");
    },
    deleteUser() {
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
              .delete("api/user/" + id)
              .then(() => {
                this.loadUsers();
                Swal.fire(
                  "Apagado!",
                  "Usuário removido com sucesso.",
                  "success"
                );
                Fire.$emit("AfterCreate ");
              })
              .catch(() => {
                Swal("Failed", "Algo de errado não está certo", "warning");
              });
          }
        });
    },
    loadUsers() {
      axios.get("api/utilizadores", {}).then(({ data }) => {
        this.users = data.users;
        this.rows = [];
        data.users.forEach((user) => {
          this.rows.push({
            id: 1,
            id: user.id,
            nome: user.name,
            apelido: user.apelido,
            email: user.email,
            cell: user.celular,
            morada: user.provincia,
            tipo: user.tipo_utilizador,
            bairro: user.bairro,
            avenida: user.avenida,
            qrt: user.quarteirao,
            numero: user.numero,
            bio: user.bio,
            status: this.status[user.estado],
            data: user.created_at,
          });
        });
      });
    },
    createUser() {
      if (this.form.password == this.form.confirm) {
        this.$Progress.start();
        this.form
          .post("api/utilizadores")
          .then(() => {
            this.loadUsers();
            $("#addusers").modal("hide");
            Toast.fire({
              type: "success",
              title: "Gravado com sucesso",
            });
            this.$Progress.finish();
          })
          .catch(() => {
            this.$Progress.fail();
          });
      } else {
        return false;
      }
    },
    mensagem_sucesso() {
      swal.fire({
        position: "center",
        icon: "success",
        title: "Operação concluida",
        showConfirmButton: false,
        timer: 1500,
        size: "small",
      });
    },
    erro() {
      swal.fire({
        position: "center",
        icon: "error",
        title: "A operação falhou",
        showConfirmButton: false,
        timer: 1500,
        size: "small",
      });
    },
  },
  created() {
    this.loadUsers();
  },
};
</script>