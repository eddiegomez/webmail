<template>
  <div class="container">
    <div id="test">
</div>
  </div>
</template>

<script>
// Definindo novo componente chamado button-counter
Vue.component('button-counter', {
  data: function () {
    return {
      count: 0
    }
  },
  template: '<button v-on:click="count++">Você clicou em mim {{ count }} vezes.</button>'
});
export default {
  data() {
    return {
      editmode: false,
      categorias: null,
      form: new Form({
        id: "",
        categoria: ""
      })
    };
  },
  methods: {
    registar() {
      //this.$Progress.start();
      this.form.post("api/categoria").then(() => {
        window.alert("Gravado");
        this.buscarCategorias();
        this.form.reset();
      });
      /* .then(() => {
          this.$Progress.finish();
          this.buscarCasos();
          this.form.reset();
          $("#registarCaso").modal("hide");
          toast.fire({
            type: "success",
            title: "Publicado com sucesso"
          });
        })
        .catch(() => {
          this.$Progress.fail();
        });*/
      //window.alert("Registo"); */
    },
    updt(categoria) {
      this.form.categoria = categoria.categoria;
      document.getElementById("id").value = categoria.idcategoria;
      this.editmode = true;
    },
    actualizar() {
      this.form.put("api/categoria/" + document.getElementById("id").value);
      this.form.reset();
      this.editmode = false;
      this.buscarCategorias();  
      window.alert("updated");
    },
    buscarCategorias() {
      axios.get("api/categoria").then(({ data }) => {
        this.categorias = data.categorias;
      });
    }
  },
  created() {
    this.buscarCategorias();
  }
};
</script>


