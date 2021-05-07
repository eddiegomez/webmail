<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12 top-200">
        <div class="row">
          <div class="col-sm-4" v-for="artigo in artigos" :key="artigo.idartigo">
            <div class="card" style>
              <img :src="'/imagens/artigos/'+ artigo.foto" class style="height: 350px;" />
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-9">
                    <h5 class="card-title">{{artigo.artigo}}</h5>
                  </div>
                  <div class="col-sm-3">
                    <h5 class="card-title" style="position:relative; float:right !important;">
                      <strong>{{artigo.v_venda}},00MT</strong>
                    </h5>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-8">Stock:</div>
                  <div class="col-sm-4">{{artigo.quantidade}} {{artigo.tipo_qtd}}</div>
                </div>
                <div class="row">
                  <div class="col-sm-8">Genero:</div>
                  <div class="col-sm-4">{{artigo.genero}}</div>
                </div>
                <div class="row">
                  <div class="col-sm-8">Cores:</div>
                  <div class="col-sm-4" style="float:right">
                    <span style="background-color:red">__</span>
                    <span style="background-color:cyan">__</span>
                    <span style="background-color:black">__</span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-8">Tamanhos:</div>
                  <div class="col-sm-4" style="float:right">
                    <span>S,</span>
                    <span>M,</span>
                    <span>L</span>
                  </div>
                </div>
                <hr />
                <center>
                  <a href="#" class="btn btn-primary">
                    <i class="fa fa-eye"></i>
                  </a>
                  <button class="btn btn-success" @click="editModal(artigo)">
                    <i class="fa fa-edit"></i>
                  </button>
                  <a href="#">
                    <button type="submit"  @click="apagar_artigo(artigo.idartigo)" class="btn curved btn-danger">
                      <i class="fa fa-trash"></i>
                    </button>
                  </a>
                </center>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <button
      class="btn btn-danger mb-10"
      @click="newModal()"
      style="position:fixed; bottom: 50px; right:50px;border-radius: 30px;"
    >
      <i class="fa fa-pen"></i> Registar artigo
    </button>

    <!-- Modal REGISTAR E EDITAR-->
    <div
      class="modal fade"
      id="registar"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 v-show="editmode" class="modal-title" id="exampleModalLabel">Actualizar dados</h5>
            <h5 v-show="!editmode" class="modal-title" id="exampleModalLabel">Novo artigo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="editmode ? actualizar(): registar()">
            <div class="modal-body">
              <div class="row">
                <div class="form-group">
                  <input
                    v-model="form.id"
                    type="number"
                    hidden
                    name="id"
                    :class="{ 'is-invalid': form.errors.has('id') }"
                  />
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label class="text-muted">Nome</label>
                    <input
                      placeholder="nome"
                      v-model="form.nome"
                      type="text"
                      name="nome"
                      id="nome"
                      class="form-control curved"
                      :class="{ 'is-invalid': form.errors.has('nome') }"
                    />
                    <has-error :form="form" field="nome"></has-error>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="text-muted">Categoria</label>
                    <select
                      class="form-control curved"
                      v-model="form.categoria"
                      type="text"
                      name="categoria"
                      :class="{ 'is-invalid': form.errors.has('categoria') }"
                    >
                      <option
                        v-for="categoria in categorias"
                        :key="categoria.idcategoria"
                        v-bind:value="categoria.idcategoria"
                      >{{categoria.categoria}}</option>
                    </select>
                    <has-error :form="form" field="genero"></has-error>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label class="text-muted">Estado</label>
                    <select
                      class="form-control curved"
                      v-model="form.estado"
                      type="text"
                      name="estado"
                      :class="{ 'is-invalid': form.errors.has('estado') }"
                    >
                      <option value="Activo">Activo</option>
                      <option value="Desactivo">Desactivo</option>
                    </select>
                    <has-error :form="form" field="estado"></has-error>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label class="text-muted">Qtd.</label>
                    <input
                      v-model="form.quantidade"
                      type="number"
                      name="quantidade"
                      class="form-control curved"
                      :class="{ 'is-invalid': form.errors.has('quantidade') }"
                    />
                    <has-error :form="form" field="quantidade"></has-error>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="form-group">
                    <label class="text-muted">Lote</label>
                    <select
                      class="form-control curved"
                      v-model="form.tipo_qtd"
                      type="text"
                      name="tipo_qtd"
                      :class="{ 'is-invalid': form.errors.has('tipo_qtd') }"
                    >
                      <option value="Activo">UN</option>
                      <option value="Desactivo">CX</option>
                    </select>
                    <has-error :form="form" field="tipo_qtd"></has-error>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="text-muted">Genero</label>
                    <select
                      class="form-control curved"
                      v-model="form.genero"
                      type="text"
                      name="genero"
                      :class="{ 'is-invalid': form.errors.has('genero') }"
                    >
                      <option value="Masculino">Masculino</option>
                      <option value="Feminino">Feminino</option>
                      <option value="Ambos">Ambos</option>
                    </select>
                    <has-error :form="form" field="genero"></has-error>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="text-muted">V. Compra (MT)</label>
                    <input
                      v-model="form.compra"
                      type="number"
                      name="compra"
                      class="form-control curved"
                      :class="{ 'is-invalid': form.errors.has('compra') }"
                    />
                    <has-error :form="form" field="compra"></has-error>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="text-muted">V. Venda (MT)</label>
                    <input
                      v-model="form.venda"
                      type="number"
                      name="venda"
                      class="form-control curved"
                      :class="{ 'is-invalid': form.errors.has('venda') }"
                    />
                    <has-error :form="form" field="venda"></has-error>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3">
                  <div class="form-group">
                    <label class="text-muted">Cores</label>
                    <input
                      v-model="form.cores"
                      type="text"
                      name="cores"
                      class="form-control curved"
                      :class="{ 'is-invalid': form.errors.has('cores') }"
                    />
                    <has-error :form="form" field="cores"></has-error>
                  </div>
                </div>
                <div class="col-sm-9">
                  <div class="form-group">
                    <label for="photo" class="col-sm-10 text-muted">Fotografia</label>
                    <input type="file" @change="gravarFoto" ref="file" name="photo" class="form-input"  multiple="multiple"/>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="text-muted">Descrição</label>
                <textarea
                  placeholder
                  rows="3"
                  v-model="form.descricao"
                  type="text"
                  name="descricao"
                  class="form-control curved"
                  :class="{ 'is-invalid': form.errors.has('descricao') }"
                ></textarea>
                <has-error :form="form" field="descricao"></has-error>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn curved btn-danger" data-dismiss="modal">Descartar</button>
              <a href="#" @click="editModal(artigo)" class>
                <button v-show="editmode" class="btn curved btn-success">Actualizar</button>
              </a>
                <button v-show="!editmode" type="submit" class="btn curved btn-primary">Gravar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- End of modal -->
  </div>
</template>
<style>
/*.curved {
  border-radius: 25px;
}*/
</style>
<script>
export default {
  data() {
    return {
      editmode: false,
      artigos: null,
      art: null,
      categorias: null,
      form: new Form({
        id: "",
        estado: "",
        nome: "",
        genero: "",
        quantidade: "",
        tipo_qtd: "",
        categoria: "",
        cores: "",
        compra: "",
        venda: "",
        descricao: "",
        photo: "",
        tamanho: ""
      })
    };
  },
  methods: {
    newModal() {
      this.editmode = false;
      this.form.reset();
      $("#registar").modal("show");
    },
    editModal(artigo) {
      axios.get("api/artigo/" + artigo.idartigo).then(({ data }) => {
        this.form.id = data.artigo.idartigo;
        this.form.nome = data.artigo.artigo;
        this.form.genero = data.artigo.genero;
        this.form.quantidade = data.artigo.quantidade;
        this.form.descricao = data.artigo.descricao;
        this.form.estado = data.artigo.estado;
        this.form.compra = data.artigo.v_compra;
        this.form.venda = data.artigo.v_venda;
        this.form.tipo_qtd = data.artigo.idtipo_qtd;
        this.form.categoria = data.artigo.categoria_idcategoria;
        this.form.photo = data.artigo.foto;
      });
      this.editmode = true;
      this.form.reset();
      $("#registar").modal("show");
    },
    apagar_artigo(id){
     this.form.delete('/api/artigo/'+id);
    },
    actualizar() {
      this.form.put("api/artigo/" + this.form.id);
      this.form.reset();
      $("#registar").modal("hide");
      this.buscarArtigos();
    },
    gravarFoto(e) {
      let file = e.target.files[0];
      //extrai os dados da img
      console.log(file);
      let reader = new FileReader();
      reader.onloadend = file => {
        this.form.photo = reader.result;
      };
      reader.readAsDataURL(file);
    },
    registar() {
      for( var i = 0; i < this.$refs.file.files.length; i++ ){
        let file = this.$refs.file.files[i];
        console.log(file);
    }
      //this.$Progress.start();
      this.form
        .post("api/artigo")
        .then(() => {
          //this.$Progress.finish();
          this.buscarArtigos();
          $("#registar").modal("hide");
          this.form.reset();
          /*toast.fire({
            type: "success",
            title: "Publicado com sucesso"
          });*/
        })
        .catch(() => {
          //this.$Progress.fail();
        });
      //
    },
    buscarArtigos() {
      axios.get("api/artigo").then(({ data }) => {
        this.artigos = data.artigos;
      });
    },
    buscarCategorias() {
      axios.get("api/categoria").then(({ data }) => {
        this.categorias = data.categorias;
      });
    }
  },
  created() {
    this.buscarArtigos();
    this.buscarCategorias();
  }
};
</script>

